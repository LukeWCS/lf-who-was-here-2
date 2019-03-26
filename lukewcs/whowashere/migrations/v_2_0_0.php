<?php
/**
* @package phpBB3.2
* @copyright LukeWCS (c) 2019 wcsaga.org
*/

namespace lukewcs\whowashere\migrations;

class v_2_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lfwwh_ext_version']) && version_compare($this->config['lfwwh_ext_version'], '2.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\lukewcs\whowashere\migrations\s_2_0_0_initial_schema');
	}

	public function update_data()
	{
		$load_online_time = (($this->config['load_online_time'] >= 1) ? $this->config['load_online_time'] : '1');
		
		$data = array();
		// Add configs
		$data[] = array('config.add', array('lfwwh_admin_mode'				, '0'));
		$data[] = array('config.add', array('lfwwh_api_mode'				, (isset($this->config['wwh_api_mode']))				? $this->config['wwh_api_mode']					: '0'));
		$data[] = array('config.add', array('lfwwh_cache_time'				, (isset($this->config['wwh_cache_time']))				? $this->config['wwh_cache_time']				: $load_online_time));
		$data[] = array('config.add', array('lfwwh_clear_up'				, (isset($this->config['wwh_clear_up']))				? $this->config['wwh_clear_up']					: '1'));
		$data[] = array('config.add', array('lfwwh_period_of_time_h'		, (isset($this->config['wwh_del_time_h']))				? $this->config['wwh_del_time_h']				: '24'));
		$data[] = array('config.add', array('lfwwh_period_of_time_m'		, (isset($this->config['wwh_del_time_m']))				? $this->config['wwh_del_time_m']				: '0'));
		$data[] = array('config.add', array('lfwwh_period_of_time_s'		, (isset($this->config['wwh_del_time_s']))				? $this->config['wwh_del_time_s']				: '0'));
		$data[] = array('config.add', array('lfwwh_disp_bots'				, (isset($this->config['wwh_disp_bots']))				? $this->config['wwh_disp_bots']				: '1'));
		$data[] = array('config.add', array('lfwwh_disp_bots_only_admin'	, (isset($this->config['wwh_disp_bots_only_admin']))	? $this->config['wwh_disp_bots_only_admin']		: '0'));
		$data[] = array('config.add', array('lfwwh_disp_for_guests'			, (isset($this->config['wwh_disp_for_guests']))			? $this->config['wwh_disp_for_guests']			: '0'));
		$data[] = array('config.add', array('lfwwh_disp_guests'				, (isset($this->config['wwh_disp_guests']))				? $this->config['wwh_disp_guests']				: '1'));
		$data[] = array('config.add', array('lfwwh_disp_hidden'				, (isset($this->config['wwh_disp_hidden']))				? $this->config['wwh_disp_hidden']				: '1'));
		$data[] = array('config.add', array('lfwwh_disp_ip'					, (isset($this->config['wwh_disp_ip']))					? $this->config['wwh_disp_ip']					: '1'));
		$data[] = array('config.add', array('lfwwh_disp_template_pos'		, (isset($this->config['wwh_disp_template_pos']))		? $this->config['wwh_disp_template_pos']		: '0'));
		$data[] = array('config.add', array('lfwwh_disp_template_pos_all'	, (isset($this->config['wwh_disp_template_pos_all']))	? $this->config['wwh_disp_template_pos_all']	: '0'));
		$data[] = array('config.add', array('lfwwh_disp_time'				, (isset($this->config['wwh_disp_time']))				? $this->config['wwh_disp_time']				: '1'));
		$data[] = array('config.add', array('lfwwh_disp_time_bots'			, (isset($this->config['wwh_disp_time_bots']))			? $this->config['wwh_disp_time_bots']			: '1'));
		$data[] = array('config.add', array('lfwwh_disp_time_format'		, (isset($this->config['wwh_disp_time_format']))		? $this->config['wwh_disp_time_format']			: 'G:i'));
		$data[] = array('config.add', array('lfwwh_last_clean'				, (isset($this->config['wwh_last_clean']))				? $this->config['wwh_last_clean']				: '0'));
		$data[] = array('config.add', array('lfwwh_time_mode'				, (isset($this->config['wwh_version']))					? $this->config['wwh_version']					: '1'));
		$data[] = array('config.add', array('lfwwh_record'					, (isset($this->config['wwh_record']))					? $this->config['wwh_record']					: '1'));
		$data[] = array('config.add', array('lfwwh_record_ips'				, (isset($this->config['wwh_record_ips']))				? $this->config['wwh_record_ips']				: '1', true));
		$data[] = array('config.add', array('lfwwh_record_time'				, (isset($this->config['wwh_record_time']))				? $this->config['wwh_record_time']				: time(), true));
		$data[] = array('config.add', array('lfwwh_record_time_format'		, (isset($this->config['wwh_record_timestamp']))		? $this->config['wwh_record_timestamp']			: 'D j. M Y'));
		$data[] = array('config.add', array('lfwwh_record_reset_time'		, (isset($this->config['wwh_reset_time']))				? $this->config['wwh_reset_time']				: '1'));
		$data[] = array('config.add', array('lfwwh_sort_by'					, (isset($this->config['wwh_sort_by']))					? $this->config['wwh_sort_by']					: '3'));
		$data[] = array('config.add', array('lfwwh_use_cache'				, '1'));
		$data[] = array('config.add', array('lfwwh_use_online_time'			, (isset($this->config['wwh_use_online_time']))			? $this->config['wwh_use_online_time']			: '1'));
		$data[] = array('config.add', array('lfwwh_use_permissions'			, (isset($this->config['wwh_use_permissions']))			? $this->config['wwh_use_permissions']			: '0'));
		// Add permissions
		$data[] = array('permission.add', array('u_lfwwh_show_stats'));
		$data[] = array('permission.add', array('u_lfwwh_show_users'));
		// Set permissions
		$data[] = array('permission.permission_set', array('ADMINISTRATORS'		, 'u_lfwwh_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('ADMINISTRATORS'		, 'u_lfwwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('GLOBAL_MODERATORS'	, 'u_lfwwh_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('GLOBAL_MODERATORS'	, 'u_lfwwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED'			, 'u_lfwwh_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED'			, 'u_lfwwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('GUESTS'				, 'u_lfwwh_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('NEWLY_REGISTERED'	, 'u_lfwwh_show_users', 'group', false));
		// Set permission roles
		if ($this->role_exists('ROLE_USER_STANDARD'))	$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD'		, 'u_lfwwh_show_stats', 'role'));
		if ($this->role_exists('ROLE_USER_STANDARD'))	$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD'		, 'u_lfwwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_LIMITED'))	$data[] = array('permission.permission_set', array('ROLE_USER_LIMITED'		, 'u_lfwwh_show_stats', 'role'));
		if ($this->role_exists('ROLE_USER_LIMITED'))	$data[] = array('permission.permission_set', array('ROLE_USER_LIMITED'		, 'u_lfwwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_FULL'))		$data[] = array('permission.permission_set', array('ROLE_USER_FULL'			, 'u_lfwwh_show_stats', 'role'));
		if ($this->role_exists('ROLE_USER_FULL'))		$data[] = array('permission.permission_set', array('ROLE_USER_FULL'			, 'u_lfwwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NOPM'))		$data[] = array('permission.permission_set', array('ROLE_USER_NOPM'			, 'u_lfwwh_show_stats', 'role'));
		if ($this->role_exists('ROLE_USER_NOPM'))		$data[] = array('permission.permission_set', array('ROLE_USER_NOPM'			, 'u_lfwwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NOAVATAR'))	$data[] = array('permission.permission_set', array('ROLE_USER_NOAVATAR'		, 'u_lfwwh_show_stats', 'role'));
		if ($this->role_exists('ROLE_USER_NOAVATAR'))	$data[] = array('permission.permission_set', array('ROLE_USER_NOAVATAR'		, 'u_lfwwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))	$data[] = array('permission.permission_set', array('ROLE_USER_NEW_MEMBER'	, 'u_lfwwh_show_users', 'role', false));
		// Custom functions
		$data[] = array('custom', array(array($this, 'import_wwh_table')));
		// Add ACP modules
		$data[] = array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'LFWWH_NAV_TITLE'));
		$data[] = array('module.add', array('acp', 'LFWWH_NAV_TITLE', array(
			'module_basename'	=> '\lukewcs\whowashere\acp\acp_whowashere_module',
			'module_langname'	=> 'LFWWH_NAV_CONFIG',
			'module_mode'		=> 'overview',
			'module_auth'		=> 'ext_lukewcs/whowashere && acl_a_board',
		)));
		// Set current version
		$data[] = array('config.add', array('lfwwh_ext_version'				, '2.0.0'));
		
		return $data;
	}

	public function revert_data()
	{
		return(array(
			// Remove configs
			// Remove permissions
			array('permission.remove', array('u_lfwwh_show_users')),
			array('permission.remove', array('u_lfwwh_show_stats')),			
		));
	} 
	
	public function import_wwh_table()
	{	
		// if (!defined('WWH_TABLE'))
		// {
			// define('WWH_TABLE', $this->table_prefix . 'wwh');
		// }
		// if (!defined('LFWWH_TABLE'))
		// {
			// define('LFWWH_TABLE', $this->table_prefix . 'lfwwh');
		// }
		
		if ($this->db_tools->sql_table_exists($this->table_prefix . 'wwh') && $this->db_tools->sql_table_exists($this->table_prefix . 'lfwwh')) 
		{
			$sql = 'INSERT INTO ' . $this->table_prefix . 'lfwwh' . ' (user_id, username, username_clean, user_colour, user_ip, user_type, viewonline, wwh_lastpage)
					SELECT user_id, username, username_clean, user_colour, user_ip, user_type, viewonline, wwh_lastpage 
					FROM ' . $this->table_prefix . 'wwh';
			$result = $this->db->sql_query($sql);	
		}
	}
	
	private function role_exists($role)
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
