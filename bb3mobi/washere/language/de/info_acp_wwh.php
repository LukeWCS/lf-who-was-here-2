<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru> - 2018 LukeWCS <https://www.wcsaga.org>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso     : de
* Lang_ver     : 1.3.2
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
	// navigation
	'WWH_TITLE'						=> 'Wer war da?',
	'WWH_CONFIG'					=> 'Einstellungen',
	// config head
	'WWH_CONFIG_TITLE'				=> 'Wer war da? (%s)',
	'WWH_INSTALLED' 				=> 'Installierte Version: %s',
	'WWH_UPDATE_NEED'				=> '(Fork: <a href="https://www.phpbb.de/community/viewtopic.php?f=149&t=241976">Thema auf phpbb.de</a> Original: <a href="http://bb3.mobi/forum/viewtopic.php?t=66">BB3 Support</a>)',
	// config section 1
	'WWH_DISP_SET'					=> 'Anzeige Einstellungen 1',
	'WWH_DISP_FOR_GUESTS'			=> 'Anzeige für Gäste',
	'WWH_DISP_FOR_GUESTS_EXP'		=> 'Legt fest, was Gäste sehen können. “Alles” zeigt die Statistik und die Benutzer. “Statistik” entsprechend nur die anonymen Zahlen und “Nichts” schaltet die WWH Anzeige komplett aus.',
	'WWH_DISP_FOR_GUESTS_1'			=> 'Alles',
	'WWH_DISP_FOR_GUESTS_0'			=> 'Statistik',
	'WWH_DISP_FOR_GUESTS_2'			=> 'Nichts',
	'WWH_DISP_BOTS'					=> 'Zeige Bots',
	'WWH_DISP_BOTS_EXP'				=> 'Einige Benutzer werden sich fragen was Bots sind und sie fürchten.',
	'WWH_DISP_BOTS_STRING'			=> 'Ja, in einer eigenen Zeile.',
	'WWH_DISP_BOTS_ONLY_ADMIN'		=> 'Zeige die Bot-Namen nur Administratoren',
	'WWH_DISP_BOTS_ONLY_ADMIN_EXP'	=> 'Die Namen der Bots werden nur Administratoren angezeigt. (Nicht relevant wenn “Zeige Bots” auf “Nein” gesetzt ist)',
	'WWH_DISP_GUESTS'				=> 'Zeige Gäste',
	'WWH_DISP_GUESTS_EXP'			=> 'Die Anzahl der Gäste wird angezeigt.',
	'WWH_DISP_HIDDEN'				=> 'Zeige unsichtbare Benutzer',
	'WWH_DISP_HIDDEN_EXP'			=> 'Sollen unsichtbare Benutzer in der Liste angezeigt werden? (Benötigt Berechtigung)',
	'WWH_DISP_TIME'					=> 'Zeige die Zeit von Benutzern',
	'WWH_DISP_TIME_EXP'				=> 'Allen Benutzern zeigen oder niemandem. (Keine spezielle Funktion für Administratoren)',
	'WWH_DISP_HOVER'				=> 'Ja, anzeigen bei überfahren.',
	'WWH_DISP_TIME_BOTS'			=> 'Zeige die Zeit von Bots',
	'WWH_DISP_TIME_FORMAT'			=> 'Zeit-Format',
	'WWH_DISP_IP'					=> 'Zeige die Benutzer-IP',
	'WWH_DISP_IP_EXP'				=> 'Nur für Benutzer mit administrativen Rechten, wie bei viewonline.php.',
	'WWH_DISP_TEMPLATE_POS'			=> 'Position der Anzeige',
	'WWH_DISP_TEMPLATE_POS_EXP'		=> 'Legt fest, wo die WWH Anzeige im Online/Statistik-Bereich positioniert werden soll. “Oben” ist die Position über diesem Bereich und “Unten” entsprechend die Position darunter.',
	'WWH_DISP_TEMPLATE_POS_0'		=> 'Oben',
	'WWH_DISP_TEMPLATE_POS_2'		=> 'Vor Geburtstage',
	'WWH_DISP_TEMPLATE_POS_1'		=> 'Unten',
	// config section 2
	'WWH_DISP_SET2'					=> 'Anzeige Einstellungen 2',
	'WWH_VERSION'					=> 'Anzeige der Besucher von ...',
	'WWH_VERSION_EXP'				=> 'Anzeige der Besucher von heute (Seit 00:00 Forum Zeitzone), oder des Zeitraums der bei der nächsten Einstellung festgelegt wird.',
	'WWH_VERSION1'					=> 'Heute',
	'WWH_VERSION2'					=> 'Zeitraum',
	'WWH_SORT_BY'					=> 'Sortiere Benutzer nach',
	'WWH_SORT_BY_EXP'				=> 'In welcher Reihenfolge sollen die Benutzer angezeigt werden? (Eine Änderung dieser Einstellung gilt für die nächste Aktualisierung, die alle %s Minuten stattfindet.)',
	'WWH_SORT_BY_0'					=> 'Benutzername A -> Z',
	'WWH_SORT_BY_1'					=> 'Benutzername Z -> A',
	'WWH_SORT_BY_2'					=> 'Zeit des Besuchs aufsteigend',
	'WWH_SORT_BY_3'					=> 'Zeit des Besuchs absteigend',
	'WWH_SORT_BY_4'					=> 'Benutzer-ID aufsteigend',
	'WWH_SORT_BY_5'					=> 'Benutzer-ID absteigend',
	'WWH_RECORD'					=> 'Besucherrekord',
	'WWH_RECORD_EXP'				=> 'Zeige und speichere den Besucherrekord',
	'WWH_RECORD_TIMESTAMP'			=> 'Datums-Format für den Besucherrekord',
	// config section 3	
	'WWH_RESET'						=> 'Besucherrekord zurücksetzen',
	'WWH_RESET_EXP'					=> 'Setzt Zeit und Zähler für den Aktivitäten-Rekord zurück.',
	// config misc
	'WWH_SAVED_SETTINGS'			=> 'Wer war da: Einstellungen gespeichert.',
	'WWH_RESET_TRUE'				=> 'Wenn du diese Seite speicherst,\nwird der Rekord zurückgesetzt.', // \n is the beginning of a new line
));
