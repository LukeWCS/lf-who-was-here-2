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

var lfwwhIndex = {};

lfwwhIndex.isShowUsersInfo = false;
lfwwhIndex.isShowBotsInfo = false;
lfwwhIndex.ShowHide = function (group) {
	var i = 0;

	if (group == 0) {
		lfwwhIndex.isShowUsersInfo = !lfwwhIndex.isShowUsersInfo;
		var spanInfoElements = document.getElementsByClassName('lfwwh_info_u');
		var spanButtons = document.getElementsByClassName('lfwwh_button_users');
		var styleDisplay = ((lfwwhIndex.isShowUsersInfo) ? '' : 'none');
		var styleOpacity = ((lfwwhIndex.isShowUsersInfo) ? '1.0' : '0.5');
	}
	if (group == 1) {
		lfwwhIndex.isShowBotsInfo = !lfwwhIndex.isShowBotsInfo;
		var spanInfoElements = document.getElementsByClassName('lfwwh_info_b');
		var spanButtons = document.getElementsByClassName('lfwwh_button_bots');
		var styleDisplay = ((lfwwhIndex.isShowBotsInfo) ? '' : 'none');
		var styleOpacity = ((lfwwhIndex.isShowBotsInfo) ? '1.0' : '0.5');
	}
	for (i = 0; i < spanInfoElements.length; i ++) {
		spanInfoElements[i].style.display = styleDisplay;
	}
	for (i = 0; i < spanButtons.length; i ++) {
		spanButtons[i].style.opacity = styleOpacity;
	}
};
