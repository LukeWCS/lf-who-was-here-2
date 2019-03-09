<?php
/**
* @package phpBB3.2
* @copyright LukeWCS (c) 2019 wcsaga.org
*/

namespace lukewcs\whowashere\migrations;

class s_2_0_0_initial_schema extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->db_tools->sql_table_exists($this->table_prefix . 'lfwwh');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v3111');
	}

	public function update_schema()
	{//echo 'update_schema'.'<br>';
		return array(
			'add_tables' => array(
				$this->table_prefix . 'lfwwh' => array(
					'COLUMNS'		=> array(
						'wwh_id'			=> array('UINT'			, null, 'auto_increment'),
						'user_id'			=> array('UINT'			, 0),
						'username'			=> array('VCHAR'		, ''),
						'username_clean'	=> array('VCHAR'		, ''),
						'user_colour'		=> array('VCHAR:6'		, ''),
						'user_ip'			=> array('VCHAR:40'		, '127.0.0.1'),
						'user_type'			=> array('UINT:2'		, 1),
						'viewonline'		=> array('UINT:1'		, 1),
						'wwh_lastpage'		=> array('TIMESTAMP'	, 0),
					),
					'PRIMARY_KEY'	=> array('wwh_id', 'user_id', 'user_ip'),
					'KEYS'			=> array(
						'user_id'			=> array('INDEX', 'user_id'),
					),
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'drop_tables'	=> array($this->table_prefix . 'lfwwh'),
		);
	}
}
