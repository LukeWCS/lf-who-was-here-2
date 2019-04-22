/**
* 
* LF who was here (2.x) - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2013, nickvergessen, http://www.flying-bits.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

var lfwwh_show_info_users;
var lfwwh_show_info_bots;

function lfwwh_show_hide_info(group) {
	var i = 0;

	if (group == 0) {
		lfwwh_show_info_users = !lfwwh_show_info_users;
		var user_ary = document.getElementsByClassName('lfwwh_info_u');
		var button_ary = document.getElementsByClassName('lfwwh_button_users');
		var style_display = ((lfwwh_show_info_users) ? '' : 'none');
		var style_opacity = ((lfwwh_show_info_users) ? '1.0' : '0.5');
	}
	if (group == 1) {
		lfwwh_show_info_bots = !lfwwh_show_info_bots;
		var user_ary = document.getElementsByClassName('lfwwh_info_b');
		var button_ary = document.getElementsByClassName('lfwwh_button_bots');
		var style_display = ((lfwwh_show_info_bots) ? '' : 'none');
		var style_opacity = ((lfwwh_show_info_bots) ? '1.0' : '0.5');
	}
	for (i = 0; i < user_ary.length; i ++) {
		user_ary[i].style.display = style_display;
	}
	for (i = 0; i < button_ary.length; i ++) {
		button_ary[i].style.opacity = style_opacity;
	}
}
