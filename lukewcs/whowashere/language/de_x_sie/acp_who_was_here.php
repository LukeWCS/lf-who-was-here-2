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
	// language pack author
	'LFWWH_LANG_DESC'					=> 'Deutsch (Sie)',
	'LFWWH_LANG_EXT_VER' 				=> '2.1.2',
	'LFWWH_LANG_AUTHOR' 				=> 'LukeWCS',

	// config head
	'LFWWH_CONFIG_TITLE'				=> 'Wer war da?',
	'LFWWH_CONFIG_DESC' 				=> 'Hier können die Einstellungen für die Erweiterung „%1$s“ (v%2$s) geändert werden.',

	// config section 1
	'LFWWH_SECTION_PERMISSIONS'			=> 'Berechtigungen',
	'LFWWH_ADMIN_MODE'					=> 'Administrator-Modus',
	'LFWWH_ADMIN_MODE_EXP'				=> 'Dieser Modus setzt alle Berechtigungssysteme außer Kraft und nur Benutzer mit administrativen Rechten können die WWH-Anzeige sehen. Hilfreich wenn WWH kurzfristig für andere nicht sichtbar sein soll.',
	'LFWWH_USE_PERMISSIONS'				=> 'Benutze das Berechtigungssystem von phpBB',
	'LFWWH_USE_PERMISSIONS_EXP'			=> 'Ermöglicht es, für jede Benutzergruppe getrennt festlegen zu können, welchen Umfang die Anzeige haben soll. Die Rechte können wie folgt angepasst werden: „BERECHTIGUNGEN » Gruppenrechte » [Benutzergruppe] » Benutzer-Berechtigungen » Erweiterte Berechtigungen » Profil“.',
	'LFWWH_PERM_FOR_GUESTS'				=> 'Anzeige für Gäste',
	'LFWWH_PERM_FOR_GUESTS_EXP'			=> 'Legt fest, was Gäste sehen können. „Statistik“ zeigt nur die anonymen Zahlen und „Nichts“ schaltet die WWH-Anzeige für Gäste komplett aus.',
	'LFWWH_PERM_FOR_BOTS'				=> 'Anzeige für Bots',
	'LFWWH_PERM_FOR_BOTS_EXP'			=> 'Legt fest, was Bots sehen können. „Statistik“ zeigt nur die anonymen Zahlen und „Nichts“ schaltet die WWH-Anzeige für Bots komplett aus.',
	'LFWWH_PERM_STATS_USERS'			=> 'Statistik und Mitglieder',
	'LFWWH_PERM_USERS'					=> 'Mitglieder',
	'LFWWH_PERM_STATS'					=> 'Statistik',
	'LFWWH_PERM_NOTHING'				=> 'Nichts',
	'LFWWH_PERM_BOTS_ONLY_ADMIN'		=> 'Zeige die Bot-Namen nur bei administrativen Rechten',
	'LFWWH_PERM_BOTS_ONLY_ADMIN_EXP'	=> 'Nur Benutzer mit administrativen Rechten können die Namen der Bots sehen. Die Anzahl der Bots wird weiterhin allen angezeigt.',

	// config section 2
	'LFWWH_SECTION_DISP_1'				=> 'Anzeige Einstellungen 1',
	'LFWWH_DISP_REG_USERS'				=> 'Zeige sichtbare Benutzer (Anzahl)',
	'LFWWH_DISP_REG_USERS_EXP'			=> 'Die Anzahl der sichtbaren Benutzer wird angezeigt.',
	'LFWWH_DISP_HIDDEN'					=> 'Zeige unsichtbare Benutzer (Anzahl und Namen)',
	'LFWWH_DISP_HIDDEN_EXP'				=> 'In der Benutzerliste werden auch unsichtbare Benutzer angezeigt. (Nur für Benutzer mit administrativen Rechten, wie bei „Wer ist online?“.)',
	'LFWWH_DISP_BOTS'					=> 'Zeige Bots (Anzahl und Namen)',
	'LFWWH_DISP_BOTS_EXP'				=> 'Einige Benutzer werden sich fragen was Bots sind und sie fürchten.',
	'LFWWH_DISP_BOTS_OWN_LINE'			=> 'In einer eigenen Zeile',
	'LFWWH_DISP_BOTS_WITH_USERS'		=> 'Mit den Benutzern',
	'LFWWH_DISP_BOTS_DISABLED'			=> 'Nein',
	'LFWWH_DISP_GUESTS'					=> 'Zeige Gäste (Anzahl)',
	'LFWWH_DISP_GUESTS_EXP'				=> 'Die Anzahl der Gäste wird angezeigt.',
	'LFWWH_DISP_TIME_USERS'				=> 'Zeige die Zeit von Benutzern',
	'LFWWH_DISP_TIME_BOTS'				=> 'Zeige die Zeit von Bots',
	'LFWWH_DISP_TIME_EXP'				=> '(Allen Benutzern zeigen oder niemandem, keine spezielle Funktion für Administratoren.)',
	'LFWWH_DISP_TIME_FORMAT'			=> 'Zeit-Format',
	'LFWWH_DISP_TIME_FORMAT_EXP'		=> 'Das Format entspricht der Syntax der PHP-Funktion <a href="http://www.php.net/date">date()</a>. Spezielle Platzhalter: $1 = „%1$s“, $2 = „%2$s“, $3 = „%3$s“.',
	'LFWWH_DISP_TIME_FORMAT_DEMO'		=> 'Aktuelle Anzeige: %s',
	'LFWWH_DISP_IP'						=> 'Zeige die Benutzer-IP',
	'LFWWH_DISP_IP_EXP'					=> '(Nur für Benutzer mit administrativen Rechten, wie bei „Wer ist online?“.)',
	'LFWWH_DISP_AS_TOOLTIP'				=> 'Als Tooltip',
	'LFWWH_DISP_BEHIND_NAME'			=> 'Hinter dem Namen',
	'LFWWH_DISP_DISABLED'				=> 'Nein',

	// config section 3
	'LFWWH_SECTION_DISP_2'				=> 'Anzeige Einstellungen 2',
	'LFWWH_TIME_MODE'					=> 'Anzeige der Besucher von ...',
	'LFWWH_TIME_MODE_EXP'				=> 'Anzeige der Besucher von heute (Seit 00:00 Forum Zeit), oder des Zeitraums der bei der nächsten Einstellung festgelegt wird.',
	'LFWWH_TIME_MODE_TODAY'				=> 'Heute',
	'LFWWH_TIME_MODE_PERIOD'			=> 'Zeitraum',
	'LFWWH_SORT_BY'						=> 'Sortiere Benutzer nach',
	'LFWWH_SORT_BY_EXP'					=> 'Damit wird die Reihenfolge festgelegt, in der die Benutzer angezeigt werden.',
	'LFWWH_SORT_BY_NAME_AZ'				=> 'Benutzername A -> Z',
	'LFWWH_SORT_BY_NAME_ZA'				=> 'Benutzername Z -> A',
	'LFWWH_SORT_BY_VISIT_ASC'			=> 'Zeit des Besuchs aufsteigend',
	'LFWWH_SORT_BY_VISIT_DESC'			=> 'Zeit des Besuchs absteigend',
	'LFWWH_SORT_BY_ID_ASC'				=> 'Benutzer-ID aufsteigend',
	'LFWWH_SORT_BY_ID_DESC'				=> 'Benutzer-ID absteigend',
	'LFWWH_RECORD'						=> 'Besucherrekord',
	'LFWWH_RECORD_EXP'					=> 'Zeige und aktualisiere den Besucherrekord.',
	'LFWWH_RECORD_TIME_FORMAT'			=> 'Datums-Format für den Besucherrekord',
	'LFWWH_RECORD_TIME_FORMAT_EXP'		=> 'Das Format entspricht der Syntax der PHP-Funktion <a href="http://www.php.net/date">date()</a>.',
	'LFWWH_TEMPLATE_POS'				=> 'Position der Anzeige',
	'LFWWH_TEMPLATE_POS_EXP'			=> 'Legt fest, wo die WWH-Anzeige im Online/Statistik-Bereich positioniert werden soll. „Oben“ ist die Position über diesem Bereich und „Unten“ entsprechend die Position darunter.',
	'LFWWH_TEMPLATE_POS_TOP'			=> 'Oben',
	'LFWWH_TEMPLATE_POS_BEFORE_BDAYS'	=> 'Vor Geburtstage',
	'LFWWH_TEMPLATE_POS_BOTTOM'			=> 'Unten',

	// config section 4
	'LFWWH_SECTION_OTHERS'				=> 'Sonstiges',
	'LFWWH_API_MODE'					=> 'API-Modus',
	'LFWWH_API_MODE_EXP'				=> 'Damit wird die Anzeige von WWH deaktiviert und es werden lediglich die Template-Variablen erzeugt. Dieser Modus ist für Foren gedacht, bei denen WWH bereits durch andere Erweiterungen dargestellt wird.',
	'LFWWH_CLEAR_UP'					=> 'Bei gelöschten Benutzern automatisch bereinigen',
	'LFWWH_CLEAR_UP_EXP'				=> 'Wenn Benutzerkonten gelöscht werden, dann wird auch sofort die Tabelle und Anzeige von WWH bereinigt.',
	'LFWWH_TEMPLATE_POS_ALL'			=> 'Zeige alle Template-Positionen gleichzeitig',
	'LFWWH_TEMPLATE_POS_ALL_EXP'		=> 'WWH wird auf allen Positionen gleichzeitig angezeigt. Das dient nur zum Testen und sollte im Normalbetrieb deaktiviert sein.',
	'LFWWH_CREATE_HIDDEN_INFO'			=> 'Erzeuge ausgeblendete Informationen',
	'LFWWH_CREATE_HIDDEN_INFO_EXP'		=> 'Wenn die Anzeige der Zeit oder IP auf „Als Tooltip“ eingestellt ist, werden diese Informationen zusätzlich ausgeblendet und es wird eine Schaltfläche erzeugt, mit der diese eingeblendet werden können. Hilfreich bei Smartphones und Tablet-PCs.',

	// config section 5
	'LFWWH_SECTION_LOAD_SETTINGS'		=> 'Serverlast',
	'LFWWH_USE_CACHE'					=> 'Cache für die Besuchertabelle verwenden',
	'LFWWH_USE_CACHE_EXP'				=> 'Bei aktiviertem Cache wird auf die zwischengespeicherte Tabelle zurückgegriffen, wenn der Forenindex aufgerufen wird. Dadurch werden neue Besucher erst nach einer gewissen Verzögerung angezeigt. Bei deaktiviertem Cache wird bei jedem Aufruf des Forenindexes eine neue MySQL Abfrage ausgeführt, was bei großen Foren zu Performance-Problemen führen kann.',
	'LFWWH_USE_ONLINE_TIME'				=> 'Aktualisiere mit der Zeitspanne für die Online-Anzeige',
	'LFWWH_USE_ONLINE_TIME_EXP'			=> 'Wenn aktiviert, dann wird für das Intervall der Aktualisierung die folgende Einstellung verwendet: „ALLGEMEIN » SERVER-KONFIGURATION » Serverlast » Allgemeine Einstellungen » Zeitspanne für die Online-Anzeige“. Das entspricht dem Standardverhalten von WWH.',
	'LFWWH_CACHE_TIME'					=> 'Intervall der Aktualisierung',
	'LFWWH_CACHE_TIME_EXP'				=> 'Das Intervall bestimmt, wie oft die Anzeige der Statistik und Benutzerliste aktualisiert wird.',

	// config section 6
	'LFWWH_SECTION_RESET'				=> 'Zurücksetzen',
	'LFWWH_DEFAULTS'					=> 'Einstellungen zurücksetzen',
	'LFWWH_DEFAULTS_EXP'				=> 'Setzt alle Einstellungen dieser Seite auf den Installationsstandard zurück. (Hat keine Auswirkung auf „Besucherrekord zurücksetzen“)',
	'LFWWH_BUTTON_DEFAULTS'				=> 'Standard',
	'LFWWH_RECORD_RESET'				=> 'Besucherrekord zurücksetzen',
	'LFWWH_RECORD_RESET_EXP'			=> 'Setzt Zeit und Zähler für den Besucherrekord zurück.',
	'LFWWH_RECORD_RESET_TIME_HINT'		=> '(Zurückgesetzt am: %s)',

	// messages
	'LFWWH_MSG_SAVED_SETTINGS'			=> 'Wer war da: Einstellungen erfolgreich gespeichert.',
	'LFWWH_MSG_CONFIRM_RECORD_RESET'	=> 'Wer war da: Sobald Sie die Seite mit den Einstellungen speichern, wird der Besucherrekord zurückgesetzt.',
	'LFWWH_MSG_LANGUAGEPACK_OUTDATED'	=> 'Hinweis: Das Sprachpaket dieser Erweiterung ist nicht mehr aktuell.',
]);
