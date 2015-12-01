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

class v_1_2_2 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['wwh_mod_version']) && version_compare($this->config['wwh_mod_version'], '1.2.2', '>=');
	}

	static public function depends_on()
	{
		return array('\bb3mobi\washere\migrations\v_1_2_1');
	}

	public function update_data()
	{
		return array(
			// Current version
			array('if', array(
				(isset($this->config['wwh_mod_version'])),
				array('config.update', array('wwh_mod_version', '1.2.2')),
			)),
			array('if', array(
				(!isset($this->config['wwh_mod_version'])),
				array('config.add', array('wwh_mod_version', '1.2.2')),
			)),
		);
	}
}
