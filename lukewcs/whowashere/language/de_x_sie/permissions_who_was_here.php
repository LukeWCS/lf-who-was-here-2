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
* Lang_iso     : de_x_sie
* Lang_ext_ver : 2.0.0
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
	$lang = array();
}

global $phpbb_container;

$t1 = $t2 = '';
$config = $phpbb_container->get('config');
if (!$config['lfwwh_use_permissions'] || $config['lfwwh_admin_mode'])
{
	$t1 = '<span style="opacity: 0.5;">';
	$t2 = '</span>';
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

$lang = array_merge($lang, array(
	'ACL_U_LFWWH_SHOW_STATS'	=> $t1 . 'Wer war da (2.x): Kann Statistik sehen' . $t2,
	'ACL_U_LFWWH_SHOW_USERS'	=> $t1 . 'Wer war da (2.x): Kann Mitglieder sehen' . $t2,
));
