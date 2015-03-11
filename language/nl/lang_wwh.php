<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
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

$lang = array_merge($lang, array(
// for the normal sites
	'WHO_WAS_HERE'					=> 'Wie was hier?',
	'WHO_WAS_HERE_LATEST1'			=> 'laatst op',
	'WHO_WAS_HERE_LATEST2'			=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> 'In totaal waren er <strong>0</strong> gebruikers online :: ',
		1		=> 'In totaal was er <strong>%d</strong> gebruiker online :: ',
		2		=> 'In totaal waren er <strong>%d</strong> gebruikers online :: ',
	),
	'WHO_WAS_HERE_REG_USERS'		=> array(
		0		=> '0 geregistreerde gebruikers',
		1		=> '%d geregistreerde gebruiker',
		2		=> '%d geregistreerde gebruikers',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 verborgen',
		1		=> '%d verborgen',
		2		=> '%d verborgen',
	),
	'WHO_WAS_HERE_BOTS'				=> array(
		0		=> '0 bots',
		1		=> '%d bot',
		2		=> '%d bots',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 gasten',
		1		=> '%d gast',
		2		=> '%d gasten',
	),

	'WHO_WAS_HERE_WORD'				=> ' en',
	'WHO_WAS_HERE_EXP'				=> 'gebaseerd op de gebruikers die vandaar waren',
	'WHO_WAS_HERE_EXP_TIME'			=> 'gebaseerd op gebruikers die actief waren in de laatste ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> '%%s %1$s uur',
		2		=> '%%s %1$s uren',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> '%%s %1$s minuut',
		2		=> '%%s %1$s minuten',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> '%%s %1$s seconde',
		2		=> '%%s %1$s seconden',
	),
	'WHO_WAS_HERE_RECORD'			=> 'De meeste gebruikers tegelijkertijd online ooit was <strong>%1$s</strong> op %2$s',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'De meeste gebruikers tegelijkertijd online ooit was <strong>%1$s</strong> tussen %2$s en %3$s',
));
