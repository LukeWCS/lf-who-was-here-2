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

// declare(strict_types=1);

namespace lukewcs\whowashere\acp;

class acp_who_was_here_module
{
	protected $user;
	protected $config;
	protected $request;
	protected $template;
	protected $cache;
	protected $language;
	protected $md_manager;
	public $u_action;

	public function main()
	{
		global $user, $config, $request, $template, $cache, $language, $phpbb_container;

		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->cache = $cache;
		$this->language = $language; // needs phpBB >=3.2.6
		$this->md_manager = $phpbb_container->get('ext.manager')->create_extension_metadata_manager('lukewcs/whowashere');

		$ext_display_name = $this->md_manager->get_metadata('display-name');
		$ext_display_ver = $this->md_manager->get_metadata('version');
		$ext_lang_min_ver = $this->md_manager->get_metadata()['extra']['lang-min-ver'];
		$lang_ver = ($this->language->lang('LFWWH_LANG_EXT_VER') !== 'LFWWH_LANG_EXT_VER') ? $this->language->lang('LFWWH_LANG_EXT_VER') : '0.0.0';
		$notes = '';

		$this->language->add_lang('who_was_here', 'lukewcs/whowashere');

		$this->tpl_name = 'acp_who_was_here';
		$this->page_title = $this->language->lang('LFWWH_NAV_TITLE') . ' - ' . $this->language->lang('LFWWH_NAV_CONFIG');

		add_form_key('lukewcs_whowashere');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('lukewcs_whowashere'))
			{
				trigger_error('FORM_INVALID');
			}
			$delete_cache = ($this->request->variable('lfwwh_sort_by', 0) != $this->config['lfwwh_sort_by']);
			$this->config->set('lfwwh_admin_mode'				, $this->request->variable('lfwwh_admin_mode', 0));
			$this->config->set('lfwwh_use_permissions'			, $this->request->variable('lfwwh_use_permissions', 0));
			$this->config->set('lfwwh_disp_for_guests'			, $this->request->variable('lfwwh_disp_for_guests', 0));
			$this->config->set('lfwwh_disp_for_bots'			, $this->request->variable('lfwwh_disp_for_bots', 0));
			$this->config->set('lfwwh_disp_reg_users'			, $this->request->variable('lfwwh_disp_reg_users', 0));
			$this->config->set('lfwwh_disp_hidden'				, $this->request->variable('lfwwh_disp_hidden', 0));
			$this->config->set('lfwwh_disp_bots'				, $this->request->variable('lfwwh_disp_bots', 0));
			$this->config->set('lfwwh_disp_bots_only_admin'		, $this->request->variable('lfwwh_disp_bots_only_admin', 0));
			$this->config->set('lfwwh_disp_guests'				, $this->request->variable('lfwwh_disp_guests', 0));
			$this->config->set('lfwwh_disp_time'				, $this->request->variable('lfwwh_disp_time', 0));
			$this->config->set('lfwwh_disp_time_bots'			, $this->request->variable('lfwwh_disp_time_bots', 0));
			$this->config->set('lfwwh_disp_time_format'			, $this->request->variable('lfwwh_disp_time_format', ''));
			$this->config->set('lfwwh_disp_ip'					, $this->request->variable('lfwwh_disp_ip', 0));
			$this->config->set('lfwwh_time_mode'				, $this->request->variable('lfwwh_time_mode', 0));
			$this->config->set('lfwwh_period_of_time_h'			, $this->request->variable('lfwwh_period_of_time_h', 0));
			$this->config->set('lfwwh_period_of_time_m'			, $this->request->variable('lfwwh_period_of_time_m', 0));
			$this->config->set('lfwwh_period_of_time_s'			, $this->request->variable('lfwwh_period_of_time_s', 0));
			$this->config->set('lfwwh_sort_by'					, $this->request->variable('lfwwh_sort_by', 0));
			$this->config->set('lfwwh_record'					, $this->request->variable('lfwwh_record', 0));
			$this->config->set('lfwwh_record_time_format'		, $this->request->variable('lfwwh_record_time_format', ''));
			$this->config->set('lfwwh_disp_template_pos'		, $this->request->variable('lfwwh_disp_template_pos', 0));
			$this->config->set('lfwwh_api_mode'					, $this->request->variable('lfwwh_api_mode', 0));
			$this->config->set('lfwwh_clear_up'					, $this->request->variable('lfwwh_clear_up', 0));
			$this->config->set('lfwwh_disp_template_pos_all'	, $this->request->variable('lfwwh_disp_template_pos_all', 0));
			$this->config->set('lfwwh_create_hidden_info'		, $this->request->variable('lfwwh_create_hidden_info', 0));
			$this->config->set('lfwwh_use_cache'				, $this->request->variable('lfwwh_use_cache', 0));
			$this->config->set('lfwwh_use_online_time'			, $this->request->variable('lfwwh_use_online_time', 0));
			$this->config->set('lfwwh_cache_time'				, $this->request->variable('lfwwh_cache_time', 0));
			if ($this->request->variable('lfwwh_record_reset'	, 0) > 0)
			{
				$this->config->set('lfwwh_record_ips', 1);
				$this->config->set('lfwwh_record_time', time());
				$this->config->set('lfwwh_record_reset_time', time());
			}
			if ($this->config['lfwwh_use_cache'] && $delete_cache)
			{
				$this->cache->destroy("_lf_who_was_here");
			}
			trigger_error($this->language->lang('LFWWH_MSG_SAVED_SETTINGS') . adm_back_link($this->u_action));
		}

		if (!phpbb_version_compare($lang_ver, $ext_lang_min_ver, '>='))
		{
			$this->add_note($notes, $this->language->lang('LFWWH_MSG_LANGUAGEPACK_OUTDATED'));
		}

		$load_online_time = (($this->config['load_online_time'] >= 1) ? $this->config['load_online_time'] : 1);
		if ($this->config['lfwwh_cache_time'] > $load_online_time)
		{
			$this->config->set('lfwwh_cache_time', $load_online_time);
		}

		$this->template->assign_vars([
			'LFWWH_EXT_NAME'				=> $ext_display_name,
			'LFWWH_EXT_VER'					=> $ext_display_ver,
			'LFWWH_NOTES'					=> $notes,
			'LFWWH_ADMIN_MODE'				=> $this->config['lfwwh_admin_mode'],
			'LFWWH_USE_PERMISSIONS'			=> $this->config['lfwwh_use_permissions'],
			'LFWWH_DISP_FOR_GUESTS'			=> $this->config['lfwwh_disp_for_guests'],
			'LFWWH_DISP_FOR_BOTS'			=> $this->config['lfwwh_disp_for_bots'],
			'LFWWH_DISP_REG_USERS'			=> $this->config['lfwwh_disp_reg_users'],
			'LFWWH_DISP_HIDDEN'				=> $this->config['lfwwh_disp_hidden'],
			'LFWWH_DISP_BOTS'				=> $this->config['lfwwh_disp_bots'],
			'LFWWH_DISP_BOTS_ONLY_ADMIN'	=> $this->config['lfwwh_disp_bots_only_admin'],
			'LFWWH_DISP_GUESTS'				=> $this->config['lfwwh_disp_guests'],
			'LFWWH_DISP_TIME'				=> $this->config['lfwwh_disp_time'],
			'LFWWH_DISP_TIME_BOTS'			=> $this->config['lfwwh_disp_time_bots'],
			'LFWWH_DISP_TIME_FORMAT'		=> $this->config['lfwwh_disp_time_format'],
			'LFWWH_DISP_TIME_FORMAT_DEMO'	=> sprintf($this->language->lang('LFWWH_DISP_TIME_FORMAT_DEMO'), $this->get_formatted_time(time())),
			'LFWWH_DISP_IP'					=> $this->config['lfwwh_disp_ip'],
			'LFWWH_TIME_MODE'				=> $this->config['lfwwh_time_mode'],
			'LFWWH_PERIOD_OF_TIME_H'		=> $this->config['lfwwh_period_of_time_h'],
			'LFWWH_PERIOD_OF_TIME_M'		=> $this->config['lfwwh_period_of_time_m'],
			'LFWWH_PERIOD_OF_TIME_S'		=> $this->config['lfwwh_period_of_time_s'],
			'LFWWH_SORT_BY'					=> $this->config['lfwwh_sort_by'],
			'LFWWH_RECORD'					=> $this->config['lfwwh_record'],
			'LFWWH_RECORD_TIME_FORMAT'		=> $this->config['lfwwh_record_time_format'],
			'LFWWH_RECORD_TIME_FORMAT_DEMO'	=> sprintf($this->language->lang('LFWWH_DISP_TIME_FORMAT_DEMO'), $this->get_formatted_record_time(time())),
			'LFWWH_DISP_TEMPLATE_POS'		=> $this->config['lfwwh_disp_template_pos'],
			'LFWWH_API_MODE'				=> $this->config['lfwwh_api_mode'],
			'LFWWH_CLEAR_UP'				=> $this->config['lfwwh_clear_up'],
			'LFWWH_DISP_TEMPLATE_POS_ALL'	=> $this->config['lfwwh_disp_template_pos_all'],
			'LFWWH_CREATE_HIDDEN_INFO'		=> $this->config['lfwwh_create_hidden_info'],
			'LFWWH_USE_CACHE'				=> $this->config['lfwwh_use_cache'],
			'LFWWH_USE_ONLINE_TIME'			=> $this->config['lfwwh_use_online_time'],
			'LFWWH_CACHE_TIME'				=> $this->config['lfwwh_cache_time'],
			'LFWWH_CACHE_TIME_MAX'			=> $load_online_time,
			'LFWWH_RECORD_RESET_TIME'		=> ($this->config['lfwwh_record_reset_time'] != 1) ? sprintf($this->language->lang('LFWWH_RECORD_RESET_TIME_HINT'), $this->user->format_date($this->config['lfwwh_record_reset_time'])) : '',
			'U_ACTION'						=> $this->u_action,
		]);
	}

	private function get_formatted_time(int $timestamp): string
	{
		$text = $this->user->format_date($timestamp, $this->config['lfwwh_disp_time_format']);
		$text = str_replace(['$1', '$2', '$3'], [$this->language->lang('LFWWH_LAST1'), $this->language->lang('LFWWH_LAST2'), $this->language->lang('LFWWH_LAST3')], $text);
		return $text;
	}

	private function get_formatted_record_time(int $timestamp): string
	{
		return $this->user->format_date($timestamp, $this->config['lfwwh_record_time_format']);
	}

	private function add_note(string &$notes, $msg)
	{
		$notes .= (($notes != '') ? "\n" : "") . sprintf('<p>%s</p>', $msg);
	}
}
