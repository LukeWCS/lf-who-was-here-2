<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : en
* Lang_ver     : 1.3.2
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
	'WWH_UPDATE_NEED'				=> '(Fork: <a href="https://www.phpbb.de/community/viewtopic.php?f=149&t=241976">Topic on phpbb.de</a> Original: <a href="http://bb3.mobi/forum/viewtopic.php?t=66">BB3 Support</a>)',
	// config section 1
	'WWH_DISP_SET'					=> 'Display settings 1',
	'WWH_DISP_FOR_GUESTS'			=> 'Display for guests',
	'WWH_DISP_FOR_GUESTS_EXP'		=> 'Determines what guests can see. “Everything” shows the statistics and the users. “Statistics” only the anonymous numbers and “Nothing” turns off the WWH display completely.',
	'WWH_DISP_FOR_GUESTS_1'			=> 'Everything',
	'WWH_DISP_FOR_GUESTS_0'			=> 'Statistics',
	'WWH_DISP_FOR_GUESTS_2'			=> 'Nothing',
	'WWH_DISP_BOTS'					=> 'Show bots',
	'WWH_DISP_BOTS_EXP'				=> 'Some user might wonder what bots are and fear them.',
	'WWH_DISP_BOTS_STRING'			=> 'Show on a separate line',
	'WWH_DISP_BOTS_ONLY_ADMIN'		=> 'Show the bot names only to administrators',
	'WWH_DISP_BOTS_ONLY_ADMIN_EXP'	=> 'Display of the bot names is only available to administrators. (Not relevant if “Show bots” is set to “No”)',
	'WWH_DISP_GUESTS'				=> 'Show guests',
	'WWH_DISP_GUESTS_EXP'			=> 'Display guests on the counter?',
	'WWH_DISP_HIDDEN'				=> 'Show hidden users',
	'WWH_DISP_HIDDEN_EXP'			=> 'Should hidden users be displayed in the list? (Permission necessary)',
	'WWH_DISP_TIME'					=> 'Show time of users',
	'WWH_DISP_TIME_EXP'				=> 'All user see it or none. (No special function for Admins)',
	'WWH_DISP_HOVER'				=> 'Display on hover',
	'WWH_DISP_TIME_BOTS'			=> 'Show time of bots',
	'WWH_DISP_TIME_FORMAT'			=> 'Timeformat',
	'WWH_DISP_IP'					=> 'Show user-ip',
	'WWH_DISP_IP_EXP'				=> 'Just for the users with administrative permissions, like on the viewonline.php.',
	'WWH_DISP_TEMPLATE_POS'			=> 'Position of the display',
	'WWH_DISP_TEMPLATE_POS_EXP'		=> 'Determines where to place the WWH display in the Online/Statistic section. “Up” is the position above this section and “Down” is the position below.',
	'WWH_DISP_TEMPLATE_POS_0'		=> 'Top',
	'WWH_DISP_TEMPLATE_POS_2'		=> 'Before birthdays',
	'WWH_DISP_TEMPLATE_POS_1'		=> 'Bottom',
	// config section 2
	'WWH_DISP_SET2'					=> 'Display settings 2',
	'WWH_VERSION'					=> 'Displaying users of ...',
	'WWH_VERSION_EXP'				=> 'Displaying users of today, or of the period set in the next option.',
	'WWH_VERSION1'					=> 'Today',
	'WWH_VERSION2'					=> 'Period of time',
	'WWH_SORT_BY'					=> 'Sort users by',
	'WWH_SORT_BY_EXP'				=> 'In which order shall the user be displayed? (A change to this setting applies to the next update, which occurs every %s minutes.)',
	'WWH_SORT_BY_0'					=> 'Username A -> Z',
	'WWH_SORT_BY_1'					=> 'Username Z -> A',
	'WWH_SORT_BY_2'					=> 'Time of visit ascending',
	'WWH_SORT_BY_3'					=> 'Time of visit descending',
	'WWH_SORT_BY_4'					=> 'User-ID ascending',
	'WWH_SORT_BY_5'					=> 'User-ID descending',
	'WWH_RECORD'					=> 'Record',
	'WWH_RECORD_EXP'				=> 'Display and save record',
	'WWH_RECORD_TIMESTAMP'			=> 'Dateformat for the record',
	// config section 3	
	'WWH_RESET'						=> 'Reset record',
	'WWH_RESET_EXP'					=> 'Resets the time and counter of the who-was-here record.',
	// config misc
	'WWH_SAVED_SETTINGS'			=> 'Who was here: Configuration updated successfully.',
	'WWH_RESET_TRUE'				=> 'If you submit this form,\nthe record will be reseted.', // \n is the beginning of a new line
));
