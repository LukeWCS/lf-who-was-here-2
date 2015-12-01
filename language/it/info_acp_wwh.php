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
	'WWH_CONFIG'				=> 'Configurazione',
	'WWH_TITLE'					=> 'Who was here?',

	'WWH_DISP_SET'				=> 'Impostazioni',
	'WWH_DISP_BOTS'				=> 'Visualizzare Bots',
	'WWH_DISP_BOTS_EXP'			=> 'Qualche utente potrebbe chiedersi cosa sono i bot e spaventarsi.',
	'WWH_DISP_GUESTS'			=> 'Visualizzare Ospiti',
	'WWH_DISP_GUESTS_EXP'		=> 'Visualizzare gli ospiti nel conteggio?',
	'WWH_DISP_HIDDEN'			=> 'Visualizzare utenti nascosti',
	'WWH_DISP_HIDDEN_EXP'		=> 'Visualizzare gli utenti nascosti, nella lista? (Impostare i permessi)',
	'WWH_DISP_TIME'				=> 'Mostra orario',
	'WWH_DISP_TIME_FORMAT'		=> 'Formato data',
	'WWH_DISP_HOVER'			=> 'Visualizzazione al passaggio del mouse',
	'WWH_DISP_TIME_EXP'			=> 'Verra\' visualizzato da tutti gli utenti. Nessuna funzione speciale per gli amministratori.',
	'WWH_DISP_IP'				=> 'Mostrare l\'ip dell\'utente',
	'WWH_DISP_IP_EXP'			=> 'Solo per gli utenti con autorizzazioni amministrative, come il viewonline.php',

	'WWH_INSTALLED'				=> 'Versione "Who was here?" v%s',

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

	'WWH_UPDATE_NEED'			=> 'Aggiornare l\'Estensione "Who was here?". Perciò eseguire <a style="font-weight: bold;" href="' . $phpbb_root_path . 'install/index.php">install/index.php</a>.<br />Se avete fatto questo, è necessario eliminare la directory di installazione.',

	'WWH_VERSION'				=> 'Visualizzazione di utenti ...',
	'WWH_VERSION_EXP'			=> 'Visualizzazione utenti di oggi, o del periodo impostato nell\'opzione successiva.',
	'WWH_VERSION1'				=> 'Oggi',
	'WWH_VERSION2'				=> 'Periodo di Tempo',
	'WWH_VERSION2_EXP'			=> '0, se si desidera visualizzare gli utenti delle ultime 24h',
	'WWH_VERSION2_EXP2'			=> 'disabilitato, se hai scelto "oggi"',
	'WWH_VERSION2_EXP3'			=> 'secondi',

	'WWH_MOD'					=> 'Estensione "Who was here?"',
	'INSTALL_WWH_MOD'			=> 'Installare l\'Estensione "Who was here?"',
	'INSTALL_WWH_MOD_CONFIRM'	=> 'Sicuro di voler installare "Who was here?"',
	'UPDATE_WWH_MOD'			=> 'Aggiorna "Who was here?"',
	'UPDATE_WWH_MOD_CONFIRM'	=> 'Sicuro di voler aggiornare "Who was here?"',
	'UNINSTALL_WWH_MOD'			=> 'Disinstallare "Who was here?"',
	'UNINSTALL_WWH_MOD_CONFIRM'	=> 'Sicuro di voler disinstallare "Who was here?"',
));
