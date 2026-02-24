/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2010, nickvergessen
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

(function ($) {
	'use strict';

	let isShown = {
		'info_users':	false,
		'info_bots':	false,
		'all_users':	false,
		'all_bots':		false,
	};

	function ShowHide(e) {
		isShown[e.data.ButtonType] = !isShown[e.data.ButtonType];
		$('.lfwwh_hidden_' + e.data.ButtonType).toggle(isShown[e.data.ButtonType]);
		$('.lfwwh_button_' + e.data.ButtonType).css('opacity', (isShown[e.data.ButtonType] ? '1.0' : '0.5'));
		if (e.data.ButtonType.slice(0, 4) == 'all_') {
			$('.lfwwh_prefix_' + e.data.ButtonType).toggle(!isShown[e.data.ButtonType]);
		}
	}

	$(function() {
		$('.lfwwh_button_info_users').on('click', {ButtonType: 'info_users'}, ShowHide);
		$('.lfwwh_button_info_bots'	).on('click', {ButtonType: 'info_bots'}	, ShowHide);
		$('.lfwwh_button_all_users'	).on('click', {ButtonType: 'all_users'}	, ShowHide);
		$('.lfwwh_button_all_bots'	).on('click', {ButtonType: 'all_bots'}	, ShowHide);
	});
})(jQuery);
