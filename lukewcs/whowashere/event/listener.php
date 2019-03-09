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
		if (!$this->config['lfwwh_use_permissions']) return;
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
