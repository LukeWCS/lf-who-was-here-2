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

	document.getElementById("lfwwh_opt_use_permissions").style.opacity = (document.getElementById("lfwwh_admin_mode_0").checked) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_disp_for_guests").style.opacity = (document.getElementById("lfwwh_use_permissions_0").checked && document.getElementById("lfwwh_admin_mode_0").checked) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_disp_bots_only_admin").style.opacity = (!document.getElementById("lfwwh_disp_bots_0").selected) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_disp_time_bots").style.opacity = (!document.getElementById("lfwwh_disp_bots_0").selected) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_disp_time_format").style.opacity = (!document.getElementById("lfwwh_disp_time_0").selected || (!document.getElementById("lfwwh_disp_time_bots_0").selected && !document.getElementById("lfwwh_disp_bots_0").selected)) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_period_of_time").style.opacity = (document.getElementById("lfwwh_time_mode_0").selected) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_record_time_format").style.opacity = (document.getElementById("lfwwh_record_1").checked) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_disp_template_pos").style.opacity = (document.getElementById("lfwwh_disp_template_pos_all_0").checked) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_use_online_time").style.opacity = (document.getElementById("lfwwh_use_cache_1").checked) ? enabledOpacity : disabledOpacity;
	document.getElementById("lfwwh_opt_cache_time").style.opacity = (document.getElementById("lfwwh_use_cache_1").checked && document.getElementById("lfwwh_use_online_time_0").checked) ? enabledOpacity : disabledOpacity;
};

lfwwhACP.setDefaults = function () {
	document.getElementById("lfwwh_admin_mode_0").checked = true;
	document.getElementById("lfwwh_use_permissions_0").checked = true;
	document.getElementById("lfwwh_disp_for_guests_0").selected = true;
	document.getElementById("lfwwh_disp_reg_users_1").checked = true;
	document.getElementById("lfwwh_disp_hidden_1").checked = true;
	document.getElementById("lfwwh_disp_bots_1").selected = true;
	document.getElementById("lfwwh_disp_bots_only_admin_0").checked = true;
	document.getElementById("lfwwh_disp_guests_1").checked = true;
	document.getElementById("lfwwh_disp_time_1").selected = true;
	document.getElementById("lfwwh_disp_time_bots_1").selected = true;
	document.getElementById("lfwwh_disp_time_format").value = "$1 G:i";
	document.getElementById("lfwwh_disp_ip_1").selected = true;
	document.getElementById("lfwwh_time_mode_1").selected = true;
	document.getElementById("lfwwh_period_of_time_h").value = 24;
	document.getElementById("lfwwh_period_of_time_m").value = 0;
	document.getElementById("lfwwh_period_of_time_s").value = 0;
	document.getElementById("lfwwh_sort_by_3").selected = true;
	document.getElementById("lfwwh_record_1").checked = true;
	document.getElementById("lfwwh_record_time_format").value = "D j. M Y";
	document.getElementById("lfwwh_disp_template_pos_0").selected = true;
	document.getElementById("lfwwh_api_mode_0").checked = true;
	document.getElementById("lfwwh_clear_up_1").checked = true;
	document.getElementById("lfwwh_disp_template_pos_all_0").checked = true;
	document.getElementById("lfwwh_create_hidden_info_1").checked = true;
	document.getElementById("lfwwh_use_cache_1").checked = true;
	document.getElementById("lfwwh_use_online_time_1").checked = true;
	document.getElementById("lfwwh_cache_time").value = lfwwhACP.tpl.CacheTimeMax;
	lfwwhACP.setState();
};

lfwwhACP.confirmRecordReset = function () {
	var resetConfirm = confirm(lfwwhACP.lang.MsgConfirmRecordReset);

	if (!resetConfirm)	{
		document.getElementById("lfwwh_record_reset_0").checked = true;
	}
};

lfwwhACP.customFormReset = function () {
	document.getElementById("lfwwh_form").reset();
	lfwwhACP.setState();
};

window.onload = lfwwhACP.setState();
