<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
if (!isset($phpbb_root_path) && defined('IN_ADMIN'))
{
	$phpbb_root_path = '../';
}
else if (!isset($phpbb_root_path))
{
	$phpbb_root_path = './';
}

$lang = array_merge($lang, array(
	'WWH_CONFIG'				=> 'Configurate "Who was here?"',
	'WWH_TITLE'					=> 'Who was here?',

	'WWH_DISP_SET'				=> 'Display settings',
	'WWH_DISP_BOTS'				=> 'Show bots',
	'WWH_DISP_BOTS_EXP'			=> 'Some user might wonder what bots are and fear them.',
	'WWH_DISP_GUESTS'			=> 'Show guests',
	'WWH_DISP_GUESTS_EXP'		=> 'Display guests on the counter?',
	'WWH_DISP_HIDDEN'			=> 'Show hidden users',
	'WWH_DISP_HIDDEN_EXP'		=> 'Should hidden users be displayed in the list? (permission necessary)',
	'WWH_DISP_TIME'				=> 'Show time',
	'WWH_DISP_TIME_FORMAT'		=> 'Timeformat',
	'WWH_DISP_HOVER'			=> 'Display on hover',
	'WWH_DISP_TIME_EXP'			=> 'All user see it or none. No special function for Admins.',
	'WWH_DISP_IP'				=> 'Show user-ip',
	'WWH_DISP_IP_EXP'			=> 'Just for the users with administrative permissions, like on the viewonline.php',

	'WWH_INSTALLED'				=> 'Installed "Who was here?" Extension v%s',

	'WWH_RECORD'				=> 'Record',
	'WWH_RECORD_EXP'			=> 'Display and save record',
	'WWH_RECORD_TIMESTAMP'		=> 'Dateformat for the record',
	'WWH_RESET'					=> 'Reset record',
	'WWH_RESET_EXP'				=> 'Resets the time and counter of the who-was-here record.',
	'WWH_RESET_TRUE'			=> 'If you submit this form,\nthe record will be reseted.',// \n is the beginning of a new line
									//no space after it

	'WWH_SAVED_SETTINGS'		=> 'Configuration updated successfully.',
	'WWH_SORT_BY'				=> 'Sort users by',
	'WWH_SORT_BY_EXP'			=> 'In which order shall the user be displayed?',
	'WWH_SORT_BY_0'				=> 'Username A -> Z',
	'WWH_SORT_BY_1'				=> 'Username Z -> A',
	'WWH_SORT_BY_2'				=> 'Time of visit ascending',
	'WWH_SORT_BY_3'				=> 'Time of visit descending',
	'WWH_SORT_BY_4'				=> 'User-ID ascending',
	'WWH_SORT_BY_5'				=> 'User-ID descending',

	'WWH_UPDATE_NEED'			=> 'Update the "Who was here?" Extension. Therefor run the <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a>.<br />If you did this, you should delete the install/ directory.',

	'WWH_VERSION'				=> 'Displaying users of ...',
	'WWH_VERSION_EXP'			=> 'Displaying users of today, or of the period set in the next option.',
	'WWH_VERSION1'				=> 'Today',
	'WWH_VERSION2'				=> 'Period of time',
	'WWH_VERSION2_EXP'			=> 'type 0, if you want to display the users of the last 24h',
	'WWH_VERSION2_EXP2'			=> 'disabled, if you have choosen "today"',
	'WWH_VERSION2_EXP3'			=> 'seconds',

	'WWH_MOD'					=> '"Who was here?" Extension',
	'INSTALL_WWH_MOD'			=> 'Install "Who was here?" Extension',
	'INSTALL_WWH_MOD_CONFIRM'	=> 'Are you sure you want to install the "Who was here?" Extension?',
	'UPDATE_WWH_MOD'			=> 'Update "Who was here?" Extension',
	'UPDATE_WWH_MOD_CONFIRM'	=> 'Are you sure you want to update the "Who was here?" Extension?',
	'UNINSTALL_WWH_MOD'			=> 'Uninstall "Who was here?" Extension',
	'UNINSTALL_WWH_MOD_CONFIRM'	=> 'Are you sure you want to uninstall the "Who was here?" Extension?',
));
