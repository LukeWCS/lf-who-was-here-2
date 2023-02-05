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

lfwwhACP.constants = Object.freeze({
	PermNothing		: 0,
	PermStats		: 1,
	PermUsers		: 2,
	PermStatsUsers	: 3,

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

lfwwhACP.setState = function () {
	'use strict';

	var c = lfwwhACP.constants;

	// LFWWH_SECTION_PERMISSIONS
	$('#lfwwh_opt_use_permissions').css('opacity', (
			$('input[name="lfwwh_admin_mode"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_perm_for_guests').css('opacity', (
			$('input[name="lfwwh_admin_mode"]').prop('checked') == false
			&& $('input[name="lfwwh_use_permissions"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_perm_for_bots').css('opacity', (
			$('input[name="lfwwh_admin_mode"]').prop('checked') == false
			&& $('input[name="lfwwh_use_permissions"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_perm_bots_only_admin').css('opacity', (
			$('input[name="lfwwh_admin_mode"]').prop('checked') == false
			&& $('select[name="lfwwh_disp_bots"]').prop('value') != c.BotsDisabled
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	// LFWWH_SECTION_DISP_1
	$('#lfwwh_opt_disp_time_bots').css('opacity', (
			$('select[name="lfwwh_disp_bots"]').prop('value') != c.BotsDisabled
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_disp_time_format').css('opacity', (
			(
				$('select[name="lfwwh_disp_bots"]').prop('value') != c.BotsDisabled
				&& $('select[name="lfwwh_disp_time_bots"]').prop('value') != c.DispDisabled
			)
			|| $('select[name="lfwwh_disp_time_users"]').prop('value') != c.DispDisabled
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	// LFWWH_SECTION_DISP_2
	$('#lfwwh_opt_period_of_time').css('opacity', (
			$('select[name="lfwwh_time_mode"]').prop('value') == c.TimeModePeriod
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_record_time_format').css('opacity', (
			$('input[name="lfwwh_record"]').prop('checked') == true
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_template_pos').css('opacity', (
			$('input[name="lfwwh_template_pos_all"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	// LFWWH_SECTION_OTHERS
	$('#lfwwh_opt_create_hidden_info').css('opacity', (
			$('select[name="lfwwh_disp_time_users"]').prop('value') == c.DispAsTooltip
			|| $('select[name="lfwwh_disp_time_bots"]').prop('value') == c.DispAsTooltip
			|| $('select[name="lfwwh_disp_ip"]').prop('value') == c.DispAsTooltip
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	// LFWWH_SECTION_LOAD_SETTINGS
	$('#lfwwh_opt_use_online_time').css('opacity', (
			$('input[name="lfwwh_use_cache"]').prop('checked') == true
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#lfwwh_opt_cache_time').css('opacity', (
			$('input[name="lfwwh_use_cache"]').prop('checked') == true
			&& $('input[name="lfwwh_use_online_time"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
};

lfwwhACP.setDefaults = function () {
	'use strict';

	var c = lfwwhACP.constants;

	// LFWWH_SECTION_PERMISSIONS
	$('input[name="lfwwh_admin_mode"]'				).prop('checked'	, false);
	$('input[name="lfwwh_use_permissions"]'			).prop('checked'	, false);
	$('select[name="lfwwh_perm_for_guests"]'		).prop('value'		, c.PermStats);
	$('select[name="lfwwh_perm_for_bots"]'			).prop('value'		, c.PermNothing);
	$('input[name="lfwwh_perm_bots_only_admin"]'	).prop('checked'	, false);
	// LFWWH_SECTION_DISP_1
	$('input[name="lfwwh_disp_reg_users"]'			).prop('checked'	, true);
	$('input[name="lfwwh_disp_hidden"]'				).prop('checked'	, true);
	$('select[name="lfwwh_disp_bots"]'				).prop('value'		, c.BotsWithUsers);
	$('input[name="lfwwh_disp_guests"]'				).prop('checked'	, true);
	$('select[name="lfwwh_disp_time_users"]'		).prop('value'		, c.DispBehindName);
	$('select[name="lfwwh_disp_time_bots"]'			).prop('value'		, c.DispBehindName);
	$('input[name="lfwwh_disp_time_format"]'		).prop('value'		, '$1 G:i');
	$('select[name="lfwwh_disp_ip"]'				).prop('value'		, c.DispBehindName);
	// LFWWH_SECTION_DISP_2
	$('select[name="lfwwh_time_mode"]'				).prop('value'		, c.TimeModeToday);
	$('input[name="lfwwh_period_of_time_h"]'		).prop('value'		, 24);
	$('input[name="lfwwh_period_of_time_m"]'		).prop('value'		, 0);
	$('input[name="lfwwh_period_of_time_s"]'		).prop('value'		, 0);
	$('select[name="lfwwh_sort_by"]'				).prop('value'		, c.SortByVisitDesc);
	$('input[name="lfwwh_record"]'					).prop('checked'	, true);
	$('input[name="lfwwh_record_time_format"]'		).prop('value'		, 'D j. M Y');
	$('select[name="lfwwh_template_pos"]'			).prop('value'		, c.PosTop);
	// LFWWH_SECTION_OTHERS
	$('input[name="lfwwh_api_mode"]'				).prop('checked'	, false);
	$('input[name="lfwwh_clear_up"]'				).prop('checked'	, true);
	$('input[name="lfwwh_template_pos_all"]'		).prop('checked'	, false);
	$('input[name="lfwwh_create_hidden_info"]'		).prop('checked'	, true);
	// LFWWH_SECTION_LOAD_SETTINGS
	$('input[name="lfwwh_use_cache"]'				).prop('checked'	, true);
	$('input[name="lfwwh_use_online_time"]'			).prop('checked'	, true);
	$('input[name="lfwwh_cache_time"]'				).prop('value'		, lfwwhACP.tpl.CacheTimeMax);

	lfwwhACP.setState();
};

lfwwhACP.confirmRecordReset = function () {
	'use strict';

	if ($('input[name="lfwwh_record_reset"]').prop('checked')) {
		requestAnimationFrame( function() {
			setTimeout( function() {
				if (!confirm(lfwwhACP.lang.MsgConfirmRecordReset)) {
					$('input[name="lfwwh_record_reset"]').prop('checked', false)
				}
			});
		});
	}
};

lfwwhACP.customFormReset = function () {
	'use strict';

	$('#lfwwh_form').trigger("reset");

	lfwwhACP.setState();
};

$(window).ready(function() {
	'use strict';

	lfwwhACP.setState();

	$('input[name="lfwwh_admin_mode"]'			).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_use_permissions"]'		).on('change'	, lfwwhACP.setState);
	$('select[name="lfwwh_disp_bots"]'			).on('change'	, lfwwhACP.setState);
	$('select[name="lfwwh_disp_time_users"]'	).on('change'	, lfwwhACP.setState);
	$('select[name="lfwwh_disp_time_bots"]'		).on('change'	, lfwwhACP.setState);
	$('select[name="lfwwh_disp_ip"]'			).on('change'	, lfwwhACP.setState);
	$('select[name="lfwwh_time_mode"]'			).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_record"]'				).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_template_pos_all"]'	).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_use_cache"]'			).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_use_online_time"]'		).on('change'	, lfwwhACP.setState);
	$('input[name="lfwwh_defaults"]'			).on('click'	, lfwwhACP.setDefaults);
	$('input[name="lfwwh_record_reset"]'		).on('change'	, lfwwhACP.confirmRecordReset);
	$('input[name="form_reset"]'				).on('click'	, lfwwhACP.customFormReset);
});
