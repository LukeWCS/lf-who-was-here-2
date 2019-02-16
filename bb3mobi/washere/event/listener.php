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

namespace bb3mobi\washere\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @bb3mobi.washere.helper */
	protected $helper;
	protected $config;
	protected $cache;
	protected $db;

	public function __construct(
		$helper,
		\phpbb\config\config $config,
		\phpbb\cache\driver\driver_interface $cache, 
		\phpbb\db\driver\driver_interface $db, 
		$table_prefix
	)
	{
		if (!defined('WWH_TABLE'))
		{
			define('WWH_TABLE', $table_prefix . 'wwh');
		}
		$this->helper = $helper;
		$this->config = $config;
		$this->cache = $cache;
		$this->db = $db;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'		=> 'wwh_update_table',
			'core.index_modify_page_title'	=> 'wwh_display',
			'core.permissions'				=> 'wwh_activate_permissions',
			'core.delete_user_after'		=> 'wwh_clear_up',
		);
	}

	public function wwh_update_table($event)
	{
		$this->helper->update_session();
	}

	public function wwh_display($event)
	{
		$this->helper->display();
	}

	public function wwh_activate_permissions($event)
	{
		if (!$this->config['wwh_use_permissions']) return;
		$permissions = $event['permissions'];
		$permissions['u_wwh_show_users'] = array('lang' => 'ACL_U_WWH_SHOW_USERS', 'cat' => 'profile');
		$permissions['u_wwh_show_stats'] = array('lang' => 'ACL_U_WWH_SHOW_STATS', 'cat' => 'profile');
		$event['permissions'] = $permissions;
	}

	public function wwh_clear_up($event)
	{
		if (!$this->config['wwh_clear_up']) return;
		$clear_cache = false;
		$user_ids_ary = $event['user_ids'];
		foreach ($user_ids_ary as $user_id)
		{
			$sql = 'SELECT 1 as found
				FROM  ' . WWH_TABLE . '
				WHERE user_id = ' . (int) $user_id;
			$result = $this->db->sql_query($sql);
			$found = (int) $this->db->sql_fetchfield('found');
			if ($found)
			{
				$sql = 'DELETE FROM ' . WWH_TABLE . '
					WHERE user_id = ' . (int) $user_id;
				$result = $this->db->sql_query($sql);
				//echo $user_id . " ...deleted <br>";
				$clear_cache = true;
			}			
		}
		if ($clear_cache) 
		{
			$this->cache->destroy("_who_was_here");
		}
	}
}
