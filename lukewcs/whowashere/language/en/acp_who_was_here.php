<?php
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

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
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
// ’ « » “ ” … „ “
//
$lang = array_merge($lang, [
	// config head
	'LFWWH_CONFIG_TITLE'				=> 'Who was here?',
	'LFWWH_CONFIG_DESC' 				=> 'Here you can change the settings for the <strong>%s</strong> extension.',

	// config section 1
	'LFWWH_SECTION_PERMISSIONS'			=> 'Permissions',
	'LFWWH_ADMIN_MODE'					=> 'Administrator mode',
	'LFWWH_ADMIN_MODE_EXP'				=> 'This mode overrides all permissions systems and only users with administrative rights can see the WWH display. Helpful if WWH should not be visible to others at short notice.',
	'LFWWH_USE_PERMISSIONS'				=> 'Use the permission system of phpBB',
	'LFWWH_USE_PERMISSIONS_EXP'			=> 'Enables you to specify for each user group separately, to what extent the display should be made. The rights can be set as follows: “PERMISSIONS » Group permissions » [user group] » User permissions » Advanced Permissions » Who was here (2.x)”.',
	'LFWWH_SECTION_SIMPLE_PERMISSIONS'	=> 'Simplified permission system',
	'LFWWH_SIMPLE_PERMISSIONS_EXP'		=> 'This can be used to specify what guests and bots are allowed to see from the WWD display. All other groups always see the WWH display in full. If more granular permissions are required, the phpBB permission system must be activated.',
	'LFWWH_PERM_FOR_GUESTS'				=> 'Display for guests',
	'LFWWH_PERM_FOR_GUESTS_EXP'			=> 'Determines what guests can see. If all switches are disabled, the WWH display for guests will be completely turned off.',
	'LFWWH_PERM_FOR_BOTS'				=> 'Display for bots',
	'LFWWH_PERM_FOR_BOTS_EXP'			=> 'Determines what bots can see. If all switches are disabled, the WWH display for bots will be completely turned off.',
	'LFWWH_PERM_STATS'					=> 'Statistics',
	'LFWWH_PERM_RECORD'					=> 'Visitor record',
	'LFWWH_PERM_USERS'					=> 'Members',
	'LFWWH_PERM_BOTS'					=> 'Bots',

	// config section 2
	'LFWWH_SECTION_DISP_1'				=> 'Display settings 1',
	'LFWWH_DISP_REG_USERS'				=> 'Show visible users (number)',
	'LFWWH_DISP_REG_USERS_EXP'			=> 'The number of visible users is displayed.',
	'LFWWH_DISP_HIDDEN'					=> 'Show invisible users (number and names)',
	'LFWWH_DISP_HIDDEN_EXP'				=> 'Invisible users are also displayed in the user list. (Just for the users with administrative permissions, as with “Who is online”.)',
	'LFWWH_DISP_BOTS'					=> 'Show bots (number and names)',
	'LFWWH_DISP_BOTS_EXP'				=> 'Some user might wonder what bots are and fear them.',
	'LFWWH_DISP_BOTS_OWN_LINE'			=> 'On a separate line',
	'LFWWH_DISP_BOTS_WITH_USERS'		=> 'With the users',
	'LFWWH_DISP_BOTS_DISABLED'			=> 'No',
	'LFWWH_DISP_GUESTS'					=> 'Show guests (number)',
	'LFWWH_DISP_GUESTS_EXP'				=> 'The number of guests is displayed.',
	'LFWWH_DISP_TIME_USERS'				=> 'Show time of users',
	'LFWWH_DISP_TIME_BOTS'				=> 'Show time of bots',
	'LFWWH_DISP_TIME_EXP'				=> 'All user see it or none, no special function for Admins.',
	'LFWWH_DISP_TIME_FORMAT'			=> 'Time format',
	'LFWWH_DISP_TIME_FORMAT_EXP'		=> 'The format corresponds to the syntax of the PHP <a href="https://www.php.net/manual/datetime.format.php">date format</a>. Special placeholder: $1 = “%1$s”, $2 = “%2$s”, $3 = “%3$s”.',
	'LFWWH_DISP_TIME_FORMAT_DEMO'		=> 'Current display: %s',
	'LFWWH_DISP_IP'						=> 'Show user IP',
	'LFWWH_DISP_IP_EXP'					=> 'Just for the users with administrative permissions, as with “Who is online”.',
	'LFWWH_DISP_AS_TOOLTIP'				=> 'As a tooltip',
	'LFWWH_DISP_BEHIND_NAME'			=> 'Behind the name',
	'LFWWH_DISP_DISABLED'				=> 'No',

	// config section 3
	'LFWWH_SECTION_DISP_2'				=> 'Display settings 2',
	'LFWWH_TIME_MODE'					=> 'Display of the visitors of ...',
	'LFWWH_TIME_MODE_EXP'				=> 'Display of today’s visitors (since 00:00 forum time), or the time period set at the next setting.',
	'LFWWH_TIME_MODE_TODAY'				=> 'Today',
	'LFWWH_TIME_MODE_PERIOD'			=> 'Period of time',
	'LFWWH_SORT_BY'						=> 'Sort users by',
	'LFWWH_SORT_BY_EXP'					=> 'This determines the order in which users are displayed.',
	'LFWWH_SORT_BY_NAME_AZ'				=> 'Username A -> Z',
	'LFWWH_SORT_BY_NAME_ZA'				=> 'Username Z -> A',
	'LFWWH_SORT_BY_VISIT_ASC'			=> 'Time of visit ascending',
	'LFWWH_SORT_BY_VISIT_DESC'			=> 'Time of visit descending',
	'LFWWH_SORT_BY_ID_ASC'				=> 'User-ID ascending',
	'LFWWH_SORT_BY_ID_DESC'				=> 'User-ID descending',
	'LFWWH_RECORD'						=> 'Visitor record',
	'LFWWH_RECORD_EXP'					=> 'Show and update the visitor record.',
	'LFWWH_RECORD_TIME_FORMAT'			=> 'Date format for the visitor record',
	'LFWWH_RECORD_TIME_FORMAT_EXP'		=> 'The format corresponds to the syntax of the PHP <a href="https://www.php.net/manual/datetime.format.php">date format</a>.',
	'LFWWH_TEMPLATE_POS'				=> 'Position of the display',
	'LFWWH_TEMPLATE_POS_EXP'			=> 'Determines where to place the WWH display in the Online/Statistic section. “Top” is the position above this section and “Bottom” is the position below.',
	'LFWWH_TEMPLATE_POS_TOP'			=> 'Top',
	'LFWWH_TEMPLATE_POS_BEFORE_BDAYS'	=> 'Before birthdays',
	'LFWWH_TEMPLATE_POS_BOTTOM'			=> 'Bottom',

	// config section 4
	'LFWWH_SECTION_OTHERS'				=> 'Others',
	'LFWWH_API_MODE'					=> 'API mode',
	'LFWWH_API_MODE_EXP'				=> 'This deactivates the display of WWH and only creates the template variables. This mode is for forums where WWH is already represented by other extensions.',
	'LFWWH_CLEAR_UP'					=> 'Automatically clean up deleted users',
	'LFWWH_CLEAR_UP_EXP'				=> 'If user accounts are deleted, the table and display of WWH are also immediately cleared.',
	'LFWWH_TEMPLATE_POS_ALL'			=> 'Show all template positions at the same time',
	'LFWWH_TEMPLATE_POS_ALL_EXP'		=> 'WWH is displayed on all positions at the same time. This is only for testing and should be disabled during normal operation.',
	'LFWWH_CREATE_HIDDEN_INFO'			=> 'Create hidden information',
	'LFWWH_CREATE_HIDDEN_INFO_EXP'		=> 'If the display of the time or IP is set to “As a tooltip”, this information is also hidden and a button is created, with which they can be displayed.',

	// config section 5
	'LFWWH_SECTION_LOAD_SETTINGS'		=> 'Load settings',
	'LFWWH_USE_CACHE'					=> 'Use cache for the visitor table',
	'LFWWH_USE_CACHE_EXP'				=> 'When the cache is enabled, the cached table is used when the forums index is called. As a result, new visitors are displayed only after a certain delay. If the cache is deactivated, a new MySQL query is executed each time the forum index is called, which can lead to performance problems in large forums.',
	'LFWWH_USE_ONLINE_TIME'				=> 'Update with the view online time span',
	'LFWWH_USE_ONLINE_TIME_EXP'			=> 'When enabled, the following setting is used for the update interval: “GENERAL » SERVER CONFIGURATION » Load settings » General settings » View online time span”. This corresponds to the standard behaviour of WWH.',
	'LFWWH_CACHE_TIME'					=> 'Interval of the update',
	'LFWWH_CACHE_TIME_EXP'				=> 'The interval determines how often the display of the statistics and user list is updated.',

	// config section 6
	'LFWWH_SECTION_RESET'				=> 'Reset',
	'LFWWH_DEFAULTS'					=> 'Reset settings',
	'LFWWH_DEFAULTS_EXP'				=> 'Resets all settings of this page to the installation standard. (Does not affect “Reset visitor record”)',
	'LFWWH_BUTTON_DEFAULTS'				=> 'Defaults',
	'LFWWH_RECORD_RESET'				=> 'Reset visitor record',
	'LFWWH_RECORD_RESET_EXP'			=> 'Resets time and counter for the visitor record.',
	'LFWWH_RECORD_RESET_TIME_HINT'		=> '(Reset on: %s)',

	// buttons
	'LFWWH_BUTTON_SAVE_PAGE'			=> 'Save page',

	// messages
	'LFWWH_MSG_SAVED_SETTINGS'			=> 'Who was here: Configuration updated successfully.',
	'LFWWH_MSG_CONFIRM_RECORD_RESET'	=> 'As soon as you save the page with the settings, the visitor record will be reset. Are you sure?',
]);
