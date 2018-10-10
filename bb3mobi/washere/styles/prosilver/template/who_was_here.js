var wwh_show_time_users;
var wwh_show_time_bots;

function wwh_show_hide_time(group) {
	var i = 0;
	if (group == 0) {
		var users = document.getElementsByClassName('wwh_time_users');
		var icons = document.getElementsByClassName('wwh_icon_show_time_users');
		wwh_show_time_users = !wwh_show_time_users;
		var style_display = ((wwh_show_time_users) ? "inline" : "none");
		var style_opacity = ((wwh_show_time_users) ? "1.0" : "0.5");
	}
	if (group == 1) {
		var users = document.getElementsByClassName('wwh_time_bots');
		var icons = document.getElementsByClassName('wwh_icon_show_time_bots');
		wwh_show_time_bots = !wwh_show_time_bots;
		var style_display = ((wwh_show_time_bots) ? "inline" : "none");
		var style_opacity = ((wwh_show_time_bots) ? "1.0" : "0.5");
	}
	for (i = 0; i < users.length; i ++) {
		users[i].style.display = style_display;
	}
	for (i = 0; i < icons.length; i ++) {
		icons[i].style.opacity = style_opacity;
	}
}
