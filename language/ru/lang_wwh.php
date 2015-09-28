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

$lang = array_merge($lang, array(
// for the normal sites
	'WHO_WAS_HERE'					=> 'Кто сегодня был на конференции',
	'WHO_WAS_HERE_LATEST1'			=> 'последнее посещение',
	'WHO_WAS_HERE_LATEST2'			=> '',//used for parts like o'clock in the timedisplay (last at vw:xy "o'clock")

	'WHO_WAS_HERE_TOTAL'			=> array(
		0		=> '',
		1		=> 'Сегодня здесь был <strong>%d</strong> посетитель: ',
		2		=> 'Сегодня здесь было <strong>%d</strong> посетителя. Из них: ',
		3		=> 'Сегодня здесь было <strong>%d</strong> посетителей. Из них: ',
	),
	'WHO_WAS_HERE_REG_USERS'		=> array(
		0		=> '0 зарегистрированных',
		1		=> '%d зарегистрированный',
		2		=> '%d зарегистрированных',
	),
	'WHO_WAS_HERE_HIDDEN'			=> array(
		0		=> '0 скрытых',
		1		=> '%d скрытый',
		2		=> '%d скрытых',
	),
	'WHO_WAS_HERE_BOTS'				=> array(
		0		=> '0 ботов',
		1		=> '%d бот',
		2		=> '%d бота',
		3		=> '%d ботов',
	),
	'WHO_WAS_HERE_GUESTS'			=> array(
		0		=> '0 гостей',
		1		=> '%d гость',
		2		=> '%d гостя',
		3		=> '%d гостей',
	),

	'WHO_WAS_HERE_WORD'				=> ' и',
	'WHO_WAS_HERE_EXP'				=> 'основано на активности посетителей за последние сутки',
	'WHO_WAS_HERE_EXP_TIME'			=> 'основано на активности за последние ',
	'WWH_HOURS'						=> array(
		0		=> '',
		1		=> '%%s %1$s час',
		2		=> '%%s %1$s часа',
		3		=> '%%s %1$s часов',
	),
	'WWH_MINUTES'					=> array(
		0		=> '',
		1		=> '%%s %1$s минуту',
		2		=> '%%s %1$s минуты',
		3		=> '%%s %1$s минут',
	),
	'WWH_SECONDS'					=> array(
		0		=> '',
		1		=> '%%s %1$s секунду',
		2		=> '%%s %1$s секунды',
		3		=> '%%s %1$s секунд',
	),
	'WHO_WAS_HERE_RECORD'			=> 'Больше всего посетителей: <strong>%1$s</strong>, здесь было: %2$s',
	'WHO_WAS_HERE_RECORD_TIME'		=> 'Рекорд посещаемости за сутки был: <strong>%1$s</strong>, между %2$s и %3$s',
));
