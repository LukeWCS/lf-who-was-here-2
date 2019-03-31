<?php
/**
* 
* LF who was here (2.x) - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2013, nickvergessen, http://www.flying-bits.org/
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
	'LFWWH_TITLE'				=> 'Who was here',
	'LFWWH_LAST1'				=> '', //old: 'last:&nbsp;'
	'LFWWH_LAST2'				=> '', //used for parts like "o'clock" in the time display (last at hh:mm o'clock)
	'LFWWH_USERS_TEXT'			=> 'Registered users%s:',
	'LFWWH_BOTS_TEXT'			=> 'Bots%s:',
	'LFWWH_SHOW_INFO'			=> 'Info',
	'LFWWH_SHOW_INFO_EXP'		=> 'Show hidden info',

	'LFWWH_TOTAL' => array(
		0						=> 'In total there were <strong>0</strong> users online :: ',
		1						=> 'In total there was <strong>%d</strong> user online :: ',
		2						=> 'In total there were <strong>%d</strong> users online :: ',
	),
	'LFWWH_REG_USERS' => array(
		0						=> '0 registered',
		1						=> '%d registered',
		2						=> '%d registered',
	),
	'LFWWH_HIDDEN' => array(
		0						=> '0 hidden',
		1						=> '%d hidden',
		2						=> '%d hidden',
	),
	'LFWWH_BOTS' => array(
		0						=> '0 bots',
		1						=> '%d bot',
		2						=> '%d bots',
	),
	'LFWWH_GUESTS' => array(
		0						=> '0 guests',
		1						=> '%d guest',
		2						=> '%d guests',
	),

	'LFWWH_WORD'				=> ' and',
	'LFWWH_EXP'					=> 'based on users active today',
	'LFWWH_EXP_TIME'			=> 'based on users active over the past ',
	'LFWWH_HOURS' => array(
		0						=> '',
		1						=> '%%s %1$s hour',
		2						=> '%%s %1$s hours',
	),
	'LFWWH_MINUTES' => array(
		0						=> '',
		1						=> '%%s %1$s minute',
		2						=> '%%s %1$s minutes',
	),
	'LFWWH_SECONDS' => array(
		0						=> '',
		1						=> '%%s %1$s second',
		2						=> '%%s %1$s seconds',
	),
	'LFWWH_RECORD'				=> 'Most users ever online was <strong>%1$s</strong> on %2$s',
	'LFWWH_RECORD_TIME'			=> 'Most users ever online was <strong>%1$s</strong> between %2$s and %3$s',
));
