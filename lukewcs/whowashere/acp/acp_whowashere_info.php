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
