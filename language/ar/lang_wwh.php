<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated by : Bassel Taha Alhitary - www.alhitary.net
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
	'WHO_WAS_HERE'					=> 'من كان هنا ?',
	'WHO_WAS_HERE_LATEST1'			=> 'في',
	'WHO_WAS_HERE_LATEST2'			=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> 'إجمالي الأعضاء المتصلين كان <strong>0</strong> أعضاء :: ',
		1		=> 'إجمالي الأعضاء المتصلين كان <strong>%d</strong> عضو :: ',
		2		=> 'إجمالي الأعضاء المتصلين كان <strong>%d</strong> أعضاء :: ',
	),
	'WHO_WAS_HERE_REG_USERS'		=> array(
		0		=> '0 مسجلين',
		1		=> '%d مسجل',
		2		=> '%d مسجلين',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 مخفيين',
		1		=> '%d مخفي',
		2		=> '%d مخفيين',
	),
	'WHO_WAS_HERE_BOTS'				=> array(
		0		=> '0 محركات بحث',
		1		=> '%d محرك بحث',
		2		=> '%d محركات بحث',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 زائرين',
		1		=> '%d زائر',
		2		=> '%d زائرين',
	),

	'WHO_WAS_HERE_WORD'				=> ' و',
	'WHO_WAS_HERE_EXP'				=> 'تعتمد على نشاط الأعضاء خلال الـ24 ساعة',
	'WHO_WAS_HERE_EXP_TIME'			=> 'تعتمد على نشاط الأعضاء مُنذ ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> '%%s %1$s ساعة',
		2		=> '%%s %1$s ساعات',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> '%%s %1$s دقيقة',
		2		=> '%%s %1$s دقائق',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> '%%s %1$s ثانية',
		2		=> '%%s %1$s ثواني',
	),
	'WHO_WAS_HERE_RECORD'			=> 'أكبر عدد للأعضاء المتصلين كان <strong>%1$s</strong> في %2$s',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'أكبر عدد للأعضاء المتصلين كان <strong>%1$s</strong> بين %2$s و %3$s',
));
