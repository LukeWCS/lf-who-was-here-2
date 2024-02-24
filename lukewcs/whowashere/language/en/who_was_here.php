<?php
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
	'LFWWH_TITLE'				=> 'Who was here',
	'LFWWH_LAST1'				=> 'last at',
	'LFWWH_LAST2'				=> 'o’clock',
	'LFWWH_LAST3'				=> 'last on',
	'LFWWH_USERS_PREFIX'		=> 'Registered users',
	'LFWWH_BOTS_PREFIX'			=> 'Bots',
	'LFWWH_SHOW_INFO_TOOLTIP'	=> 'Show hidden information',
	'LFWWH_STATS' => [
		0						=> 'In total there were <strong>0</strong> users online',
		1						=> 'In total there was <strong>%d</strong> user online',
		2						=> 'In total there were <strong>%d</strong> users online',
	],
	'LFWWH_STATS_SEPARATOR'		=> ' ::',
	'LFWWH_NO_USERS'			=> '0 users',
	'LFWWH_NO_BOTS'				=> '0 bots',
	'LFWWH_NO_USERS_OR_BOTS'	=> '0 users/bots',
	'LFWWH_REG_USERS' => [
		0						=> '0 registered',
		1						=> '%d registered',
		2						=> '%d registered',
	],
	'LFWWH_HIDDEN' => [
		0						=> '0 hidden',
		1						=> '%d hidden',
		2						=> '%d hidden',
	],
	'LFWWH_BOTS' => [
		0						=> '0 bots',
		1						=> '%d bot',
		2						=> '%d bots',
	],
	'LFWWH_GUESTS' => [
		0						=> '0 guests',
		1						=> '%d guest',
		2						=> '%d guests',
	],
	'LFWWH_AND_SEPARATOR'		=> ' and',
	'LFWWH_EXP'					=> 'based on users active today',
	'LFWWH_EXP_TIME'			=> 'based on users active over the past ',
	'LFWWH_HOURS' => [
		0						=> '',
		1						=> '%%s %1$s hour',
		2						=> '%%s %1$s hours',
	],
	'LFWWH_MINUTES' => [
		0						=> '',
		1						=> '%%s %1$s minute',
		2						=> '%%s %1$s minutes',
	],
	'LFWWH_SECONDS' => [
		0						=> '',
		1						=> '%%s %1$s second',
		2						=> '%%s %1$s seconds',
	],
	'LFWWH_RECORD_DAY'			=> 'Most users ever online was <strong>%1$s</strong> on %2$s',
	'LFWWH_RECORD_TIME'			=> 'Most users ever online was <strong>%1$s</strong> between %2$s and %3$s',
]);
