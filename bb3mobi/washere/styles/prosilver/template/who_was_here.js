var wwh_show_time_users;
var wwh_show_time_bots;

function wwh_show_hide_time(group) {
	if (group == 0) {
		var time_users = document.getElementsByClassName('wwh_time_users'), i = 0;
		wwh_show_time_users = !wwh_show_time_users;
		for (i = 0; i < time_users.length; i ++) {
			time_users[i].style.display = ((wwh_show_time_users) ? "inline" : "none");
		}
		document.getElementById('wwh_icon_show_time_users').style.opacity = ((wwh_show_time_users) ? "1.0" : "0.5");
	}
	if (group == 1) {
		var time_bots = document.getElementsByClassName('wwh_time_bots'), i = 0;
		wwh_show_time_bots = !wwh_show_time_bots;
		for (i = 0; i < time_bots.length; i ++) {
			time_bots[i].style.display = ((wwh_show_time_bots) ? "inline" : "none");
		}
		document.getElementById('wwh_icon_show_time_bots').style.opacity = ((wwh_show_time_bots) ? "1.0" : "0.5");
	}
}
