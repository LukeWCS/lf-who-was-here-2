<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
/**
* @package phpBB3.1
* @copyright Anvar (c) 2015 bb3.mobi
*/
/**
* @package phpBB3.2
* @copyright LukeWCS (c) 2018 wcsaga.org
*/

namespace bb3mobi\washere\core;

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
	* @param \phpbb\template\template            $template          Template object
	* @param \phpbb\config\config                $config            Config object
	* @param \phpbb\user                         $user              User object
	* @param \phpbb\db\driver\driver_interface   $db                Database object
	* @return \bb3mobi\washere\core\who_was_here
	* @access public
	*/

	public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\cache\driver\driver_interface $cache, \phpbb\db\driver\driver_interface $db, $table_prefix)
	{
		if (!defined('WWH_TABLE'))
		{
			define('WWH_TABLE', $table_prefix . 'wwh');
		}
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->auth = $auth;
		$this->cache = $cache;
		$this->db = $db;
	}

	/**
	* Update the users session in the table.
	*/
	public function update_session()
	{
		if ($this->user->data['user_id'] != ANONYMOUS)
		{
			if (!$this->config['wwh_disp_bots'] && $this->user->data['user_type'] == USER_IGNORE)
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
			$sql = 'UPDATE ' . WWH_TABLE . '
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
					$sql = 'DELETE FROM ' . WWH_TABLE . '
						WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
								AND user_id = " . ANONYMOUS . ')';
					$this->db->sql_query($sql);
					$this->db->sql_query('INSERT INTO ' . WWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
				}

				if ($sql_affectedrows == 0)
				{
					// No entry updated. Either the user is not listed yet, or has opened two links in the same time
					$sql = 'SELECT 1 as found
						FROM ' . WWH_TABLE . '
						WHERE user_id = ' . (int) $this->user->data['user_id'] . "
							OR (user_ip = '" . $this->db->sql_escape($this->user->ip) . "'
								AND user_id = " . ANONYMOUS . ')';
					$result = $this->db->sql_query($sql);
					$found = (int) $this->db->sql_fetchfield('found');
					$this->db->sql_freeresult($result);
					if (!$found)
					{
						// He wasn't listed.
						$this->db->sql_query('INSERT INTO ' . WWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
					}
				}
			}
		}
		else
		{
			if (!$this->config['wwh_disp_guests'])
			{
				return;
			}
			$this->db->sql_return_on_error(true);
			$sql = 'SELECT user_id
				FROM ' . WWH_TABLE . "
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
				$this->db->sql_query('INSERT INTO ' . WWH_TABLE . ' ' . $this->db->sql_build_array('INSERT', $wwh_data));
			}
		}
		$this->db->sql_return_on_error(false);
	}

	/**
	* Fetching the user-list and putting the stuff into the template.
	*/
	public function display()
	{
		$this->user->add_lang_ext('bb3mobi/washere', 'lang_wwh');
		$wwh_disp_users = (($this->config['wwh_disp_for_guests'] == 0) && ($this->user->data['user_id'] != ANONYMOUS) && empty($this->user->data['is_bot'])) || ($this->config['wwh_disp_for_guests'] == 1);
		$wwh_disp_bots = ($this->config['wwh_disp_bots_only_admin'] == 1) && $this->auth->acl_get('a_') || ($this->config['wwh_disp_bots_only_admin'] == 0);

		if (!$this->prune())
		{
			// Error while purging the list, database is missing :-O
			$this->user->add_lang_ext('bb3mobi/washere', 'info_acp_wwh');
			return;
		}

		/* Default count total or ids */
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

		/* Load cache who_was_here */
		if (($view_state = $this->cache->get("_who_was_here")) === false)
		{
			$view_state = $this->view_state();
			$this->cache->put("_who_was_here", $view_state, 60*$this->config['load_online_time']);
		}

		foreach ($view_state as $row)
		{
			$wwh_username_full = get_username_string((($row['user_type'] == USER_IGNORE) ? 'no_profile' : 'full'), $row['user_id'], $row['username'], $row['user_colour']);
			$hover_time = (($this->config['wwh_disp_time'] == '2') ? $this->user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $this->user->format_date($row['wwh_lastpage'], $this->config['wwh_disp_time_format']) . $this->user->lang['WHO_WAS_HERE_LATEST2'] : '' );
			$hover_ip = ($this->auth->acl_get('a_') && $this->config['wwh_disp_ip']) ? $this->user->lang['IP'] . ':&nbsp;' . $row['user_ip'] : '';
			$hover_info = (($hover_time || $hover_ip) ? ' title="' . $hover_time . (($hover_time && $hover_ip) ? ' | ' : '') . $hover_ip . '"' : '');
			$disp_time = (($this->config['wwh_disp_time'] == '1') ? '&nbsp;(' . $this->user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $this->user->format_date($row['wwh_lastpage'], $this->config['wwh_disp_time_format']) . $this->user->lang['WHO_WAS_HERE_LATEST2'] . (($hover_ip) ? ' | ' . $hover_ip : '' ) . ')' : '' );

			if ($row['viewonline'] || ($row['user_type'] == USER_IGNORE))
			{
				if (($row['user_id'] != ANONYMOUS) && ($this->config['wwh_disp_bots'] && $wwh_disp_bots || ($row['user_type'] != USER_IGNORE)))
				{
					if ($this->config['wwh_disp_bots'] == 2 && $row['user_type'] == USER_IGNORE)
					{
						$bots_list .= $this->user->lang['COMMA_SEPARATOR'] . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_time;
					}
					else
					{
						$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_time;
					}
				}
			}
			else if (($this->config['wwh_disp_hidden']) && ($this->auth->acl_get('u_viewonline')))
			{
				$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<em' . $hover_info . '>' .$wwh_username_full . '</em>' . $disp_time;
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

		if ($this->config['wwh_disp_bots'] == 2)
		{
			$bots_list = utf8_substr($bots_list, utf8_strlen($this->user->lang['COMMA_SEPARATOR']));
		}

		if (!$this->config['wwh_disp_bots'])
		{
			$count['count_total'] -= $count['count_bot'];
		}
		if (!$this->config['wwh_disp_guests'])
		{
			$count['count_total'] -= $count['count_guests'];
		}
		if (!$this->config['wwh_disp_hidden'])
		{
			$count['count_total'] -= $count['count_hidden'];
		}

		// Need to update the record?
		if ($this->config['wwh_record_ips'] < $count['count_total'])
		{
			$this->config->set('wwh_record_ips', $count['count_total'], true);
			$this->config->set('wwh_record_time', time(), true);
		}

		$this->template->assign_vars(array(
			'WHO_WAS_HERE_LIST'			=> ($wwh_disp_users ? $this->user->lang['WHO_WAS_HERE_USERS_TEXT'] . $this->user->lang['COLON'] . ' ' . $users_list : ''),
			'WHO_WAS_HERE_BOTS'			=> ($wwh_disp_users && $bots_list ? $this->user->lang['WHO_WAS_HERE_BOTS_TEXT'] . $this->user->lang['COLON'] . ' ' . $bots_list : ''),
			'WHO_WAS_HERE_TOTAL'		=> $this->get_total_users_string($count),
			'WHO_WAS_HERE_EXP'			=> $this->get_explanation_string($this->config['wwh_version']),
			'WHO_WAS_HERE_RECORD'		=> $this->get_record_string($this->config['wwh_record'], $this->config['wwh_version']),
			'WHO_WAS_HERE_POS'			=> (($this->config['wwh_disp_template_pos'] == 1) ? 1 : 0),
		));
	}

	/**
	* Deletes the users from the list, whose visit is to old.
	*/
	public function prune()
	{
		$timestamp = time();
		if ($this->config['wwh_version'])
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
			$prune_timestamp = $timestamp - ((3600 * $this->config['wwh_del_time_h']) + (60 * $this->config['wwh_del_time_m']) + $this->config['wwh_del_time_s']);
		}

		if ((!isset($this->config['wwh_last_clean']) || ($this->config['wwh_last_clean'] != $prune_timestamp)) || !$this->config['wwh_version'])
		{
			$this->db->sql_return_on_error(true);
			$sql = 'DELETE FROM ' . WWH_TABLE . '
				WHERE wwh_lastpage <= ' . $prune_timestamp;
			$result = $this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			if ((bool) $result === false)
			{
				// database does not exist yet...
				return false;
			}

			if ($this->config['wwh_version'])
			{
				$this->config->set('wwh_last_clean', $prune_timestamp);
			}
		}

		// Purging was not needed or done succesfully...
		return true;
	}

	/**
	* Returns the users array
	*/
	private function view_state()
	{
		switch ($this->config['wwh_sort_by'])
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
		$sql_ordering = (($this->config['wwh_sort_by'] % 2) == 0) ? 'ASC' : 'DESC';

		// Let's try another method, to deny duplicate appearance of usernames.
		$user_id_ary = array();

		$sql = 'SELECT user_id, username, username_clean, user_colour, user_type, viewonline, wwh_lastpage, user_ip
			FROM  ' . WWH_TABLE . "
			ORDER BY $sql_order_by $sql_ordering";
		$result = $this->db->sql_query($sql);

		$statrow = array();
		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!in_array($row['user_id'], $user_id_ary))
			{
				if ($row['viewonline'] || $row['user_type'] == USER_IGNORE)
				{
					if ($row['user_id'] != ANONYMOUS && ($this->config['wwh_disp_bots'] || $row['user_type'] != USER_IGNORE))
					{
						$user_id_ary[] = $row['user_id'];
					}
				}
				else if ($this->config['wwh_disp_hidden'] && $this->auth->acl_get('u_viewonline'))
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
	* Returns the Explanation string for the online list:
	* Demo:	based on users active today
	*		based on users active over the past 30 minutes
	*/
	private function get_explanation_string($mode)
	{
		if ($mode)
		{
			return $this->user->lang['WHO_WAS_HERE_EXP'];
		}
		else
		{
			$explanation = $this->user->lang['WHO_WAS_HERE_EXP_TIME'];
			$explanation .= $this->user->lang('WWH_HOURS', (int) $this->config['wwh_del_time_h']);
			$explanation .= $this->user->lang('WWH_MINUTES', (int) $this->config['wwh_del_time_m']);
			$explanation .= $this->user->lang('WWH_SECONDS', (int) $this->config['wwh_del_time_s']);

			switch (substr_count($explanation, '%s'))
			{
				case 3:
					return sprintf($explanation, '', $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['WHO_WAS_HERE_WORD']);
				case 2:
					return sprintf($explanation, '', $this->user->lang['WHO_WAS_HERE_WORD']);
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
			return sprintf($this->user->lang['WHO_WAS_HERE_RECORD'], $this->config['wwh_record_ips'], $this->user->format_date($this->config['wwh_record_time'], $this->config['wwh_record_timestamp'])) . '<br />';
		}
		else
		{
			$this->config['wwh_record_time2'] = $this->config['wwh_record_time'] - (3600 * $this->config['wwh_del_time_h']) - (60 * $this->config['wwh_del_time_m']) - $this->config['wwh_del_time_s'];
			return sprintf($this->user->lang['WHO_WAS_HERE_RECORD_TIME'], $this->config['wwh_record_ips'], $this->user->format_date($this->config['wwh_record_time2'], $this->config['wwh_record_timestamp']), $this->user->format_date($this->config['wwh_record_time'], $this->config['wwh_record_timestamp'])) . '<br />';
		}
	}

	/**
	* Returns the Total string for the online list:
	* Demo:	In total there was 1 user online :: 1 registered, 0 hidden, 0 bots and 0 guests
	*/
	private function get_total_users_string($count)
	{
		$total_users_string = $this->user->lang('WHO_WAS_HERE_TOTAL', $count['count_total']);
		$total_users_string .= $this->user->lang('WHO_WAS_HERE_REG_USERS', $count['count_reg']);

		if ($this->config['wwh_disp_hidden'])
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_HIDDEN', $count['count_hidden']);
		}
		if ($this->config['wwh_disp_bots'])
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_BOTS', $count['count_bot']);
		}
		if ($this->config['wwh_disp_guests'])
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_GUESTS', $count['count_guests']);
		}

		switch (substr_count($total_users_string, '%s'))
		{
			case 3:
				return sprintf($total_users_string, $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['WHO_WAS_HERE_WORD']);
			case 2:
				return sprintf($total_users_string, $this->user->lang['COMMA_SEPARATOR'], $this->user->lang['WHO_WAS_HERE_WORD']);
			case 1:
				return sprintf($total_users_string, $this->user->lang['WHO_WAS_HERE_WORD']);
			default:
				return $total_users_string;
		}
	}
}
