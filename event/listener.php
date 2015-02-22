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

namespace bb3mobi\washere\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	/** @bb3mobi.washere.helper */
	protected $helper;

	public function __construct($helper)
	{
		$this->helper = $helper;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'		=> 'display_online_list',
			'core.index_modify_page_title'	=> 'phpbb_mods_who_was_here',
		);
	}

	public function display_online_list($event)
	{
		$this->helper->update_session();
	}

	public function phpbb_mods_who_was_here($event)
	{
		$this->helper->display();
	}
}
