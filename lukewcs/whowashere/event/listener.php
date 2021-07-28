<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
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
	protected $wwh;

	public function __construct(
		\lukewcs\whowashere\core\who_was_here $wwh
	)
	{
		$this->wwh = $wwh;
	}

	public static function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'		=> 'update_session',
			'core.page_footer'				=> 'display',
			'core.permissions'				=> 'add_permissions',
			'core.delete_user_after'		=> 'clear_up',
		);
	}

	public function update_session()
	{
		$this->wwh->update_session();
	}

	public function display()
	{
		$this->wwh->display();
	}

	public function add_permissions($event)
	{
		$this->wwh->add_permissions($event);
	}

	public function clear_up($event)
	{
		$this->wwh->clear_up($event);
	}
}
