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
lfwwhIndex.isShowInfo = {
	'users' : false,
	'bots' : false
};
lfwwhIndex.ShowHide = function (buttontype) {
	lfwwhIndex.isShowInfo[buttontype] = !lfwwhIndex.isShowInfo[buttontype];
	$('.lfwwh_info_' + buttontype.slice(0,1)).css('display', (lfwwhIndex.isShowInfo[buttontype] ? '' : 'none'));
	$('.lfwwh_button_' + buttontype).css('opacity', (lfwwhIndex.isShowInfo[buttontype] ? '1.0' : '0.5'));
};
