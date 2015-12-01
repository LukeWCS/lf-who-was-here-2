<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
* French translation by tomberaid (http://www.worshiprom.com) & Galixte (http://www.galixte.com)
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru>
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
	'WHO_WAS_HERE'					=> 'Qui est venu ?',
	'WHO_WAS_HERE_LATEST1'			=> 'Dernière visite :',
	'WHO_WAS_HERE_LATEST2'			=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> 'Au total il y a eu <strong>0</strong> utilisateur en ligne :: ',
		1		=> 'Au total il y a eu <strong>%d</strong> utilisateur en ligne :: ',
		2		=> 'Au total il y a eu <strong>%d</strong> utilisateurs en ligne :: ',
	),
	'WHO_WAS_HERE_REG_USERS'		=> array(
		0		=> '0 enregistré',
		1		=> '%d enregistré',
		2		=> '%d enregistrés',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 invisible',
		1		=> '%d invisible',
		2		=> '%d invisibles',
	),
	'WHO_WAS_HERE_BOTS'				=> array(
		0		=> '0 robot',
		1		=> '%d robot',
		2		=> '%d robots',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 invité',
		1		=> '%d invité',
		2		=> '%d invités',
	),

	'WHO_WAS_HERE_WORD'				=> ' et',
	'WHO_WAS_HERE_EXP'				=> 'd’après le nombre d’utilisateurs actifs d’aujourd’hui',
	'WHO_WAS_HERE_EXP_TIME'			=> 'd’après le nombre d’utilisateurs actifs ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> 'de la dernière %%s %1$s heure',
		2		=> 'des %%s %1$s dernières heures',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> 'de la dernière %%s %1$s minute',
		2		=> 'des %%s %1$s dernières minutes',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> 'de la dernière %%s %1$s seconde',
		2		=> 'des dernières %%s %1$s secondes',
	),
	'WHO_WAS_HERE_RECORD'			=> 'Le record du nombre d’utilisateurs en ligne était de <strong>%1$s</strong>, le %2$s',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'Le record du nombre d’utilisateurs en ligne était de <strong>%1$s</strong>, entre %2$s et %3$s',
));
