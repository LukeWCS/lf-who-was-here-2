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

var lfwwh_show_time_users;
var lfwwh_show_time_bots;

function lfwwh_show_hide_info(group) {
	var i = 0;

	if (group == 0) {
		lfwwh_show_time_users = !lfwwh_show_time_users;
		var user = document.getElementsByClassName('lfwwh_info_u');
		var label = document.getElementsByClassName('lfwwh_label_users');
		var style_display = ((lfwwh_show_time_users) ? "" : "none");
		var style_opacity = ((lfwwh_show_time_users) ? "1.0" : "0.5");
	}
	if (group == 1) {
		lfwwh_show_time_bots = !lfwwh_show_time_bots;
		var user = document.getElementsByClassName('lfwwh_info_b');
		var label = document.getElementsByClassName('lfwwh_label_bots');
		var style_display = ((lfwwh_show_time_bots) ? "" : "none");
		var style_opacity = ((lfwwh_show_time_bots) ? "1.0" : "0.5");
	}
	for (i = 0; i < user.length; i ++) {
		user[i].style.display = style_display;
	}
	for (i = 0; i < label.length; i ++) {
		label[i].style.opacity = style_opacity;
	}
}
