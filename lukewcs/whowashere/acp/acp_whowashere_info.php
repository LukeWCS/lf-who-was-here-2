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

namespace lukewcs\whowashere\acp;

class acp_whowashere_info
{
	function module()
	{
		return array(
			'filename'	=> '\lukewcs\whowashere\acp\acp_whowashere_module',
			'title'		=> 'LFWWH_NAV_TITLE',
			'modes'		=> array(
				'config_wwh'	=> array(
					'title'	=> 'LFWWH_NAV_CONFIG',
					'auth'	=> 'ext_lukewcs/whowashere && acl_a_board',
					'cat'	=> array('ACP_BOARD_CONFIGURATION')
				),
			),
		);
	}
}
