<?php
/**
*
* @package - NV "who was here?"
* @copyright (c) nickvergessen - http://www.flying-bits.org/
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
* Deutsche Übersetzung von: <unbekannt>, Luke (www.wcsaga.org)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}
if (!isset($phpbb_root_path) && defined('IN_ADMIN'))
{
	$phpbb_root_path = '../';
}
else if (!isset($phpbb_root_path))
{
	$phpbb_root_path = './';
}

$lang = array_merge($lang, array(
	'WWH_CONFIG'				=> 'Einstellungen',
	'WWH_TITLE'				=> 'Wer War Da?',

	'WWH_DISP_SET'				=> 'Anzeige Einstellungen',
	'WWH_DISP_BOTS'				=> 'Zeige Bots',
	'WWH_DISP_BOTS_EXP'			=> 'Einige Benutzer werden sich fragen was Bots sind und sie fürchten.',
	'WWH_DISP_GUESTS'			=> 'Zeige Gäste',
	'WWH_DISP_GUESTS_EXP'			=> 'Zeige die Anzahl der Gäste',
	'WWH_DISP_HIDDEN'			=> 'Zeige unsichtbare Benutzer',
	'WWH_DISP_HIDDEN_EXP'			=> 'Zeige die Anzahl der unsichtbaren Benutzer (benötigt Berechtigung)',
	'WWH_DISP_TIME'				=> 'Zeige Zeit',
	'WWH_DISP_TIME_FORMAT'			=> 'Zeit-Format',
	'WWH_DISP_HOVER'			=> 'Anzeige bei überfahren',
	'WWH_DISP_TIME_EXP'			=> 'Allen Benutzern zeigen oder niemandem. Keine speziellen Funktionen für Administratoren.',
	'WWH_DISP_IP'				=> 'Zeige die Benutzer-IP',
	'WWH_DISP_IP_EXP'			=> 'Nur für Benutzer mit administrativen Rechten, wie bei viewonline.php.',

	'WWH_INSTALLED'				=> '"Wer war da?" Erweiterung v%s installiert.',

	'WWH_RECORD'				=> 'Besucherrekord',
	'WWH_RECORD_EXP'			=> 'Zeige und speichere den Besucherrekord',
	'WWH_RECORD_TIMESTAMP'			=> 'Datums-Format für den Besucherrekord',
	'WWH_RESET'				=> 'Besucherrekord zurücksetzen',
	'WWH_RESET_EXP'				=> 'Setzt Zeit und Zähler für den Aktivitäten-Rekord zurück.',
	'WWH_RESET_TRUE'			=> 'Wenn du diese Seite speicherst,\nwird der Rekord zurückgesetzt.',

	'WWH_SAVED_SETTINGS'			=> 'Wer War Da: Einstellungen gespeichert.',
	'WWH_SORT_BY'				=> 'Sortiere Benutzer nach',
	'WWH_SORT_BY_EXP'			=> 'In welcher Reihenfolge sollen die Benutzer angezeigt werden?',
	'WWH_SORT_BY_0'				=> 'Benutzername A -> Z',
	'WWH_SORT_BY_1'				=> 'Benutzername Z -> A',
	'WWH_SORT_BY_2'				=> 'Zeit des Besuchs aufsteigend',
	'WWH_SORT_BY_3'				=> 'Zeit des Besuchs absteigend',
	'WWH_SORT_BY_4'				=> 'Benutzer-ID aufsteigend',
	'WWH_SORT_BY_5'				=> 'Benutzer-ID absteigend',

	'WWH_UPDATE_NEED'			=> 'Aktualisiere die "Wer War Da?" Erweiterung. Führe dazu die <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a> aus.<br />Wenn du das getan hast, solltest du das install/ Verzeichnis wieder entfernen.',

	'WWH_VERSION'				=> 'Anzeige der Besucher von ...',
	'WWH_VERSION_EXP'			=> 'Anzeige der Besucher von heute (Seit 00:00 Forum Zeitzone), oder des Zeitraums der bei der nächsten Einstellung festgelegt wird.',
	'WWH_VERSION1'				=> 'Heute',
	'WWH_VERSION2'				=> 'Zeitraum',
	'WWH_VERSION2_EXP'			=> '0 eingeben wenn die Besucher der letzten 24 Stunden angezeigt werden sollen',
	'WWH_VERSION2_EXP2'			=> 'deaktiviert, wenn du "Heute" gewählt hast',
	'WWH_VERSION2_EXP3'			=> 'Sekunden',


	'WWH_MOD'				=> '"Who was here?" Erweiterung',
	'INSTALL_WWH_MOD'			=> '"Who was here?" Erweiterung installieren',
	'INSTALL_WWH_MOD_CONFIRM'		=> 'Bist du sicher, dass du die "Who was here?" Erweiterung installieren möchtest?',
	'UPDATE_WWH_MOD'			=> '"Who was here?" Erweiterung aktualisieren',
	'UPDATE_WWH_MOD_CONFIRM'		=> 'Bist du sicher, dass du die "Who was here?" Erweiterung aktualisieren möchtest?',
	'UNINSTALL_WWH_MOD'			=> '"Who was here?" Erweiterung deinstallieren',
	'UNINSTALL_WWH_MOD_CONFIRM'		=> 'Bist du sicher, dass du die "Who was here?" Erweiterung deinstallieren möchtest?',
));
