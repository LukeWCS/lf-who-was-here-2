<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
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
	'WWH_CONFIG'				=> 'Configurazione',
	'WWH_TITLE'					=> 'Who was here?',
	'WWH_DISP_SET'				=> 'Impostazioni',
	'WWH_DISP_BOTS'				=> 'Visualizzare Bots',
	'WWH_DISP_BOTS_EXP'			=> 'Qualche utente potrebbe chiedersi cosa sono i bot e spaventarsi.',
	'WWH_DISP_BOTS_STRING'		=> 'Mostra in una riga separata',
	'WWH_DISP_GUESTS'			=> 'Visualizzare Ospiti',
	'WWH_DISP_GUESTS_EXP'		=> 'Visualizzare gli ospiti nel conteggio?',
	'WWH_DISP_HIDDEN'			=> 'Visualizzare utenti nascosti',
	'WWH_DISP_HIDDEN_EXP'		=> 'Visualizzare gli utenti nascosti, nella lista? (Impostare i permessi)',
	'WWH_DISP_TIME'				=> 'Mostra orario',
	'WWH_DISP_TIME_FORMAT'		=> 'Formato data',
	'WWH_DISP_HOVER'			=> 'Visualizzazione al passaggio del mouse',
	'WWH_DISP_TIME_EXP'			=> 'Verra’ visualizzato da tutti gli utenti. Nessuna funzione speciale per gli amministratori.',
	'WWH_DISP_IP'				=> 'Mostrare l’ip dell’utente',
	'WWH_DISP_IP_EXP'			=> 'Solo per gli utenti con autorizzazioni amministrative, come il viewonline.php',
	'WWH_RECORD'				=> 'Record',
	'WWH_RECORD_EXP'			=> 'Visualizza e Salva record',
	'WWH_RECORD_TIMESTAMP'		=> 'Formato Data del record',
	'WWH_RESET'					=> 'Azzera record',
	'WWH_RESET_EXP'				=> 'Azzera data e contatore del record di who-was-here.',
	'WWH_RESET_TRUE'			=> 'Compilando questo modulo, il record verrà azzerato.',// \n is the beginning of a new line
	//no space after it
	'WWH_SAVED_SETTINGS'		=> 'Configurazione aggiornata con successo.',
	'WWH_SORT_BY'				=> 'Ordina gli utenti per',
	'WWH_SORT_BY_EXP'			=> 'Ordine nel quale verranno visualizzati gli utenti',
	'WWH_SORT_BY_0'				=> 'Username A -> Z',
	'WWH_SORT_BY_1'				=> 'Username Z -> A',
	'WWH_SORT_BY_2'				=> 'Data della Visita Crescente',
	'WWH_SORT_BY_3'				=> 'Data della Visita Decrescente',
	'WWH_SORT_BY_4'				=> 'User-ID Crescente',
	'WWH_SORT_BY_5'				=> 'User-ID Decrescente',
	'WWH_UPDATE_NEED'			=> 'Aggiornare l’Estensione "Who was here?". Perciò eseguire <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a>.<br />Se avete fatto questo, è necessario eliminare la directory di installazione.',
	'WWH_VERSION'				=> 'Visualizzazione di utenti ...',
	'WWH_VERSION_EXP'			=> 'Visualizzazione utenti di oggi, o del periodo impostato nell’opzione successiva.',
	'WWH_VERSION1'				=> 'Oggi',
	'WWH_VERSION2'				=> 'Periodo di Tempo',
	'WWH_INSTALLED' 			=> 'Versione installata : %s',
));
