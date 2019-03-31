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

namespace lukewcs\whowashere\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @lukewcs.whowashere.helper */
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
			'core.page_header_after'		=> 'update_session',
			'core.index_modify_page_title'	=> 'display',
			'core.permissions'				=> 'add_permissions',
			'core.delete_user_after'		=> 'clear_up',
		);
	}

	public function update_session($event)
	{
		$this->helper->update_session();
	}

	public function display($event)
	{
		$this->helper->display();
	}

	public function add_permissions($event)
	{
		if (!$this->config['lfwwh_use_permissions'])
		{
			return;
		}
		$permissions = $event['permissions'];
		$permissions['u_lfwwh_show_users'] = array('lang' => 'ACL_U_LFWWH_SHOW_USERS', 'cat' => 'profile');
		$permissions['u_lfwwh_show_stats'] = array('lang' => 'ACL_U_LFWWH_SHOW_STATS', 'cat' => 'profile');
		$event['permissions'] = $permissions;
	}

	public function clear_up($event)
	{
		$this->helper->clear_up($event['user_ids']);
	}
}
