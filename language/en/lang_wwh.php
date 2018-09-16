<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : en
* Lang_ver     : 1.3.0
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
// for the normal sites
	'WHO_WAS_HERE'				=> 'Who was here?',
	'WHO_WAS_HERE_LATEST1'		=> 'last at',
	'WHO_WAS_HERE_LATEST2'		=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")
	'WHO_WAS_HERE_USERS_TEXT'	=> 'Users',
	'WHO_WAS_HERE_BOTS_TEXT'	=> 'Bots',

	'WHO_WAS_HERE_TOTAL'	=> array(
		0						=> 'In total there were <strong>0</strong> users online :: ',
		1						=> 'In total there was <strong>%d</strong> user online :: ',
		2						=> 'In total there were <strong>%d</strong> users online :: ',
	),
	'WHO_WAS_HERE_REG_USERS'=> array(
		0						=> '0 registered',
		1						=> '%d registered',
		2						=> '%d registered',
	),
	'WHO_WAS_HERE_HIDDEN'	=> array(
		0						=> '0 hidden',
		1						=> '%d hidden',
		2						=> '%d hidden',
	),
	'WHO_WAS_HERE_BOTS'		=> array(
		0						=> '0 bots',
		1						=> '%d bot',
		2						=> '%d bots',
	),
	'WHO_WAS_HERE_GUESTS'	=> array(
		0						=> '0 guests',
		1						=> '%d guest',
		2						=> '%d guests',
	),

	'WHO_WAS_HERE_WORD'			=> ' and',
	'WHO_WAS_HERE_EXP'			=> 'based on users active today',
	'WHO_WAS_HERE_EXP_TIME'		=> 'based on users active over the past ',
	'WWH_HOURS'				=> array(
		0						=> '',
		1						=> '%%s %1$s hour',
		2						=> '%%s %1$s hours',
	),
	'WWH_MINUTES'			=> array(
		0						=> '',
		1						=> '%%s %1$s minute',
		2						=> '%%s %1$s minutes',
	),
	'WWH_SECONDS'			=> array(
		0						=> '',
		1						=> '%%s %1$s second',
		2						=> '%%s %1$s seconds',
	),
	'WHO_WAS_HERE_RECORD'		=> 'Most users ever online was <strong>%1$s</strong> on %2$s',
	'WHO_WAS_HERE_RECORD_TIME'	=> 'Most users ever online was <strong>%1$s</strong> between %2$s and %3$s',
));
