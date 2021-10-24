#### 2.1.1 Release
(2021-10-24) - CDB (pending)

Thanks again to Kirk and chris1278 for the good cooperation. I would also like to thank kasimi for information and recommendations.

* The PHP event `lukewcs.whowashere.display_condition` built in, with which certain variables can be overridden to change the behavior of LFWWH. Useful for WWH bridge developers.
  * The following event variables are supported for the first time:
    * `force_display`: Forces a generation of the WWH template variables outside of the index page. Important: This variable may only be set to `true` per event, but never to `false`.
    * `force_api_mode`: Forces the API mode so that WWH is not displayed, but only the WWH template variables are generated.
  * The event is used for the first time with the following WWH bridge extensions:
    * "LF Who was here Module for Board3 Portal" version 0.0.9: Event variables: `force_display`
    * "Sidebar" version 1.2.3: Event variables: `force_display`
    * "Bridge between" LF who was here "and" Statistics Block "version 2.1.1. Event variables: `force_api_mode`
* Changes to the settings (ACP).
  * The option "Show bot names only with administrative rights:" moved to the "Permissions" section and linked to the fade-out function.
  * The buttons for saving and resetting are now available below each setting group. (Suggestion from Kirk)
  * Error message when the form is invalid is now displayed in red instead of green. This was shown incorrectly in the phpBB extension documentation. Also added a back link.
  * Fallback implemented if the existing language package does not contain a variable for the message regarding the outdated language package.
* Changes to the details (ACP).
  * Homepage link to the CDB area of ​​LFWWH changed.
* Changes in the forum index (frontend).
  * The button icon now shows a time icon for users and guests. Admins see the info symbol unchanged. (Suggestion from Kirk)
  * Instead of a colon, the language variable `COLON` is used here as in the ACP template.
  * Variables of the settings are now used for the position notes. The previous language variable in the front end is no longer required.
  * The position hints are no longer generated in PHP as template variables, but taken directly from the language files via Twig and put together in the template.
* Changes to the language files.
  * ACP: The variables are now divided into different files as required. This means that the settings variables are no longer unnecessarily loaded everywhere.
  * ACP: Renamed a number of language variables and changed their position in the file for some.
  * ACP: Unnecessary redundant explanatory texts (3 in total) removed. This affects the functionality regarding hidden information.
  * ACP: The reference to "Statistics Block" has been removed from the API mode, as StatBlock-WWH-Bridge now controls this mode itself via an event.
  * ACP: Minor text changes.
  * Frontend: 1 language variable deleted.
* Miscellaneous:
  * Code: The previous check whether the portal is active in the context has been removed. This check is now carried out directly by the B3P-WWH module and then controls the behavior of LFWWH via an event.
  * Code: optimizations.

#### 2.1.0 Release
(2021-08-18) - CDB (2021-09-12)

* The requirements have changed:
  * phpBB 3.2.10 (previously 3.1.11) up to and including phpBB 3.3.
  * PHP 7.0 (previously 5.3) up to and including PHP 8.0.
* The extension was put on the functional basis of phpBB 3.2, which means that it is now incompatible with phpBB 3.1.
  * Old phpBB functions that have been classified as DEPRECATED since phpBB 3.2 are no longer used. Instead, functions are used that were introduced in phpBB 3.2 and also in 3.3. are still valid.
  * Special adjustments that were still necessary for phpBB 3.1 have been removed.
* The extension can only be activated and installed if the requirements for phpBB and PHP are met. Both the minimum version and the maximum version are taken into account.
* Changes to the settings (ACP).
  * The simple authorization system also has an option for the bots. This setting was still missing in order to be able to set LFWWH completely to the behavior of NVWWH if necessary.
  * In the case of date format fields, their current display is shown as a demo behind them.
  * A notice will be displayed below the title if the language pack is out of date.
  * A footer has been added that shows the author information of the language pack translator.
  * The actual name of the extension is no longer part of the title, but of the description below the title.
  * The description below the title has been redesigned. Among other things, the CDB link has been removed.
  * The phpBB standard function "Up" has been added below each setting group.
* Changes in the forum index (frontend).
  * Most of the HTML code has been moved from PHP to the template. For example, the HTML of the button and the debug message can be changed, and the lines for users and bots can be better adapted.
  * The position of the button for displaying the additional information (time, IP) is no longer controlled via a language variable, but directly in the template.
  * There are 4 new template variables.
  * Added CSS classes for time and IP so that this information can be adapted via style template. (Request from Kirk)
  * The folder `prosilver` was removed and everything moved to` all`. This enables easier adjustments of prosilver itself, since its folder is no longer affected by changes during updates.
* Changes to the language files.
  * Renamed several language variables.
  * Added several language variables.
  * Minor text changes.
  * The previous author information of the language pack translator has been removed from the comment block.
* Others:
  * Javascript converted to jQuery as far as possible.

#### 2.0.0 Release
(2020-03-29) - CDB (2020-07-06)

* With a small change, the code is now also compatible with PHP 5.3 - 5.5: power operator `**` replaced by `pow ()`.
* Template changes: No.
* Language file changes: No.

#### 2.0.0 RC 2
(2019-12-24)

**Important: if you want to update an existing installation of "LF who was here 2" Pre-Release, please read the following instructions: [Updating a developer version (dev, beta, RC) of "LF who was here 2"](https://github.com/LukeWCS/lf-who-was-here-2/blob/master/README_updating_a_developer_version.md)**

* Renamed the twig variable `lfwwh_pos_exp` to `lfwwh_debug_msg`, as other debug information is conceivable in the future.
  * Renamed CSS class `.lfwwh_pos_exp` to `.lfwwh_debug`.
* Template changes: Yes
* Language file changes: Yes

Bug fixes:

* Fix: Due to the order in which events were executed, the actual status was not necessarily displayed when the index page was called, since the event for the display was always carried out first and then the event for the update. As a result, the statistics, the times and the user list were not up to date. If the page was updated, i.e. reloaded, the correct status was displayed. This was a design flaw rather than a real bug and only occurred in practice when the cache was disabled. If the cache is activated, the last updated information is only displayed after a delay (>= 1 minute).
  * Another event is now used in the listener for the display. To avoid potential performance losses, the function for generating the template variables is only executed when it is actually needed, i.e. when the index page or the portal is called.
* Fix: With some styles it could happen that the info symbol (awesome font) did not get the text color as intended, but a color that was defined via the CSS class `.icon`. Depending on the choice of color, the icon was practically indistinguishable from the background.
  * CSS changed.

The additional archive `lf-who-was-here-2_style-templates-3-2.zip` contains templates for the following styles: 

* AcidTech
* BlackBoard
* Blackfog
* Dark Vision
* Flat Style
* HexagonReborn
* Orange_BBEs
* Project Durango
* rain_forest
* Rock'n Roll

#### 2.0.0 RC 1
(2019-12-14)

**Important: if you want to update an existing installation of "LF who was here 2" Pre-Release, please read the following instructions: [Updating a developer version (dev, beta, RC) of "LF who was here 2"](https://github.com/LukeWCS/lf-who-was-here-2/blob/master/README_updating_a_developer_version.md)**

* Name changed from "LF who was here (2.x)" to "LF who was here 2" and author information was changed in all files.
* Minimum requirement for PHP changed from 5.3.3 to 5.6.0.
* Minor corrections in the language files.
* Renamed language variable `LFWWH_WORD` to` LFWWH_AND_SEPARATOR`.
* The text for "no members" is no longer loaded via the variable `NO_ONLINE_USERS` from the phpBB language pack, but can be defined independently.
  * Language variable `LFWWH_NO_USERS` added.
* The Twig condition `|| LFWWH_BOTS` is not required and has been removed from all template files (5 in total).
* If the test mode "Show all template positions at the same time:" is activated, the associated position is now displayed for all templates, which means that a template can be identified without any doubt.
  * This also required changes in 4 template files and 1 CSS file.
  * Language variable `LFWWH_POS_EXP` added.
* Template changes: Yes
* Language file changes: Yes

The additional archive `lf-who-was-here-2_style-templates-3-2.zip` contains templates for the following styles: 

* AcidTech
* BlackBoard
* Blackfog
* Dark Vision
* Flat Style
* HexagonReborn
* Orange_BBEs
* Project Durango
* rain_forest
* Rock'n Roll

#### 2.0.0 Beta 3
(2019-06-02)

**Important: if you want to update an existing installation of "LF who was here 2" Pre-Release, please read the following instructions: [Updating a developer version (dev, beta, RC) of "LF who was here 2"](https://github.com/LukeWCS/lf-who-was-here-2/blob/master/README_updating_a_developer_version.md)**

* The method with which additional text was inserted in the confirmation message when deleting user accounts had to be changed, since this is problematic from phpBB 3.2. Instead, a special language file is now loaded to change (expand) the required official language variables for the duration of the process.
* According to the concept of LF-WWH, that those settings are dimmed, which have no meaning at present, the same rules now apply to the group rights. This means that the group rights are always displayed. However, they are dimmed if they currently have no function. This is true if either the phpBB rights system is disabled or the administrator mode is enabled. This also fixes the previous design error that the group rights were displayed even if both the phpBB rights system and the administrator mode were activated.
* In the German language files of the ACP module the American quotes replaced by German.
* GitHub repository for Travis CI set up with the following tests:
  * PHP_CodeSniffer (phpcs): Analysis tool for checking PHP programming standards according to phpBB standard.
  * Extension Pre Validator (EPV): Analysis tool for checking the specifications for extensions according to phpBB standard.
* Fixed all issues reported by PHP_CodeSniffer.
* Template changes: No
* Language file changes: Yes

Bug fixes:

* Fix: If the right "Can view statistics" was missing in the context, the template variables for the description text of period of time and for the visitor record were nevertheless generated. This was caught by the queries in the template, but consequently these template variables are now effectively generated as "empty" if the required right is missing.
* Fix: With the setting "Display of the visitors of ..." -> "Today" and the time change to summer time, the following day (2019-04-01) did not start until 01:00 o'clock. (report from Wolkenbruch)
  * Error #1: The calculation of the deletion timestamp was incorrectly based on the PHP date. The timeout error now occurred when different time zones were defined for PHP and phpBB. This meant that on the following day, ie on 2019-04-01 at 00:00:00 clock a timestamp was calculated, which belonged to the previous day. As a result, no switch to the new day was made at this time, this took place at 01:00:01 clock. Now an independent time object with its own time zone is generated, on the basis of which the deletion timestamp is calculated. The time object is assigned the same time zone, which is also set in phpBB. Thus, the time zone of PHP is no longer relevant.
  * Error #2: An incorrect correction formula for the deletion timestamp and different time zones of PHP and phpBB resulted in the calculated timestamp at 01:00:01 clock being an incorrect time (01:00:00). As a result, on 2019-04-01 at 01:00:01 clock not only all entries from the visitor table were deleted that were older than 00:00:00 clock, but also the entries between 00:00:00 clock and 01:00:00 clock. Fixing error #1 eliminates the need for this correction formula and has been removed.
  * Both errors would have had an impact on different time zones of PHP and phpBB also in the time change from summer time to standard time. It would have been because of error #2 on 2019-10-27 already at 23:00:01 clock a cleanup with the wrong timestamp (23:00:00) executed. On 2019-10-28 at 00:00:00 clock however no cleanup would have taken place and with it also no switching, since the needed timestamp would have been wrong because of both errors. On 2019-10-28 at 01:00:00 clock then a further cleanup would have taken place, which would then have been carried out correctly.
  * When changing from summer time to normal time, error #2 would have resulted in a wrong switch even if both time zones (PHP and phpBB) were identical. So this bug would have affected all boards that have summer time (DST). On 2019-10-27 at 23:00:01 clock then a cleanup with wrong timestamp (23:00:00) would have been executed. On 2019-10-28 at 00:00:00 clock then a further cleanup would have taken place, which would have been carried out correctly.
* Fix: With the setting "Display of the visitors of ..." -> "Today" due to an error in the MySQL query, visitors of the current day with the exact time 00:00:00 were assigned to the previous day and at the cleanup mistakenly deleted.

#### 2.0.0 Beta 2
(2019-04-28)

**Important: if you want to update an existing installation of "LF who was here 2" Pre-Release, please read the following instructions: [Updating a developer version (dev, beta, RC) of "LF who was here 2"](https://github.com/LukeWCS/lf-who-was-here-2/blob/master/README_updating_a_developer_version.md)**

* When displaying the time of users and bots, the contents of the language variables `LFWWH_LAST1` and `LFWWH_LAST2` can now be dynamically inserted in the time format using the placeholders `$1` and `$2`. In addition to increased flexibility, this also has the advantage that the setting for the display of "last at" is stored regularly in the configuration and no longer has to be controlled via the language file by setting/clearing the variable.
  * In addition, there is the language variable `LFWWH_LAST3` for "last on" which can be addressed with `$3`.
  * In the ACP module, the placeholders `$1`, `$2` and `$3` are indicated accordingly in the explanation text of "Time format:".
    * The explanatory text in the language file is designed so that the current contents of the placeholders are inserted dynamically from the language file.
  * With "Time format:" the placeholder `$1` is now entered during a new installation, whereby by default also "last at" is displayed again. This also applies to the "Defaults" button in the ACP module.
* Language files:
  * From this version the language variable `LFWWH_LAST1` has the original standard content again. For the first time `LFWWH_LAST2` has a standard content. These changes occurred because these variables are no longer generally used when displaying the user time from this version, but can be inserted via placeholders if required.
  * In `who_was_here.php` renamed the variable `LFWWH_RECORD` to `LFWWH_RECORD_DAY`, otherwise there would be an overlap with `info_acp_who_was_here.php`, where this variable was also used.
  * Minor corrections.
  * Renaming of some variables.
* ACP module:
  * The setting "Date format for the visitor record:" now has its own explanation text. This was previously obtained from "time format:", but its content is no longer valid for both settings.
    * Correspondingly added 1 new variable in the language files.
* It is now possible to switch off the number of visible members in the statistics line, just as it was possible for invisible users, bots and guests. Thus, now every part except the total sum can be switched off. (Wish of stefan-franz)
  * Added a new setting in the ACP module, by default the switch is activated. The statistics line will be displayed as usual.
  * In the language files for "Show visible users (number):" added 2 new variables.
  * Changed the headings of the other settings (invisible users, bots and guests) accordingly, so that it is immediately obvious whether it is only about the number or number plus names.
  * In order for the statistics line to be able to adapt dynamically to any conceivable setting combination of the 4 said switches, the separator "::" has been moved to a separate language variable so that this separator can be controlled in a targeted manner.
* The function that generates the HTML for the info buttons (Users and Bots) has been completely redesigned. (based on a suggestion by Kirk)
  * No button will be created anymore, just a `<span>` container that reacts to the mouse event `onclick`. This also eliminated the previous nesting of a button container and a label container.
  * This also eliminates special style adjustments for `<button>`, which were previously necessary. Accordingly, the previous class CSS for the button removed.
  * Added a new class CSS to prevent the adjacent text of the "button" from being marked with a quick multiple click.
  * Javascript adapted to these changes.
* Javascript:
  * Info button: Global variables and function grouped together in an object and set directive `use strict`.
  * ACP module: Functions summarized in one object and set directive `use strict`.
* Template changes: No
* Language file changes: Yes

The additional archive `lf-who-was-here-2_style_templates_for_phpBB-3-2.zip` contains templates for the following styles: 

* Absolution
* AcidTech
* BlackBoard
* Blackfog
* CleanSilver
* Dark Vision
* Flat Style
* HexagonReborn
* Orange_BBEs
* Project Durango
* rain_forest
* Rock'n Roll

#### 2.0.0 Beta 1
(2019-04-14)

* Complete conversion to an independent extension with own structures. As a result, the fork stops building on "bb3mobi\washere". This concerns the following areas:
  * Extension folder ("lukewcs\whowashere").
  * All paths within the files (.php, .html, .yml, .json).
  * Configuration variables in the database.
  * Table of visitors in the database.
  * Rights.
  * Variables of the templates.
  * Variables of the language files.
* Automatic data transfer from NV-WWH (any version) and LF-WWH 1.x (any version):
  * To do this, the old WWH extension must first be installed so that the data can be imported when installing LF-WWH 2.x. This happens automatically as soon as LF-WWH 2.x is activated for the first time. The complete configuration including visitor record is taken over, as well as the current visitor table. The old extension may also remain activated, which is technically intended and legitimate.
  * However, the rights are not taken over here, so they may need to be adjusted after installation if the full rights system of phpBB was used. If only the simplified rights system of LF-WWH was used ("Display for guests:"), this step can be omitted.
  * The data transfer also has the advantage that even a defective installation of NV-WWH can be quasi-updated because only the data is transferred, but no folder and file structures.
* If user accounts are deleted and, as a result, cleanup of the WWH table and the WWH display becomes necessary, then an additional LF-WWH notification will be inserted within the delete confirmation (displayed by phpBB) containing the WWH display was cleaned up. This notification only appears if the cleanup is also enabled (default) and if it actually had to be cleaned up.
* ACP module:
  * The page title (browser) now has the addition "- Settings".
  * The information line for the version and for the link can now be freely designed in the language files.
    * Correspondingly adapted the variable `LFWWH_INSTALLED` in the language files and removed` LFWWH_MOD_SUPPORT`.
  * With "Reset visitor record -> Yes" now not only a message is displayed, which is reset when saving the record, but also a query is executed. If this inquiry is confirmed with "Cancel", the reset switch is reset to "No".
    * Accordingly adapted in the language files the previous text of the message.
    * The "Yes" radio button no longer responds to multiple clicks. This causes the message to be displayed only once unless the switch is reset to "No".
  * Since the original WWH ("NV who was here?" For phpBB 3.0), when the visitor record was reset, the date of the reset was saved to the database, but never displayed or otherwise evaluated. This date will now be shown as "Yes / No" on "Reset Visitor Record" if a reset has taken place.
    * Added 1 new variable in the language files for "Reset on:".
  * Added a new section.
    * In the language files for "Server load" added 1 new variable.
    * Moved the items "Use cache for the visitor table:", "Update with the view online time span:" and "Interval of the update:" to the new section.
  * For "Period of time:" the input fields for hours, minutes and seconds are no longer defined for text but for numbers. These are now also checked for lower limit (0) and upper limit (99999).
* The rights have been changed:
  * The previous right "Can see members and statistics" was changed to "Can See members". If a group should see both the statistics and the members list, then both rights must be set. So it is now possible, e.g. just show the members list.
  * In the ACP module the new option "Members" has been added accordingly for the simple rights system.
  * Customized installation standard for the default groups and user roles.
  * In the language files 1 variable added and 3 changed.
* The templates have been revised again:
  * Necessary changes have been made regarding the changed rights.
  * Twig logic regarding inserting `<br />` changed.
  * Twig logic with respect to the switch "Show all template positions at the same time:" changed so that the previous template variable `LFWWH_POS_ALL` can be omitted. This is now controlled via bit values ​​in the variable `LFWWH_POS` and queried in the template via a bit operator.
  * An `INCLUDEJS` only takes place once more. This is relevant for the setting "Show all template positions at the same time:" or if extensions are used, include the WWH via template variables, like e.g. `Bridge between "LF who was here" and "Stat BLock"`.
* All style templates except "prosilver" removed. The previous 10 templates for phpBB 3.2 are available as a separate archive for LF-WWH 2.0.0, but will not be included in future updates.
* The cache can now be disabled completely. This updates the WWH display almost without delay. This feature is only suitable for smaller forums with less visitors. For larger forums, disabling the cache can lead to performance issues and is not recommended. (wish of Kirk)
  * Added a new setting in the ACP module to disable the cache when needed. By default, it is activated.
  * Added 2 new variables in the language files for "Use Visitor Table Cache:".
* The display of the IP is no longer linked to the display of time, but can now be set completely independently (such as the display of the time). (based on a wish of Wolkenbruch)
  * In order to make this function more flexible (independent), the corresponding code section (for the display of time and IP behind the name or as mouseover) in the core script was written from scratch and optimized.
  * The switch "Show user IP:" now no longer has the option buttons "Yes / No" as a selection option, but a selection list with the same 3 options as with "Show time of...".
  * Language variable adjusted accordingly.
* WWH display:
  * The time and/or IP display button no longer uses the time icon but the info icon.
  * A separate tooltip can now be defined in the language files for the button. Previously, the alternative caption for phpBB 3.1 was used as tooltip.
  * The alternate caption for the phpBB 3.1 button has now been replaced with a Unicode character that looks similar like the Info icon of the Awesome font for phpBB 3.2.
    * Accordingly, in the language files that variable is removed.
* The new administrator mode allows that only users with administrative rights WWH can see. The other authorization systems are suspended. This is e.g. helpful if you want to make changes to the settings or rights and test without the WWH being visible to all.
  * Added a new setting in the ACP module accordingly.
  * Added 2 new variables in the language files for "Administrator mode:".
* Users who have activated the feature "Invisible" temporarily (at login) or permanently (in profile) can now see themselves in the WWH user list, as with "Who is online" the case is.
* CSS:
  * The previous secondary class name `online-list` was changed to `whowashere-list`, so by Style Designer and Ext Coder "Who was here?" regardless of "Who is online?" can be addressed.
  * The CSS for the info buttons has been paged out of the code in a separate CSS file.
* A new setting now allows you to completely disable the generation of the info button and the hidden information (time, IP).
  * Added a new setting in the ACP module to disable this feature. By default, this feature is enabled.
  * Added 2 new variables in the language files for "Create hidden information:".
* Template changes: Yes
  * Note for extension authors: The template condition `&& !LFWWH_API_MODE` may not be used as it is only intended for LF-WWH.
* Language file changes: Yes

Bug fixes:

* Fix: If there were currently no bots listed in the table in the setting combination "Show Bots: > With the users" and "Show time of bots: > On hover", the button for displaying the hidden information was nevertheless displayed generated.
* Fix: Firefox did not show a tooltip for the info button. (report from Kirk)

The additional archive `lf-who-was-here-2_style_templates_for_phpBB-3-2.zip` contains templates for the following styles: 

* Absolution
* acidtech
* BlackBoard
* Blackfog
* CleanSilver
* flat-style
* HexagonReborn
* Orange_BBEs
* rain_forest
* rockn_roll
