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
if (!isset($phpbb_root_path) && defined('IN_ADMIN'))
{
	$phpbb_root_path = '../';
}
else if (!isset($phpbb_root_path))
{
	$phpbb_root_path = './';
}

$lang = array_merge($lang, array(
	'WWH_CONFIG'				=> 'Konfiguration "Wer War Da?"',
	'WWH_TITLE'					=> 'Wer War Da?',

	'WWH_DISP_SET'				=> 'Einstellungen für die Anzeige',
	'WWH_DISP_BOTS'				=> 'Bots anzeigen',
	'WWH_DISP_BOTS_EXP'			=> 'Manche Benutzer könnten sich fragen, was Bots sind.',
	'WWH_DISP_GUESTS'			=> 'Gäste anzeigen',
	'WWH_DISP_GUESTS_EXP'		=> 'Gäste im Zähler aufführen',
	'WWH_DISP_HIDDEN'			=> 'Unsichtbare Benutzer anzeigen',
	'WWH_DISP_HIDDEN_EXP'		=> 'Sollen unsichtbare Benutzer angezeigt werden? (Berechtigung benötigt)',
	'WWH_DISP_TIME'				=> 'Zeit anzeigen',
	'WWH_DISP_TIME_FORMAT'		=> 'Zeit-Format',
	'WWH_DISP_HOVER'			=> 'als Hover-Effekt',
	'WWH_DISP_TIME_EXP'			=> 'Entweder sehen alle Benutzer die Zeit oder niemand.',
	'WWH_DISP_IP'				=> 'IP anzeigen',
	'WWH_DISP_IP_EXP'			=> 'Nur für Administratoren, wie auf der viewonline.php',

	'WWH_INSTALLED'				=> '"Wer war da?" Extension v%s installiert.',

	'WWH_RECORD'				=> 'Besucherrekord',
	'WWH_RECORD_EXP'			=> 'Den Besucherrekord anzeigen und speichern.',
	'WWH_RECORD_TIMESTAMP'		=> 'Datums-Format für den Rekord',
	'WWH_RESET'					=> 'Besucherrekord zurücksetzen',
	'WWH_RESET_EXP'				=> 'Setzt den Zeitpunkt und den Besucherrekord zurück.',
	'WWH_RESET_TRUE'			=> 'Wenn du dieses Formular absendest,\nwird der Rekord zurückgesetzt.',// \n is the beginning of a new line
									//no space after it

	'WWH_SAVED_SETTINGS'		=> 'Einstellungen gespeichert.',
	'WWH_SORT_BY'				=> 'Sortiere Benutzer nach',
	'WWH_SORT_BY_EXP'			=> 'In welcher Reihenfolge sollen die Benutzer aufgelistet werden?',
	'WWH_SORT_BY_0'				=> 'Benutzername A -> Z',
	'WWH_SORT_BY_1'				=> 'Benutzername Z -> A',
	'WWH_SORT_BY_2'				=> 'Besuchszeit aufsteigend',
	'WWH_SORT_BY_3'				=> 'Besuchszeit absteigend',
	'WWH_SORT_BY_4'				=> 'Besucher-ID aufsteigend',
	'WWH_SORT_BY_5'				=> 'Besucher-ID absteigend',

	'WWH_UPDATE_NEED'			=> 'Update deinen "Wer War Da?" Extension. Führe dazu die <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a> aus.<br />Wenn du das getan hast, kannst solltest du das install/ Verzeichnis wieder entfernen.',

	'WWH_VERSION'				=> 'Benutzer von ... anzeigen',
	'WWH_VERSION_EXP'			=> 'Benutzer von heute anzeigen, oder aus dem Zeitraum der im nächsten Feld eingegeben wird',
	'WWH_VERSION1'				=> 'Heute',
	'WWH_VERSION2'				=> 'Zeitraum',
	'WWH_VERSION2_EXP'			=> 'Gib 0 ein, wenn die Besucher der letzten 24 Stunden angezeigt werden sollen',
	'WWH_VERSION2_EXP2'			=> 'deaktiviert, wenn "Heute" ausgewählt wurde',
	'WWH_VERSION2_EXP3'			=> 'Sekunden',


	'WWH_MOD'					=> '"Who was here?" Extension',
	'INSTALL_WWH_MOD'			=> '"Who was here?" Extension installieren',
	'INSTALL_WWH_MOD_CONFIRM'	=> 'Bist du dir sicher, dass du die "Who was here?" Extension installieren möchtest?',
	'UPDATE_WWH_MOD'			=> '"Who was here?" Extension aktualisieren',
	'UPDATE_WWH_MOD_CONFIRM'	=> 'Bist du dir sicher, dass du die "Who was here?" Extension aktualisieren möchtest?',
	'UNINSTALL_WWH_MOD'			=> '"Who was here?" Extension deinstallieren',
	'UNINSTALL_WWH_MOD_CONFIRM'	=> 'Bist du dir sicher, dass du die "Who was here?" Extension deinstallieren möchtest?',
));
