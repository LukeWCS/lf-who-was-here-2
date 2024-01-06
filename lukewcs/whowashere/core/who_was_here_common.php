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

namespace lukewcs\whowashere\core;

class who_was_here_common
{
	protected $language;
	protected $template;
	protected $ext_manager;

	protected $metadata;
	protected $u_action;

	public function __construct(
		\phpbb\language\language $language,
		\phpbb\template\template $template,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->language		= $language;
		$this->template		= $template;
		$this->ext_manager	= $ext_manager;

		$this->metadata		= $this->ext_manager->create_extension_metadata_manager('lukewcs/whowashere')->get_metadata('all');
	}

	public function set_this(
		$u_action
	): void
	{
		$this->u_action = $u_action;
	}

	public function set_template_vars($tpl_prefix): void
	{
		$this->template->assign_vars([
			$tpl_prefix . '_METADATA'	=> [
				'EXT_NAME'		=> $this->metadata['extra']['display-name'],
				'EXT_VER'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->metadata['version']),
				'LANG_DESC'		=> $this->language->lang($tpl_prefix . '_LANG_DESC'),
				'LANG_VER'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->language->lang($tpl_prefix . '_LANG_VER')),
				'LANG_AUTHOR'	=> $this->language->lang($tpl_prefix . '_LANG_AUTHOR'),
				'CLASS'			=> strtolower($tpl_prefix) . '_footer',
			],
		]);
	}

	public function check_form_key_error($key): void
	{
		if (!check_form_key($key))
		{
			trigger_error($this->language->lang('FORM_INVALID') . $this->back_link(), E_USER_WARNING);
		}
	}

	public function back_link($lang_var = null): string
	{
		return sprintf('<br><br><a href="%1$s">%2$s</a>',
			/* 1 */ $this->u_action,
			/* 2 */ $this->language->lang($lang_var ?? 'BACK_TO_PREV')
		);
	}

	// Determine the version of the language pack with fallback to 0.0.0
	public function get_lang_ver(string $lang_ext_ver): string
	{
		preg_match('/^([0-9]+\.[0-9]+\.[0-9]+)/', $this->language->lang($lang_ext_ver), $matches);
		return ($matches[1] ?? '0.0.0');
	}

	// Check the language pack version for the minimum version and generate notice if outdated
	public function lang_ver_check_msg(string $lang_version_var, string $lang_outdated_var): string
	{
		$lang_outdated_msg = '';
		$ext_lang_ver = $this->get_lang_ver($lang_version_var);
		$ext_lang_min_ver = $this->metadata['extra']['lang-min-ver'];

		if (phpbb_version_compare($ext_lang_ver, $ext_lang_min_ver, '<'))
		{
			if ($this->language->is_set($lang_outdated_var))
			{
				$lang_outdated_msg = $this->language->lang($lang_outdated_var);
			}
			else // Fallback if the current language package does not yet have the required variable.
			{
				$lang_outdated_msg = 'Note: The language pack for the extension <strong>%1$s</strong> is no longer up-to-date. (installed: %2$s / needed: %3$s)';
			}
			$lang_outdated_msg = sprintf($lang_outdated_msg, $this->metadata['extra']['display-name'], $ext_lang_ver, $ext_lang_min_ver);
		}

		return $lang_outdated_msg;
	}
}
