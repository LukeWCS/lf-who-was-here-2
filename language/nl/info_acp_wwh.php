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
if (!isset($phpbb_root_path) && defined('IN_ADMIN'))
{
	$phpbb_root_path = '../';
}
else if (!isset($phpbb_root_path))
{
	$phpbb_root_path = './';
}

$lang = array_merge($lang, array(
	'WWH_CONFIG'				=> 'Configureer "Wie Was Hier?"',
	'WWH_TITLE'					=> 'Wie Was Hier?',

	'WWH_DISP_SET'				=> 'Weergave instellingen',
	'WWH_DISP_BOTS'				=> 'Bots weergeven',
	'WWH_DISP_BOTS_EXP'			=> 'Sommige gebruikers vragen zich af was bots ijn en zouden er bang van kunnen zijn.',
	'WWH_DISP_GUESTS'			=> 'Gasten weergeven',
	'WWH_DISP_GUESTS_EXP'		=> 'Gasten laten zien in de teller?',
	'WWH_DISP_HIDDEN'			=> 'Verborgen gebruikers weergeven',
	'WWH_DISP_HIDDEN_EXP'		=> 'Vervorgen gebruikers laten zien in de lijst? (alleen als gebruikers er permissies voor hheb)',
	'WWH_DISP_TIME'				=> 'Tijd weergeven',
	'WWH_DISP_TIME_FORMAT'		=> 'Tijd-/datumformaat',
	'WWH_DISP_HOVER'			=> 'Bij hover weergeven',
	'WWH_DISP_TIME_EXP'			=> 'Alle gebruikers zien het of niemand. Geen speciale functie voor beheerders.',
	'WWH_DISP_IP'				=> 'Gebruikers-IP weergeven',
	'WWH_DISP_IP_EXP'			=> 'Alleen voor gebruikers met beheerderspermissies, net zoals de viewonline.php',

	'WWH_INSTALLED'				=> '"Wie Was Hier?" EXT v%s geïnstaleerd',

	'WWH_RECORD'				=> 'Gebruikersrecord',
	'WWH_RECORD_EXP'			=> 'Gebruikersrecord laten zien en opslaan',
	'WWH_RECORD_TIMESTAMP'		=> 'Tijd-/datumformaat voor het gebruikersrecord',
	'WWH_RESET'					=> 'Gebruikersrecord resetten',
	'WWH_RESET_EXP'				=> 'Reset de tijd en de teller van de wie-was-hier gebruikersrecord.',
	'WWH_RESET_TRUE'			=> 'Als je dit formulier verstuurd,\nwordt het gebruikersrecord gereset.',// \n is the beginning of a new line
									//no space after it

	'WWH_SAVED_SETTINGS'		=> 'Instellingen succesvol opgeslagen.',
	'WWH_SORT_BY'				=> 'Sorteer gebruikers op',
	'WWH_SORT_BY_EXP'			=> 'In welke volgorde wil je de gebruikers weergeven?',
	'WWH_SORT_BY_0'				=> 'Gebruikersnaam A -> Z',
	'WWH_SORT_BY_1'				=> 'Gebruikersnaam Z -> A',
	'WWH_SORT_BY_2'				=> 'Tijd van bezoek oplopend',
	'WWH_SORT_BY_3'				=> 'Tijd van bezoek aflopend',
	'WWH_SORT_BY_4'				=> 'Gebruikers-id oplopend',
	'WWH_SORT_BY_5'				=> 'Gebruikers-id aflopend',

	'WWH_UPDATE_NEED'			=> 'De "Wie Was Hier?" extensie updaten. Omdat te doen met je de <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a>.<br /> uitvoeren. Nadat je dit gedaan hebt moet je de install/ map weer verwijderen.',

	'WWH_VERSION'				=> 'Gebruikers laten zien van ...',
	'WWH_VERSION_EXP'			=> 'Gebruikers van vandaag laten zien, of de tijdsperiode die je hebt ingesteld in onderstaande optie.',
	'WWH_VERSION1'				=> 'Vandaag',
	'WWH_VERSION2'				=> 'Tijdsperiode',
	'WWH_VERSION2_EXP'			=> 'Type 0, als je de gebruikers van de afgelopen 24-uur wilt laten zien',
	'WWH_VERSION2_EXP2'			=> 'uitgeschakeld, als je hebt gekozen voor "vandaag"',
	'WWH_VERSION2_EXP3'			=> 'seconden',

	'WWH_MOD'					=> '"Wie Was Hier?" EXT',
	'INSTALL_WWH_MOD'			=> 'Installeer "Wie Was Hier?" EXT',
	'INSTALL_WWH_MOD_CONFIRM'	=> 'Weet je zeker dat je de "Wie Was Hier?" extensie wilt installeren?',
	'UPDATE_WWH_MOD'			=> '"Wie Was Hier?" EXT updaten',
	'UPDATE_WWH_MOD_CONFIRM'	=> 'Weet je zeker dat je de "Wie Was Hier?" extensie wilt updaten?',
	'UNINSTALL_WWH_MOD'			=> 'Verwijder "Wie Was Hier?" EXT',
	'UNINSTALL_WWH_MOD_CONFIRM'	=> 'Weet je zeker dat je de "Wie Was Hier?" extensie wilt verwijderen?',
));
