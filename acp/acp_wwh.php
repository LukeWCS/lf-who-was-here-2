<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace bb3mobi\washere\acp;

/**
* @package acp
*/
class acp_wwh
{
	var $u_action;

	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

		add_form_key('wwh');
		$user->add_lang('ucp');
		$this->tpl_name = 'acp_wwh';
		$this->page_title = $user->lang['WWH_TITLE'];
		$submit = (isset($_POST['submit'])) ? true : false;

		if ($submit)
		{
			if (!check_form_key('wwh'))
			{
				trigger_error('FORM_INVALID');
			}

			set_config('wwh_disp_bots', request_var('wwh_disp_bots', 0));
			set_config('wwh_disp_guests', request_var('wwh_disp_guests', 0));
			set_config('wwh_disp_hidden', request_var('wwh_disp_hidden', 0));
			set_config('wwh_disp_time', request_var('wwh_disp_time', 0));
			set_config('wwh_disp_time_format', request_var('wwh_disp_time_format', 'H:i'));
			set_config('wwh_disp_ip', request_var('wwh_disp_ip', 0));
			set_config('wwh_version', request_var('wwh_version', 0));
			set_config('wwh_del_time_h', request_var('wwh_del_time_h', 0));
			set_config('wwh_del_time_m', request_var('wwh_del_time_m', 0));
			set_config('wwh_del_time_s', request_var('wwh_del_time_s', 0));
			set_config('wwh_sort_by', request_var('wwh_sort_by', 0));
			set_config('wwh_record', request_var('wwh_record', 0));
			set_config('wwh_record_timestamp', request_var('wwh_record_timestamp', 'D j. M Y'));
			if (request_var('wwh_reset', 0) > 0)
			{
				set_config('wwh_record_ips', 1);
				set_config('wwh_record_time', time());
				set_config('wwh_reset_time', time());
			}
			trigger_error($user->lang['WWH_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'WWH_MOD_VERSION'		=> sprintf($user->lang['WWH_INSTALLED'], $config['wwh_mod_version']),
			'WWH_DISP_BOTS'			=> $config['wwh_disp_bots'],
			'WWH_DISP_GUESTS'		=> $config['wwh_disp_guests'],
			'WWH_DISP_HIDDEN'		=> $config['wwh_disp_hidden'],
			'WWH_DISP_TIME'			=> $config['wwh_disp_time'],
			'WWH_DISP_TIME_FORMAT'	=> $config['wwh_disp_time_format'],
			'WWH_DISP_IP'			=> $config['wwh_disp_ip'],
			'WWH_VERSION'			=> $config['wwh_version'],
			'WWH_DEL_TIME_H'		=> $config['wwh_del_time_h'],
			'WWH_DEL_TIME_M'		=> $config['wwh_del_time_m'],
			'WWH_DEL_TIME_S'		=> $config['wwh_del_time_s'],
			'WWH_SORT_BY'			=> $config['wwh_sort_by'],
			'WWH_RECORD'			=> $config['wwh_record'],
			'WWH_RECORD_TIMESTAMP'	=> $config['wwh_record_timestamp'],
			'U_ACTION'				=> $this->u_action,
		));
	}

}
