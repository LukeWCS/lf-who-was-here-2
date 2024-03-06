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

class LukeWCSphpBBConfirmBox {
/*
* phpBB ConfirmBox class for checkboxes and yes/no radio buttons - v1.4.3
* @copyright (c) 2023, LukeWCS, https://www.wcsaga.org
* @license GNU General Public License, version 2 (GPL-2.0-only)
*/
	constructor(submitSelector, animDuration = 0) {
		let _this = this;
		this.$submitObject	= $(submitSelector);
		this.$formObject	= this.$submitObject.parents('form');
		this.animDuration	= animDuration;

		this.$formObject.find('div[id$="_confirmbox"]').each(function () {
			const elementName = this.id.replace('_confirmbox', '');

			$('input[name="' + elementName + '"]')				.on('change'	, _this.#Show);
			$('input[name^="' + elementName + '_confirm_"]')	.on('click'		, _this.#Button);
		});
		this.$formObject										.on('reset'		, _this.HideAll);
	}

	#Show = (e) => {
		const $elementObject	= $('input[name="' + e.target.name + '"]');
		const $confirmBoxObject	= $('div[id="' + e.target.name + '_confirmbox"]');

		if ($elementObject.prop('checked') != $confirmBoxObject.attr('data-default')) {
			this.#changeBoxState($elementObject, $confirmBoxObject, true);
		}
	}

	#Button = (e) => {
		const elementName		= e.target.name.replace(/_confirm_.*/, '');
		const $elementObject	= $('input[name="' + elementName + '"]');
		const $confirmBoxObject	= $('div[id="' + elementName + '_confirmbox"]');
		const elementType		= $elementObject.attr('type');

		if (e.target.name.endsWith('_confirm_no')) {
			if (elementType == 'checkbox') {
				$elementObject.prop('checked', $confirmBoxObject.attr('data-default'));
			} else if (elementType == 'radio') {
				$elementObject.filter('[value="' + ($confirmBoxObject.attr('data-default') ? '1' : '0') + '"]').prop('checked', true);
			}
		}
		this.#changeBoxState($elementObject, $confirmBoxObject, null);
	}

	HideAll = () => {
		const $elementObject	= this.$formObject.find('input.confirmbox_active');
		const $confirmBoxObject	= this.$formObject.find('div[id$="_confirmbox"]');

		this.#changeBoxState($elementObject, $confirmBoxObject, false);
	}

	#changeBoxState = ($elementObject, $confirmBoxObject, showBox) => {
		$elementObject		.prop('disabled', !!showBox);
		$elementObject		.toggleClass('confirmbox_active', !!showBox);
		$confirmBoxObject	[showBox ? 'show' : 'hide'](this.animDuration);
		this.$submitObject	.prop('disabled', showBox ?? this.$formObject.find('input.confirmbox_active').length);
	}
}

const constants = Object.freeze({
	BotsDisabled	: 0,
	BotsWithUsers	: 1,
	BotsOwnLine		: 2,

	DispDisabled	: 0,
	DispBehindName	: 1,
	DispAsTooltip	: 2,

	TimeModePeriod	: 0,
	TimeModeToday	: 1,

	SortByNameAZ	: 0,
	SortByNameZA	: 1,
	SortByVisitAsc	: 2,
	SortByVisitDesc	: 3,
	SortByIdAsc		: 4,
	SortByIdDesc	: 5,

	PosTop			: 0,
	PosBottom		: 1,
	PosBeforeBDays	: 2,

	OpacityEnabled	: '1.0',
	OpacityDisabled	: '0.35',
});
let confirmBox;

function setState() {
	const c = constants;

	// LFWWH_SECTION_PERMISSIONS
	dimOptionGroup('lfwwh_use_permissions',
		$('[name="lfwwh_admin_mode"]').prop('checked')
	);
	$('.simple_permissions').css('opacity',
		$('[name="lfwwh_admin_mode"]').prop('checked')
		|| $('[name="lfwwh_use_permissions"]').prop('checked')
		? c.OpacityDisabled : c.OpacityEnabled
	);
	// LFWWH_SECTION_DISP_1
	dimOptionGroup('lfwwh_disp_time_bots',
		$('[name="lfwwh_disp_bots"]').prop('value') == c.BotsDisabled
	);
	dimOptionGroup('lfwwh_disp_time_format',
		(
			$('[name="lfwwh_disp_bots"]').prop('value') == c.BotsDisabled
			|| $('[name="lfwwh_disp_time_bots"]').prop('value') == c.DispDisabled
		)
		&& $('[name="lfwwh_disp_time_users"]').prop('value') == c.DispDisabled
	);
	// LFWWH_SECTION_DISP_2
	dimOptionGroup('lfwwh_period_of_time_h',
		$('[name="lfwwh_time_mode"]').prop('value') != c.TimeModePeriod
	);
	dimOptionGroup('lfwwh_record_time_format',
		!$('[name="lfwwh_record"]').prop('checked')
	);
	dimOptionGroup('lfwwh_template_pos',
		$('[name="lfwwh_template_pos_all"]').prop('checked')
	);
	// LFWWH_SECTION_OTHERS
	dimOptionGroup('lfwwh_create_hidden_info',
		$('[name="lfwwh_disp_time_users"]').prop('value') != c.DispAsTooltip
		&& $('[name="lfwwh_disp_time_bots"]').prop('value') != c.DispAsTooltip
		&& $('[name="lfwwh_disp_ip"]').prop('value') != c.DispAsTooltip
	);
	// LFWWH_SECTION_LOAD_SETTINGS
	dimOptionGroup('lfwwh_use_online_time',
		!$('[name="lfwwh_use_cache"]').prop('checked')
	);
	dimOptionGroup('lfwwh_cache_time',
		!$('[name="lfwwh_use_cache"]').prop('checked')
		|| $('[name="lfwwh_use_online_time"]').prop('checked')
	);
};

function dimOptionGroup(elememtName, dimCondition) {
	const c = constants;

	$('[name="' + elememtName + '"]').parents('dl').css('opacity', dimCondition ? c.OpacityDisabled : c.OpacityEnabled);
}

function setDefaults() {
	const c = constants;

	// LFWWH_SECTION_PERMISSIONS
	setSwitch('input[name="lfwwh_admin_mode"]',							false);
	setSwitch('input[name="lfwwh_use_permissions"]',					false);
	setSwitch('input[name="lfwwh_perm_for_guests_stats"]',				true);
	setSwitch('input[name="lfwwh_perm_for_guests_record"]',				true);
	setSwitch('input[name="lfwwh_perm_for_guests_users"]',				false);
	setSwitch('input[name="lfwwh_perm_for_guests_bots"]',				false);
	setSwitch('input[name="lfwwh_perm_for_bots_stats"]',				false);
	setSwitch('input[name="lfwwh_perm_for_bots_record"]',				false);
	setSwitch('input[name="lfwwh_perm_for_bots_users"]',				false);
	setSwitch('input[name="lfwwh_perm_for_bots_bots"]',					false);

	// LFWWH_SECTION_DISP_1
	setSwitch('input[name="lfwwh_disp_reg_users"]',						true);
	setSwitch('input[name="lfwwh_disp_hidden"]',						true);
	$(        'select[name="lfwwh_disp_bots"]').prop('value',			c.BotsWithUsers);
	setSwitch('input[name="lfwwh_disp_guests"]',						true);
	$(        'select[name="lfwwh_disp_time_users"]').prop('value',		c.DispBehindName);
	$(        'select[name="lfwwh_disp_time_bots"]').prop('value',		c.DispBehindName);
	$(        'input[name="lfwwh_disp_time_format"]').prop('value',		'$1 G:i');
	$(        'select[name="lfwwh_disp_ip"]').prop('value',				c.DispBehindName);

	// LFWWH_SECTION_DISP_2
	$(        'select[name="lfwwh_time_mode"]').prop('value',			c.TimeModeToday);
	$(        'input[name="lfwwh_period_of_time_h"]').prop('value',		24);
	$(        'input[name="lfwwh_period_of_time_m"]').prop('value',		0);
	$(        'input[name="lfwwh_period_of_time_s"]').prop('value',		0);
	$(        'select[name="lfwwh_sort_by"]').prop('value',				c.SortByVisitDesc);
	setSwitch('input[name="lfwwh_record"]',								true);
	$(        'input[name="lfwwh_record_time_format"]').prop('value',	'D j. M Y');
	$(        'select[name="lfwwh_template_pos"]').prop('value',		c.PosTop);

	// LFWWH_SECTION_OTHERS
	setSwitch('input[name="lfwwh_api_mode"]',							false);
	setSwitch('input[name="lfwwh_clear_up"]',							true);
	setSwitch('input[name="lfwwh_template_pos_all"]',					false);
	setSwitch('input[name="lfwwh_create_hidden_info"]',					true);

	// LFWWH_SECTION_LOAD_SETTINGS
	setSwitch('input[name="lfwwh_use_cache"]',							true);
	setSwitch('input[name="lfwwh_use_online_time"]',					true);
	$(        'input[name="lfwwh_cache_time"]').prop('value',			lfwwhACP.tpl.CacheTimeMax);

	setState();
};

function setSwitch(selector, checked) {
	const $elementObject	= $(selector);
	const elementType		= $elementObject.attr('type');

	if (elementType == 'checkbox') {
		$elementObject.prop('checked', checked);
	} else if (elementType == 'radio') {
		$elementObject.filter('[value="' + (checked ? 1 : 0) + '"]').prop('checked', true);
	}
};

function customFormReset() {
	setTimeout(function() {
		setState();
	});
};

$(function() {
	$('input[name="lfwwh_admin_mode"]'			).on('change'	, setState);
	$('input[name="lfwwh_use_permissions"]'		).on('change'	, setState);
	$('select[name="lfwwh_disp_bots"]'			).on('change'	, setState);
	$('select[name="lfwwh_disp_time_users"]'	).on('change'	, setState);
	$('select[name="lfwwh_disp_time_bots"]'		).on('change'	, setState);
	$('select[name="lfwwh_disp_ip"]'			).on('change'	, setState);
	$('select[name="lfwwh_time_mode"]'			).on('change'	, setState);
	$('input[name="lfwwh_record"]'				).on('change'	, setState);
	$('input[name="lfwwh_template_pos_all"]'	).on('change'	, setState);
	$('input[name="lfwwh_use_cache"]'			).on('change'	, setState);
	$('input[name="lfwwh_use_online_time"]'		).on('change'	, setState);
	$('input[name="lfwwh_defaults"]'			).on('click'	, setDefaults);
	$('#lfwwh_form'								).on('reset'	, customFormReset);

	confirmBox = new LukeWCSphpBBConfirmBox('[name="submit"]', 300);
	setState();
});

})(jQuery);	// IIFE end
