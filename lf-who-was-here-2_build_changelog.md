* B57:
  * Code: `ext.php` weiter reduziert.
* B56:
  * ACP: Unterhalb jeder Einstellungsgruppe mit Ausnahme der letzten die Standardfunktion "Nach oben" eingebaut.
  * Sprachdatei: Version im Kommentarblock auf 2.1.0 geändert.
  * Composer: Version um `-dev` erweitert.
* B55:
  * Code: Ext kann nur noch aktiviert werden, wenn die Mindestvoraussetzungen erfüllt sind. Realisiert mit `ext.php`.
  * Migration: 2.1.0 setzt jetzt phpBB 3.2 voraus.
* B54:
  * Migration: Deaktivierten Code entfernt.
  * ACP: 3.1-Artefakte übersehen in `acp_who_was_here_module.php`. Mehrere Änderungen. (Meldung Kirk)
  * ACP: Überflüssige Template Variable `LFWWH_CONFIG_TITLE` entfernt. Deren Inhalt wird jetzt direkt per Twig aus der Sprachdatei geholt.
  * ACP: Überflüssige Template Variable `LFWWH_DISP_TIME_FORMAT_EXP` entfernt. Deren Inhalt wird jetzt direkt per Twig aus der Sprachdatei geholt und zusammengesetzt.
  * ACP: `acp_who_was_here.html` überarbeitet.
* B53:
  * Mindestvoraussetzungen jetzt phpBB 3.2 und PHP 5.6.
  * ACP: Im einfachen Rechtesystem neue Option für die Bots hinzugefügt.
  * ACP: Konfig-Titel und Konfig-Beschreibung werden jetzt anders dargestellt. Ausserdem CDB Link entfernt.
  * ACP: Für die Anzeige von Ext-Name und Ext-Version wird jetzt der ExtManager benutzt.
  * ACP: Javascript weitestgehend durch jQuery ersetzt.
  * Code: Letzte Validierungs-Kritik von kasimi bei 2.0.0 berücksichtigt.
  * Code: Array-Definitionen auf kurze Notation umgestellt, dadurch inkompatibel zu PHP 5.3.
  * Code: Wie ursprünglich schon mal verwendet, den neuen Power Operator anstelle `pow()` notiert, dadurch inkompatibel zu PHP <5.6.
  * Code: Ext auf Funktions-Basis von phpBB 3.2 gestellt, dadurch inkompatibel zu phpBB 3.1. Betrifft u.a. das Sprach-Objekt.
  * Code: Sonderanpassungen für phpBB 3.1 entfernt. Betrifft primär die Index-Anzeige.
  * Template: Weitgehend HTML vom Core ins Template verlagert. Dabei Möglichkeiten von Twig genutzt, z.B. Makros.
  * Template: Ordner `prosilver` entfernt und alles in `all` organisiert.
  * Template: Primäres Event Template für `INCLUDECSS` (auch `INCLUDEJS`) ist nicht mehr `overall_header_head_append.html` sondern `index_body_markforums_before.html`, dadurch inkompatibel zu phpBB 3.1
  * Template: Javascript weitestgehend durch jQuery ersetzt.
  * Template: CSS Klassen für Zeit und IP hinzugefügt.
  * Migration: Ext-Version aus DB Config entfernt, in der Migration werden jetzt andere Prüfmerkmale verwendet.
  * Sprachdatei: Speziellen PHP Code aus der Permissions Sprachdatei entfernt und Prozedur anders realisiert. Änderung in B52 hinfällig.
  * Sprachdatei: Mehrere Sprachvariablen umbenannt.
  * Sprachdatei: Mehrere Text Änderungen in den Sprachdateien.
  * Github: `README.md` angepasst.
* B52:
  * Sprachdatei: In der Datei für die Rechte wird jetzt nicht mehr mit `$GLOBALS` auf die Konfiguration zugegriffen, sondern mit `$phpbb_container`.
  * Sprachdatei: Kleinere Änderungen in den Sprachdateien.
  * Code: Aufgrund des aktuellen phpBB Ext Check Berichts mehrere Fehler behoben.
  * Github: Github Actions eingerichtet. 

### Builds 2.0.0

* B51:
  * Einen Teil der Änderungen von B50 soweit rückgängig gemacht, dass die GitHub Version 2.0.0-b51 exakt der offiziellen CDB Version 2.0.0 entspricht. Die Änderungen von B50 werden zu einem späteren Zeitpunkt wieder eingefügt.
  * Datei für Versionsprüfung so geändert, dass auch bei Betas und RCs die offizielle Version von CDB gemeldet wird inklusive direkter Download-Möglichkeit von CDB. Bei einem der nächsten Updates wird diese Datei dann vom Repository entfernt.
  * Alle Dateien und Ordner für den Dienst "Travis CI" entfernt und den Dienst deaktiviert. Ich setze stattdessen bereits seit 2019 "phpBB Ext Check" ein, was zum einen deutlich umfangreicher prüft als Travis CI (nach phpBB Standard) und zum anderen erheblich übersichtlichere Ergebnisse (Status und Logs) liefert.
* B50:
  * Automatische Korrektur von CDB in `composer.json` übernommen.
  * Kleinere Änderungen in den Sprachdateien.
  * `.gitattributes` geändert: `LICENSE` auf ignorieren gesetzt, damit das beim Download nicht mehr enthalten ist.
  * Von VariableAnalysis gemeldete Fehler behoben.
* B49: (CDB Validation Release 2)
  * Alle bei der Validierung festgestellten Fehler behoben.
  * Kleinere Änderungen in den Sprachdateien.
  * Im Repository Root `LICENSE.md` in `LICENSE` umbenannt da es sich nicht um Markdown handelt und somit das Suffix falsch war. Ausserdem Datei aktualisiert und Inhalt von Skeleton Extension übernommen.
* B48: (CDB Validation Release 1)
  * Kompatibilität zu PHP <5.6.
  * `composer.json` aktualisiert: auf Release 2.0.0 umgestellt.
* B47: (RC2)
  * `composer.json` aktualisiert.
* B46:
  * Fix: Die Änderung bei B45 funktionierte nicht, wenn die Startseite per `.htaccess` auf das Portal umgebogen wurde. (Meldung Kirk)
* B45:
  * Fix: Durch eine Änderung in B43 wurde im Portal das WWH Modul nicht mehr angezeigt. (Meldung Kirk)
* B44:
  * Kleinere Korrekturen in den Sprachdateien.
  * `README_updating_a_developer_version.md` geändert.
  * Die Twig Variable für die Anzeige der Template Position umbenannt, da diese auch für andere Informationen dienen kann.
  * Kleinere Code Änderungen.
* B43:
  * Fix: Problematik bei der Aktualisierung der Anzeige behoben, `display()` wird im Listener jetzt über ein anderes Event getriggert.
  * Fix: Designschwäche der Info-Buttons (Icons) bezüglich Textfarbe behoben. CSS geändert.
* B42: (RC1)
  * `composer.json` aktualisiert.
* B41:
  * `README.md` geändert.
  * `composer.json` geändert: Version hat ab jetzt den Zusatz RC1.
  * Eine unnötige Twig Bedingung aus allen Templates entfernt.
  * Wenn alle Templates gleichzeitig aktiviert werden, dann wird jetzt auch die zugehörige Position angezeigt.
  * 1 Sprachvariable hinzugefügt.
* B40:
  * Der Text "0 Mitglieder" wird nicht mehr vom phpBB Sprachpaket bezogen.
  * 1 Sprachvariable hinzugefügt.
  * `README.md` geändert.
* B39:
  * Kleinere Korrekturen in den Sprachdateien.
  * 1 Sprachvariable umbenannt.
  * `composer.json` geändert: Mindestanforderung bei PHP geändert. Ext Name gekürzt. Beta-Merkmal entfernt.
  * Autoreninfo in allen Dateien entsprechend angepasst.
  * `README.md` geändert.
  * `README_updating_a_developer_version.md` geändert.
  * Vorbereitungen auf Release. 
* B38: (beta3)
  * Kleinere Änderungen in den Sprachdateien.
  * Code bereinigt.
* B37:
  * Fix: Fehler in MySQL Abfrage behoben. Bei der Einstellung "Heute" wurden Einträge in der Besuchertabelle mit der Uhrzeit 00:00:00 zum Vortag gezählt.
  * Kleinere Code Optimierungen bei `display()`.
  * Den Code der Rechte-Steuerung beim einfachen Rechtesystem übersichtlicher gestaltet.
* B36:
  * Code bereinigt.
  * `composer.json` geändert: Mindestanforderung bei phpBB korrigiert.
  * Fix: Das Problem bei der Zeitumstellung in Verbindung mit der Einstellung "Heute" und unterschiedlichen Zeitzonen bei PHP und phpBB behoben. (Meldung Wolkenbruch)
* B35:
  * Travis CI eingerichtet.
  * `README.md` geändert.
  * `README_updating_a_developer_version.md` geändert.
  * PHP_CodeSniffer Fehler behoben.
* B34:
  * Sprachdatei `overwrite_who_was_here.php` umbenannt in `overwrite_phpbb_msg.php`.
  * In den deutschen Sprachdateien die amerikanischen Anführungszeichen durch deutsche ersetzt.
  * In allen Sprachdateien im Kommentarblock die deutschen Anführungszeichen hinzugefügt.
* B33:
  * Gruppenrechte werden jetzt immer angezeigt und je nach Situation nur abgeblendet.
* B32:
  * Fix: Bei fehlendem Statistik-Recht wurden trotzdem die Template-Variablen `LFWWH_EXP` und `LFWWH_RECORD` erzeugt.
  * `composer.json` geändert: Mindestanforderung bei phpBB geändert.
  * Methode zum Überschreiben der Sprach-Variablen `USER_DELETED` und `USER_DELETE_SUCCESS` umgestellt auf eine Sprachdatei mit zusätzlichem Code.
* B31: (beta2)
  * JS des Info-Buttons und des ACP-Moduls auf "camelCase" formatiert.
  * `README.md` geändert.
  * `README_updating_a_developer_version.md` geändert.
  * `lf-who-was-here_version.json` geändert.
* B30:
  * Code bereinigt.
  * JS des Info-Buttons und des ACP-Moduls auf Objekte umgestellt. Direktive `use strict` gesetzt.
* B29:
  * Code bereinigt.
  * CSS bereinigt.
  * `README.md` geändert.
  * `README_updating_a_developer_version.md` hinzugefügt.
* B28:
  * Vorschlag von Kirk bezüglich `<span>` statt `<button>` umgesetzt.
  * CSS geändert.
  * JS geändert.
* B27:
  * Wunsch von stefan-franz bez. Schalter für Anzahl sichtbarer Benutzer eingebaut.
  * 4 Sprach-Variablen hinzugefügt.
  * Migration geändert: Neue Konfig-Variable `lfwwh_disp_reg_users`.
  * Platzhalter $3 (`LFWWH_LAST3`) für Zeitformat eingebaut.
* B26:
  * Platzhalter $1 (`LFWWH_LAST1`) und $2 (`LFWWH_LAST2`) für Zeitformat eingebaut.
  * Sprachdateien korrigiert.
  * 3 Sprach-Variablen umbenannt.
  * 1 Sprach-Variable hinzugefügt.
  * Im ACP-Modul 3 Template-Variablen umbenannt.
  * Migration geändert: neuer Standard bei `lfwwh_disp_time_format`.
* B25: (beta1)
  * ACP-Modul: Unnötiges `onchange` Ereignis bei `lfwwh_create_hidden_info` entfernt.
  * ACP-Modul: Eingabefelder für Zeitraum (H, M, S) auf Zahlen umgestellt mit Unter/Obergrenze.
  * Fix: Bei der Umbenennung der Sprachdateien in B18 wurde die Funktion `display()` übersehen.
* B24:
  * `INCLUDEJS` und `INCLUDECSS` werden jetzt über `overall_header_head_append` im Style `all` ausgeführt. Nötig für phpBB 3.1.
  * Fix: Bei IE11 und phpBB 3.1 wird das Info-Icon unten abgeschnitten dargestellt. (Meldung Kirk)
  * Fix: Bei IE11 funktionierte das Einblenden nicht mehr. Grund war eine Änderung in B21.
  * `README.md` geändert.
* B23:
  * B22 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Dienstname erneut geändert `lukewcs.whowashere.core_who_was_here` -> `lukewcs.whowashere.core`.
  * Das Ausblenden von Infos kann jetzt deaktiviert werden.
  * Neuer Schalter im ACP-Modul.
  * Sprachdateien geändert.
  * Migration geändert: Neue Konfig-Variable `lfwwh_create_hidden_info`.
* B22:
  * B21 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Den phpBB 3.1 Ersatztext für das Info-Symbol (Awesome-Font) durch ein Unicode-Zeichen ersetzt.
  * `composer.json` aktualisiert.
  * CSS von `prosilver` nach `all` verschoben.
  * 1 Sprachvariable umbenannt, 1 gelöscht.
  * 1 Konfig-Variable umbenannt.
  * Migration geändert.
* B21:
  * Sekundären CSS Klassennamen geändert.
  * Button-CSS in eigene Datei ausgelagert.
  * Im Javascript Teil waren noch einige alte Variablennamen vorhanden.
* B20:
  * Dienstname erneut geändert `lukewcs.whowashere.core_lfwwh` -> `lukewcs.whowashere.core_who_was_here`.
  * `README.md` geändert.
* B19:
  * Fix: Bei der Umbenennung der Sprachdateien in B18 wurde die Funktion `clear_up()` übersehen, wodurch beim Löschen eines Benutzers eine Fehlermeldung erschien.
  * Aus dem Listener Skript die letzte noch vorhandene Funktion konsequent in das Core Skript verlagert.
* B18:
  * B17 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * `lf-who-was-here_version.json` geändert.
  * Kleinere Korrekturen in den Sprachdateien.
  * Kleinere Code Änderungen, primär Formatierungen.
  * Etliche Dateien umbenannt.
  * Migration geändert: geänderte Dateinamen des ACP-Moduls berücksichtigt.
  * Dienstname geändert `lukewcs.whowashere.helper` -> `lukewcs.whowashere.core_lfwwh`.
* B17:
  * Kleinere Korrekturen in den deutschen Sprachdateien.
  * `README.md` geändert.
  * `LICENSE.md` geändert. Lizenz von "phpBB Skeleton Extension" übernommen.
  * `composer.json` geändert. Versionsprüfung erfolgt jetzt auf das neue GH Repository "lf-who-was-here-2".
  * Unsichtbare Benutzer können sich jetzt selbst in der Benutzerliste sehen.
* B16:
  * Autoreninfo in allen Dateien geändert.
* B15:
  * Autoreninfo in allen Dateien auf ein einheitliches Format gebracht und überall dort eingefügt, wo es noch fehlte. Als Muster diente dazu "phpBB Skeleton Extension".
  * Templates: INCLUDEJS ist jetzt an eine Bedingung geknüpft und wird dadurch nur einmal ausgeführt. Relevant bei der Einstellung "Zeige alle Template-Positionen gleichzeitig:" oder bei der Ext "Bridge".
  * Mehrere Texte in den Sprachdateien für das ACP-Modul geändert. Stichworte "Administrator" und "administrative Rechte".
  * Code bereinigt in Hinsicht auf die Veröffentlichung des 2.0 Zweiges.
  * Build Changelog vom normalen Changelog abgetrennt.
  * Build Changelog und normales Changelog werden ab jetzt mit dem Suffix .md (Markdown) geführt, wodurch diese Dateien bei GitHub direkt interpretiert werden. Das Format entsprach ja bereits Markdown.
  * `composer.json` aktualisiert und Update-Prüfung auf den 2.0 Zweig umgestellt.
* B14:
  * Kleine Änderung in englischer Sprachdatei.
  * Kleine Änderung im Core Skript.
  * `.editorconfig` geändert.
  * `.gitattributes` geändert.
  * `README.md` geändert.
* B13:
  * Fix: Bei Erstinstallation wurden Gäste nicht angezeigt, da in B6 der Standardwert versehentlich von 1 auf 0 geändert wurde.
  * Die CSS Klassennamen geändert (gekürzt).
  * Admin Modus eingebaut.
  * Code bez. Rechte verbessert und Rechte-Zuweisungen im Code an einer Stelle zusammengefasst.
  * Migration geändert: Neue Konfig-Variable `lfwwh_admin_mode`.
* B12:
  * Logik für die Anzeige der Info Schaltfläche weiter verbessert.
  * Fix: Tooltip der Info Schaltfläche bei Firefox. (Meldung Kirk)
  * Code bereinigt.
* B11:
  * Fix: Die Info Schaltfläche wurde in einer bestimmten Situation angezeigt, obwohl sie nicht benötigt wurde.
  * Code für die Anzeige von Zeit und IP optimiert. Diese ignoriert jetzt Gäste, wodurch etliche unnötige Abfragen entfallen.
* B10:
  * B9 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Fix: Migration: bei `lfwwh_record_ips` und `lfwwh_record_time` wurde `is_dynamic` nicht gesetzt.
  * Sprachdateien geändert.
  * Code bereinigt.
* B9:
  * Wunsch von Wolkenbruch eingebaut bez. IP-Mouse-Over.
  * Den Code für die Generierung der Anzeige von Zeit und IP komplett neu geschrieben.
  * Schalter "Zeige die Benutzer-IP:" auf Auswahlliste umgestellt.
  * Abblend-Funktion angepasst.
  * Funktion für "Standard" angepasst.
  * Sprachdateien geändert.
* B8:
  * Fix: Bei deaktiviertem Cache wurde die automatische Bereinigung nicht mehr durchgeführt. (Meldung Kirk)
  * Alle Style-Anpassungen ausser "prosilver" entfernt.
* B7:
  * B6 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Vorschlag von Kirk eingebaut bez. Cache Deaktivierung.
  * Neuer Schalter im ACP-Modul.
  * Neuer Abschnitt im ACP-Modul, Optionen verschoben.
  * Sprachdateien geändert.
  * Migration geändert: Neue Konfig-Variable `lfwwh_use_cache`.
* B6:
  * B5 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Erweiterte Rechte geändert: "Mitglieder und Statistik" -> "Mitglieder".
  * Einfache Rechte geändert: Neue Option "Mitglieder" für Gäste-Anzeige.
  * Migration geändert: Standards für Rechte und Rollen angepasst.
  * In den Templates ist `LFWWH_POS_ALL` nicht länger notwendig, da die aktive Position jetzt über Bit-Wert festgelegt und per Bit-Operator abgefragt wird.
  * Twig Syntax in allen Templates geändert: wegen Rechte und wegen `<br>`.
  * ACP- und Rechte-Sprachdateien geändert.
* B5:
  * B4 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Alle Sprachdateien umbenannt.
  * Alle Dateien des ACP-Moduls umbenannt.
  * Migration geändert.
  * In `acp_whowashere_module.php` konsequent `$this` verwendet.
  * Das Unterscheidungsmerkmal auf (2.x) geändert und konsequent überall verwendet.
  * Weitere Sprachvariablen umbenannt.
* B4:
  * Weitere Konfig-Variablen umbenannt. Darum muss zuerst B3 deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Das Unterscheidungsmerkmal "(Gen 4)" an allen Stellen im ACP entfernt wo es überflüssig ist, sprich wo eine Versionsnummer sichtbar ist.
  * Javascript Bestätigung bei `lfwwh_record_reset` von alert() auf confirm() umgestellt mit zurücksetzen des Schalters bei `Cancel`. Event bei "Ja" von `onclick` auf `onchange` umgestellt.
  * Hinweis für `lfwwh_record_reset_time` eingebaut.
* B3: 
  * Fix: Wurde der Zeit-Modus auf "Heute" (Wert 1) umgeschaltet, hatte das keine Auswirkung da die falsche Konfig-Variable `lfwwh_time_of_period_mode` abgefragt wurde und somit immer "Zeitraum" (Wert 0) galt.
  * Im ACP-Modul eine weitere Template Variable umbenannt.
* B2: 
  * B1 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Weitere Konfig-Variablen umbenannt.
  * Fix: "Undefined index: WWH_SAVED_SETTINGS" (Meldung Kirk)
  * Die Bereinigungs-Benachrichtigung eingebaut. @Kirk: Da wäre ein Test in 3.1.12 sinnvoll.
  * Die Informationszeile im ACP-Modul über die Sprachdatei frei gestaltbar gemacht.
* B1:
  * Initial Release, kompletter Umbau auf `lukewcs/whowashere`.
