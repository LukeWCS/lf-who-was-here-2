<?php
/**
* 
* LF who was here (2.x) - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2013, nickvergessen, http://www.flying-bits.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\whowashere\core;

class who_was_here
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth */
	protected $auth;

	/** @var \phpbb\cache\driver\driver_interface */
	protected $cache;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/**
	* Constructor
	*
	* @param \phpbb\template\template				$template			Interface template class
	* @param \phpbb\config\config					$config				Configuration container class
	* @param \phpbb\user							$user				Base user class
	* @param \phpbb\auth\auth						$auth				Permission/Auth class
	* @param \phpbb\cache\driver\driver_interface	$cache				An interface that all cache drivers must implement
	* @param \phpbb\db\driver\driver_interface		$db					Interface driver_interface
	* @param string									$table_prefix		Tables prefix
	*
	*/

	public function __construct(
		\phpbb\template\template $template, 
		\phpbb\config\config $config, 
		\phpbb\user $user, 
		\phpbb\auth\auth $auth, 
		\phpbb\cache\driver\driver_interface $cache, 
		\phpbb\db\driver\driver_interface $db, 
		$table_prefix
	)
	{
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->auth = $auth;
		$this->cache = $cache;
		$this->db = $db;
		$this->LFWWH_TABLE = $table_prefix . 'lfwwh';
	}

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
			$wwh_data = array(
				'user_id'			=> $this->user->data['user_id'],
				'user_ip'			=> $this->user->ip,
				'username'			=> $this->user->data['username'],
				'username_clean'	=> $this->user->data['username_clean'],
				'user_colour'		=> $this->user->data['user_colour'],
				'user_type'			=> $this->user->data['user_type'],
				'viewonline'		=> $this->user->data['session_viewonline'],
				'wwh_lastpage'		=> time(),
			);

			$this->db->sql_return_on_error(true);
			$sql = 'UPDATE ' . $this->LFWWH_TABLE . '
					SET ' . $this->db->sql_build_array('UPDATE', $wwh_data) . '
					WHERE user_id = ' . (int) $this->user->data['user_id'] . "
					OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
					AND user_id = " . ANONYMOUS . ')';
			$result = $this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			if ((bool) $result === false)
			{
				// database does not exist yet...
				return;
			}

			$sql_affectedrows = (int) $this->db->sql_affectedrows();
			if ($sql_affectedrows != 1)
			{
				if ($sql_affectedrows > 1)
				{
					// Found multiple matches, so we delete them and just add one
					$sql = 'DELETE FROM ' . $this->LFWWH_TABLE . '
							WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
							AND user_id = " . ANONYMOUS . ')';
					$this->db->sql_query($sql);
					$this->db->sql_query('INSERT INTO ' . $this->LFWWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
				}

				if ($sql_affectedrows == 0)
				{
					// No entry updated. Either the user is not listed yet, or has opened two links in the same time
					$sql = 'SELECT 1 as found
							FROM ' . $this->LFWWH_TABLE . '
							WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
							AND user_id = " . ANONYMOUS . ')';
					$result = $this->db->sql_query($sql);
					$found = (int) $this->db->sql_fetchfield('found');
					$this->db->sql_freeresult($result);
					if (!$found)
					{
						// He wasn't listed.
						$this->db->sql_query('INSERT INTO ' . $this->LFWWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
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
			$this->db->sql_return_on_error(true);
			$sql = 'SELECT user_id
					FROM ' . $this->LFWWH_TABLE . "
					WHERE user_ip = '" . $this->db->sql_escape($this->user->ip) . "'";
			$result = $this->db->sql_query_limit($sql, 1);
			$this->db->sql_return_on_error(false);

			if ((bool) $result === false)
			{
				// database does not exist yet...
				return;
			}

			$user_logged = (int) $this->db->sql_fetchfield('user_id');
			$this->db->sql_freeresult($result);

			if (!$user_logged)
			{
				$wwh_data = array(
					'user_id'			=> $this->user->data['user_id'],
					'user_ip'			=> $this->user->ip,
					'username'			=> $this->user->data['username'],
					'username_clean'	=> $this->user->data['username_clean'],
					'user_colour'		=> $this->user->data['user_colour'],
					'user_type'			=> $this->user->data['user_type'],
					'viewonline'		=> 1,
					'wwh_lastpage'		=> time(),
				);
				$this->db->sql_query('INSERT INTO ' . $this->LFWWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
			}
		}
		$this->db->sql_return_on_error(false);
	}

	/**
	* Fetching the user-list and putting the stuff into the template.
	*/
	public function display()
	{
		$this->user->add_lang_ext('lukewcs/whowashere', 'who_was_here');

		// Set display permission variables
		if ($this->config['lfwwh_admin_mode'])
		{
			$wwh_disp_permission_total = $this->auth->acl_get('a_');
			$wwh_disp_permission_users = $this->auth->acl_get('a_');
		}
		else
		{
			if ($this->config['lfwwh_use_permissions'])
			{
				$wwh_disp_permission_total = $this->auth->acl_gets('u_lfwwh_show_stats');
				$wwh_disp_permission_users = $this->auth->acl_gets('u_lfwwh_show_users');
			}
			else
			{
				$wwh_disp_permission_total = ($this->user->data['user_id'] != ANONYMOUS || $this->config['lfwwh_disp_for_guests'] == 0 || $this->config['lfwwh_disp_for_guests'] == 1) && empty($this->user->data['is_bot']);
				$wwh_disp_permission_users = ($this->user->data['user_id'] != ANONYMOUS || $this->config['lfwwh_disp_for_guests'] == 1 || $this->config['lfwwh_disp_for_guests'] == 3) && empty($this->user->data['is_bot']);
			}
		}
		$wwh_disp_permission_bots = ($this->config['lfwwh_disp_bots_only_admin'] && $this->auth->acl_get('a_')) || $this->config['lfwwh_disp_bots_only_admin'] == 0;
		$wwh_disp_permission_ip = $this->config['lfwwh_disp_ip'] && $this->auth->acl_get('a_');
		$wwh_disp_permission_hidden = $this->config['lfwwh_disp_hidden'] && $this->auth->acl_get('u_viewonline');
		
		$is_min_phpbb32 = phpbb_version_compare($this->config['version'], '3.2.0', '>=');
		$show_button_users = $show_button_bots = false;

		if (!$this->prune())
		{
			// Error while purging the list, database is missing :-O
			$this->user->add_lang_ext('lukewcs/whowashere', 'info_acp_who_was_here');
			return;
		}

		// Default count total or ids
		$count = array(
			'count_guests'	=> 0,
			'count_bot'		=> 0,
			'count_reg'		=> 0,
			'count_hidden'	=> 0,
			'count_total'	=> 0,
			'ids_reg'		=> array(),
			'ids_hidden'	=> array(),
			'ids_bot'		=> array(),
		);

		$wwh_username_colour = $wwh_username = $wwh_username_full = $users_list = $bots_list = '';

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

		foreach ($view_state as $row)
		{
			if ($row['user_id'] != ANONYMOUS)
			{
				$wwh_username_full = get_username_string((($row['user_type'] == USER_IGNORE) ? 'no_profile' : 'full'), $row['user_id'], $row['username'], $row['user_colour']);
				$time = $this->get_formatted_time_string($row['wwh_lastpage']);
				$ip = (($wwh_disp_permission_ip) ? $this->user->lang['IP'] . ': ' . $row['user_ip'] : '');
				$disp_info = '';
				$hover_info = '';
				$show_time_disp = ($this->config['lfwwh_disp_time'] == 1 && $row['user_type'] != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] > 0 && $this->config['lfwwh_disp_time_bots'] == 1 && $row['user_type'] == USER_IGNORE);
				$show_time_hover = ($this->config['lfwwh_disp_time'] == 2 && $row['user_type'] != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] > 0 && $this->config['lfwwh_disp_time_bots'] == 2 && $row['user_type'] == USER_IGNORE);
				$show_ip_disp = $ip && $this->config['lfwwh_disp_ip'] == 1;
				$show_ip_hover = $ip && $this->config['lfwwh_disp_ip'] == 2;

				if ($show_time_disp || $show_time_hover || $show_ip_disp || $show_ip_hover)
				{
					if ($show_time_disp && !$show_time_hover && !$show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $time . ')';
					}
					else if (!$show_time_disp && !$show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $ip . ')';
					}
					else if ($show_time_disp && !$show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $time . ' | ' . $ip . ')';
					}
					else if (!$show_time_disp && $show_time_hover && !$show_ip_disp && !$show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($row['user_type'], ' (' . $time . ')');
						$hover_info = ' title="' . $time . '"';
					}
					else if (!$show_time_disp && !$show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($row['user_type'], ' (' . $ip . ')');
						$hover_info = ' title="' . $ip . '"';
					}
					else if (!$show_time_disp && $show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = $this->get_hidden_span($row['user_type'], ' (' . $time . ' | ' . $ip . ')');
						$hover_info = ' title="' . $time . ' | ' . $ip . '"';
					}
					else if ($show_time_disp && !$show_time_hover && !$show_ip_disp && $show_ip_hover)
					{
						$disp_info = ' (' . $time . $this->get_hidden_span($row['user_type'], ' | ' . $ip ). ')';
						$hover_info = ' title="' . $ip . '"';
					}
					else if (!$show_time_disp && $show_time_hover && $show_ip_disp && !$show_ip_hover)
					{
						$disp_info = ' (' . $this->get_hidden_span($row['user_type'], $time . ' | ') . $ip . ')';
						$hover_info = ' title="' . $time . '"';
					}
					if (!$show_button_users) 
					{
						if ((($this->config['lfwwh_disp_time'] == 2 && $row['user_type'] != USER_IGNORE) || ($this->config['lfwwh_disp_bots'] == 1 && $this->config['lfwwh_disp_time_bots'] == 2 && $row['user_type'] == USER_IGNORE) || $show_ip_hover) && $hover_info)
						{
							$show_button_users = true;
						}
					}
					if (!$show_button_bots)
					{
						if ($this->config['lfwwh_disp_bots'] == 2 && ($this->config['lfwwh_disp_time_bots'] == 2 || $show_ip_hover) && $row['user_type'] == USER_IGNORE && $hover_info)
						{
							$show_button_bots = true;
						}
					}
				}
			}
			if (!$this->config['lfwwh_create_hidden_info'])
			{
				$show_button_users = $show_button_bots = false;
			}

			if ($row['viewonline'] || ($row['user_type'] == USER_IGNORE))
			{
				if (($row['user_id'] != ANONYMOUS) && ($this->config['lfwwh_disp_bots'] && $wwh_disp_permission_bots || ($row['user_type'] != USER_IGNORE)))
				{
					if ($this->config['lfwwh_disp_bots'] == 2 && $row['user_type'] == USER_IGNORE)
					{
						$bots_list .= $this->user->lang['COMMA_SEPARATOR'] . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_info;
					}
					else
					{
						$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_info;
					}
				}
			}
			else if ($wwh_disp_permission_hidden || $row['user_id'] == $this->user->data['user_id'])
			{
				$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<em' . $hover_info . '>' .$wwh_username_full . '</em>' . $disp_info;
			}

			// At the end let's count them =)
			if ($row['user_id'] == ANONYMOUS)
			{
				$count['count_guests']++;
			}
			else if ($row['user_type'] == USER_IGNORE)
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

		$users_list = utf8_substr($users_list, utf8_strlen($this->user->lang['COMMA_SEPARATOR']));
		if ($users_list == '')
		{
			// User list is empty.
			$users_list = $this->user->lang['NO_ONLINE_USERS'];
		}

		if ($this->config['lfwwh_disp_bots'] == 2)
		{
			$bots_list = utf8_substr($bots_list, utf8_strlen($this->user->lang['COMMA_SEPARATOR']));
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
		
		$wwh_button_users = $wwh_button_bots = '';
		if ($show_button_users)
		{
			$wwh_button_users = ($is_min_phpbb32)
				? '&nbsp;<span class="lfwwh_button_users icon fa-info-circle" style="opacity: 0.5;" title="' . $this->user->lang['LFWWH_SHOW_INFO_TOOLTIP'] . '" onclick="lfwwhIndex.ShowHide(0)"></span>'
				: '&nbsp;<span class="lfwwh_button_users" style="opacity: 0.5;" title="' . $this->user->lang['LFWWH_SHOW_INFO_TOOLTIP'] . '" onclick="lfwwhIndex.ShowHide(0)">&#9432;</span>'
			;
		}
		if ($show_button_bots)
		{
			$wwh_button_bots = ($is_min_phpbb32)
				? '&nbsp;<span class="lfwwh_button_bots icon fa-info-circle" style="opacity: 0.5;" title="' . $this->user->lang['LFWWH_SHOW_INFO_TOOLTIP'] . '" onclick="lfwwhIndex.ShowHide(1)"></span>'
				: '&nbsp;<span class="lfwwh_button_bots" style="opacity: 0.5;" title="' . $this->user->lang['LFWWH_SHOW_INFO_TOOLTIP'] . '" onclick="lfwwhIndex.ShowHide(1)">&#9432;</span>'
			;
		}

		$this->template->assign_vars(array(
			'LFWWH_TOTAL'		=> ($wwh_disp_permission_total) ? $this->get_total_users_string($count) : '',
			'LFWWH_EXP'			=> ($wwh_disp_permission_total) ? $this->get_explanation_string($this->config['lfwwh_time_mode']) : '',
			'LFWWH_RECORD'		=> ($wwh_disp_permission_total) ? $this->get_record_string($this->config['lfwwh_record'], $this->config['lfwwh_time_mode']) : '',
			'LFWWH_LIST'		=> ($wwh_disp_permission_users) ? sprintf($this->user->lang['LFWWH_USERS_PREFIX'], $wwh_button_users) . ' ' . $users_list : '',
			'LFWWH_BOTS'		=> ($wwh_disp_permission_users && $bots_list) ? sprintf($this->user->lang['LFWWH_BOTS_PREFIX'], $wwh_button_bots) . ' ' . $bots_list : '',
			'LFWWH_POS'			=> ($this->config['lfwwh_disp_template_pos_all']) ? 7 : 2 ** $this->config['lfwwh_disp_template_pos'],
			'LFWWH_API_MODE'	=> $this->config['lfwwh_api_mode'],
		));
	}

	/**
	* Deletes the users from the list, whose visit is to old.
	*/
	public function prune()
	{
		$timestamp = time();
		if ($this->config['lfwwh_time_mode'])
		{
			/* OLD function
			$prune_timestamp = gmmktime(0, 0, 0, gmdate('m', $timestamp), gmdate('d', $timestamp), gmdate('Y', $timestamp));
			$prune_timestamp -= ($this->config['board_timezone'] * 3600);
			$prune_timestamp -= ($this->config['board_dst'] * 3600);*/

			// Correct Time Zone. https://www.phpbb.com/community/viewtopic.php?f=456&t=2297986&start=30#p14022491
			$timezone = new \DateTimeZone($this->config['board_timezone']);
			$prune_timestamp = $this->user->get_timestamp_from_format('Y-m-d H:i:s', date('Y', $timestamp) . '-' . date('m', $timestamp) . '-' . date('d', $timestamp) . ' 00:00:00', $timezone);
			$prune_timestamp = ($prune_timestamp < $timestamp - 86400) ? $prune_timestamp + 86400 : (($prune_timestamp > $timestamp) ? $prune_timestamp - 86400 : $prune_timestamp);
		}
		else
		{
			$prune_timestamp = $timestamp - ((3600 * $this->config['lfwwh_period_of_time_h']) + (60 * $this->config['lfwwh_period_of_time_m']) + $this->config['lfwwh_period_of_time_s']);
		}

		if ((!isset($this->config['lfwwh_last_clean']) || ($this->config['lfwwh_last_clean'] != $prune_timestamp)) || !$this->config['lfwwh_time_mode'])
		{
			$this->db->sql_return_on_error(true);
			$sql = 'DELETE FROM ' . $this->LFWWH_TABLE . '
					WHERE wwh_lastpage <= ' . (int)$prune_timestamp;
			$result = $this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			if ((bool) $result === false)
			{
				// database does not exist yet...
				return false;
			}

			if ($this->config['lfwwh_time_mode'])
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
					FROM  ' . $this->LFWWH_TABLE . '
					WHERE user_id = ' . (int) $user_id;
			$result = $this->db->sql_query($sql);
			$found = (int) $this->db->sql_fetchfield('found');
			if ($found)
			{
				$sql = 'DELETE FROM ' . $this->LFWWH_TABLE . '
						WHERE user_id = ' . (int) $user_id;
				$result = $this->db->sql_query($sql);
				$user_deleted = true;
			}			
		}
		
		// Delete LF-WWH's cache and insert the notification.
		if ($user_deleted) 
		{
			if ($this->config['lfwwh_use_cache'])
			{
				$this->cache->destroy("_lf_who_was_here");	
			}
			// $this->user->add_lang_ext('lukewcs/whowashere', 'info_acp_who_was_here');
			// $lang = $this->user->lang;
		 	// if (isset($lang['USER_DELETED']))
		 	// {
		 		// $lang['USER_DELETED'] .= '<br><br>' . $this->user->lang['LFWWH_MSG_CLEANED_UP'];
		 	// }
			// if (isset($lang['USER_DELETE_SUCCESS']))
			// {
				// $lang['USER_DELETE_SUCCESS'] .= '<br><br>' . $this->user->lang['LFWWH_MSG_CLEANED_UP'];
			// }
			// $this->user->lang = $lang;
			$this->user->add_lang_ext('lukewcs/whowashere', 'overwrite_phpbb_msg');
		}
	}

	/**
	* Adds permissions if the full rights system is active. (LukeWCS)
	*/
	public function add_permissions($event)
	{
		// if (!$this->config['lfwwh_use_permissions'])
		// {
			// return;
		// }
		$permissions = $event['permissions'];
		$permissions['u_lfwwh_show_users'] = array('lang' => 'ACL_U_LFWWH_SHOW_USERS', 'cat' => 'profile');
		$permissions['u_lfwwh_show_stats'] = array('lang' => 'ACL_U_LFWWH_SHOW_STATS', 'cat' => 'profile');
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
		$user_id_ary = array();

		$sql = 'SELECT user_id, username, username_clean, user_colour, user_type, viewonline, wwh_lastpage, user_ip
				FROM  ' . $this->LFWWH_TABLE . "
				ORDER BY $sql_order_by $sql_ordering";
		$result = $this->db->sql_query($sql);

		$statrow = array();
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
	private function get_hidden_span($user_type, $text)
	{
		if (!$this->config['lfwwh_create_hidden_info'])
		{
			return '';
		}
		return '<span class="lfwwh_info_' . (($user_type != USER_IGNORE || $this->config['lfwwh_disp_bots'] == 1) ? 'u': 'b') . '" style="display: none;">' . $text . '</span>';
	}

	/**
	* Returns a formated date string with replaced placeholders for LFWWH_LAST1 - LFWWH_LAST3. (LukeWCS)
	*/
	private function get_formatted_time_string($timestamp)
	{
		$text = $this->user->format_date($timestamp, $this->config['lfwwh_disp_time_format']);
		$text = str_replace(array('$1', '$2', '$3'), array($this->user->lang['LFWWH_LAST1'], $this->user->lang['LFWWH_LAST2'], $this->user->lang['LFWWH_LAST3']), $text);
		return $text;
	}
	
	/**
	* Returns the Explanation string for the online list:
	* Demo:	based on users active today
	*		based on users active over the past 30 minutes
	*/
	private function get_explanation_string($mode)
	{
		if ($mode)
		{
			return $this->user->lang['LFWWH_EXP'];
		}
		else
		{
			$explanation = $this->user->lang['LFWWH_EXP_TIME'];
			$explanation .= $this->user->lang('LFWWH_HOURS', (int) $this->config['lfwwh_period_of_time_h']);
			$explanation .= $this->user->lang('LFWWH_MINUTES', (int) $this->config['lfwwh_period_of_time_m']);
			$explanation .= $this->user->lang('LFWWH_SECONDS', (int) $this->config['lfwwh_period_of_time_s']);

			switch (substr_count($explanation, '%s'))
			{
				case 3:
					return sprintf($explanation, '', $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['LFWWH_WORD']);
				case 2:
					return sprintf($explanation, '', $this->user->lang['LFWWH_WORD']);
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
	private function get_record_string($active, $mode)
	{
		if (!$active)
		{
			return '';
		}
		if ($mode)
		{
			return sprintf($this->user->lang['LFWWH_RECORD_DAY'], $this->config['lfwwh_record_ips'], $this->user->format_date($this->config['lfwwh_record_time'], $this->config['lfwwh_record_time_format']));
		}
		else
		{
			$record_time2 = $this->config['lfwwh_record_time'] - (3600 * $this->config['lfwwh_period_of_time_h']) - (60 * $this->config['lfwwh_period_of_time_m']) - $this->config['lfwwh_period_of_time_s'];
			return sprintf($this->user->lang['LFWWH_RECORD_TIME'], $this->config['lfwwh_record_ips'], $this->user->format_date($record_time2, $this->config['lfwwh_record_time_format']), $this->user->format_date($this->config['lfwwh_record_time'], $this->config['lfwwh_record_time_format']));
		}
	}

	/**
	* Returns the Total string for the online list:
	* Demo:	In total there was 1 user online :: 1 registered, 0 hidden, 0 bots and 0 guests
	*/
	private function get_total_users_string($count)
	{
		$total_users_string = $this->user->lang('LFWWH_TOTAL', $count['count_total']);
		if ($this->config['lfwwh_disp_reg_users'])
		{
			$total_users_string .= '%s ' . $this->user->lang('LFWWH_REG_USERS', $count['count_reg']);
		}
		if ($this->config['lfwwh_disp_hidden'])
		{
			$total_users_string .= '%s ' . $this->user->lang('LFWWH_HIDDEN', $count['count_hidden']);
		}
		if ($this->config['lfwwh_disp_bots'])
		{
			$total_users_string .= '%s ' . $this->user->lang('LFWWH_BOTS', $count['count_bot']);
		}
		if ($this->config['lfwwh_disp_guests'])
		{
			$total_users_string .= '%s ' . $this->user->lang('LFWWH_GUESTS', $count['count_guests']);
		}

		switch (substr_count($total_users_string, '%s'))
		{
			case 4:
				return sprintf($total_users_string, $this->user->lang['LFWWH_TOTAL_SEPARATOR'], $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['LFWWH_WORD']);
			case 3:
				return sprintf($total_users_string, $this->user->lang['LFWWH_TOTAL_SEPARATOR'], $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['LFWWH_WORD']);
			case 2:
				return sprintf($total_users_string, $this->user->lang['LFWWH_TOTAL_SEPARATOR'], $this->user->lang['LFWWH_WORD']);
			case 1:
				return sprintf($total_users_string, $this->user->lang['LFWWH_TOTAL_SEPARATOR']);
			default:
				return $total_users_string;
		}
	}
}
