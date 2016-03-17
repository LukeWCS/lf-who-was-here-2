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
	'WWH_CONFIG'				=> 'Configuration',
	'WWH_TITLE'					=> 'Qui est venu ?',
	'WWH_DISP_SET'				=> 'Paramètres d’affichage',
	'WWH_DISP_BOTS'				=> 'Afficher les robots',
	'WWH_DISP_BOTS_EXP'			=> 'Permet d’afficher les robots dans le compteur. Merci de prendre en compte que, pour la plupart, les utilisateurs ne savent pas ce que sont les robots.',
	'WWH_DISP_BOTS_STRING'		=> 'Afficher séparément sur une nouvelle ligne', // New const
	'WWH_DISP_GUESTS'			=> 'Afficher les invités',
	'WWH_DISP_GUESTS_EXP'		=> 'Permet d’afficher les invités dans le compteur.',
	'WWH_DISP_HIDDEN'			=> 'Afficher les utilisateurs invisibles',
	'WWH_DISP_HIDDEN_EXP'		=> 'Permet d’afficher les utilisateurs invisibles dans le compteur. Des permissions adéquates sont nécessaires.',
	'WWH_DISP_TIME'				=> 'Afficher la date et l’heure',
	'WWH_DISP_TIME_FORMAT'		=> 'Format de la date',
	'WWH_DISP_HOVER'			=> 'Au survol de la souris',
	'WWH_DISP_TIME_EXP'			=> 'Permet d’afficher la date et l’heure de visite pour tous les utilisateurs. Les administrateurs n’ont pas d’avantage supplémentaire.',
	'WWH_DISP_IP'				=> 'Afficher l’adresse IP de l’utilisateur',
	'WWH_DISP_IP_EXP'			=> 'Permet aux administrateurs de voir l’adresse IP de l’utilisateur.',
	'WWH_RECORD'				=> 'Record',
	'WWH_RECORD_EXP'			=> 'Permet d’afficher le record de visites et de l’enregistrer.',
	'WWH_RECORD_TIMESTAMP'		=> 'Format de la date du record',
	'WWH_RESET'					=> 'Réinitialiser le record',
	'WWH_RESET_EXP'				=> 'Réinitialise la date et la valeur du record de l’extension : « Qui est venu ? ».',
	'WWH_RESET_TRUE'			=> 'En validant ce formulaire,\nle record sera réinitialisé.',// \n is the beginning of a new line
	//no space after it
	'WWH_SAVED_SETTINGS'		=> 'La configuration a été mise à jour avec succès.',
	'WWH_SORT_BY'				=> 'Trier les utilisateurs par',
	'WWH_SORT_BY_EXP'			=> 'Ordre d’affichage des utilisateurs.',
	'WWH_SORT_BY_0'				=> 'Nom d’utilisateur A -> Z',
	'WWH_SORT_BY_1'				=> 'Nom d’utilisateur Z -> A',
	'WWH_SORT_BY_2'				=> 'Heure de visite croissante',
	'WWH_SORT_BY_3'				=> 'Heure de visite décroissante',
	'WWH_SORT_BY_4'				=> 'ID d’utilisateur croissant',
	'WWH_SORT_BY_5'				=> 'ID d’utilisateur décroissant',
	'WWH_UPDATE_NEED'			=> '<a href="http://bb3.mobi/forum/viewtopic.php?t=66">BB3 Support</a>',
	'WWH_VERSION'				=> 'Affichage des utilisateurs',
	'WWH_VERSION_EXP'			=> 'Afficher les utilisateurs du jour (à partir de minuit et selon le fuseau horaire du forum) ou suivant la période de temps définie dans l’option ci-dessous.',
	'WWH_VERSION1'				=> 'Aujourd’hui',
	'WWH_VERSION2'				=> 'Période de temps',
	'WWH_INSTALLED' 			=> 'Version installée : %s',
));
