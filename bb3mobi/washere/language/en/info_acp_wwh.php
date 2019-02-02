<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : en
* Lang_ver     : 1.4.1
* Lang_author  : LukeWCS
* Lang_tab_size: 4
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//
$lang = array_merge($lang, array(
	// navigation
	'WWH_TITLE'						=> 'Who was here?',
	'WWH_CONFIG'					=> 'Settings',
	// config head
	'WWH_CONFIG_TITLE'				=> 'Who was here? (%s)',
	'WWH_INSTALLED' 				=> 'Installed version: %s',
	'WWH_UPDATE_NEED'				=> '(Fork: <a href="https://www.phpbb.de/community/viewtopic.php?f=149&t=241976">Topic on phpbb.de</a> / Original: <a href="http://bb3.mobi/forum/viewtopic.php?t=66">BB3 Support</a>)',
	// config section 1
	'WWH_SECTION_PERMISSIONS'		=> 'Permissions',
	'WWH_USE_PERMISSIONS'			=> 'Use the permission system of phpBB',
	'WWH_USE_PERMISSIONS_EXP'		=> 'Enables you to specify for each user group separately, to what extent the display should be made. The rights can be set as follows: "PERMISSIONS" » Group permissions » [user group] » User permissions » Advanced Permissions » Profile".',
	// config section 2
	'WWH_SECTION_DISP_1'			=> 'Display settings 1',
	'WWH_DISP_FOR_GUESTS'			=> 'Display for guests',
	'WWH_DISP_FOR_GUESTS_EXP'		=> 'Determines what guests can see. “Statistics” shows only the anonymous numbers and “Nothing” completely turns off the WWH display for guests.',
	'WWH_DISP_FOR_GUESTS_1'			=> 'Members and statistics',
	'WWH_DISP_FOR_GUESTS_0'			=> 'Statistics',
	'WWH_DISP_FOR_GUESTS_2'			=> 'Nothing',
	'WWH_DISP_BOTS'					=> 'Show bots',
	'WWH_DISP_BOTS_EXP'				=> 'Some user might wonder what bots are and fear them.',
	'WWH_DISP_BOTS_1'				=> 'With the users',
	'WWH_DISP_BOTS_2'				=> 'On a separate line',
	'WWH_DISP_BOTS_0'				=> 'No',
	'WWH_DISP_BOTS_ONLY_ADMIN'		=> 'Show the bot names only to administrators',
	'WWH_DISP_BOTS_ONLY_ADMIN_EXP'	=> 'Only administrators can see the names of the bots. The number of bots will continue to be displayed to everyone.',
	'WWH_DISP_GUESTS'				=> 'Show guests',
	'WWH_DISP_GUESTS_EXP'			=> 'The number of guests is displayed.',
	'WWH_DISP_HIDDEN'				=> 'Show invisible users',
	'WWH_DISP_HIDDEN_EXP'			=> 'Invisible users are also displayed in the user list. (Permission necessary)',
	'WWH_DISP_TIME'					=> 'Show time of users',
	'WWH_DISP_TIME_EXP'				=> '“On hover” also displays a time symbol with which the times can also be displayed directly. Helpful for smartphones and tablet computers. (All user see it or none, no special function for Admins.)',
	'WWH_DISP_TIME_1'				=> 'Behind the name',
	'WWH_DISP_TIME_2'				=> 'On hover',
	'WWH_DISP_TIME_0'				=> 'No',
	'WWH_DISP_TIME_BOTS'			=> 'Show time of bots',
	'WWH_DISP_TIME_FORMAT'			=> 'Timeformat',
	'WWH_DISP_TIME_FORMAT_EXP'		=> 'The format corresponds to the syntax of the PHP function <a href="http://www.php.net/date">date()</a>.',
	'WWH_DISP_IP'					=> 'Show user-ip',
	'WWH_DISP_IP_EXP'				=> 'Just for the users with administrative permissions, as with “Who is online”.',
	// config section 3
	'WWH_SECTION_DISP_2'			=> 'Display settings 2',
	'WWH_VERSION'					=> 'Displaying users of ...',
	'WWH_VERSION_EXP'				=> 'Displaying users of today, or of the period set in the next option.',
	'WWH_VERSION1'					=> 'Today',
	'WWH_VERSION2'					=> 'Period of time',
	'WWH_SORT_BY'					=> 'Sort users by',
	'WWH_SORT_BY_EXP'				=> 'This determines the order in which users are displayed. (A change to this setting applies to the next update, which occurs every %s minutes.)',
	'WWH_SORT_BY_0'					=> 'Username A -> Z',
	'WWH_SORT_BY_1'					=> 'Username Z -> A',
	'WWH_SORT_BY_2'					=> 'Time of visit ascending',
	'WWH_SORT_BY_3'					=> 'Time of visit descending',
	'WWH_SORT_BY_4'					=> 'User-ID ascending',
	'WWH_SORT_BY_5'					=> 'User-ID descending',
	'WWH_USE_ONLINE_TIME'			=> 'Update with the view online time span',
	'WWH_USE_ONLINE_TIME_EXP'		=> 'When enabled, the refresh interval is set to “GENERAL » Load settings » View online time span”. This corresponds to the standard behavior of WWH.',
	'WWH_CACHE_TIME'				=> 'Interval of the update',
	'WWH_CACHE_TIME_EXP'			=> 'The interval determines how often the display of the statistics and user list is updated.',
	'WWH_RECORD'					=> 'Record',
	'WWH_RECORD_EXP'				=> 'Show and save the visitor record.',
	'WWH_RECORD_TIMESTAMP'			=> 'Dateformat for the record',
	'WWH_DISP_TEMPLATE_POS'			=> 'Position of the display',
	'WWH_DISP_TEMPLATE_POS_EXP'		=> 'Determines where to place the WWH display in the Online/Statistic section. “Up” is the position above this section and “Down” is the position below.',
	'WWH_DISP_TEMPLATE_POS_0'		=> 'Top',
	'WWH_DISP_TEMPLATE_POS_2'		=> 'Before birthdays',
	'WWH_DISP_TEMPLATE_POS_1'		=> 'Bottom',
	// config section 4
	'WWH_SECTION_OTHERS'			=> 'Others',
	'WWH_API_MODE'					=> 'API-Mode',
	'WWH_API_MODE_EXP'				=> 'If activated, the display of WWH will be turned off and only the template variables will be generated. This mode is intended for situations where the WWH display is already displayed by other extensions.',
	'WWH_DEFAULTS'					=> 'Reset settings',
	'WWH_DEFAULTS_EXP'				=> 'Resets all settings of this page to the installation standard of WWH. (Does not affect “Reset record”)',
	'WWH_DEFAULTS_BUTTON'			=> 'Defaults',
	'WWH_RESET'						=> 'Reset record',
	'WWH_RESET_EXP'					=> 'Resets time and counter for activity record.',
	// config messages
	'WWH_SAVED_SETTINGS'			=> 'Who was here: Configuration updated successfully.',
	'WWH_RESET_TRUE'				=> 'If you submit this form,\nthe record will be reseted.', // \n is the beginning of a new line
));
