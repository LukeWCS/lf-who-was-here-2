<?php
/**
*
* Nv who was here extension for the phpBB Forum Software package.
*
* @copyright (c) 2013 nickvergessen <http://www.flying-bits.org> - 2015 Anvar <http://apwa.ru>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated by : Bassel Taha Alhitary - www.alhitary.net
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
	'WWH_CONFIG'				=> 'ضبط "من كان هنا ؟',
	'WWH_TITLE'					=> 'من كان هنا ?',
	'WWH_DISP_SET'				=> 'إظهار الإعدادات',
	'WWH_DISP_BOTS'				=> 'إظهار محركات البحث ',
	'WWH_DISP_BOTS_EXP'			=> 'ربما يسأل بعض الأعضاء عن محركات البحث ويقلق منها.',
	'WWH_DISP_BOTS_STRING'		=> 'العرض في سطر مستقل ', // New const
	'WWH_DISP_GUESTS'			=> 'إظهار الزائرين ',
	'WWH_DISP_GUESTS_EXP'		=> 'إظهار عدد الزائرين في القائمة ؟',
	'WWH_DISP_HIDDEN'			=> 'إظهار الأعضاء المخفيين ',
	'WWH_DISP_HIDDEN_EXP'		=> 'هل تريد إظهار الأعضاء المخفيين في القائمة ؟ ( الصلاحية مطلوبة )',
	'WWH_DISP_TIME'				=> 'إظهار الوقت ',
	'WWH_DISP_TIME_FORMAT'		=> 'تنسيق الوقت ',
	'WWH_DISP_HOVER'			=> 'العرض عند الإشارة بالماوس ',
	'WWH_DISP_TIME_EXP'			=> 'سيتم إظهار الوقت لجميع الأعضاء إذا أخترت "نعم". لا يوجد تخصيص للمدراء فقط.',
	'WWH_DISP_IP'				=> 'إظهار رقم الـ IP ',
	'WWH_DISP_IP_EXP'			=> 'متاح فقط للأعضاء الذين لديهم الصلاحيات الإدارية , مثل صفحة الموجودون الآن / viewonline.php',
	'WWH_RECORD'				=> 'السجل ',
	'WWH_RECORD_EXP'			=> 'إظهار وحفظ السجل',
	'WWH_RECORD_TIMESTAMP'		=> 'تنسيق التاريخ لقائمة السجل ',
	'WWH_RESET'					=> 'إعادة ضبط السجل ',
	'WWH_RESET_EXP'				=> 'إعادة ضبط الوقت والعدد لسجل من كان هنا.',
	'WWH_RESET_TRUE'			=> 'إذا أرسلت هذا النموذج ,\nسيتم إعادة ضبط السجل.',// \n is the beginning of a new line
	//no space after it
	'WWH_SAVED_SETTINGS'		=> 'تم تحديث الإعدادات بنجاح.',
	'WWH_SORT_BY'				=> 'ترتيب الأعضاء حسب ',
	'WWH_SORT_BY_EXP'			=> 'اختار الترتيب الذي تريده لإظهار الأعضاء ?',
	'WWH_SORT_BY_0'				=> 'إسم المستخدم A -> Z',
	'WWH_SORT_BY_1'				=> 'إسم المستخدم Z -> A',
	'WWH_SORT_BY_2'				=> 'وقت الزيارة تصاعدياً',
	'WWH_SORT_BY_3'				=> 'وقت الزيارة تنازلياً',
	'WWH_SORT_BY_4'				=> 'رقم العضو تصاعدياً',
	'WWH_SORT_BY_5'				=> 'رقم العضو تنازلياً',
	'WWH_UPDATE_NEED'			=> '<a href="http://bb3.mobi/forum/viewtopic.php?t=66">دعم BB3</a>',
	'WWH_VERSION'				=> 'عرض الأعضاء خلال ...',
	'WWH_VERSION_EXP'			=> 'إظهار الأعضاء خلال اليوم ( 24 ساعة ) , أو خلال فترة مُحددة تستطيع تحديدها من الخيار التالي.',
	'WWH_VERSION1'				=> 'اليوم',
	'WWH_VERSION2'				=> 'فترة مُحددة',
));
