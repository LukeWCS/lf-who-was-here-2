<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lukewcs\whowashere\acp;

/**
* @package acp
*/
class acp_wwh_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $user, $config, $request, $template, $cache;
		$this->cache = $cache;
	
		add_form_key('lfwwh');
		$user->add_lang('ucp');
		$this->tpl_name = 'acp_wwh';
		$this->page_title = $user->lang['LFWWH_NAV_TITLE'] . ' - ' . $user->lang['LFWWH_NAV_CONFIG'];
		$submit = $request->is_set_post('submit');

		if ($submit)
		{
			if (!check_form_key('lfwwh'))
			{
				trigger_error('FORM_INVALID');
			}
			$delete_cache = (int) ($request->variable('lfwwh_sort_by', 0) != $config['lfwwh_sort_by']);
			$config->set('lfwwh_use_permissions'		, $request->variable('lfwwh_use_permissions', 0));
			$config->set('lfwwh_disp_for_guests'		, $request->variable('lfwwh_disp_for_guests', 0));
			$config->set('lfwwh_disp_bots'				, $request->variable('lfwwh_disp_bots', 0));
			$config->set('lfwwh_disp_bots_only_admin'	, $request->variable('lfwwh_disp_bots_only_admin', 0));
			$config->set('lfwwh_disp_guests'			, $request->variable('lfwwh_disp_guests', 0));
			$config->set('lfwwh_disp_hidden'			, $request->variable('lfwwh_disp_hidden', 0));
			$config->set('lfwwh_disp_time'				, $request->variable('lfwwh_disp_time', 0));
			$config->set('lfwwh_disp_time_bots'			, $request->variable('lfwwh_disp_time_bots', 0));
			$config->set('lfwwh_disp_time_format'		, $request->variable('lfwwh_disp_time_format', 'H:i'));
			$config->set('lfwwh_disp_ip'				, $request->variable('lfwwh_disp_ip', 0));
			$config->set('lfwwh_time_mode'				, $request->variable('lfwwh_time_mode', 0));
			$config->set('lfwwh_period_of_time_h'		, $request->variable('lfwwh_period_of_time_h', 0));
			$config->set('lfwwh_period_of_time_m'		, $request->variable('lfwwh_period_of_time_m', 0));
			$config->set('lfwwh_period_of_time_s'		, $request->variable('lfwwh_period_of_time_s', 0));
			$config->set('lfwwh_sort_by'				, $request->variable('lfwwh_sort_by', 0));
			$config->set('lfwwh_record'					, $request->variable('lfwwh_record', 0));
			$config->set('lfwwh_record_time_format'		, $request->variable('lfwwh_record_time_format', 'D j. M Y'));
			$config->set('lfwwh_disp_template_pos'		, $request->variable('lfwwh_disp_template_pos', 0));
			$config->set('lfwwh_use_online_time'		, $request->variable('lfwwh_use_online_time', 0));
			$config->set('lfwwh_cache_time'				, $request->variable('lfwwh_cache_time', 0));
			$config->set('lfwwh_api_mode'				, $request->variable('lfwwh_api_mode', 0));
			$config->set('lfwwh_clear_up'				, $request->variable('lfwwh_clear_up', 0));
			$config->set('lfwwh_disp_template_pos_all'	, $request->variable('lfwwh_disp_template_pos_all', 0));
			if ($request->variable('lfwwh_reset', 0) > 0)
			{
				$config->set('lfwwh_record_ips', 1);
				$config->set('lfwwh_record_time', time());
				$config->set('lfwwh_reset_time', time());
			}
			if ($delete_cache) 
			{
				$this->cache->destroy("_lf_who_was_here");
			}
			trigger_error($user->lang['LFWWH_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$load_online_time = (($config['load_online_time'] >= 1) ? $config['load_online_time'] : 1);
		if ($config['lfwwh_cache_time'] > $load_online_time)
		{
			$config->set('lfwwh_cache_time', $load_online_time);
		}

		$template->assign_vars(array(
			'LFWWH_INSTALLED_TEXT'			=> sprintf($user->lang['LFWWH_INSTALLED'], $config['lfwwh_ext_version']),
			'LFWWH_CONFIG_TITLE_TEXT'		=> sprintf($user->lang['LFWWH_CONFIG_TITLE'], 'LF who was here (Gen 4)'),
			'LFWWH_USE_PERMISSIONS'			=> $config['lfwwh_use_permissions'],
			'LFWWH_DISP_FOR_GUESTS'			=> $config['lfwwh_disp_for_guests'],
			'LFWWH_DISP_BOTS'				=> $config['lfwwh_disp_bots'],
			'LFWWH_DISP_BOTS_ONLY_ADMIN'	=> $config['lfwwh_disp_bots_only_admin'],
			'LFWWH_DISP_GUESTS'				=> $config['lfwwh_disp_guests'],
			'LFWWH_DISP_HIDDEN'				=> $config['lfwwh_disp_hidden'],
			'LFWWH_DISP_TIME'				=> $config['lfwwh_disp_time'],
			'LFWWH_DISP_TIME_BOTS'			=> $config['lfwwh_disp_time_bots'],
			'LFWWH_DISP_TIME_FORMAT'		=> $config['lfwwh_disp_time_format'],
			'LFWWH_DISP_IP'					=> $config['lfwwh_disp_ip'],
			'LFWWH_TIME_MODE'				=> $config['lfwwh_time_mode'],
			'LFWWH_PERIOD_OF_TIME_H'		=> $config['lfwwh_period_of_time_h'],
			'LFWWH_PERIOD_OF_TIME_M'		=> $config['lfwwh_period_of_time_m'],
			'LFWWH_PERIOD_OF_TIME_S'		=> $config['lfwwh_period_of_time_s'],
			'LFWWH_SORT_BY'					=> $config['lfwwh_sort_by'],
			'LFWWH_RECORD'					=> $config['lfwwh_record'],
			'LFWWH_RECORD_TIME_FORMAT'		=> $config['lfwwh_record_time_format'],
			'LFWWH_DISP_TEMPLATE_POS'		=> $config['lfwwh_disp_template_pos'],
			'LFWWH_USE_ONLINE_TIME'			=> $config['lfwwh_use_online_time'],
			'LFWWH_CACHE_TIME'				=> $config['lfwwh_cache_time'],
			'LFWWH_CACHE_TIME_MAX'			=> $load_online_time,
			'LFWWH_API_MODE'				=> $config['lfwwh_api_mode'],
			'LFWWH_CLEAR_UP'				=> $config['lfwwh_clear_up'],
			'LFWWH_DISP_TEMPLATE_POS_ALL'	=> $config['lfwwh_disp_template_pos_all'],
			'U_ACTION'						=> $this->u_action,
		));
	}
}
