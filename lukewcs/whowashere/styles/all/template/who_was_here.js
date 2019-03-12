var lfwwh_show_time_users;
var lfwwh_show_time_bots;

function lfwwh_show_hide_time(group) {
	var i = 0;

	if (group == 0) {
		lfwwh_show_time_users = !lfwwh_show_time_users;
		var user = document.getElementsByClassName('lfwwh_time_users');
		var caption = document.getElementsByClassName('lfwwh_show_time_caption_users');
		var style_display = ((lfwwh_show_time_users) ? "" : "none");
		var style_opacity = ((lfwwh_show_time_users) ? "1.0" : "0.5");
	}
	if (group == 1) {
		lfwwh_show_time_bots = !lfwwh_show_time_bots;
		var user = document.getElementsByClassName('lfwwh_time_bots');
		var caption = document.getElementsByClassName('lfwwh_show_time_caption_bots');
		var style_display = ((lfwwh_show_time_bots) ? "" : "none");
		var style_opacity = ((lfwwh_show_time_bots) ? "1.0" : "0.5");
	}
	for (i = 0; i < user.length; i ++) {
		user[i].style.display = style_display;
	}
	for (i = 0; i < caption.length; i ++) {
		caption[i].style.opacity = style_opacity;
	}
}
