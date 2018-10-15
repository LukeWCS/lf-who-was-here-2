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

	public function __construct(
		$helper,
		\phpbb\config\config $config
	)
	{
		$this->helper = $helper;
		$this->config = $config;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'		=> 'wwh_update_table',
			'core.index_modify_page_title'	=> 'wwh_display',
			'core.permissions'				=> 'wwh_activate_permissions',
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
}
