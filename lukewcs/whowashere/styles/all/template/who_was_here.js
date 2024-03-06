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

(function ($) {	// IIFE start

'use strict';

let isShowInfo = {
	'users':	false,
	'bots':		false
};

function ShowHide(e) {
	isShowInfo[e.data.ButtonType] = !isShowInfo[e.data.ButtonType];
	$('.lfwwh_info_' + e.data.ButtonType.slice(0, 1)).toggle(isShowInfo[e.data.ButtonType]);
	$('.lfwwh_button_' + e.data.ButtonType).css('opacity', (isShowInfo[e.data.ButtonType] ? '1.0' : '0.5'));
}

$(function() {
	$('.lfwwh_button_users'	).on('click', {ButtonType: 'users'}	, ShowHide);
	$('.lfwwh_button_bots'	).on('click', {ButtonType: 'bots'}	, ShowHide);
});

})(jQuery);	// IIFE end
