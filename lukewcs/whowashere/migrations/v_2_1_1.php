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

class v_2_1_1 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\v_2_1_0'];
	}

	public function update_data()
	{
		return [
			['config.add'		, ['lfwwh_perm_for_guests'		, $this->change_perm($this->config['lfwwh_disp_for_guests'])]],
			['config.add'		, ['lfwwh_perm_for_bots'		, $this->change_perm($this->config['lfwwh_disp_for_bots'])]],
			['config.add'		, ['lfwwh_perm_bots_only_admin'	, $this->config['lfwwh_disp_bots_only_admin']]],
			['config.add'		, ['lfwwh_disp_time_users'		, $this->config['lfwwh_disp_time']]],
			['config.add'		, ['lfwwh_template_pos'			, $this->config['lfwwh_disp_template_pos']]],
			['config.add'		, ['lfwwh_template_pos_all'		, $this->config['lfwwh_disp_template_pos_all']]],
			['config.remove'	, ['lfwwh_disp_for_guests']],
			['config.remove'	, ['lfwwh_disp_for_bots']],
			['config.remove'	, ['lfwwh_disp_bots_only_admin']],
			['config.remove'	, ['lfwwh_disp_time']],
			['config.remove'	, ['lfwwh_disp_template_pos']],
			['config.remove'	, ['lfwwh_disp_template_pos_all']],
			['module.remove', [
				'acp',
				'LFWWH_NAV_TITLE', [
					'module_basename'	=> '\lukewcs\whowashere\acp\acp_who_was_here_module',
					'module_langname'	=> 'LFWWH_NAV_CONFIG',
					'module_mode'		=> 'overview',
					'module_auth'		=> 'ext_lukewcs/whowashere && acl_a_board',
				]
			]],
			['module.add', [
				'acp',
				'LFWWH_NAV_TITLE', [
					'module_basename'	=> '\lukewcs\whowashere\acp\acp_who_was_here_module',
					'modes'				=> ['settings'],
				]
			]],
		];
	}

	private function change_perm(string $old_value)
	{
		$change_value = [
			'0' => '1',
			'1' => '3',
			'2' => '0',
			'3' => '2',
		];
		return $change_value[$old_value] ?? '0';
	}
}
