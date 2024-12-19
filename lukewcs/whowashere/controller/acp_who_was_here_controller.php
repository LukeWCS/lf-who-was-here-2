<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2010, nickvergessen
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\whowashere\controller;

class acp_who_was_here_controller
{
	protected object $common;
	protected object $language;
	protected object $template;
	protected object $request;
	protected object $config;
	protected object $user;
	protected object $cache;
	protected object $ext_manager;

	public    string $u_action;

	public function __construct(
		$common,
		\phpbb\language\language $language,
		\phpbb\template\template $template,
		\phpbb\request\request $request,
		\phpbb\config\config $config,
		\phpbb\user $user,
		\phpbb\cache\driver\driver_interface $cache,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->common		= $common;
		$this->language		= $language;
		$this->template		= $template;
		$this->request		= $request;
		$this->config		= $config;
		$this->user			= $user;
		$this->cache		= $cache;
		$this->ext_manager	= $ext_manager;
	}

	public function module_settings()
	{
		$notes = [];
		$this->language->add_lang(['acp_who_was_here', 'acp_who_was_here_lang_author', 'who_was_here'], 'lukewcs/whowashere');

		$this->common->u_action = $this->u_action;
		$this->common->set_meta_template_vars('LFWWH', 'LukeWCS');

		if ($this->request->is_set_post('submit'))
		{
			$this->common->check_form_key_error('lukewcs_whowashere');

			$delete_cache = ($this->request->variable('lfwwh_sort_by', 0) != $this->config['lfwwh_sort_by']);

			/* LFWWH_SECTION_PERMISSIONS */
			$this->config->set('lfwwh_admin_mode'				, $this->request->variable('lfwwh_admin_mode', 0));
			$this->config->set('lfwwh_use_permissions'			, $this->request->variable('lfwwh_use_permissions', 0));

			$perm_for_guests =	$this->request->variable('lfwwh_perm_for_guests_stats', 0)	? 1 : 0;
			$perm_for_guests +=	$this->request->variable('lfwwh_perm_for_guests_record', 0)	? 2 : 0;
			$perm_for_guests +=	$this->request->variable('lfwwh_perm_for_guests_users', 0)	? 4 : 0;
			$perm_for_guests +=	$this->request->variable('lfwwh_perm_for_guests_bots', 0)	? 8 : 0;
			$this->config->set('lfwwh_perm_for_guests'			, $perm_for_guests);

			$perm_for_bots =	$this->request->variable('lfwwh_perm_for_bots_stats', 0)	? 1 : 0;
			$perm_for_bots +=	$this->request->variable('lfwwh_perm_for_bots_record', 0)	? 2 : 0;
			$perm_for_bots +=	$this->request->variable('lfwwh_perm_for_bots_users', 0)	? 4 : 0;
			$perm_for_bots +=	$this->request->variable('lfwwh_perm_for_bots_bots', 0)		? 8 : 0;
			$this->config->set('lfwwh_perm_for_bots'			, $perm_for_bots);

			/* LFWWH_SECTION_DISP_1 */
			$this->config->set('lfwwh_disp_reg_users'			, $this->request->variable('lfwwh_disp_reg_users', 0));
			$this->config->set('lfwwh_disp_hidden'				, $this->request->variable('lfwwh_disp_hidden', 0));
			$this->config->set('lfwwh_disp_bots'				, $this->request->variable('lfwwh_disp_bots', 0));
			$this->config->set('lfwwh_disp_guests'				, $this->request->variable('lfwwh_disp_guests', 0));
			$this->config->set('lfwwh_disp_time_users'			, $this->request->variable('lfwwh_disp_time_users', 0));
			$this->config->set('lfwwh_disp_time_bots'			, $this->request->variable('lfwwh_disp_time_bots', 0));
			$this->config->set('lfwwh_disp_time_format'			, $this->request->variable('lfwwh_disp_time_format', ''));
			$this->config->set('lfwwh_disp_ip'					, $this->request->variable('lfwwh_disp_ip', 0));

			/* LFWWH_SECTION_DISP_2 */
			$this->config->set('lfwwh_time_mode'				, $this->request->variable('lfwwh_time_mode', 0));
			$this->config->set('lfwwh_period_of_time_h'			, $this->request->variable('lfwwh_period_of_time_h', 0));
			$this->config->set('lfwwh_period_of_time_m'			, $this->request->variable('lfwwh_period_of_time_m', 0));
			$this->config->set('lfwwh_period_of_time_s'			, $this->request->variable('lfwwh_period_of_time_s', 0));
			$this->config->set('lfwwh_sort_by'					, $this->request->variable('lfwwh_sort_by', 0));
			$this->config->set('lfwwh_record'					, $this->request->variable('lfwwh_record', 0));
			$this->config->set('lfwwh_record_time_format'		, $this->request->variable('lfwwh_record_time_format', ''));
			$this->config->set('lfwwh_template_pos'				, $this->request->variable('lfwwh_template_pos', 0));

			/* LFWWH_SECTION_OTHERS */
			$this->config->set('lfwwh_api_mode'					, $this->request->variable('lfwwh_api_mode', 0));
			$this->config->set('lfwwh_clear_up'					, $this->request->variable('lfwwh_clear_up', 0));
			$this->config->set('lfwwh_template_pos_all'			, $this->request->variable('lfwwh_template_pos_all', 0));
			$this->config->set('lfwwh_create_hidden_info'		, $this->request->variable('lfwwh_create_hidden_info', 0));

			/* LFWWH_SECTION_LOAD_SETTINGS */
			$this->config->set('lfwwh_use_cache'				, $this->request->variable('lfwwh_use_cache', 0));
			$this->config->set('lfwwh_use_online_time'			, $this->request->variable('lfwwh_use_online_time', 0));
			$this->config->set('lfwwh_cache_time'				, $this->request->variable('lfwwh_cache_time', 0));

			/* LFWWH_SECTION_RESET */
			if ($this->request->variable('lfwwh_record_reset'	, 0) > 0)
			{
				$this->config->set('lfwwh_record_ips', 1);
				$this->config->set('lfwwh_record_time', time());
				$this->config->set('lfwwh_record_reset_time', time());
			}

			/* config end */
			if ($this->config['lfwwh_use_cache'] && $delete_cache)
			{
				$this->cache->destroy("_lf_who_was_here");
			}
			trigger_error($this->language->lang('LFWWH_MSG_SAVED_SETTINGS') . adm_back_link($this->u_action));
		}

		$lang_outdated_msg	= $this->common->lang_ver_check_msg('LFWWH_LANG_VER', 'LFWWH_MSG_LANGUAGEPACK_OUTDATED');
		if ($lang_outdated_msg)
		{
			$notes[] = $lang_outdated_msg;
		}

		$load_online_time = ($this->config['load_online_time'] >= 1) ? $this->config['load_online_time'] : 1;
		if ($this->config['lfwwh_cache_time'] > $load_online_time)
		{
			$this->config->set('lfwwh_cache_time', $load_online_time);
		}

		$this->template->assign_vars([
			'LFWWH_NOTES'							=> $notes,

			/* LFWWH_SECTION_PERMISSIONS */
			'LFWWH_ADMIN_MODE'						=> $this->config['lfwwh_admin_mode'],
			'LFWWH_USE_PERMISSIONS'					=> $this->config['lfwwh_use_permissions'],
			'LFWWH_PERM_FOR_GUESTS'					=> $this->config['lfwwh_perm_for_guests'],
			'LFWWH_PERM_FOR_BOTS'					=> $this->config['lfwwh_perm_for_bots'],

			/* LFWWH_SECTION_DISP_1 */
			'LFWWH_DISP_REG_USERS'					=> $this->config['lfwwh_disp_reg_users'],
			'LFWWH_DISP_HIDDEN'						=> $this->config['lfwwh_disp_hidden'],
			'LFWWH_DISP_BOTS_OPTIONS'				=> $this->select_struct((int) $this->config['lfwwh_disp_bots'], [
				'LFWWH_DISP_BOTS_OWN_LINE' 			=> 2,
				'LFWWH_DISP_BOTS_WITH_USERS'		=> 1,
				'LFWWH_DISP_BOTS_DISABLED'			=> 0,
			]),
			'LFWWH_DISP_GUESTS'						=> $this->config['lfwwh_disp_guests'],
			'LFWWH_DISP_TIME_USERS_OPTIONS'			=> $this->select_struct((int) $this->config['lfwwh_disp_time_users'], [
				'LFWWH_DISP_AS_TOOLTIP'				=> 2,
				'LFWWH_DISP_BEHIND_NAME'			=> 1,
				'LFWWH_DISP_DISABLED'				=> 0,
			]),
			'LFWWH_DISP_TIME_BOTS_OPTIONS'			=> $this->select_struct((int) $this->config['lfwwh_disp_time_bots'], [
				'LFWWH_DISP_AS_TOOLTIP'				=> 2,
				'LFWWH_DISP_BEHIND_NAME'			=> 1,
				'LFWWH_DISP_DISABLED'				=> 0,
			]),
			'LFWWH_DISP_TIME_FORMAT'				=> $this->config['lfwwh_disp_time_format'],
			'LFWWH_DISP_TIME_FORMAT_DEMO'			=> $this->language->lang('LFWWH_DISP_TIME_FORMAT_DEMO', $this->get_formatted_time(time())),
			'LFWWH_DISP_IP_OPTIONS'					=> $this->select_struct((int) $this->config['lfwwh_disp_ip'], [
				'LFWWH_DISP_AS_TOOLTIP'				=> 2,
				'LFWWH_DISP_BEHIND_NAME'			=> 1,
				'LFWWH_DISP_DISABLED'				=> 0,
			]),

			/* LFWWH_SECTION_DISP_2 */
			'LFWWH_TIME_MODE_OPTIONS'				=> $this->select_struct((int) $this->config['lfwwh_time_mode'], [
				'LFWWH_TIME_MODE_TODAY'				=> 1,
				'LFWWH_TIME_MODE_PERIOD'			=> 0,
			]),
			'LFWWH_PERIOD_OF_TIME_H'				=> $this->config['lfwwh_period_of_time_h'],
			'LFWWH_PERIOD_OF_TIME_M'				=> $this->config['lfwwh_period_of_time_m'],
			'LFWWH_PERIOD_OF_TIME_S'				=> $this->config['lfwwh_period_of_time_s'],
			'LFWWH_SORT_BY_OPTIONS'					=> $this->select_struct((int) $this->config['lfwwh_sort_by'], [
				'LFWWH_SORT_BY_NAME_AZ'				=> 0,
				'LFWWH_SORT_BY_NAME_ZA'				=> 1,
				'LFWWH_SORT_BY_VISIT_ASC'			=> 2,
				'LFWWH_SORT_BY_VISIT_DESC'			=> 3,
				'LFWWH_SORT_BY_ID_ASC'				=> 4,
				'LFWWH_SORT_BY_ID_DESC'				=> 5,
			]),
			'LFWWH_RECORD'							=> $this->config['lfwwh_record'],
			'LFWWH_RECORD_TIME_FORMAT'				=> $this->config['lfwwh_record_time_format'],
			'LFWWH_RECORD_TIME_FORMAT_DEMO'			=> $this->language->lang('LFWWH_DISP_TIME_FORMAT_DEMO', $this->get_formatted_record_time(time())),
			'LFWWH_TEMPLATE_POS_OPTIONS'			=> $this->select_struct((int) $this->config['lfwwh_template_pos'], [
				'LFWWH_TEMPLATE_POS_TOP'			=> 0,
				'LFWWH_TEMPLATE_POS_BEFORE_BDAYS'	=> 2,
				'LFWWH_TEMPLATE_POS_BOTTOM'			=> 1,
			]),

			/* LFWWH_SECTION_OTHERS */
			'LFWWH_API_MODE'						=> $this->config['lfwwh_api_mode'],
			'LFWWH_CLEAR_UP'						=> $this->config['lfwwh_clear_up'],
			'LFWWH_TEMPLATE_POS_ALL'				=> $this->config['lfwwh_template_pos_all'],
			'LFWWH_CREATE_HIDDEN_INFO'				=> $this->config['lfwwh_create_hidden_info'],

			/* LFWWH_SECTION_LOAD_SETTINGS */
			'LFWWH_USE_CACHE'						=> $this->config['lfwwh_use_cache'],
			'LFWWH_USE_ONLINE_TIME'					=> $this->config['lfwwh_use_online_time'],
			'LFWWH_CACHE_TIME'						=> $this->config['lfwwh_cache_time'],
			'LFWWH_CACHE_TIME_MAX'					=> $load_online_time,

			/* LFWWH_SECTION_RESET */
			'LFWWH_RECORD_RESET_TIME'				=> ($this->config['lfwwh_record_reset_time'] != 1) ? $this->language->lang('LFWWH_RECORD_RESET_TIME_HINT', $this->user->format_date($this->config['lfwwh_record_reset_time'])) : '',

			/* form elements */
			'U_ACTION'								=> $this->u_action,
		]);

		add_form_key('lukewcs_whowashere');
	}

	public function set_page_url($u_action)
	{
		$this->u_action = $u_action;
	}

	private function get_formatted_time(int $timestamp): string
	{
		$text = $this->user->format_date($timestamp, $this->config['lfwwh_disp_time_format']);
		return str_replace(['$1', '$2', '$3'], [$this->language->lang('LFWWH_LAST1'), $this->language->lang('LFWWH_LAST2'), $this->language->lang('LFWWH_LAST3')], $text);
	}

	private function get_formatted_record_time(int $timestamp): string
	{
		return $this->user->format_date($timestamp, $this->config['lfwwh_record_time_format']);
	}

	private function select_struct($cfg_value, array $options): array
	{
		$options_tpl = [];

		foreach ($options as $opt_key => $opt_value)
		{
			if (!is_array($opt_value))
			{
				$opt_value = [$opt_value];
			}
			$options_tpl[] = [
				'label'		=> $opt_key,
				'value'		=> $opt_value[0],
				'bold'		=> $opt_value[1] ?? false,
				'selected'	=> is_array($cfg_value) ? in_array($opt_value[0], $cfg_value) : $opt_value[0] == $cfg_value,
			];
		}

		return $options_tpl;
	}
}
