
### Builds 2.0.0 (2019--)
* B16:
  * Autoreninfo in allen Dateien geändert.
  * `composer.json` geändert.
* B15:
  * Autoreninfo in allen Dateien auf ein einheitliches Format gebracht und überall dort eingefügt, wo es noch fehlte. Als Muster diente dazu "phpBB Skeleton Extension".
  * Templates: INCLUDEJS ist jetzt an eine Bedingung geknüpft und wird dadurch nur einmal ausgeführt. Relevant bei der Einstellung "Zeige alle Template-Positionen gleichzeitig:" oder bei der Ext "Bridge".
  * Mehrere Texte in den Sprachdateien für das ACP Modul geändert. Stichworte "Administrator" und "administrative Rechte".
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
  * Migration geändert: Neue Konfig-Variable LFWWH_USE_CACHE.
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
  * Weitere Konfigurations-Variablen umbenannt. Darum muss zuerst B3 deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Das Unterscheidungsmerkmal "(Gen 4)" an allen Stellen im ACP entfernt wo es überflüssig ist, sprich wo eine Versionsnummer sichtbar ist.
  * Javascript Bestätigung bei `lfwwh_record_reset` von alert() auf confirm() umgestellt mit zurücksetzen des Schalters bei `Cancel`. Event bei "Ja" von `onclick` auf `onchange` umgestellt.
  * Hinweis für `lfwwh_record_reset_time` eingebaut.
* B3: 
  * Fix: Wurde der Zeit-Modus auf "Heute" (Wert 1) umgeschaltet, hatte das keine Auswirkung da die falsche Konfigurations-Variable `lfwwh_time_of_period_mode` abgefragt wurde und somit immer "Zeitraum" (Wert 0) galt.
  * Im ACP-Modul eine weitere Template Variable umbenannt.
* B2: 
  * B1 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
  * Weitere Konfigurations-Variablen umbenannt.
  * Fix: "Undefined index: WWH_SAVED_SETTINGS" (Meldung Kirk)
  * Die Bereinigungs-Benachrichtigung eingebaut. @Kirk: Da wäre ein Test in 3.1.12 sinnvoll.
  * Die Informationszeile im ACP-Modul über die Sprachdatei frei gestaltbar gemacht.
* B1:
  * Initial Release, kompletter Umbau auf `lukewcs/whowashere`.
