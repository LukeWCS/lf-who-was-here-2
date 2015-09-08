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

namespace bb3mobi\washere\core;

class who_was_here
{
	const SORT_ASC = 0;

	const SORT_USERNAME_ASC = 0;
	const SORT_USERNAME_DESC = 1;
	const SORT_LASTPAGE_ASC = 2;
	const SORT_LASTPAGE_DESC = 3;
	const SORT_USERID_ASC = 4;
	const SORT_USERID_DESC = 5;

	static private $prune_timestamp = 0;

	static private $count_total = 0;
	static private $count_reg = 0;
	static private $count_hidden = 0;
	static private $count_bot = 0;
	static private $count_guests = 0;

	static private $ids_reg = array();
	static private $ids_hidden = array();
	static private $ids_bot = array();

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth */
	protected $auth;

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

	public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, \phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\db\driver\driver_interface $db, $table_prefix)
	{
		if (!defined('WWH_TABLE'))
		{
			define('WWH_TABLE', $table_prefix . 'wwh');
		}
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->auth = $auth;
		$this->db = $db;
	}

	/**
	* Update the users session in the table.
	*/
	public function update_session()
	{
		if ($this->user->data['user_id'] != ANONYMOUS)
		{
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

		if (!self::prune())
		{
			// Error while purging the list, database is missing :-O
			$this->user->add_lang_ext('bb3mobi/washere', 'info_acp_wwh');
			return;
		}

		self::$count_guests = self::$count_bot = self::$count_reg = self::$count_hidden = self::$count_total = 0;
		$wwh_username_colour = $wwh_username = $wwh_username_full = $users_list = '';

		switch ($this->config['wwh_sort_by'])
		{
			case self::SORT_USERNAME_ASC:
			case self::SORT_USERNAME_DESC:
				$sql_order_by = 'username_clean';
			break;
			case self::SORT_USERID_ASC:
			case self::SORT_USERID_DESC:
				$sql_order_by = 'user_id';
			break;
			case self::SORT_LASTPAGE_ASC:
			case self::SORT_LASTPAGE_DESC:
			default:
				$sql_order_by = 'wwh_lastpage';
			break;
		}
		$sql_ordering = (($this->config['wwh_sort_by'] % 2) == self::SORT_ASC) ? 'ASC' : 'DESC';

		// Let's try another method, to deny duplicate appearance of usernames.
		$user_id_ary = array();

		$sql = 'SELECT user_id, username, username_clean, user_colour, user_type, viewonline, wwh_lastpage, user_ip
			FROM  ' . WWH_TABLE . "
			ORDER BY $sql_order_by $sql_ordering";
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			if (!in_array($row['user_id'], $user_id_ary))
			{
				$wwh_username_full = get_username_string((($row['user_type'] == USER_IGNORE) ? 'no_profile' : 'full'), $row['user_id'], $row['username'], $row['user_colour']);
				$hover_time = (($this->config['wwh_disp_time'] == '2') ? $this->user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $this->user->format_date($row['wwh_lastpage'], $this->config['wwh_disp_time_format']) . $this->user->lang['WHO_WAS_HERE_LATEST2'] : '' );
				$hover_ip = ($this->auth->acl_get('a_') && $this->config['wwh_disp_ip']) ? $this->user->lang['IP'] . ':&nbsp;' . $row['user_ip'] : '';
				$hover_info = (($hover_time || $hover_ip) ? ' title="' . $hover_time . (($hover_time && $hover_ip) ? ' | ' : '') . $hover_ip . '"' : '');
				$disp_time = (($this->config['wwh_disp_time'] == '1') ? '&nbsp;(' . $this->user->lang['WHO_WAS_HERE_LATEST1'] . '&nbsp;' . $this->user->format_date($row['wwh_lastpage'], $this->config['wwh_disp_time_format']) . $this->user->lang['WHO_WAS_HERE_LATEST2'] . (($hover_ip) ? ' | ' . $hover_ip : '' ) . ')' : '' );

				if ($row['viewonline'] || ($row['user_type'] == USER_IGNORE))
				{
					if (($row['user_id'] != ANONYMOUS) && ($this->config['wwh_disp_bots'] || ($row['user_type'] != USER_IGNORE)))
					{
						$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<span' . $hover_info . '>' . $wwh_username_full . '</span>' . $disp_time;
						$user_id_ary[] = $row['user_id'];
					}
				}
				else if (($this->config['wwh_disp_hidden']) && ($this->auth->acl_get('u_viewonline')))
				{
					$users_list .= $this->user->lang['COMMA_SEPARATOR'] . '<em' . $hover_info . '>' .$wwh_username_full . '</em>' . $disp_time;
					$user_id_ary[] = $row['user_id'];
				}

				// At the end let's count them =)
				if ($row['user_id'] == ANONYMOUS)
				{
					self::$count_guests++;
				}
				else if ($row['user_type'] == USER_IGNORE)
				{
					self::$count_bot++;
					self::$ids_bot[] = (int) $row['user_id'];
				}
				else if ($row['viewonline'] == 1)
				{
					self::$count_reg++;
					self::$ids_reg[] = (int) $row['user_id'];
				}
				else
				{
					self::$count_hidden++;
					self::$ids_hidden[] = (int) $row['user_id'];
				}
				self::$count_total++;
			}
		}

		$users_list = utf8_substr($users_list, utf8_strlen($this->user->lang['COMMA_SEPARATOR']));
		if ($users_list == '')
		{
			// User list is empty.
			$users_list = $this->user->lang['NO_ONLINE_USERS'];
		}

		if (!$this->config['wwh_disp_bots'])
		{
			self::$count_total -= self::$count_bot;
		}
		if (!$this->config['wwh_disp_guests'])
		{
			self::$count_total -= self::$count_guests;
		}
		if (!$this->config['wwh_disp_hidden'])
		{
			self::$count_total -= self::$count_hidden;
		}

		// Need to update the record?
		if ($this->config['wwh_record_ips'] < self::$count_total)
		{
			$this->config->set('wwh_record_ips', self::$count_total, true);
			$this->config->set('wwh_record_time', time(), true);
		}

		// Disabled, see comment on the method itself.
		//self::log();

		$this->template->assign_vars(array(
			'WHO_WAS_HERE_LIST'		=> $this->user->lang['USERS'] . $this->user->lang['COLON'] . ' ' . $users_list,
			'WHO_WAS_HERE_TOTAL'	=> self::get_total_users_string($this->config['wwh_disp_hidden'], $this->config['wwh_disp_bots'], $this->config['wwh_disp_guests']),
			'WHO_WAS_HERE_EXP'		=> self::get_explanation_string($this->config['wwh_version']),
			'WHO_WAS_HERE_RECORD'	=> self::get_record_string($this->config['wwh_record'], $this->config['wwh_version']),
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
			self::$prune_timestamp = gmmktime(0, 0, 0, gmdate('m', $timestamp), gmdate('d', $timestamp), gmdate('Y', $timestamp));
			self::$prune_timestamp -= ($this->config['board_timezone'] * 3600);
			self::$prune_timestamp -= ($this->config['board_dst'] * 3600);*/

			// Correct Time Zone. https://www.phpbb.com/community/viewtopic.php?f=456&t=2297986&start=30#p14022491
			$timezone = new \DateTimeZone($this->config['board_timezone']);
			self::$prune_timestamp = $this->user->get_timestamp_from_format('Y-m-d H:i:s', date('Y', $timestamp) . '-' . date('m', $timestamp) . '-' . date('d', $timestamp) . ' 00:00:00', $timezone);
			self::$prune_timestamp = (self::$prune_timestamp < $timestamp - 86400) ? self::$prune_timestamp + 86400 : ((self::$prune_timestamp > $timestamp) ? self::$prune_timestamp - 86400 : self::$prune_timestamp);
		}
		else
		{
			self::$prune_timestamp = $timestamp - ((3600 * $this->config['wwh_del_time_h']) + (60 * $this->config['wwh_del_time_m']) + $this->config['wwh_del_time_s']);
		}

		if ((!isset($this->config['wwh_last_clean']) || ($this->config['wwh_last_clean'] != self::$prune_timestamp)) || !$this->config['wwh_version'])
		{
			$this->db->sql_return_on_error(true);
			$sql = 'DELETE FROM ' . WWH_TABLE . '
				WHERE wwh_lastpage <= ' . self::$prune_timestamp;
			$result = $this->db->sql_query($sql);
			$this->db->sql_return_on_error(false);

			if ((bool) $result === false)
			{
				// database does not exist yet...
				return false;
			}

			if ($this->config['wwh_version'])
			{
				$this->config->set('wwh_last_clean', self::$prune_timestamp);
			}
		}

		// Purging was not needed or done succesfully...
		return true;
	}

	/**
	* Logs the daily stats.
	* NOTE: Currently not active, as there might be law conflicts in some states.
	*/
	public function log()
	{
		if (!$this->config['wwh_version'])
		{
			// Logging not allowed for this mode.
			return;
		}

		$log_data = array(
			'guest_users'		=> self::$count_guests,
			'hidden_users'		=> self::$count_hidden,
			'registered_users'	=> self::$count_reg,
			'bots'				=> self::$count_bot,
			'hidden_users_list'		=> implode(', ', self::$ids_hidden),
			'registered_users_list'	=> implode(', ', self::$ids_reg),
			'bots_list'				=> implode(', ', self::$ids_bot),
			'start_time'		=> self::$prune_timestamp,
			'end_time'			=> self::$prune_timestamp + 86400,
		);

		$www_log_hash = self::$count_guests . '-' . self::$count_hidden . '-' . self::$count_reg . '-' . self::$count_bot;

		if ((time() > $this->config['wwh_log_endtime']) || ($this->config['wwh_log_hash'] != $www_log_hash))
		{
			if ($this->config['wwh_log_endtime'] > time())
			{
				$sql = 'UPDATE ' . self::table('wwh_logs') . ' 
					SET ' . $this->db->sql_build_array('UPDATE', $log_data) . '
					WHERE log_id = ' . (int) $this->config['wwh_current_log_id'];
				$this->db->sql_query($sql);
			}
			else
			{
				$this->db->sql_query('INSERT INTO ' . self::table('wwh_logs') . ' ' . $this->db->sql_build_array('INSERT', $log_data));
				$this->config->set('wwh_current_log_id', (int) $this->db->sql_nextid());
				$this->config->set('wwh_log_endtime', $log_data['end_time']);
			}
			$this->config->set('wwh_log_hash', $www_log_hash);
		}
	}

	/**
	* Returns the Explanation string for the online list:
	* Demo:	based on users active today
	*		based on users active over the past 30 minutes
	*/
	public function get_explanation_string($mode)
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
	public function get_record_string($active, $mode)
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
	public function get_total_users_string($display_hidden, $display_bots, $display_guests)
	{
		$total_users_string = $this->user->lang('WHO_WAS_HERE_TOTAL', self::$count_total);
		$total_users_string .= $this->user->lang('WHO_WAS_HERE_REG_USERS', self::$count_reg);
		if ($display_hidden)
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_HIDDEN', self::$count_hidden);
		}
		if ($display_bots)
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_BOTS', self::$count_bot);
		}
		if ($display_guests)
		{
			$total_users_string .= '%s ' . $this->user->lang('WHO_WAS_HERE_GUESTS', self::$count_guests);
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
