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

class s_2_0_0_initial_schema extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'lfwwh');
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v31x\v3111'];
	}

	public function update_schema()
	{
		return [
			'add_tables' => [
				$this->table_prefix . 'lfwwh' => [
					'COLUMNS' => [
						'wwh_id'			=> ['UINT'		, null, 'auto_increment'],
						'user_id'			=> ['UINT'		, 0],
						'username'			=> ['VCHAR'		, ''],
						'username_clean'	=> ['VCHAR'		, ''],
						'user_colour'		=> ['VCHAR:6'	, ''],
						'user_ip'			=> ['VCHAR:40'	, '127.0.0.1'],
						'user_type'			=> ['UINT:2'	, 1],
						'viewonline'		=> ['UINT:1'	, 1],
						'wwh_lastpage'		=> ['TIMESTAMP'	, 0],
					],
					'PRIMARY_KEY' => [
						'wwh_id',
						'user_id',
						'user_ip',
					],
					'KEYS' => [
						'user_id' => [
							'INDEX',
							'user_id',
						],
					],
				],
			],
		];
	}

	public function revert_schema()
	{
		return [
			'drop_tables'	=> [$this->table_prefix . 'lfwwh'],
		];
	}
}
