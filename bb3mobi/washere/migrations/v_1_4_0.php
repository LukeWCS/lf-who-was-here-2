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

namespace bb3mobi\washere\migrations;

class v_1_4_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['wwh_mod_version']) && version_compare($this->config['wwh_mod_version'], '1.4.0', '>=');
	}

	static public function depends_on()
	{
		return array('\bb3mobi\washere\migrations\v_1_3_3');
	}

	public function update_data()
	{
		$data = array();
		
		// Add configs
		$data[] = array('config.add', array('wwh_api_mode', '0'));
		$data[] = array('config.add', array('wwh_use_permissions', '0'));
		// Add permissions
		$data[] = array('permission.add', array('u_wwh_show_stats'));
		$data[] = array('permission.add', array('u_wwh_show_users'));
		// Set permissions
		$data[] = array('permission.permission_set', array('ADMINISTRATORS', 'u_wwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('GLOBAL_MODERATORS', 'u_wwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED', 'u_wwh_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED', 'u_wwh_show_users', 'group'));
		$data[] = array('permission.permission_set', array('NEWLY_REGISTERED', 'u_wwh_show_users', 'group', false));
		$data[] = array('permission.permission_set', array('GUESTS', 'u_wwh_show_stats', 'group'));
		// Set permission roles
		if ($this->role_exists('ROLE_USER_STANDARD'))	$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD', 'u_wwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_LIMITED'))	$data[] = array('permission.permission_set', array('ROLE_USER_LIMITED', 'u_wwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_FULL'))		$data[] = array('permission.permission_set', array('ROLE_USER_FULL', 'u_wwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NOPM'))		$data[] = array('permission.permission_set', array('ROLE_USER_NOPM', 'u_wwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NOAVATAR'))	$data[] = array('permission.permission_set', array('ROLE_USER_NOAVATAR', 'u_wwh_show_users', 'role'));
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))	$data[] = array('permission.permission_set', array('ROLE_USER_NEW_MEMBER', 'u_wwh_show_users', 'role', false));
		// Set current version
		$data[] = array('config.update', array('wwh_mod_version', '1.4.0'));
		
		return $data;
	}

	public function revert_data()
	{
		return(array(
			// Remove configs
			array('config.remove', array('wwh_last_clean')),
			// Remove permissions
			array('permission.remove', array('u_wwh_show_users')),
			array('permission.remove', array('u_wwh_show_stats')),
		));
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
