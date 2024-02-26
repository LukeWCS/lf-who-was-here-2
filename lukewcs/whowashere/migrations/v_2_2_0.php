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

namespace lukewcs\whowashere\migrations;

class v_2_2_0 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\v_2_1_1'];
	}

	public function update_data()
	{
		$data = [];

		$data[] = ['config.update'	, ['lfwwh_perm_for_guests'	, $this->change_perm($this->config['lfwwh_perm_for_guests'])]];
		$data[] = ['config.update'	, ['lfwwh_perm_for_bots'	, $this->change_perm($this->config['lfwwh_perm_for_bots'])]];
		$data[] = ['config.remove'	, ['lfwwh_perm_bots_only_admin']];

		$data[] = ['permission.add'				, ['u_lfwwh_show_record']];
		$data[] = ['permission.add'				, ['u_lfwwh_show_bots']];

		$data[] = ['permission.permission_set'	, ['ADMINISTRATORS'		, 'u_lfwwh_show_record', 'group']];
		$data[] = ['permission.permission_set'	, ['ADMINISTRATORS'		, 'u_lfwwh_show_bots', 'group']];
		$data[] = ['permission.permission_set'	, ['GLOBAL_MODERATORS'	, 'u_lfwwh_show_record', 'group']];
		$data[] = ['permission.permission_set'	, ['GLOBAL_MODERATORS'	, 'u_lfwwh_show_bots', 'group']];
		$data[] = ['permission.permission_set'	, ['REGISTERED'			, 'u_lfwwh_show_record', 'group']];
		$data[] = ['permission.permission_set'	, ['REGISTERED'			, 'u_lfwwh_show_bots', 'group']];
		$data[] = ['permission.permission_set'	, ['NEWLY_REGISTERED'	, 'u_lfwwh_show_bots', 'group', false]];
		$data[] = ['permission.permission_set'	, ['GUESTS'				, 'u_lfwwh_show_record', 'group']];

		if ($this->role_exists('ROLE_USER_STANDARD'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_lfwwh_show_record', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_lfwwh_show_bots', 'role']];
		}
		if ($this->role_exists('ROLE_USER_LIMITED'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_lfwwh_show_record', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_lfwwh_show_bots', 'role']];
		}
		if ($this->role_exists('ROLE_USER_FULL'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_lfwwh_show_record', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_lfwwh_show_bots', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOPM'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_lfwwh_show_record', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_lfwwh_show_bots', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOAVATAR'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_lfwwh_show_record', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_lfwwh_show_bots', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NEW_MEMBER'	, 'u_lfwwh_show_bots', 'role', false]];
		}

		return $data;
	}

	private function change_perm(string $old_value)
	{
		$change_value = [
			'0' => '0',
			'1' => '3',
			'2' => '12',
			'3' => '15',
		];
		return $change_value[$old_value] ?? '0';
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
