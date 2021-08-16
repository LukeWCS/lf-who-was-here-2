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

class v_2_1_0 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\v_2_0_0'];
	}

	public function update_data()
	{
		return [
			['config.add', ['lfwwh_disp_for_bots', '2']],
			['config.remove', ['lfwwh_version']],
		];
	}
}
