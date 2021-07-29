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
	if (group == 0) {
		lfwwhIndex.isShowUsersInfo = !lfwwhIndex.isShowUsersInfo;
		$('.lfwwh_info_u').css('display', (lfwwhIndex.isShowUsersInfo ? '' : 'none'));
		$('.lfwwh_button_users').css('opacity', (lfwwhIndex.isShowUsersInfo ? '1.0' : '0.5'));
	}
	if (group == 1) {
		lfwwhIndex.isShowBotsInfo = !lfwwhIndex.isShowBotsInfo;
		$('.lfwwh_info_b').css('display', (lfwwhIndex.isShowBotsInfo ? '' : 'none'));
		$('.lfwwh_button_bots').css('opacity', (lfwwhIndex.isShowBotsInfo ? '1.0' : '0.5'));
	}
};
