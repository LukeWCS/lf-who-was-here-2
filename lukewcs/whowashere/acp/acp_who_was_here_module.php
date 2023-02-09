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

namespace lukewcs\whowashere\acp;

class acp_who_was_here_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		/** @var \vendorname\packagename\controller\acp_controller $acp_controller */
		$acp_controller = $phpbb_container->get('lukewcs.whowashere.controller.acp');

		// Make the $u_action url available in our ACP controller
		$acp_controller->set_page_url($this->u_action);

		/** @var \phpbb\language\language $language */
		$language = $phpbb_container->get('language');

		// Load a template from adm/style for our ACP page
		$this->tpl_name = 'acp_who_was_here_settings';

		// Set the page title for our ACP page
		// $this->page_title = $language->lang('LFWWH_NAV_TITLE');
		$this->page_title = $language->lang('LFWWH_NAV_TITLE') . ' - ' . $language->lang('LFWWH_NAV_CONFIG');

		// Load the display options handle in our ACP controller
		$acp_controller->module_settings();
	}
}
