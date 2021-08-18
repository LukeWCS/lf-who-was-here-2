<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2013, nickvergessen, http://www.flying-bits.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

// declare(strict_types=1);

namespace lukewcs\whowashere\core;

class who_was_here
{
	protected $template;
	protected $config;
	protected $user;
	protected $auth;
	protected $cache;
	protected $db;
	protected $lfwwh_table;
	protected $table_prefix;
	protected $php_ext;
	protected $language;

	public function __construct(
		\phpbb\template\template $template,
		\phpbb\config\config $config,
		\phpbb\user $user,
		\phpbb\auth\auth $auth,
		\phpbb\cache\driver\driver_interface $cache,
		\phpbb\db\driver\driver_interface $db,
		$table_prefix,
		$php_ext,
		$language
	)
	{
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->auth = $auth;
		$this->cache = $cache;
		$this->db = $db;
		$this->lfwwh_table = $table_prefix . 'lfwwh';
		$this->php_ext = $php_ext;
		$this->language = $language;
	}

	/* DB config
		(bool)		'lfwwh_admin_mode'
		(bool)		'lfwwh_api_mode'
		(int)		'lfwwh_cache_time'
		(bool)		'lfwwh_clear_up'
		(bool)		'lfwwh_create_hidden_info'
		(int)		'lfwwh_disp_bots'
		(bool)		'lfwwh_disp_bots_only_admin'
		(int)		'lfwwh_disp_for_bots'
		(int)		'lfwwh_disp_for_guests'
		(bool)		'lfwwh_disp_guests'
		(bool)		'lfwwh_disp_hidden'
		(int)		'lfwwh_disp_ip'
		(bool)		'lfwwh_disp_reg_users'
		(int)		'lfwwh_disp_template_pos'
		(bool)		'lfwwh_disp_template_pos_all'
		(int)		'lfwwh_disp_time'
		(int)		'lfwwh_disp_time_bots'
		(string)	'lfwwh_disp_time_format'
		(int)		'lfwwh_last_clean'
		(int)		'lfwwh_period_of_time_h'
		(int)		'lfwwh_period_of_time_m'
		(int)		'lfwwh_period_of_time_s'
		(bool)		'lfwwh_record'
		(int)		'lfwwh_record_ips'
		(int)		'lfwwh_record_reset_time'
		(int)		'lfwwh_record_time'
		(string)	'lfwwh_record_time_format'
		(int)		'lfwwh_sort_by'
		(int)		'lfwwh_time_mode'
		(bool)		'lfwwh_use_cache'
		(bool)		'lfwwh_use_online_time'
		(bool)		'lfwwh_use_permissions'
	*/

	/**
	* Update the users session in the table.
	*/
	public function update_session()
	{
		if ($this->user->data['user_id'] != ANONYMOUS)
		{
			if (!$this->config['lfwwh_disp_bots'] && $this->user->data['user_type'] == USER_IGNORE)
			{
				return;
			}
			$wwh_data = [
				'user_id'			=> $this->user->data['user_id'],
				'user_ip'			=> $this->user->ip,
				'username'			=> $this->user->data['username'],
				'username_clean'	=> $this->user->data['username_clean'],
				'user_colour'		=> $this->user->data['user_colour'],
				'user_type'			=> $this->user->data['user_type'],
				'viewonline'		=> $this->user->data['session_viewonline'],
				'wwh_lastpage'		=> time(),
			];

			$this->db->sql_return_on_error(true);
			$sql = 'UPDATE ' . $this->lfwwh_table . '
					SET ' . $this->db->sql_build_array('UPDATE', $wwh_data) . '
					WHERE user_id = ' . (int) $this->user->data['user_id'] . "
					OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
					AND user_id = " . ANONYMOUS . ')';
			$result = $this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			$sql_affectedrows = (int) $this->db->sql_affectedrows();
			if ($sql_affectedrows != 1)
			{
				if ($sql_affectedrows > 1)
				{
					// Found multiple matches, so we delete them and just add one
					$sql = 'DELETE FROM ' . $this->lfwwh_table . '
							WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
							AND user_id = " . ANONYMOUS . ')';
					$this->db->sql_query($sql);
					$this->db->sql_query('INSERT INTO ' . $this->lfwwh_table . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
				}

				if ($sql_affectedrows == 0)
				{
					// No entry updated. Either the user is not listed yet, or has opened two links in the same time
					$sql = 'SELECT 1 as found
							FROM ' . $this->lfwwh_table . '
							WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
							AND user_id = " . ANONYMOUS . ')';
					$result = $this->db->sql_query($sql);
					$found = (int) $this->db->sql_fetchfield('found');
					$this->db->sql_freeresult($result);
					if (!$found)
					{
						// He wasn't listed.
						$this->db->sql_query('INSERT INTO ' . $this->lfwwh_table . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
					}
				}
			}
		}
		else
		{
			if (!$this->config['lfwwh_disp_guests'])
			{
				return;
			}
			$sql = 'SELECT user_id
					FROM ' . $this->lfwwh_table . "
					WHERE user_ip = '" . $this->db->sql_escape($this->user->ip) . "'";
			$result = $this->db->sql_query_limit($sql, 1);

			$user_logged = (int) $this->db->sql_fetchfield('user_id');
			$this->db->sql_freeresult($result);

			if (!$user_logged)
			{
				$wwh_data = [
					'user_id'			=> $this->user->data['user_id'],
					'user_ip'			=> $this->user->ip,
					'username'			=> $this->user->data['username'],
					'username_clean'	=> $this->user->data['username_clean'],
					'user_colour'		=> $this->user->data['user_colour'],
					'user_type'			=> $this->user->data['user_type'],
					'viewonline'		=> 1,
					'wwh_lastpage'		=> time(),
				];
				$this->db->sql_query('INSERT INTO ' . $this->lfwwh_table . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
			}
		}
		$this->db->sql_return_on_error(false);
	}

	/**
	* Fetching the user-list and putting the stuff into the template.
	*/
	public function display()
	{
		$page_name = $this->user->page['page_name'];
		if ($page_name != 'index.' . $this->php_ext && $page_name != 'app.' . $this->php_ext . '/portal' && $page_name != 'app.' . $this->php_ext)
		{
			return;
		}
		$this->language->add_lang('who_was_here', 'lukewcs/whowashere');
		if ($this->config['lfwwh_disp_template_pos_all'])
		{
			$this->language->add_lang('info_acp_who_was_here', 'lukewcs/whowashere');
		}

		// Set display permission variables
		if ($this->config['lfwwh_admin_mode'])
		{
			$wwh_disp_permission_total = $this->auth->acl_get('a_');
			$wwh_disp_permission_users = $this->auth->acl_get('a_');
		}
		else
		{
			if ($this->config['lfwwh_use_permissions'])	// use phpBB permissions
			{
				$wwh_disp_permission_total = $this->auth->acl_gets('u_lfwwh_show_stats');
				$wwh_disp_permission_users = $this->auth->acl_gets('u_lfwwh_show_users');
			}
			else	// use simple permissions
			{
				if ($this->user->data['user_id'] != ANONYMOUS && empty($this->user->data['is_bot']))	// user
				{
					$wwh_disp_permission_total = true;
					$wwh_disp_permission_users = true;
				}
				else if ($this->user->data['is_bot'])	// bot
				{
					$wwh_disp_permission_total = $this->config['lfwwh_disp_for_bots'] == 0 || $this->config['lfwwh_disp_for_bots'] == 1;
					$wwh_disp_permission_users = $this->config['lfwwh_disp_for_bots'] == 1 || $this->config['lfwwh_disp_for_bots'] == 3;
				}
				else	// guest
				{
					$wwh_disp_permission_total = $this->config['lfwwh_disp_for_guests'] == 0 || $this->config['lfwwh_disp_for_guests'] == 1;
					$wwh_disp_permission_users = $this->config['lfwwh_disp_for_guests'] == 1 || $this->config['lfwwh_disp_for_guests'] == 3;
				}
			}
		}
		$wwh_disp_permission_bots = ($this->config['lfwwh_disp_bots_only_admin'] && $this->auth->acl_get('a_')) || $this->config['lfwwh_disp_bots_only_admin'] == 0;
		$wwh_disp_permission_ip = $this->config['lfwwh_disp_ip'] && $this->auth->acl_get('a_');
		$wwh_disp_permission_hidden = $this->config['lfwwh_disp_hidden'] && $this->auth->acl_get('u_viewonline');

		if (!$this->prune())
		{
			// Error while purging the list, database is missing :-O
			$this->language->add_lang('info_acp_who_was_here', 'lukewcs/whowashere');
			return;
		}

		// Default count total or ids
		$count = [
			'count_guests'	=> 0,
			'count_bot'		=> 0,
			'count_reg'		=> 0,
			'count_hidden'	=> 0,
			'count_total'	=> 0,
			'ids_reg'		=> [],
			'ids_hidden'	=> [],
			'ids_bot'		=> [],
		];

		$wwh_username_full = $users_list = $bots_list = '';

		// Load cache who_was_here
		if ($this->config['lfwwh_use_cache'])
		{
			$load_online_time = ($this->config['load_online_time'] >= 1) ? $this->config['load_online_time'] : 1;
			if ($this->config['lfwwh_cache_time'] > $load_online_time)
			{
				$this->config->set('lfwwh_cache_time', $load_online_time);
			}
			if (($view_state = $this->cache->get("_lf_who_was_here")) === false)
			{
				$view_state = $this->view_state();
				$this->cache->put("_lf_who_was_here", $view_state, 60 * (($this->config['lfwwh_use_online_time']) ? $load_online_time : $this->config['lfwwh_cache_time']));
			}
		}
		else
		{
			$view_state = $this->view_state();
		}

		$show_button_users = $show_button_bots = false;
		foreach ($view_state as $row)
		{
			if ($row['user_id'] != ANONYMOUS)
			{
				$user_type = (int) $row['user_type'];
				$wwh_username_full = get_username_string((($user_type == USER_IGNORE) ? 'no_profile' : 'full'), $row['user_id'], $row['username'], $row['user_colour']);
				$time = $this->get_formatted_time((int) $row['wwh_lastpage']);
				$ip = (($wwh_disp_permission_ip) ? $this->language->lang('IP') . ': ' . $row['user_ip'] : '');
				$time_disp = $this->get_class_span('time', $time);
				$ip_disp = $this->get_class_span('ip', $ip);
				$disp_info = '';
				$hover_info = '';
				$show_time_disp = ($this->config['lfwwh_disp_time'] == 1 && $user_type != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] > 0 && $this->config['lfwwh_disp_time_bots'] == 1 && $user_type == USER_IGNORE);
				$show_time_hover = ($this->config['lfwwh_disp_time'] == 2 && $user_type != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] > 0 && $this->config['lfwwh_disp_time_bots'] == 2 && $user_type == USER_IGNORE);
				$show_ip_disp = $ip && $this->config['lfwwh_disp_ip'] == 1;
				$show_ip_hover = $ip && $this->config['lfwwh_disp_ip'] == 2;

				if ($show_time_disp || $show_time_hover || $show_ip_disp || $show_ip_hover)
				{
					if ($show_time_disp && !$show_time_hover && !$show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $time_disp . ')';
					}
					else if (!$show_time_disp && !$show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $ip_disp . ')';
					}
					else if ($show_time_disp && !$show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $time_disp . ' | ' . $ip_disp . ')';
					}
					else if (!$show_time_disp && $show_time_hover && !$show_ip_disp && !$show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($user_type, ' (' . $time_disp . ')');
						$hover_info = ' title="' . $time . '"';
					}
					else if (!$show_time_disp && !$show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($user_type, ' (' . $ip_disp . ')');
						$hover_info = ' title="' . $ip . '"';
					}
					else if (!$show_time_disp && $show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($user_type, ' (' . $time_disp . ' | ' . $ip_disp . ')');
						$hover_info = ' title="' . $time . ' | ' . $ip . '"';
					}
					else if ($show_time_disp && !$show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = ' (' . $time_disp . $this->get_hidden_span($user_type, ' | ' . $ip_disp ). ')';
						$hover_info = ' title="' . $ip . '"';
					}
					else if (!$show_time_disp && $show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $this->get_hidden_span($user_type, $time_disp . ' | ') . $ip_disp . ')';
						$hover_info = ' title="' . $time . '"';
					}
					if (!$show_button_users)
					{
						if ((($this->config['lfwwh_disp_time'] == 2 && $user_type != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] == 1 && $this->config['lfwwh_disp_time_bots'] == 2 && $user_type == USER_IGNORE) || $show_ip_hover) && $hover_info)
						{
							$show_button_users = true;
						}
					}
					if (!$show_button_bots)
					{
						if ($this->config['lfwwh_disp_bots'] == 2 && ($this->config['lfwwh_disp_time_bots'] == 2 || $show_ip_hover) && $user_type == USER_IGNORE && $hover_info)
						{
							$show_button_bots = true;
						}
					}
				}
			}

			if ($row['viewonline'] || ($user_type == USER_IGNORE))
			{
				if (($row['user_id'] != ANONYMOUS) && ($this->config['lfwwh_disp_bots'] && $wwh_disp_permission_bots || ($user_type != USER_IGNORE)))
				{
					if ($this->config['lfwwh_disp_bots'] == 2 && $user_type == USER_IGNORE)
					{
						$bots_list .= $this->language->lang('COMMA_SEPARATOR') . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_info;
					}
					else
					{
						$users_list .= $this->language->lang('COMMA_SEPARATOR') . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_info;
					}
				}
			}
			else if ($wwh_disp_permission_hidden || $row['user_id'] == $this->user->data['user_id'])
			{
				$users_list .= $this->language->lang('COMMA_SEPARATOR') . '<em' . $hover_info . '>' .$wwh_username_full . '</em>' . $disp_info;
			}

			// At the end let's count them =)
			if ($row['user_id'] == ANONYMOUS)
			{
				$count['count_guests']++;
			}
			else if ($user_type == USER_IGNORE)
			{
				$count['count_bot']++;
				$count['ids_bot'][] = (int) $row['user_id'];
			}
			else if ($row['viewonline'] == 1)
			{
				$count['count_reg']++;
				$count['ids_reg'][] = (int) $row['user_id'];
			}
			else
			{
				$count['count_hidden']++;
				$count['ids_hidden'][] = (int) $row['user_id'];
			}
			$count['count_total']++;
		}

		$users_list = utf8_substr($users_list, utf8_strlen($this->language->lang('COMMA_SEPARATOR')));
		if ($users_list == '')
		{
			// User list is empty.
			$users_list = $this->language->lang('LFWWH_NO_USERS');
		}
		if ($this->config['lfwwh_disp_bots'] == 2)
		{
			$bots_list = utf8_substr($bots_list, utf8_strlen($this->language->lang('COMMA_SEPARATOR')));
		}
		if (!$this->config['lfwwh_disp_hidden'])
		{
			$count['count_total'] -= $count['count_hidden'];
		}
		if (!$this->config['lfwwh_disp_bots'])
		{
			$count['count_total'] -= $count['count_bot'];
		}
		if (!$this->config['lfwwh_disp_guests'])
		{
			$count['count_total'] -= $count['count_guests'];
		}
		// Need to update the record?
		if ($this->config['lfwwh_record_ips'] < $count['count_total'])
		{
			$this->config->set('lfwwh_record_ips', $count['count_total'], true);
			$this->config->set('lfwwh_record_time', time(), true);
		}
		if (!$this->config['lfwwh_create_hidden_info'])
		{
			$show_button_users = $show_button_bots = false;
		}
		$this->template->assign_vars([
			'LFWWH_TOTAL'				=> ($wwh_disp_permission_total) ? $this->get_total_users_string($count) : '',
			'LFWWH_EXP'					=> ($wwh_disp_permission_total) ? $this->get_explanation_string((int) $this->config['lfwwh_time_mode']) : '',
			'LFWWH_RECORD'				=> ($wwh_disp_permission_total) ? $this->get_record_string((bool) $this->config['lfwwh_record'], (int) $this->config['lfwwh_time_mode']) : '',
			'LFWWH_USERS'				=> ($wwh_disp_permission_users) ? $users_list : '',
			'LFWWH_USERS_SHOW_BUTTON'	=> $show_button_users,
			'LFWWH_BOTS'				=> ($wwh_disp_permission_users && $bots_list) ? $bots_list : '',
			'LFWWH_BOTS_SHOW_BUTTON'	=> $show_button_bots,
			'LFWWH_POS'					=> ($this->config['lfwwh_disp_template_pos_all']) ? 7 : 2 ** $this->config['lfwwh_disp_template_pos'],
			'LFWWH_API_MODE'			=> $this->config['lfwwh_api_mode'],
		]);
		if ($this->config['lfwwh_disp_template_pos_all'])
		{
			$this->template->assign_vars([
				'LFWWH_POS_EXP_1'	=> sprintf($this->language->lang('LFWWH_POS_EXP'), $this->language->lang('LFWWH_DISP_TEMPLATE_POS_0')),
				'LFWWH_POS_EXP_2'	=> sprintf($this->language->lang('LFWWH_POS_EXP'), $this->language->lang('LFWWH_DISP_TEMPLATE_POS_1')),
				'LFWWH_POS_EXP_4'	=> sprintf($this->language->lang('LFWWH_POS_EXP'), $this->language->lang('LFWWH_DISP_TEMPLATE_POS_2')),
			]);
		}
	}

	/**
	* Deletes the users from the list, whose visit is to old.
	*/
	public function prune()
	{
		if ($this->config['lfwwh_time_mode'] == 1)	// today
		{
			$prune_time_obj = date_create('now', timezone_open($this->config['board_timezone']));
			date_time_set($prune_time_obj, 0, 0, 0);
			$prune_timestamp = date_timestamp_get($prune_time_obj);
		}
		else	// period of time
		{
			$prune_timestamp = time() - ((3600 * $this->config['lfwwh_period_of_time_h']) + (60 * $this->config['lfwwh_period_of_time_m']) + $this->config['lfwwh_period_of_time_s']);
		}

		if ($this->config['lfwwh_last_clean'] != $prune_timestamp || $this->config['lfwwh_time_mode'] == 0)
		{
			$this->db->sql_return_on_error(true);
			$sql = 'DELETE FROM ' . $this->lfwwh_table . '
					WHERE wwh_lastpage < ' . (int) $prune_timestamp;
			$this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			if ($this->config['lfwwh_time_mode'] == 1)	// today
			{
				$this->config->set('lfwwh_last_clean', $prune_timestamp);
			}
		}

		// Purging was not needed or done succesfully...
		return true;
	}

	/**
	* Cleans up the table and delete the cache when user accounts have been deleted. Inserts also a notification if clean up was necessary. (LukeWCS)
	*/
	public function clear_up($event)
	{
		if (!$this->config['lfwwh_clear_up'])
		{
			return;
		}
		$user_ids_ary = $event['user_ids'];
		$user_deleted = false;

		foreach ($user_ids_ary as $user_id)
		{
			$sql = 'SELECT 1 as found
					FROM  ' . $this->lfwwh_table . '
					WHERE user_id = ' . (int) $user_id;
			$result = $this->db->sql_query($sql);
			$found = (int) $this->db->sql_fetchfield('found');
			$this->db->sql_freeresult($result);
			if ($found)
			{
				$sql = 'DELETE FROM ' . $this->lfwwh_table . '
						WHERE user_id = ' . (int) $user_id;
				$this->db->sql_query($sql);
				$user_deleted = true;
			}
		}

		// Clears the WWH cache and inserts the notification.
		if ($user_deleted)
		{
			if ($this->config['lfwwh_use_cache'])
			{
				$this->cache->destroy("_lf_who_was_here");
			}
			$this->language->add_lang('overwrite_phpbb_msg', 'lukewcs/whowashere');
		}
	}

	/**
	* Adds permissions. (LukeWCS)
	*/
	public function add_permissions($event)
	{
		$permissions = $event['permissions'];
		$lang_show_users = $this->language->lang('ACL_U_LFWWH_SHOW_USERS');	// needs phpBB >=3.2.10
		$lang_show_stats = $this->language->lang('ACL_U_LFWWH_SHOW_STATS');	// needs phpBB >=3.2.10
		if (!$this->config['lfwwh_use_permissions'] || $this->config['lfwwh_admin_mode'])
		{
			$lang_show_users = '<span style="opacity: 0.5;">' . $lang_show_users . '</span>';
			$lang_show_stats = '<span style="opacity: 0.5;">' . $lang_show_stats . '</span>';
		}
		$permissions['u_lfwwh_show_users'] = ['lang' => $lang_show_users, 'cat' => 'profile'];
		$permissions['u_lfwwh_show_stats'] = ['lang' => $lang_show_stats, 'cat' => 'profile'];
		$event['permissions'] = $permissions;
	}

	/**
	* Returns the users array
	*/
	private function view_state()
	{
		switch ($this->config['lfwwh_sort_by'])
		{
			case 0:
			case 1:
				$sql_order_by = 'username_clean';
			break;
			case 4:
			case 5:
				$sql_order_by = 'user_id';
			break;
			case 2:
			case 3:
			default:
				$sql_order_by = 'wwh_lastpage';
			break;
		}
		$sql_ordering = (($this->config['lfwwh_sort_by'] % 2) == 0) ? 'ASC' : 'DESC';

		// Let's try another method, to deny duplicate appearance of usernames.
		$user_id_ary = [];

		$sql = 'SELECT user_id, username, username_clean, user_colour, user_type, viewonline, wwh_lastpage, user_ip
				FROM  ' . $this->lfwwh_table . "
				ORDER BY $sql_order_by $sql_ordering";
		$result = $this->db->sql_query($sql);

		$statrow = [];
		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!in_array($row['user_id'], $user_id_ary))
			{
				if ($row['viewonline'] || $row['user_type'] == USER_IGNORE)
				{
					if ($row['user_id'] != ANONYMOUS && ($this->config['lfwwh_disp_bots'] || $row['user_type'] != USER_IGNORE))
					{
						$user_id_ary[] = $row['user_id'];
					}
				}
				else if ($this->config['lfwwh_disp_hidden'] && $this->auth->acl_get('u_viewonline'))
				{
					$user_id_ary[] = $row['user_id'];
				}
				$statrow[] = $row;
			}
		}
		$this->db->sql_freeresult($result);

		return $statrow;
	}

	/**
	* Returns a string encapsulated in <span> tags for hidden text and set CSS class depending to the user type (user/bot). (LukeWCS)
	*/
	private function get_hidden_span(int $user_type, string $text): string
	{
		if (!$this->config['lfwwh_create_hidden_info'])
		{
			return '';
		}
		return '<span class="lfwwh_info_' . (($user_type != USER_IGNORE || $this->config['lfwwh_disp_bots'] == 1) ? 'u' : 'b') . '" style="display: none;">' . $text . '</span>';
	}

	/**
	* Returns a string encapsulated in <span> tags with a specific CSS class. (LukeWCS)
	*/
	private function get_class_span(string $class, string $text): string
	{
		return '<span class="lfwwh_' .  $class . '">' . $text . '</span>';
	}

	/**
	* Returns a formated time string with replaced placeholders for LFWWH_LAST1 - LFWWH_LAST3. (LukeWCS)
	*/
	private function get_formatted_time(int $timestamp): string
	{
		$text = $this->user->format_date($timestamp, $this->config['lfwwh_disp_time_format']);
		$text = str_replace(['$1', '$2', '$3'], [$this->language->lang('LFWWH_LAST1'), $this->language->lang('LFWWH_LAST2'), $this->language->lang('LFWWH_LAST3')], $text);
		return $text;
	}

	/**
	* Returns a formated record time string. (LukeWCS)
	*/
	private function get_formatted_record_time(int $timestamp): string
	{
		return $this->user->format_date($timestamp, $this->config['lfwwh_record_time_format']);
	}

	/**
	* Returns the Explanation string for the online list:
	* Demo:	based on users active today
	*		based on users active over the past 30 minutes
	*/
	private function get_explanation_string(int $mode): string
	{
		if ($mode == 1)	// today
		{
			return $this->language->lang('LFWWH_EXP');
		}
		else	// period of time
		{
			$explanation = $this->language->lang('LFWWH_EXP_TIME');
			$explanation .= $this->language->lang('LFWWH_HOURS', (int) $this->config['lfwwh_period_of_time_h']);
			$explanation .= $this->language->lang('LFWWH_MINUTES', (int) $this->config['lfwwh_period_of_time_m']);
			$explanation .= $this->language->lang('LFWWH_SECONDS', (int) $this->config['lfwwh_period_of_time_s']);

			switch (substr_count($explanation, '%s'))
			{
				case 3:
					return sprintf($explanation, '', $this->language->lang('COMMA_SEPARATOR'), $this->language->lang('LFWWH_AND_SEPARATOR'));
				case 2:
					return sprintf($explanation, '', $this->language->lang('LFWWH_AND_SEPARATOR'));
				default:
					return sprintf($explanation, '');
			}
		}
	}

	/**
	* Returns the Record string for the online list:
	* Demo:	Most users ever online was 1 on Mon 7. Sep 2009
	*		Most users ever online was 1 between Mon 7. Sep 2009 and Tue 8. Sep 2009
	*/
	private function get_record_string(bool $active, int $mode): string
	{
		if (!$active)
		{
			return '';
		}
		if ($mode == 1)	// today
		{
			return sprintf($this->language->lang('LFWWH_RECORD_DAY'), $this->config['lfwwh_record_ips'], $this->get_formatted_record_time((int) $this->config['lfwwh_record_time']));
		}
		else	// period of time
		{
			$record_time_start = (int) $this->config['lfwwh_record_time'] - (3600 * $this->config['lfwwh_period_of_time_h']) - (60 * $this->config['lfwwh_period_of_time_m']) - $this->config['lfwwh_period_of_time_s'];
			return sprintf($this->language->lang('LFWWH_RECORD_TIME'), $this->config['lfwwh_record_ips'], $this->get_formatted_record_time($record_time_start), $this->get_formatted_record_time((int) $this->config['lfwwh_record_time']));
		}
	}

	/**
	* Returns the Total string for the online list:
	* Demo:	In total there was 1 user online :: 1 registered, 0 hidden, 0 bots and 0 guests
	*/
	private function get_total_users_string(array $count): string
	{
		$total_users_string = $this->language->lang('LFWWH_TOTAL', $count['count_total']);
		if ($this->config['lfwwh_disp_reg_users'])
		{
			$total_users_string .= '%s ' . $this->language->lang('LFWWH_REG_USERS', $count['count_reg']);
		}
		if ($this->config['lfwwh_disp_hidden'])
		{
			$total_users_string .= '%s ' . $this->language->lang('LFWWH_HIDDEN', $count['count_hidden']);
		}
		if ($this->config['lfwwh_disp_bots'])
		{
			$total_users_string .= '%s ' . $this->language->lang('LFWWH_BOTS', $count['count_bot']);
		}
		if ($this->config['lfwwh_disp_guests'])
		{
			$total_users_string .= '%s ' . $this->language->lang('LFWWH_GUESTS', $count['count_guests']);
		}

		switch (substr_count($total_users_string, '%s'))
		{
			case 4:
				return sprintf($total_users_string, $this->language->lang('LFWWH_TOTAL_SEPARATOR'), $this->language->lang('COMMA_SEPARATOR'), $this->language->lang('COMMA_SEPARATOR'), $this->language->lang('LFWWH_AND_SEPARATOR'));
			case 3:
				return sprintf($total_users_string, $this->language->lang('LFWWH_TOTAL_SEPARATOR'), $this->language->lang('COMMA_SEPARATOR'), $this->language->lang('LFWWH_AND_SEPARATOR'));
			case 2:
				return sprintf($total_users_string, $this->language->lang('LFWWH_TOTAL_SEPARATOR'), $this->language->lang('LFWWH_AND_SEPARATOR'));
			case 1:
				return sprintf($total_users_string, $this->language->lang('LFWWH_TOTAL_SEPARATOR'));
			default:
				return $total_users_string;
		}
	}
}
