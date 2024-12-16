<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2010, nickvergessen
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\whowashere\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\s_2_0_0_initial_schema'];
	}

	public function update_data()
	{
		$load_online_time = (($this->config['load_online_time'] >= 1) ? $this->config['load_online_time'] : '1');
		$data = [];
		// config
		$data[] = ['config.add', ['lfwwh_admin_mode'			, '0']];
		$data[] = ['config.add', ['lfwwh_api_mode'				, $this->config['wwh_api_mode']					?? '0']];
		$data[] = ['config.add', ['lfwwh_cache_time'			, $this->config['wwh_cache_time']				?? $load_online_time]];
		$data[] = ['config.add', ['lfwwh_clear_up'				, $this->config['wwh_clear_up']					?? '1']];
		$data[] = ['config.add', ['lfwwh_create_hidden_info'	, '1']];
		$data[] = ['config.add', ['lfwwh_period_of_time_h'		, $this->config['wwh_del_time_h']				?? '24']];
		$data[] = ['config.add', ['lfwwh_period_of_time_m'		, $this->config['wwh_del_time_m']				?? '0']];
		$data[] = ['config.add', ['lfwwh_period_of_time_s'		, $this->config['wwh_del_time_s']				?? '0']];
		$data[] = ['config.add', ['lfwwh_disp_bots'				, $this->config['wwh_disp_bots']				?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_bots_only_admin'	, $this->config['wwh_disp_bots_only_admin']		?? '0']];
		$data[] = ['config.add', ['lfwwh_disp_for_guests'		, $this->config['wwh_disp_for_guests']			?? '0']];
		$data[] = ['config.add', ['lfwwh_disp_guests'			, $this->config['wwh_disp_guests']				?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_hidden'			, $this->config['wwh_disp_hidden']				?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_ip'				, $this->config['wwh_disp_ip']					?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_reg_users'		, '1']];
		$data[] = ['config.add', ['lfwwh_disp_template_pos'		, $this->config['wwh_disp_template_pos']		?? '0']];
		$data[] = ['config.add', ['lfwwh_disp_template_pos_all'	, $this->config['wwh_disp_template_pos_all']	?? '0']];
		$data[] = ['config.add', ['lfwwh_disp_time'				, $this->config['wwh_disp_time']				?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_time_bots'		, $this->config['wwh_disp_time_bots']			?? '1']];
		$data[] = ['config.add', ['lfwwh_disp_time_format'		, $this->config['wwh_disp_time_format']			?? '$1 G:i']];
		$data[] = ['config.add', ['lfwwh_last_clean'			, $this->config['wwh_last_clean']				?? '0']];
		$data[] = ['config.add', ['lfwwh_time_mode'				, $this->config['wwh_version']					?? '1']];
		$data[] = ['config.add', ['lfwwh_record'				, $this->config['wwh_record']					?? '1']];
		$data[] = ['config.add', ['lfwwh_record_ips'			, $this->config['wwh_record_ips']				?? '1', true]];
		$data[] = ['config.add', ['lfwwh_record_time'			, $this->config['wwh_record_time']				?? time(), true]];
		$data[] = ['config.add', ['lfwwh_record_time_format'	, $this->config['wwh_record_timestamp']			?? 'D j. M Y']];
		$data[] = ['config.add', ['lfwwh_record_reset_time'		, $this->config['wwh_reset_time']				?? '1']];
		$data[] = ['config.add', ['lfwwh_sort_by'				, $this->config['wwh_sort_by']					?? '3']];
		$data[] = ['config.add', ['lfwwh_use_cache'				, '1']];
		$data[] = ['config.add', ['lfwwh_use_online_time'		, $this->config['wwh_use_online_time']			?? '1']];
		$data[] = ['config.add', ['lfwwh_use_permissions'		, $this->config['wwh_use_permissions']			?? '0']];
		$data[] = ['config.add', ['lfwwh_version'				, '2.0.0']];

		$data[] = ['permission.add'				, ['u_lfwwh_show_stats']];
		$data[] = ['permission.add'				, ['u_lfwwh_show_users']];
		$data[] = ['permission.permission_set'	, ['ADMINISTRATORS'		, 'u_lfwwh_show_stats', 'group']];
		$data[] = ['permission.permission_set'	, ['ADMINISTRATORS'		, 'u_lfwwh_show_users', 'group']];
		$data[] = ['permission.permission_set'	, ['GLOBAL_MODERATORS'	, 'u_lfwwh_show_stats', 'group']];
		$data[] = ['permission.permission_set'	, ['GLOBAL_MODERATORS'	, 'u_lfwwh_show_users', 'group']];
		$data[] = ['permission.permission_set'	, ['REGISTERED'			, 'u_lfwwh_show_stats', 'group']];
		$data[] = ['permission.permission_set'	, ['REGISTERED'			, 'u_lfwwh_show_users', 'group']];
		$data[] = ['permission.permission_set'	, ['NEWLY_REGISTERED'	, 'u_lfwwh_show_users', 'group', false]];
		$data[] = ['permission.permission_set'	, ['GUESTS'				, 'u_lfwwh_show_stats', 'group']];

		if ($this->role_exists('ROLE_USER_STANDARD'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_lfwwh_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_lfwwh_show_users', 'role']];
		}
		if ($this->role_exists('ROLE_USER_LIMITED'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_lfwwh_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_lfwwh_show_users', 'role']];
		}
		if ($this->role_exists('ROLE_USER_FULL'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_lfwwh_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_lfwwh_show_users', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOPM'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_lfwwh_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_lfwwh_show_users', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOAVATAR'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_lfwwh_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_lfwwh_show_users', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NEW_MEMBER'	, 'u_lfwwh_show_users', 'role', false]];
		}

		$data[] = ['custom', [[$this, 'import_wwh_table']]];

		$data[] = ['module.add', [
			'acp',
			'ACP_CAT_DOT_MODS',
			'LFWWH_NAV_TITLE'
		]];
		$data[] = ['module.add', [
			'acp',
			'LFWWH_NAV_TITLE', [
				'module_basename'	=> '\lukewcs\whowashere\acp\acp_who_was_here_module',
				'module_langname'	=> 'LFWWH_NAV_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_lukewcs/whowashere && acl_a_board',
			]
		]];

		return $data;
	}

	public function revert_data()
	{
		return([
			['permission.remove', ['u_lfwwh_show_users']],
			['permission.remove', ['u_lfwwh_show_stats']],
		]);
	}

	public function import_wwh_table()
	{
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'wwh') && $this->db_tools->sql_table_exists($this->table_prefix . 'lfwwh'))
		{
			$limit = 100;
			$offset = 0;
			$sql = 'INSERT INTO ' . $this->table_prefix . 'lfwwh' . ' (user_id, username, username_clean, user_colour, user_ip, user_type, viewonline, wwh_lastpage)
					SELECT user_id, username, username_clean, user_colour, user_ip, user_type, viewonline, wwh_lastpage
					FROM ' . $this->table_prefix . 'wwh';
			$this->db->sql_query_limit($sql, $limit, $offset);
			while ($this->db->sql_affectedrows() == $limit)
			{
				$offset += $limit;
				$this->db->sql_query_limit($sql, $limit, $offset);
			}
		}
	}

	private function role_exists(string $role): bool
	{
		$sql = 'SELECT role_id
				FROM ' . ACL_ROLES_TABLE . "
				WHERE role_name = '" . $this->db->sql_escape($role) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$role_id = $this->db->sql_fetchfield('role_id');
		$this->db->sql_freeresult($result);

		return $role_id;
	}
}
