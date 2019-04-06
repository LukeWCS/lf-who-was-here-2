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
	// @lukewcs.whowashere.core_lfwwh
	protected $core_lfwwh;

	public function __construct(
		$core_lfwwh
	)
	{
		$this->core_lfwwh = $core_lfwwh;
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
		$this->core_lfwwh->update_session();
	}

	public function display($event)
	{
		$this->core_lfwwh->display();
	}

	public function add_permissions($event)
	{
		$this->core_lfwwh->add_permissions($event);
	}

	public function clear_up($event)
	{
		$this->core_lfwwh->clear_up($event);
	}
}
