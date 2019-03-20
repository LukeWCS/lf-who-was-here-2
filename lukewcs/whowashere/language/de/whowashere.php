<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : de
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
	// board index page
	'LFWWH_TITLE'				=> 'Wer war da?',
	'LFWWH_LAST1'				=> '', //old: 'zuletzt:&nbsp;'
	'LFWWH_LAST2'				=> '', //used for parts like "o'clock" in the timedisplay (last at hh:mm o'clock)
	'LFWWH_USERS_TEXT'			=> 'Mitglieder%s:',
	'LFWWH_BOTS_TEXT'			=> 'Bots%s:',
	'LFWWH_SHOW_INFO'			=> 'Infos',
	'LFWWH_SHOW_INFO_EXP'		=> 'Zeige ausgeblendete Infos',

	'LFWWH_TOTAL' => array(
		0						=> 'Insgesamt waren <strong>0</strong> Besucher online :: ',
		1						=> 'Insgesamt war <strong>%d</strong> Besucher online :: ',
		2						=> 'Insgesamt waren <strong>%d</strong> Besucher online :: ',
	),
	'LFWWH_REG_USERS' => array(
		0						=> '0 sichtbare Mitglieder',
		1						=> '%d sichtbares Mitglied',
		2						=> '%d sichtbare Mitglieder',
	),
	'LFWWH_HIDDEN' => array(
		0						=> '0 unsichtbare Mitglieder',
		1						=> '%d unsichtbares Mitglied',
		2						=> '%d unsichtbare Mitglieder',
	),
	'LFWWH_BOTS' => array(
		0						=> '0 Bots',
		1						=> '%d Bot',
		2						=> '%d Bots',
	),
	'LFWWH_GUESTS' => array(
		0						=> '0 Gäste',
		1						=> '%d Gast',
		2						=> '%d Gäste',
	),

	'LFWWH_WORD'				=> ' und',
	'LFWWH_EXP'					=> 'basierend auf den heutigen Besuchern',
	'LFWWH_EXP_TIME'			=> 'basierend auf den Besuchern der letzten ',
	'LFWWH_HOURS' => array(
		0						=> '',
		1						=> '%%s %1$s Stunde',
		2						=> '%%s %1$s Stunden',
	),
	'LFWWH_MINUTES' => array(
		0						=> '',
		1						=> '%%s %1$s Minute',
		2						=> '%%s %1$s Minuten',
	),
	'LFWWH_SECONDS' => array(
		0						=> '',
		1						=> '%%s %1$s Sekunde',
		2						=> '%%s %1$s Sekunden',
	),
	'LFWWH_RECORD'				=> 'Der Besucherrekord liegt bei <strong>%1$s</strong> Besuchern, die am %2$s online waren.',
	'LFWWH_RECORD_TIME'			=> 'Der Besucherrekord liegt bei <strong>%1$s</strong> Besuchern, die zwischen %2$s und %3$s online waren.',
));
