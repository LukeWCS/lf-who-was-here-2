<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace bb3mobi\washere\acp;

class acp_wwh_info
{
	function module()
	{
		return array(
			'filename'	=> '\bb3mobi\washere\acp\acp_wwh_module',
			'title'		=> 'WWH_TITLE',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'config_wwh'	=> array(
					'title'	=> 'WWH_CONFIG',
					'auth'	=> 'ext_bb3mobi/washere && acl_a_board',
					'cat'	=> array('ACP_BOARD_CONFIGURATION')
				),
			),
		);
	}
}
