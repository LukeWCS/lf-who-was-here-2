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

namespace bb3mobi\washere\migrations;

class v_1_2_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['wwh_mod_version']) && version_compare($this->config['wwh_mod_version'], '1.2.1', '>=');
	}

	static public function depends_on()
	{
			return array('\phpbb\db\migration\data\v310\dev');
	}
	public function update_schema()
	{
		return array(
		'add_tables' => array(
				$this->table_prefix . 'wwh' => array(
					'COLUMNS'		=> array(
						'wwh_id'			=> array('UINT', null, 'auto_increment'),
						'user_id'			=> array('UINT', 0),
						'username'			=> array('VCHAR', ''),
						'username_clean'	=> array('VCHAR', ''),
						'user_colour'		=> array('VCHAR:6', ''),
						'user_ip'			=> array('VCHAR:40', '127.0.0.1'),
						'user_type'			=> array('UINT:2', 1),
						'viewonline'		=> array('UINT:1', 1),
						'wwh_lastpage'		=> array('TIMESTAMP', 0),
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
			'drop_tables'	=> array($this->table_prefix . 'wwh'),
		);
	}

	public function update_data()
	{
		return array(
			// Add configs
			array('config.add', array('wwh_record_ips', '1', true)),
			array('config.add', array('wwh_record_time', time(), true)),
			array('config.add', array('wwh_disp_bots', '1')),
			array('config.add', array('wwh_disp_guests', '1')),
			array('config.add', array('wwh_disp_hidden', '1')),
			array('config.add', array('wwh_disp_time', '1')),
			array('config.add', array('wwh_disp_ip', '1')),
			array('config.add', array('wwh_version', '1')),
			array('config.add', array('wwh_del_time_h', '24')),
			array('config.add', array('wwh_del_time_m', '0')),
			array('config.add', array('wwh_del_time_s', '0')),
			array('config.add', array('wwh_sort_by', '3')),
			array('config.add', array('wwh_record', '1')),
			array('config.add', array('wwh_record_timestamp', 'D j. M Y')),
			array('config.add', array('wwh_reset_time', '1')),
			array('config.add', array('wwh_disp_time_format', 'G:i')),

			// Current version
			array('config.add', array('wwh_mod_version', '1.2.1')),

			// Add ACP modules
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'WWH_TITLE')),
			array('module.add', array('acp', 'WWH_TITLE', array(
				'module_basename'	=> '\bb3mobi\washere\acp\acp_wwh_module',
				'module_langname'	=> 'WWH_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_bb3mobi/washere && acl_a_board',
			))),
		);
	}
}
