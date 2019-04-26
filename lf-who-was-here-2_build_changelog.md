
### Builds 2.0.0 (2019--)

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
  * Im ACP-Modul 3 Template Variablen umbenannt.
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
  * `composer.json` aktualisiert
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
  * `composer.json` geändert.
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
