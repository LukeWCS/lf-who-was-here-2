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

$lang = array_merge($lang, array(
// for the normal sites
	'WHO_WAS_HERE'					=> 'Chi è stato quì ?',
	'WHO_WAS_HERE_LATEST1'			=> 'Alle',
	'WHO_WAS_HERE_LATEST2'			=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> 'In totale ci sono stati <strong>0</strong> Utenti collegati : ',
		1		=> 'In totale c\'è stato <strong>%d</strong> Utente collegato : ',
		2		=> 'In totale ci sono stati <strong>%d</strong> Utenti collegati : ',
	),
	'WHO_WAS_HERE_REG_USERS'		=> array(
		0		=> '0 registrati',
		1		=> '%d registrato',
		2		=> '%d registrati',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 Nascosti',
		1		=> '%d Nascosto',
		2		=> '%d Nascosti',
	),
	'WHO_WAS_HERE_BOTS'				=> array(
		0		=> '0 bots',
		1		=> '%d bot',
		2		=> '%d bots',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 Ospiti',
		1		=> '%d Ospite',
		2		=> '%d Ospiti',
	),

	'WHO_WAS_HERE_WORD'				=> ' e',
	'WHO_WAS_HERE_EXP'				=> 'basato sugli utenti attivi di oggi',
	'WHO_WAS_HERE_EXP_TIME'			=> 'basato sugli utenti attivi nelle ultime ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> '%%s %1$s ora',
		2		=> '%%s %1$s ore',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> '%%s %1$s minuto',
		2		=> '%%s %1$s minuti',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> '%%s %1$s secondo',
		2		=> '%%s %1$s secondi',
	),
	'WHO_WAS_HERE_RECORD'			=> 'Record di Utenti online <strong>%1$s</strong> il %2$s',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'Record di utenti online <strong>%1$s</strong> tra %2$s e %3$s',
));
