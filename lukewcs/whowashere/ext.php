<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2010, nickvergessen
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\whowashere;

class ext extends \phpbb\extension\base
{
	public function is_enableable()
	{
		$valid_phpbb = phpbb_version_compare(PHPBB_VERSION, '3.3.0', '>=') && phpbb_version_compare(PHPBB_VERSION, '3.4.0-dev', '<');
		$valid_php = phpbb_version_compare(PHP_VERSION, '7.4.0', '>=') && phpbb_version_compare(PHP_VERSION, '8.5.0-dev', '<');

		return $valid_phpbb && $valid_php;
	}
}
