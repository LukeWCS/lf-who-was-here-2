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
class acp_wwh_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $user, $config, $request, $template;

		add_form_key('wwh');
		$user->add_lang('ucp');
		$this->tpl_name = 'acp_wwh';
		$this->page_title = $user->lang['WWH_TITLE'];
		$submit = $request->is_set_post('submit');

		if ($submit)
		{
			if (!check_form_key('wwh'))
			{
				trigger_error('FORM_INVALID');
			}

			$config->set('wwh_disp_for_guests', $request->variable('wwh_disp_for_guests', 0));
			$config->set('wwh_disp_bots', $request->variable('wwh_disp_bots', 0));
			$config->set('wwh_disp_bots_only_admin', $request->variable('wwh_disp_bots_only_admin', 0));
			$config->set('wwh_disp_guests', $request->variable('wwh_disp_guests', 0));
			$config->set('wwh_disp_hidden', $request->variable('wwh_disp_hidden', 0));
			$config->set('wwh_disp_time', $request->variable('wwh_disp_time', 0));
			$config->set('wwh_disp_time_format', $request->variable('wwh_disp_time_format', 'H:i'));
			$config->set('wwh_disp_ip', $request->variable('wwh_disp_ip', 0));
			$config->set('wwh_disp_template_pos', $request->variable('wwh_disp_template_pos', 0));
			$config->set('wwh_version', $request->variable('wwh_version', 0));
			$config->set('wwh_del_time_h', $request->variable('wwh_del_time_h', 0));
			$config->set('wwh_del_time_m', $request->variable('wwh_del_time_m', 0));
			$config->set('wwh_del_time_s', $request->variable('wwh_del_time_s', 0));
			$config->set('wwh_sort_by', $request->variable('wwh_sort_by', 0));
			$config->set('wwh_record', $request->variable('wwh_record', 0));
			$config->set('wwh_record_timestamp', $request->variable('wwh_record_timestamp', 'D j. M Y'));
			if ($request->variable('wwh_reset', 0) > 0)
			{
				$config->set('wwh_record_ips', 1);
				$config->set('wwh_record_time', time());
				$config->set('wwh_reset_time', time());
			}
			trigger_error($user->lang['WWH_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$template->assign_vars(array(
			'WWH_MOD_VERSION'			=> sprintf($user->lang['WWH_INSTALLED'], $config['wwh_mod_version']),
			'WWH_DISP_FOR_GUESTS'		=> $config['wwh_disp_for_guests'],
			'WWH_DISP_BOTS'				=> $config['wwh_disp_bots'],
			'WWH_DISP_BOTS_ONLY_ADMIN'	=> $config['wwh_disp_bots_only_admin'],
			'WWH_DISP_GUESTS'			=> $config['wwh_disp_guests'],
			'WWH_DISP_HIDDEN'			=> $config['wwh_disp_hidden'],
			'WWH_DISP_TIME'				=> $config['wwh_disp_time'],
			'WWH_DISP_TIME_FORMAT'		=> $config['wwh_disp_time_format'],
			'WWH_DISP_IP'				=> $config['wwh_disp_ip'],
			'WWH_DISP_TEMPLATE_POS'		=> $config['wwh_disp_template_pos'],
			'WWH_VERSION'				=> $config['wwh_version'],
			'WWH_DEL_TIME_H'			=> $config['wwh_del_time_h'],
			'WWH_DEL_TIME_M'			=> $config['wwh_del_time_m'],
			'WWH_DEL_TIME_S'			=> $config['wwh_del_time_s'],
			'WWH_SORT_BY'				=> $config['wwh_sort_by'],
			'WWH_RECORD'				=> $config['wwh_record'],
			'WWH_RECORD_TIMESTAMP'		=> $config['wwh_record_timestamp'],
			'U_ACTION'					=> $this->u_action,
		));
	}

}
