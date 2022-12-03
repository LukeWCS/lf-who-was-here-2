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

var lfwwhIndex = {
	isShowInfo: {
		'users' : false,
		'bots' : false
	},
	ShowHide: function (e) {
		'use strict';

		lfwwhIndex.isShowInfo[e.data.ButtonType] = !lfwwhIndex.isShowInfo[e.data.ButtonType];
		$('.lfwwh_info_' + e.data.ButtonType.slice(0, 1)).css('display', (lfwwhIndex.isShowInfo[e.data.ButtonType] ? '' : 'none'));
		$('.lfwwh_button_' + e.data.ButtonType).css('opacity', (lfwwhIndex.isShowInfo[e.data.ButtonType] ? '1.0' : '0.5'));
	}
};

$(window).ready(function() {
	'use strict';

	$('.lfwwh_button_users'	).on('click'	, {ButtonType: 'users'}	, lfwwhIndex.ShowHide);
	$('.lfwwh_button_bots'	).on('click'	, {ButtonType: 'bots'}	, lfwwhIndex.ShowHide);
});
