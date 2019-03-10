<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : en
* Lang_ver     : 2.0.0
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
	'LFWWH_NAV_TITLE'					=> 'Who was here? (Gen 4)',
	'LFWWH_NAV_CONFIG'					=> 'Settings',
	// config head
	'LFWWH_CONFIG_TITLE'				=> 'Who was here? [%s]',
	'LFWWH_INSTALLED' 					=> 'Installed version: %s &bull; Discussion: <a href="https://www.phpbb.de/community/viewtopic.php?f=149&t=241976">Topic on phpbb.de</a>',
	// config section 1
	'LFWWH_SECTION_PERMISSIONS'			=> 'Permissions',
	'LFWWH_USE_PERMISSIONS'				=> 'Use the permission system of phpBB',
	'LFWWH_USE_PERMISSIONS_EXP'			=> 'Enables you to specify for each user group separately, to what extent the display should be made. The rights can be set as follows: "PERMISSIONS" » Group permissions » [user group] » User permissions » Advanced Permissions » Profile".',
	// config section 2
	'LFWWH_SECTION_DISP_1'				=> 'Display settings 1',
	'LFWWH_DISP_FOR_GUESTS'				=> 'Display for guests',
	'LFWWH_DISP_FOR_GUESTS_EXP'			=> 'Determines what guests can see. “Statistics” shows only the anonymous numbers and “Nothing” completely turns off the WWH display for guests.',
	'LFWWH_DISP_FOR_GUESTS_1'			=> 'Members and statistics',
	'LFWWH_DISP_FOR_GUESTS_0'			=> 'Statistics',
	'LFWWH_DISP_FOR_GUESTS_2'			=> 'Nothing',
	'LFWWH_DISP_BOTS'					=> 'Show bots',
	'LFWWH_DISP_BOTS_EXP'				=> 'Some user might wonder what bots are and fear them.',
	'LFWWH_DISP_BOTS_1'					=> 'With the users',
	'LFWWH_DISP_BOTS_2'					=> 'On a separate line',
	'LFWWH_DISP_BOTS_0'					=> 'No',
	'LFWWH_DISP_BOTS_ONLY_ADMIN'		=> 'Show the bot names only to administrators',
	'LFWWH_DISP_BOTS_ONLY_ADMIN_EXP'	=> 'Only administrators can see the names of the bots. The number of bots will continue to be displayed to everyone.',
	'LFWWH_DISP_GUESTS'					=> 'Show guests',
	'LFWWH_DISP_GUESTS_EXP'				=> 'The number of guests is displayed.',
	'LFWWH_DISP_HIDDEN'					=> 'Show invisible users',
	'LFWWH_DISP_HIDDEN_EXP'				=> 'Invisible users are also displayed in the user list. (Permission necessary, as with “Who is online”.)',
	'LFWWH_DISP_TIME'					=> 'Show time of users',
	'LFWWH_DISP_TIME_EXP'				=> '“On hover” also displays a time symbol with which the times can also be displayed directly. Helpful for smartphones and tablet computers. (All user see it or none, no special function for Admins.)',
	'LFWWH_DISP_TIME_1'					=> 'Behind the name',
	'LFWWH_DISP_TIME_2'					=> 'On hover',
	'LFWWH_DISP_TIME_0'					=> 'No',
	'LFWWH_DISP_TIME_BOTS'				=> 'Show time of bots',
	'LFWWH_DISP_TIME_FORMAT'			=> 'Timeformat',
	'LFWWH_DISP_TIME_FORMAT_EXP'		=> 'The format corresponds to the syntax of the PHP function <a href="http://www.php.net/date">date()</a>.',
	'LFWWH_DISP_IP'						=> 'Show user IP',
	'LFWWH_DISP_IP_EXP'					=> 'The IP is displayed behind the time. (Just for the users with administrative permissions, as with “Who is online”.)',
	// config section 3
	'LFWWH_SECTION_DISP_2'				=> 'Display settings 2',
	'LFWWH_TIME_MODE'					=> 'Displaying users of ...',
	'LFWWH_TIME_MODE_EXP'				=> 'Displaying users of today, or of the period set in the next option.',
	'LFWWH_TIME_MODE_1'					=> 'Today',
	'LFWWH_TIME_MODE_0'					=> 'Period of time',
	'LFWWH_SORT_BY'						=> 'Sort users by',
	'LFWWH_SORT_BY_EXP'					=> 'This determines the order in which users are displayed.',
	'LFWWH_SORT_BY_0'					=> 'Username A -> Z',
	'LFWWH_SORT_BY_1'					=> 'Username Z -> A',
	'LFWWH_SORT_BY_2'					=> 'Time of visit ascending',
	'LFWWH_SORT_BY_3'					=> 'Time of visit descending',
	'LFWWH_SORT_BY_4'					=> 'User-ID ascending',
	'LFWWH_SORT_BY_5'					=> 'User-ID descending',
	'LFWWH_RECORD'						=> 'Record',
	'LFWWH_RECORD_EXP'					=> 'Show and save the visitor record.',
	'LFWWH_RECORD_TIME_FORMAT'			=> 'Dateformat for the record',
	'LFWWH_DISP_TEMPLATE_POS'			=> 'Position of the display',
	'LFWWH_DISP_TEMPLATE_POS_EXP'		=> 'Determines where to place the WWH display in the Online/Statistic section. “Up” is the position above this section and “Down” is the position below.',
	'LFWWH_DISP_TEMPLATE_POS_0'			=> 'Top',
	'LFWWH_DISP_TEMPLATE_POS_2'			=> 'Before birthdays',
	'LFWWH_DISP_TEMPLATE_POS_1'			=> 'Bottom',
	// config section 4
	'LFWWH_SECTION_OTHERS'				=> 'Others',
	'LFWWH_USE_ONLINE_TIME'				=> 'Update with the view online time span',
	'LFWWH_USE_ONLINE_TIME_EXP'			=> 'When enabled, the following setting is used for the update interval: “GENERAL » SERVER CONFIGURATION » Load settings » General settings » View online time span”. This corresponds to the standard behavior of WWH.',
	'LFWWH_CACHE_TIME'					=> 'Interval of the update',
	'LFWWH_CACHE_TIME_EXP'				=> 'The interval determines how often the display of the statistics and user list is updated.',
	'LFWWH_API_MODE'					=> 'API mode',
	'LFWWH_API_MODE_EXP'				=> 'This deactivates the display of WWH and only creates the template variables. This mode is for forums where WWH is already represented by other extensions (such as "Stat Block").',
	'LFWWH_CLEAR_UP'					=> 'Automatically clean up deleted users',
	'LFWWH_CLEAR_UP_EXP'				=> 'If user accounts are deleted, the table and display of WWH are also immediately cleared.',
	'LFWWH_DISP_TEMPLATE_POS_ALL'		=> 'Show all template positions at the same time',	
	'LFWWH_DISP_TEMPLATE_POS_ALL_EXP'	=> 'WWH is displayed on all positions at the same time. This is only for testing and should be disabled during normal operation.',
	// config section 5
	'LFWWH_SECTION_RESET'				=> 'Reset',
	'LFWWH_DEFAULTS'					=> 'Reset settings',
	'LFWWH_DEFAULTS_EXP'				=> 'Resets all settings of this page to the installation standard of WWH. (Does not affect “Reset record”)',
	'LFWWH_DEFAULTS_BUTTON'				=> 'Defaults',
	'LFWWH_RESET'						=> 'Reset visitor record',
	'LFWWH_RESET_EXP'					=> 'Resets time and counter for the visitor record.',
	// messages
	'LFWWH_SAVED_SETTINGS'				=> 'Who was here: Configuration updated successfully.',
	'LFWWH_RESET_TRUE'					=> 'Who was here: If you submit this form, the visitor record will be reseted.', // \n is the beginning of a new line
	'LFWWH_CLEANED_UP'					=> 'Who was here: Display has been cleaned up.',
));
