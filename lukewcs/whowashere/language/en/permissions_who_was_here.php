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
* Lang_iso     : en
* Lang_ext_ver : 2.1.0
* Lang_author  : LukeWCS
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
	'ACL_U_LFWWH_SHOW_STATS'	=> 'Who was here (2.x): Can view statistics',
	'ACL_U_LFWWH_SHOW_USERS'	=> 'Who was here (2.x): Can view members',
]);

/**
* DO NOT CHANGE
*/
$lang = array_merge($lang, [
	'ACL_U_LFWWH_SHOW_STATS_OFF' => '<span style="opacity: 0.5;">' . $lang['ACL_U_LFWWH_SHOW_STATS'] . '</span>',
	'ACL_U_LFWWH_SHOW_USERS_OFF' => '<span style="opacity: 0.5;">' . $lang['ACL_U_LFWWH_SHOW_USERS'] . '</span>',
]);
