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
	'WHO_WAS_HERE'					=> 'Wer war da?',
	'WHO_WAS_HERE_LATEST1'			=> 'zuletzt um',
	'WHO_WAS_HERE_LATEST2'			=> ' Uhr',

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> 'Insgesamt waren <strong>0</strong> Besucher online: ',
		1		=> 'Insgesamt war <strong>%d</strong> Besucher online: ',
		2		=> 'Insgesamt waren <strong>%d</strong> Besucher online: ',
	),
	'WHO_WAS_HERE_REG_USERS'			=> array(
		0		=> '0 registrierte',
		1		=> '%d registrierter',
		2		=> '%d registrierte',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 unsichtbare',
		1		=> '%d unsichtbarer',
		2		=> '%d unsichtbare',
	),
	'WHO_WAS_HERE_BOTS'			=> array(
		0		=> '0 Bots',
		1		=> '%d Bot',
		2		=> '%d Bots',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 Gäste',
		1		=> '%d Gast',
		2		=> '%d Gäste',
	),

	'WHO_WAS_HERE_WORD'				=> ' und',
	'WHO_WAS_HERE_EXP'				=> 'basierend auf den heute aktiven Besuchern',
	'WHO_WAS_HERE_EXP_TIME'			=> 'basierend auf den aktiven Besuchern der letzten ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> '%%s %1$s Stunde',
		2		=> '%%s %1$s Stunden',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> '%%s %1$s Minute',
		2		=> '%%s %1$s Minuten',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> '%%s %1$s Sekunde',
		2		=> '%%s %1$s Sekunden',
	),
	'WHO_WAS_HERE_RECORD'			=> 'Der Besucherrekord liegt bei <strong>%1$s</strong> Besuchern, die am %2$s online waren.',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'Der Besucherrekord liegt bei <strong>%1$s</strong> Besuchern, die zwischen %2$s und %3$s online waren.',
));

?>
