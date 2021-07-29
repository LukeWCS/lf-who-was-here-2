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

'use strict';

lfwwhACP.setState = function () {
	const enabledOpacity = "1.0";
	const disabledOpacity = "0.35";

	$('#lfwwh_opt_use_permissions').css('opacity', (
			$('#lfwwh_admin_mode_0').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_for_guests').css('opacity', (
			$('#lfwwh_admin_mode_0').prop('checked') &&
			$('#lfwwh_use_permissions_0').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_for_bots').css('opacity', (
			$('#lfwwh_admin_mode_0').prop('checked') &&
			$('#lfwwh_use_permissions_0').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_bots_only_admin').css('opacity', (
			!$('#lfwwh_disp_bots_0').prop('selected')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_time_bots').css('opacity', (
			!$('#lfwwh_disp_bots_0').prop('selected')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_time_format').css('opacity', (
			(
				!$('#lfwwh_disp_bots_0').prop('selected') &&
				!$('#lfwwh_disp_time_bots_0').prop('selected')
			) ||
			!$('#lfwwh_disp_time_0').prop('selected')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_period_of_time').css('opacity', (
			$('#lfwwh_time_mode_0').prop('selected')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_record_time_format').css('opacity', (
			$('#lfwwh_record_1').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_disp_template_pos').css('opacity', (
			$('#lfwwh_disp_template_pos_all_0').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_use_online_time').css('opacity', (
			$('#lfwwh_use_cache_1').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
	$('#lfwwh_opt_cache_time').css('opacity', (
			$('#lfwwh_use_cache_1').prop('checked') &&
			$('#lfwwh_use_online_time_0').prop('checked')
		) ? enabledOpacity : disabledOpacity
	);
};

lfwwhACP.setDefaults = function () {
	$('#lfwwh_admin_mode_0').prop('checked', true);
	$('#lfwwh_use_permissions_0').prop('checked', true);
	$('#lfwwh_disp_for_guests_0').prop('selected', true);
	$('#lfwwh_disp_for_bots_2').prop('selected', true);
	$('#lfwwh_disp_reg_users_1').prop('checked', true);
	$('#lfwwh_disp_hidden_1').prop('checked', true);
	$('#lfwwh_disp_bots_1').prop('selected', true);
	$('#lfwwh_disp_bots_only_admin_0').prop('checked', true);
	$('#lfwwh_disp_guests_1').prop('checked', true);
	$('#lfwwh_disp_time_1').prop('selected', true);
	$('#lfwwh_disp_time_bots_1').prop('selected', true);
	$('#lfwwh_disp_time_format').prop('value', '$1 G:i');
	$('#lfwwh_disp_ip_1').prop('selected', true);
	$('#lfwwh_time_mode_1').prop('selected', true);
	$('#lfwwh_period_of_time_h').prop('value', 24);
	$('#lfwwh_period_of_time_m').prop('value', 0);
	$('#lfwwh_period_of_time_s').prop('value', 0);
	$('#lfwwh_sort_by_3').prop('selected', true);
	$('#lfwwh_record_1').prop('checked', true);
	$('#lfwwh_record_time_format').prop('value', 'D j. M Y');
	$('#lfwwh_disp_template_pos_0').prop('selected', true);
	$('#lfwwh_api_mode_0').prop('checked', true);
	$('#lfwwh_clear_up_1').prop('checked', true);
	$('#lfwwh_disp_template_pos_all_0').prop('checked', true);
	$('#lfwwh_create_hidden_info_1').prop('checked', true);
	$('#lfwwh_use_cache_1').prop('checked', true);
	$('#lfwwh_use_online_time_1').prop('checked', true);
	$('#lfwwh_cache_time').prop('value', lfwwhACP.tpl.CacheTimeMax);
	lfwwhACP.setState();
};

lfwwhACP.confirmRecordReset = function () {
	if (!confirm(lfwwhACP.lang.MsgConfirmRecordReset))	{
		$('#lfwwh_record_reset_0').prop('checked', true);
	}
};

lfwwhACP.customFormReset = function () {
	$('#lfwwh_form').trigger("reset");
	lfwwhACP.setState();
};

window.onload = lfwwhACP.setState();
