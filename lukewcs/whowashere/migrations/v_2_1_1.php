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

class v_2_1_1 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\v_2_1_0'];
	}

	public function update_data()
	{
		$change_perm = [
			'0' => '1',
			'1' => '3',
			'2' => '0',
			'3' => '2',
		];
		return [
			['config.add'		, ['lfwwh_perm_for_guests'		, $change_perm[$this->config['lfwwh_disp_for_guests']		?? '0']]],
			['config.add'		, ['lfwwh_perm_for_bots'		, $change_perm[$this->config['lfwwh_disp_for_bots']			?? '2']]],
			['config.add'		, ['lfwwh_perm_bots_only_admin'	, $this->config['lfwwh_disp_bots_only_admin']				?? '0']],
			['config.add'		, ['lfwwh_disp_time_users'		, $this->config['lfwwh_disp_time']							?? '1']],
			['config.add'		, ['lfwwh_template_pos'			, $this->config['lfwwh_disp_template_pos']					?? '0']],
			['config.add'		, ['lfwwh_template_pos_all'		, $this->config['lfwwh_disp_template_pos_all']				?? '0']],
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
}
