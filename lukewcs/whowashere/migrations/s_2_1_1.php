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
* Note: This extension is 100% genuine handcraft and consists of selected
*       natural raw materials. There was no AI involved in making it.
*
*/

namespace lukewcs\whowashere\migrations;

class s_2_1_1 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\whowashere\migrations\s_2_0_0_initial_schema'];
	}

	public function update_schema()
	{
		return [
			'change_columns' => [
				$this->table_prefix . 'lfwwh' => [
					'wwh_id' => ['UINT:10', null, 'auto_increment'],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'change_columns' => [
				$this->table_prefix . 'lfwwh' => [
					'wwh_id' => ['UINT', null, 'auto_increment'],
				],
			],
		];
	}
}
