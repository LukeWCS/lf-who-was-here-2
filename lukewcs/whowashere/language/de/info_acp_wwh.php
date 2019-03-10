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
	// navigation
	'LFWWH_NAV_TITLE'					=> 'Wer war da? (Gen 4)',
	'LFWWH_NAV_CONFIG'					=> 'Einstellungen',
	// config head
	'LFWWH_CONFIG_TITLE'				=> 'Wer war da? [%s]',
	'LFWWH_INSTALLED' 					=> 'Installierte Version: %s &bull; Diskussion: <a href="https://www.phpbb.de/community/viewtopic.php?f=149&t=241976">Thema auf phpbb.de</a>',
	// config section 1
	'LFWWH_SECTION_PERMISSIONS'			=> 'Berechtigungen',
	'LFWWH_USE_PERMISSIONS'				=> 'Benutze das Berechtigungssystem von phpBB',
	'LFWWH_USE_PERMISSIONS_EXP'			=> 'Ermöglicht es, für jede Benutzergruppe getrennt festlegen zu können, welchen Umfang die Anzeige haben soll. Die Rechte können wie folgt angepasst werden: “BERECHTIGUNGEN » Gruppenrechte » [Benutzergruppe] » Benutzer-Berechtigungen » Erweiterte Berechtigungen » Profil”.',
	// config section 2
	'LFWWH_SECTION_DISP_1'				=> 'Anzeige Einstellungen 1',
	'LFWWH_DISP_FOR_GUESTS'				=> 'Anzeige für Gäste',
	'LFWWH_DISP_FOR_GUESTS_EXP'			=> 'Legt fest, was Gäste sehen können. “Statistik” zeigt nur die anonymen Zahlen und “Nichts” schaltet die WWH-Anzeige für Gäste komplett aus.',
	'LFWWH_DISP_FOR_GUESTS_1'			=> 'Mitglieder und Statistik',
	'LFWWH_DISP_FOR_GUESTS_0'			=> 'Statistik',
	'LFWWH_DISP_FOR_GUESTS_2'			=> 'Nichts',
	'LFWWH_DISP_BOTS'					=> 'Zeige Bots',
	'LFWWH_DISP_BOTS_EXP'				=> 'Einige Benutzer werden sich fragen was Bots sind und sie fürchten.',
	'LFWWH_DISP_BOTS_1'					=> 'Mit den Benutzern',
	'LFWWH_DISP_BOTS_2'					=> 'In einer eigenen Zeile',
	'LFWWH_DISP_BOTS_0'					=> 'Nein',
	'LFWWH_DISP_BOTS_ONLY_ADMIN'		=> 'Zeige die Bot-Namen nur Administratoren',
	'LFWWH_DISP_BOTS_ONLY_ADMIN_EXP'	=> 'Nur Administratoren können die Namen der Bots sehen. Die Anzahl der Bots wird weiterhin allen angezeigt.',
	'LFWWH_DISP_GUESTS'					=> 'Zeige Gäste',
	'LFWWH_DISP_GUESTS_EXP'				=> 'Die Anzahl der Gäste wird angezeigt.',
	'LFWWH_DISP_HIDDEN'					=> 'Zeige unsichtbare Benutzer',
	'LFWWH_DISP_HIDDEN_EXP'				=> 'In der Benutzerliste werden auch unsichtbare Benutzer angezeigt. (Benötigt Berechtigung, wie bei “Wer ist online?”.)',
	'LFWWH_DISP_TIME'					=> 'Zeige die Zeit von Benutzern',
	'LFWWH_DISP_TIME_EXP'				=> '“Bei überfahren” zeigt zusätzlich ein Zeitsymbol an, mit dem die Zeiten auch direkt eingeblendet werden können. Hilfreich bei Smartphones und Tablet-PCs. (Allen Benutzern zeigen oder niemandem, keine spezielle Funktion für Administratoren.)',
	'LFWWH_DISP_TIME_1'					=> 'Hinter dem Namen',
	'LFWWH_DISP_TIME_2'					=> 'Bei überfahren',
	'LFWWH_DISP_TIME_0'					=> 'Nein',
	'LFWWH_DISP_TIME_BOTS'				=> 'Zeige die Zeit von Bots',
	'LFWWH_DISP_TIME_FORMAT'			=> 'Zeit-Format',
	'LFWWH_DISP_TIME_FORMAT_EXP'		=> 'Das Format entspricht der Syntax der PHP-Funktion <a href="http://www.php.net/date">date()</a>.',
	'LFWWH_DISP_IP'						=> 'Zeige die Benutzer-IP',
	'LFWWH_DISP_IP_EXP'					=> 'Die IP wird hinter der Zeit angezeigt. (Nur für Benutzer mit administrativen Rechten, wie bei “Wer ist online?”.)',
	// config section 3
	'LFWWH_SECTION_DISP_2'				=> 'Anzeige Einstellungen 2',
	'LFWWH_TIME_MODE'					=> 'Anzeige der Besucher von ...',
	'LFWWH_TIME_MODE_EXP'				=> 'Anzeige der Besucher von heute (Seit 00:00 Forum Zeitzone), oder des Zeitraums der bei der nächsten Einstellung festgelegt wird.',
	'LFWWH_TIME_MODE_1'					=> 'Heute',
	'LFWWH_TIME_MODE_0'					=> 'Zeitraum',
	'LFWWH_SORT_BY'						=> 'Sortiere Benutzer nach',
	'LFWWH_SORT_BY_EXP'					=> 'Damit wird die Reihenfolge festgelegt, in der die Benutzer angezeigt werden.',
	'LFWWH_SORT_BY_0'					=> 'Benutzername A -> Z',
	'LFWWH_SORT_BY_1'					=> 'Benutzername Z -> A',
	'LFWWH_SORT_BY_2'					=> 'Zeit des Besuchs aufsteigend',
	'LFWWH_SORT_BY_3'					=> 'Zeit des Besuchs absteigend',
	'LFWWH_SORT_BY_4'					=> 'Benutzer-ID aufsteigend',
	'LFWWH_SORT_BY_5'					=> 'Benutzer-ID absteigend',
	'LFWWH_RECORD'						=> 'Besucherrekord',
	'LFWWH_RECORD_EXP'					=> 'Zeige und speichere den Besucherrekord.',
	'LFWWH_RECORD_TIME_FORMAT'			=> 'Datums-Format für den Besucherrekord',
	'LFWWH_DISP_TEMPLATE_POS'			=> 'Position der Anzeige',
	'LFWWH_DISP_TEMPLATE_POS_EXP'		=> 'Legt fest, wo die WWH-Anzeige im Online/Statistik-Bereich positioniert werden soll. “Oben” ist die Position über diesem Bereich und “Unten” entsprechend die Position darunter.',
	'LFWWH_DISP_TEMPLATE_POS_0'			=> 'Oben',
	'LFWWH_DISP_TEMPLATE_POS_2'			=> 'Vor Geburtstage',
	'LFWWH_DISP_TEMPLATE_POS_1'			=> 'Unten',
	// config section 4	
	'LFWWH_SECTION_OTHERS'				=> 'Sonstiges',
	'LFWWH_USE_ONLINE_TIME'				=> 'Aktualisiere mit der Zeitspanne für die Online-Anzeige',
	'LFWWH_USE_ONLINE_TIME_EXP'			=> 'Wenn aktiviert, dann wird für das Intervall der Aktualisierung die folgende Einstellung verwendet: “ALLGEMEIN » SERVER-KONFIGURATION » Serverlast » Allgemeine Einstellungen » Zeitspanne für die Online-Anzeige”. Das entspricht dem Standardverhalten von WWH.',
	'LFWWH_CACHE_TIME'					=> 'Intervall der Aktualisierung',
	'LFWWH_CACHE_TIME_EXP'				=> 'Das Intervall bestimmt, wie oft die Anzeige der Statistik und Benutzerliste aktualisiert wird.',
	'LFWWH_API_MODE'					=> 'API-Modus',
	'LFWWH_API_MODE_EXP'				=> 'Damit wird die Anzeige von WWH deaktiviert und es werden lediglich die Template-Variablen erzeugt. Dieser Modus ist für Foren gedacht, bei denen WWH bereits durch andere Erweiterungen (z.B. “Stat Block”) dargestellt wird.',
	'LFWWH_CLEAR_UP'					=> 'Bei gelöschten Benutzern automatisch bereinigen',
	'LFWWH_CLEAR_UP_EXP'				=> 'Wenn Benutzerkonten gelöscht werden, dann wird auch sofort die Tabelle und Anzeige von WWH bereinigt.',
	'LFWWH_DISP_TEMPLATE_POS_ALL'		=> 'Zeige alle Template-Positionen gleichzeitig',	
	'LFWWH_DISP_TEMPLATE_POS_ALL_EXP'	=> 'WWH wird auf allen Positionen gleichzeitig angezeigt. Das dient nur zum Testen und sollte im Normalbetrieb deaktiviert sein.',
	// config section 5
	'LFWWH_SECTION_RESET'				=> 'Zurücksetzen',
	'LFWWH_DEFAULTS'					=> 'Einstellungen zurücksetzen',
	'LFWWH_DEFAULTS_EXP'				=> 'Setzt alle Einstellungen dieser Seite auf den Installationsstandard von WWH zurück. (Hat keine Auswirkung auf “Besucherrekord zurücksetzen”)',
	'LFWWH_DEFAULTS_BUTTON'				=> 'Standard',
	'LFWWH_RESET'						=> 'Besucherrekord zurücksetzen',
	'LFWWH_RESET_EXP'					=> 'Setzt Zeit und Zähler für den Besucherrekord zurück.',
	// messages
	'LFWWH_SAVED_SETTINGS'				=> 'Wer war da: Einstellungen erfolgreich gespeichert.',
	'LFWWH_RESET_TRUE'					=> 'Wer war da: Wenn du diese Seite speicherst, wird der Besucherrekord zurückgesetzt.', // \n is the beginning of a new line
	'LFWWH_CLEANED_UP'					=> 'Wer war da: Anzeige wurde bereinigt.',
));
