### Builds 2.1.4

#### b97
* ACP-Template:
  * Von EMP die Überarbeitung der Toggles übernommen.
  * "Absenden" und "Zurücksetzen" sind jetzt in einer eigenen Untergruppe, die auf dieselbe Weise dargestellt wird, wie bei ACP Seiten von phpBB.
#### b96
* ACP-Template:
  * Toggle Funktion in angepasster Form von "Style Changer" übernommen. (Danke an Kirk)
  * JS für Toggles angepasst.
  * CSS für Toggles angepasst.
#### b95
* Fix: Folgende Optionen wurden im ACP-Modul bei der Funktion "Einstellungen zurücksetzen" seit 2.1.1 nicht mehr berücksichtigt:
  * Zeige die Bot-Namen nur bei administrativen Rechten
  * Zeige alle Template-Positionen gleichzeitig
* ACP-Template:
  * Alle Ja/Nein Schalter werden jetzt per Twig Makro eingebunden.
  * Alle `onchange` und `onlick` Attribute im HTML entfernt. Diese Events werden jetzt direkt per jQuery registriert.
  * Viele Elemente werden jetzt in jQuery über das `name` Attribut angesprochen, anstatt über das `id` Attribut. Dadurch konnten im HTML sehr viele IDs entfernt werden, insgesamt 78. Methode von EMP übernommen.
  * Javscript an die oben genannten Änderungen angepasst.
  * Für FA-Icons das Twig Makro von EMP übernommen.
* Frontend-Template: 
  * Für FA-Icons das Twig Makro von EMP übernommen.

### Builds 2.1.3

#### b94
* Vergessen `ext.php` anzupassen.
#### b93 (CDB Validation Release 1)
* Release

### Builds 2.1.2

#### b92
* GitHub: Release Changelog geändert.
* GitHub: Kleinere Änderungen im Build Changelog.
#### b91 (CDB Validation Release 1)
* Beim Upload in die CDB wurde die Version 2.1.1-p1 wegen "instabiler" Versionsnummer abgelehnt und musste auf 2.1.2 geändert werden.
#### b90
* GitHub: Release Changelog geändert.
#### b89
* Code: Validierungs-Kritik berücksichtigt.
#### b88
* ACP-Template: Den Schalter "Erzeuge ausgeblendete Informationen:" an die Abblend-Funktion gekoppelt. Der Schalter wird nur als aktiv angezeigt, wenn mindestens eine der Tooltip-Optionen aktiv ist.
#### b87
* ACP-Template: Weitere Änderungen am `legend` CSS, wodurch die Überschrift jetzt wie ein Karteireiter aussieht.
#### b86
* ACP-Template: Das CSS für `legend` so geändert, dass der Text einen eigenen Hintergrund hat, was Lesbarkeit und Aussehen verbessert.
* Composer: Auf 2.1.1-p1 gesetzt.
#### b85
* ACP-Template: Die Nach-oben Funktion auf dieselbe Weise realisiert, wie es bei Beiträgen gemacht wird.
#### b84
* Fix: Im Sprachpaket `en` waren bei `acp_who_was_here.php` die Texte von 2 Sprach-Variablen vertauscht. (Meldung Kirk)
* Sprachdateien: Bei manchen Sprach-Variablen die Reihenfolge in der Datei korrigiert.  
* Composer: Auf 2.1.1-patch1 gesetzt.
* GitHub: Release Changelog geändert.

### Builds 2.1.1

#### b83 (CDB Validation Release 1)
* Migration: Die laut EPV fehlende Funktion `revert_schema()` hinzugefügt.
* GitHub: Release Changelogs geändert.
#### b82
* GitHub: Release Changelogs so angepasst, dass die einzelnen Releases per Direktlink referenziert werden können.
#### b81
* GitHub: Release Changelogs geändert.
#### b80
* Composer: Auf Release 2.1.1 gesetzt.
* Sprachdateien: Beim API-Modus den Hinweis auf "Statistics Block" entfernt, da StatsBlock-WWH-Bridge den neuen Event benutzt um den API-Modus selbst zu aktivieren.
* ACP-Template: MagicNumbers bei Ja/Nein-IDs durch Bezeichnungen ersetzt.
* ACP-Template: jQuery an die geänderten IDs angepasst.
* GitHub: Release Changelogs geändert.
#### b79
* Code: Neue Event-Variable: `force_api_mode`.
#### b78
* Code: Bei der Event-Variable `force_display` wird jetzt der Variablentyp Boolean erzwungen. Alles was nicht exakt `true` entspricht, wird als `false` betrachtet.
#### b77
* Code: PHP Event `lukewcs.whowashere.display_condition` eingebaut, mit dem Variablen übersteuert werden können um die Generierung der Template Variablen zu erzwingen.
* Code: Neue Event-Variable: `force_display`.
* Code: Die bisherige Portal Abfrage wurde komplett entfernt, da diese durch das neue PHP Event nicht länger benötigt wird. Bridge Coder können nun eigene Bedingungen definieren.
* Code: Unnötige Block-Kommentare bei Einzeilern entfernt und auf einzeilige Kommentare umgestellt.
#### b76
* Code: Die Abfrage ob im Kontext das Portal aktiv ist, wurde komplett geändert. Die Abfrage ob die Startseite per `.htaccess` auf das Portal umgebogen wurde konnte dadurch entfallen. Ausserdem wird durch diese Änderung auch die Situation berücksichtigt, bei der das Portal auf allen Seiten angezeigt wird.
#### b75
* Code: Beim Button-Icon wird jetzt unterschieden zwischen Benutzern mit administrativen Rechten und normalen Benutzern und entsprechend per Template-Variable übergeben.
* Code: Mehrere Bedingungen im Core lesbarer gestaltet.
* Frontend-Template: Beim Button-Icon wird jetzt für Benutzer und Gäste ein Zeit-Symbol angezeigt. Admins sehen unverändert das Info-Symbol. (Vorschlag Kirk)
* Frontend-Template: Javascript optimiert.
* Sprachdateien: Übersetzer-Infos von `info_acp_who_was_here.php` nach `acp_who_was_here.php` verschoben.
* ACP-Modul: An die Änderungen bei den Sprachdateien angepasst.
#### b74
* Empfehlungen von kasimi bezüglich Migration umgesetzt.
#### b73
* Fix: Bei der Deinstallation von 2.1.1 wurde mehrfach "Undefined index" gemeldet. (Meldung Kirk)
* ACP-Template: Twig Makro umbenannt.
* ACP-Template: CSS Klasse umbenannt.
* Frontend-Template: Twig Makro umbenannt.
#### b72
* ACP-Template: Die Buttons zum Speichern und Zurücksetzen sind jetzt unterhalb jeder Einstellungsgruppe vorhanden. Realisiert mit Twig Makro. (Vorschlag Kirk)
* ACP-Template: Die "Nach oben" Funktion in das neue Twig Makro integriert, damit das HTML für diese Funktion ebenfalls nur einmal im Template definiert werden muss.
* ACP-Template: Entsprechendes CSS hinzugefügt um die "Nach oben" Funktion und die Formular Buttons in einer Zeile zusammenfassen zu können.
#### b71
* Code: Korrekturen anhand EC Bericht vorgenommen.
* Frontend-Template: Farben der Positions-Hinweise geändert.
#### b70
* Frontend-Template: Statt Doppelpunkt wird hier jetzt ebenfalls wie im ACP-Template die Sprach-Variable `COLON` verwendet.
* Frontend-Template: Für die Positions-Hinweise werden jetzt Variablen der Einstellungen verwendet. Die bisherige Sprach-Variable im Frontend wird nicht mehr benötigt.
* Frontend-Template: Die Positions-Hinweise werden nicht mehr in den Sekundär-Templates, sondern im Primär-Template zusammengesetzt.
* Frontend-Template: Die Variable mit der redundante `INCLUDE..` Anweisungen verhindert werden, in `INCLUDED_LFWHOWASHERE` umbenannt.
* Sprachdateien: Die ACP Variablen sind jetzt bedarfsgerecht auf verschiedene Dateien aufgeteilt. Somit werden die Variablen der Einstellungen nicht mehr unnötig überall geladen.
* Sprachdateien: 1 Sprachdatei hinzugefügt.
* Sprachdateien: 1 Sprachdatei umbenannt.
* Sprachdateien: 1 Sprach-Variable gelöscht.
* Code: Durch die aufgeteilten Sprachdateien muss die Sprachdatei für die Einstellungen jetzt manuell geladen werden.
* ACP-Modul: An die aufgeteilten Sprachdateien angepasst.
* GitHub: In `.gitattributes` war noch die alte Versionsprüfung-Datei eingetragen und wurde entfernt.
#### b69
* Migration: Mehrere Config-Variablen umbenannt.
* Migration: Die Bedeutung der einzelnen Config-Werte für die Berechtigungen bei "Anzeige für Gäste:" und "Anzeige für Bots:" geändert.
* Migration: Das ACP Modul das bei S_2_0_0 im "manuellen" Modus angelegt wurde, wurde entfernt und im "automatischen" Modus neu hinzugefügt.
* Code: Validierungs-Kritik von kasimi zu 2.1.0 komplett berücksichtigt, Empfehlungen ebenfalls.
* Code: In `ext.php` Maximalversion bei PHP auf 8.0 präzisiert.
* Code: Es werden keine Template-Variablen mehr für die Positions-Hinweise generiert.
* Code: An die geänderte DB Config angepasst.
* Code: Etliche kleine Optimierungen.
* Composer: Voraussetzungen bei PHP geändert.
* Composer: Homepage Link auf CDB Bereich von LFWWH geändert.
* Composer: Version auf 2.1.1 geändert.
* ACP-Template: Die Option "Zeige die Bot-Namen nur bei administrativen Rechten:" in den Abschnitt "Berechtigungen" verschoben.
* ACP-Template: Die oben genannte Option an die Abblend-Funktion gekoppelt.
* ACP-Template: Bei allen Optionstiteln die bisherigen 2 Twig Ausgaben durch Verkettung auf 1 Twig Ausgabe reduziert. (Hinweis chris1278)
* ACP-Template: Bei der "Nach oben" Funktion wurde noch die alte phpBB Syntax statt Twig verwendet. (Meldung chris1278)
* ACP-Template: Bei allen Optionen die Twig Anweisungen `{% if ... %}...{% endif %}` durch eine Twig Ausgabe und einen verkürzten Ternary Operator ersetzt.
* ACP-Template: Alle IDs und Sprach-Variablen der Auswahllisten haben als Suffix nicht länger den numerischen Config-Wert aus der DB, sondern Bezeichnungen.
* ACP-Template: jQuery an die geänderten IDs angepasst.
* ACP-Info: Nach Doku definiert. (Hinweis chris1278)
* ACP-Modul: Fehlermeldung bei ungültigem Formular wird jetzt rot dargestellt statt grün. In der phpBB Extension Doku wurde das falsch gezeigt. Ausserdem Back-Link hinzugefügt.
* ACP-Modul: Fallback eingebaut wenn vorhandenes Sprachpaket keine Variable für die Meldung bezüglich veraltetes Sprachpaket hat.
* ACP-Modul: Template-Variablen umbenannt und umbenannte Config-Variablen übernommen.
* ACP-Modul: Code Optimierungen.
* Frontend-Template: Die Positions-Hinweise werden jetzt direkt per Twig aus den Sprachdateien geholt und zusammengesetzt.
* Frontend-Template: Die Twig Variable für die Anzeige der Template Position umbenannt.
* Frontend-Template: Kleinere Änderungen beim Twig Code.
* Sprachdateien: `info_acp_who_was_here.php`; etliche Sprach-Variablen umbenannt und bei manchen auch die Reihenfolge in der Datei geändert.
* Sprachdateien: Unnötige redundante Erklärungstexte (insgesamt 3) entfernt. Das betrifft die Funktionalität bez. ausgeblendete Infos.

### Builds 2.1.0

#### b68 
* GitHub: Voraussetzungen in `README.md` angepasst.
* GitHub: Release Changelogs geändert.
#### b67 (CDB Validation Release 1)
* Composer: Version auf 2.1.0 Release gesetzt.
* GitHub: Mindestvoraussetzungen in `README.md` angepasst.
* GitHub: Beide Release Changelogs vom Export ausgeschlossen.
#### b66
* Migration: Bei 2.0.0 und 2.1.0 `effectively_installed()` entfernt, da das schon vom MigrationTool geregelt wird.
* ACP-Modul: Da von ExtManager nur der MetadataManager benötigt wird, beide Objekt-Referenzen in einer Zeile zusammengefasst.
#### b65
* Code: Die "strict" Direktive war nur zum testen gedacht und wurde wieder deaktiviert.
#### b64
* Code: Es werden jetzt Neuerungen von PHP 7 genutzt, damit ist PHP 5 nicht länger relevant.
* Composer: Voraussetzungen bei PHP geändert.
* Code: In `ext.php` Voraussetzungen bei PHP geändert.
* Release Changelog angepasst.
#### b63
* ACP-Modul: Versionsprüfung für Sprachpaket eingebaut.
* ACP-Modul: 1 Template-Variable für Sprachpaket-Versionsprüfung hinzugefügt.
* ACP-Template: Funktion eingebaut mit der Hinweise angezeigt werden können. Style entspricht den Warnungen (blauer Kasten) des Ext Managers.
* Sprachdateien: 1 Sprach-Variable für den Hinweis auf veraltetes Sprachpaket hinzugefügt.
* Composer: Neue Eigenschaft `extra.lang-min-ver` hinzugefügt, mit der die Mindestversion des Sprachpakets definiert werden kann.
* Release Changelog angepasst.
#### b62
* Sprachdateien: Kleinere Änderungen.
* Release Changelog überarbeitet.
#### b61
* ACP-Modul: Überflüssige Template-Variable `LFWWH_CONFIG_DESC` entfernt, das wird jetzt direkt im Template erledigt.
* ACP-Modul: Zwei neue Template-Variablen hinzugefügt, die den Ext-Namen und die Ext-Version enthalten.
* ACP-Template: Die Konfig-Beschreibung wird jetzt direkt per Twig aus der Sprachdatei geholt und mit den beiden neuen Template-Variablen zusammengesetzt.
* ACP-Template: Es gibt jetzt einen Footer der die Autoren-Info des Übersetzers enthält.
* Sprachdateien: 3 Sprach-Variablen für die Autoren-Info des Übersetzers hinzugefügt.  
* Sprachdateien: Aus jeder Sprachdatei die Autoren-Info des Übersetzers im Kommentar-Block entfernt.
* Erste Fassung des Release Changelogs.
#### b60
* Migration: Bei 2.1.0 die Voraussetzung phpBB 3.2.0 zu prüfen ist wenig sinnvoll und ab b59 ohnehin überflüssig. Änderung in b55 hinfällig.
* Code: Korrekturen vorgenommen aufgrund des aktuellen phpBB Ext Check Berichts. Gemeldete Fehler hängen mit der Validierungs-Bereinigung in b59 zusammen.
* GitHub: Mindestvoraussetzungen in `README.md` angepasst.
* GitHub: Da LFWWH2 seit Juli 2020 offiziell zur CDB gehört, ist die Versionsprüfung-Datei `lf-who-was-here-2_version.json` nicht länger relevant und wurde entfernt.
#### b59
* Code: Noch offene Punkte zur Validierung von 2.0.0 wurden vollständig geklärt und entsprechend umgesetzt. Dadurch erhöht sich die Mindestversion bei phpBB.
* Code: Bei `ext.php` Mindestvoraussetzung auf phpBB 3.2.10 geändert.
* ACP-Modul: Sonderanpassung für phpBB <3.2.6 entfernt, da nicht länger relevant.
* Composer: Mindestvoraussetzung auf phpBB 3.2.10 geändert.
#### b58
* Code: Neue Hilfsfunktion für die Darstellung des Rekord Datums eingebaut.
* ACP-Template: Bei Datumsformat-Feldern wird dahinter jetzt deren aktuelle Ausgabe als Demo dargestellt.
* ACP-Modul: 2 neue Template-Variablen für die Datumsformat-Demo hinzugefügt.
* ACP-Modul: Datum Hilfsfunktionen aus dem Core für die Datumsformat-Demo eingefügt.
* Sprachdateien: 1 Sprach-Variable für die Datumsformat-Demo hinzugefügt.
#### b57
* Code: `ext.php` weiter reduziert.
#### b56
* ACP-Template: Unterhalb jeder Einstellungsgruppe mit Ausnahme der letzten die Standardfunktion "Nach oben" eingebaut.
* Sprachdateien: Version im Kommentarblock auf 2.1.0 geändert.
* Composer: Version um `-dev` erweitert.
#### b55
* Code: Ext kann nur noch aktiviert werden, wenn die Versionen von phpBB und PHP innerhalb gültiger Bereiche liegen. Realisiert mit `ext.php`.
* Migration: 2.1.0 setzt jetzt phpBB 3.2.0 voraus.
* Composer: Maximalversion von PHP definiert.  
#### b54
* Migration: Deaktivierten Code entfernt.
* ACP-Modul: 3.1-Artefakte übersehen in `acp_who_was_here_module.php`. Mehrere Änderungen. (Meldung Kirk)
* ACP-Modul: Überflüssige Template-Variable `LFWWH_CONFIG_TITLE` entfernt. Deren Inhalt wird jetzt direkt per Twig aus der Sprachdatei geholt.
* ACP-Modul: Überflüssige Template-Variable `LFWWH_DISP_TIME_FORMAT_EXP` entfernt. Deren Inhalt wird jetzt direkt per Twig aus der Sprachdatei geholt und zusammengesetzt.
* ACP-Template: `acp_who_was_here.html` überarbeitet.
#### b53
* ACP-Template: Im einfachen Rechtesystem neue Option für die Bots hinzugefügt.
* ACP-Template: Konfig-Titel und Konfig-Beschreibung werden jetzt anders dargestellt. Ausserdem CDB Link entfernt.
* ACP-Template: Für die Anzeige von Ext-Name und Ext-Version wird jetzt der ExtManager benutzt.
* ACP-Template: Javascript weitestgehend durch jQuery ersetzt.
* Code: Validierungs-Kritik von kasimi zu 2.0.0 weitestgehend berücksichtigt.
* Code: Array-Definitionen auf kurze Notation umgestellt, dadurch inkompatibel zu PHP 5.3.
* Code: Wie ursprünglich schon mal verwendet, den neuen Power Operator anstelle `pow()` notiert, dadurch inkompatibel zu PHP <5.6.
* Code: Ext auf Funktions-Basis von phpBB 3.2 gestellt, dadurch inkompatibel zu phpBB 3.1. Betrifft u.a. das Sprach-Objekt.
* Code: Sonderanpassungen für phpBB 3.1 entfernt. Betrifft primär die Index-Anzeige.
* Frontend-Template: Weitgehend HTML vom Core ins Template verlagert. Dabei Möglichkeiten von Twig genutzt, z.B. Makros.
* Frontend-Template: Ordner `prosilver` entfernt und alles in `all` organisiert.
* Frontend-Template: Primäres Event Template für `INCLUDECSS` (auch `INCLUDEJS`) ist nicht mehr `overall_header_head_append.html` sondern `index_body_markforums_before.html`, dadurch inkompatibel zu phpBB 3.1
* Frontend-Template: Javascript weitestgehend durch jQuery ersetzt.
* Frontend-Template: CSS Klassen für Zeit und IP hinzugefügt.
* Migration: Ext-Version aus DB Config entfernt, in der Migration werden jetzt andere Prüfmerkmale verwendet.
* Sprachdateien: Speziellen PHP Code aus der Permissions Sprachdatei entfernt und Prozedur anders realisiert. Änderung in b52 hinfällig.
* Sprachdateien: Mehrere Sprach-Variablen umbenannt.
* Sprachdateien: Mehrere Text Änderungen in den Sprachdateien.
* Composer: Mindestvoraussetzungen auf phpBB 3.2 und PHP 5.6 geändert.
* Composer: Version auf 2.1.0 geändert.
* GitHub: `README.md` angepasst.
#### b52
* Sprachdateien: In der Datei für die Rechte wird jetzt nicht mehr mit `$GLOBALS` auf die Konfiguration zugegriffen, sondern mit `$phpbb_container`.
* Sprachdateien: Kleinere Änderungen.
* Code: Korrekturen vorgenommen aufgrund des aktuellen phpBB Ext Check Berichts.
* GitHub: GitHub Actions eingerichtet. 

### Builds 2.0.0

#### b51
* Einen Teil der Änderungen von b50 soweit rückgängig gemacht, dass die GitHub Version 2.0.0-b51 exakt der offiziellen CDB Version 2.0.0 entspricht. Die Änderungen von b50 werden zu einem späteren Zeitpunkt wieder eingefügt.
* Datei für Versionsprüfung so geändert, dass auch bei Betas und RCs die offizielle Version von CDB gemeldet wird inklusive direkter Download-Möglichkeit von CDB. Bei einem der nächsten Updates wird diese Datei dann vom Repository entfernt.
* Alle Dateien und Ordner für den Dienst "Travis CI" entfernt und den Dienst deaktiviert. Ich setze stattdessen bereits seit 2019 "phpBB Ext Check" ein, was zum einen deutlich umfangreicher prüft als Travis CI (nach phpBB Standard) und zum anderen erheblich übersichtlichere Ergebnisse (Status und Logs) liefert.
#### b50
* Automatische Korrektur von CDB in `composer.json` übernommen.
* Kleinere Änderungen in den Sprachdateien.
* `.gitattributes` geändert: `LICENSE` auf ignorieren gesetzt, damit das beim Download nicht mehr enthalten ist.
* Von VariableAnalysis gemeldete Fehler behoben.
#### b49 (CDB Validation Release 2)
* Alle bei der Validierung festgestellten Fehler behoben.
* Kleinere Änderungen in den Sprachdateien.
* Im Repository Root `LICENSE.md` in `LICENSE` umbenannt da es sich nicht um Markdown handelt und somit das Suffix falsch war. Ausserdem Datei aktualisiert und Inhalt von Skeleton Extension übernommen.
#### b48 (CDB Validation Release 1)
* Kompatibilität zu PHP <5.6.
* `composer.json` aktualisiert: auf Release 2.0.0 umgestellt.
#### b47 (RC2)
* `composer.json` aktualisiert.
#### b46
* Fix: Die Änderung bei b45 funktionierte nicht, wenn die Startseite per `.htaccess` auf das Portal umgebogen wurde. (Meldung Kirk)
#### b45
* Fix: Durch eine Änderung in b43 wurde im Portal das WWH Modul nicht mehr angezeigt. (Meldung Kirk)
#### b44
* Kleinere Korrekturen in den Sprachdateien.
* `README_updating_a_developer_version.md` geändert.
* Die Twig Variable für die Anzeige der Template Position umbenannt, da diese auch für andere Informationen dienen kann.
* Kleinere Code Änderungen.
#### b43
* Fix: Problematik bei der Aktualisierung der Anzeige behoben, `display()` wird im Listener jetzt über ein anderes Event getriggert.
* Fix: Designschwäche der Info-Buttons (Icons) bezüglich Textfarbe behoben. CSS geändert.
#### b42 (RC1)
* `composer.json` aktualisiert.
#### b41
* `README.md` geändert.
* `composer.json` geändert: Version hat ab jetzt den Zusatz RC1.
* Eine unnötige Twig Bedingung aus allen Templates entfernt.
* Wenn alle Templates gleichzeitig aktiviert werden, dann wird jetzt auch die zugehörige Position angezeigt.
* 1 Sprach-Variable hinzugefügt.
#### b40
* Der Text "0 Mitglieder" wird nicht mehr vom phpBB Sprachpaket bezogen.
* 1 Sprach-Variable hinzugefügt.
* `README.md` geändert.
#### b39
* Kleinere Korrekturen in den Sprachdateien.
* 1 Sprach-Variable umbenannt.
* `composer.json` geändert: Mindestanforderung bei PHP geändert. Ext Name gekürzt. Beta-Merkmal entfernt.
* Autoreninfo in allen Dateien entsprechend angepasst.
* `README.md` geändert.
* `README_updating_a_developer_version.md` geändert.
* Vorbereitungen auf Release. 
#### b38 (beta3)
* Kleinere Änderungen in den Sprachdateien.
* Code bereinigt.
#### b37
* Fix: Fehler in MySQL Abfrage behoben. Bei der Einstellung "Heute" wurden Einträge in der Besuchertabelle mit der Uhrzeit 00:00:00 zum Vortag gezählt.
* Kleinere Code Optimierungen bei `display()`.
* Den Code der Rechte-Steuerung beim einfachen Rechtesystem übersichtlicher gestaltet.
#### b36
* Code bereinigt.
* `composer.json` geändert: Mindestanforderung bei phpBB korrigiert.
* Fix: Das Problem bei der Zeitumstellung in Verbindung mit der Einstellung "Heute" und unterschiedlichen Zeitzonen bei PHP und phpBB behoben. (Meldung Wolkenbruch)
#### b35
* Travis CI eingerichtet.
* `README.md` geändert.
* `README_updating_a_developer_version.md` geändert.
* PHP_CodeSniffer Fehler behoben.
#### b34
* Sprachdatei `overwrite_who_was_here.php` umbenannt in `overwrite_phpbb_msg.php`.
* In den deutschen Sprachdateien die amerikanischen Anführungszeichen durch deutsche ersetzt.
* In allen Sprachdateien im Kommentarblock die deutschen Anführungszeichen hinzugefügt.
#### b33
* Gruppenrechte werden jetzt immer angezeigt und je nach Situation nur abgeblendet.
#### b32
* Fix: Bei fehlendem Statistik-Recht wurden trotzdem die Template-Variablen `LFWWH_EXP` und `LFWWH_RECORD` erzeugt.
* `composer.json` geändert: Mindestanforderung bei phpBB geändert.
* Methode zum Überschreiben der Sprach-Variablen `USER_DELETED` und `USER_DELETE_SUCCESS` umgestellt auf eine Sprachdatei mit zusätzlichem Code.
#### b31 (beta2)
* JS des Info-Buttons und des ACP-Templates auf "CamelCase" formatiert.
* `README.md` geändert.
* `README_updating_a_developer_version.md` geändert.
* `lf-who-was-here_version.json` geändert.
#### b30
* Code bereinigt.
* JS des Info-Buttons und des ACP-Templates auf Objekte umgestellt. Direktive `use strict` gesetzt.
#### b29
* Code bereinigt.
* CSS bereinigt.
* `README.md` geändert.
* `README_updating_a_developer_version.md` hinzugefügt.
#### b28
* Vorschlag von Kirk bezüglich `<span>` statt `<button>` umgesetzt.
* CSS geändert.
* JS geändert.
#### b27
* Wunsch von stefan-franz bez. Schalter für Anzahl sichtbarer Benutzer eingebaut.
* 4 Sprach-Variablen hinzugefügt.
* Migration geändert: Neue Konfig-Variable `lfwwh_disp_reg_users`.
* Platzhalter $3 (`LFWWH_LAST3`) für Zeitformat eingebaut.
#### b26
* Platzhalter $1 (`LFWWH_LAST1`) und $2 (`LFWWH_LAST2`) für Zeitformat eingebaut.
* Sprachdateien korrigiert.
* 3 Sprach-Variablen umbenannt.
* 1 Sprach-Variable hinzugefügt.
* Im ACP-Template 3 Template-Variablen umbenannt.
* Migration geändert: neuer Standard bei `lfwwh_disp_time_format`.
#### b25 (beta1)
* ACP-Template: Unnötiges `onchange` Ereignis bei `lfwwh_create_hidden_info` entfernt.
* ACP-Template: Eingabefelder für Zeitraum (H, M, S) auf Zahlen umgestellt mit Unter/Obergrenze.
* Fix: Bei der Umbenennung der Sprachdateien in b18 wurde die Funktion `display()` übersehen.
#### b24
* `INCLUDEJS` und `INCLUDECSS` werden jetzt über `overall_header_head_append` im Style `all` ausgeführt. Nötig für phpBB 3.1.
* Fix: Bei IE11 und phpBB 3.1 wird das Info-Icon unten abgeschnitten dargestellt. (Meldung Kirk)
* Fix: Bei IE11 funktionierte das Einblenden nicht mehr. Grund war eine Änderung in b21.
* `README.md` geändert.
#### b23
* B22 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Dienstname erneut geändert `lukewcs.whowashere.core_who_was_here` -> `lukewcs.whowashere.core`.
* Das Ausblenden von Infos kann jetzt deaktiviert werden.
* Neuer Schalter im ACP-Template.
* Sprachdateien geändert.
* Migration geändert: Neue Konfig-Variable `lfwwh_create_hidden_info`.
#### b22
* B21 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Den phpBB 3.1 Ersatztext für das Info-Icon (Awesome-Font) durch ein Unicode-Zeichen ersetzt.
* `composer.json` aktualisiert.
* CSS von `prosilver` nach `all` verschoben.
* 1 Sprach-Variable umbenannt, 1 gelöscht.
* 1 Konfig-Variable umbenannt.
* Migration geändert.
#### b21
* Sekundären CSS Klassennamen geändert.
* Button-CSS in eigene Datei ausgelagert.
* Im Javascript Teil waren noch einige alte Variablennamen vorhanden.
#### b20
* Dienstname erneut geändert `lukewcs.whowashere.core_lfwwh` -> `lukewcs.whowashere.core_who_was_here`.
* `README.md` geändert.
#### b19
* Fix: Bei der Umbenennung der Sprachdateien in b18 wurde die Funktion `clear_up()` übersehen, wodurch beim Löschen eines Benutzers eine Fehlermeldung erschien.
* Aus dem Listener Skript die letzte noch vorhandene Funktion konsequent in das Core Skript verlagert.
#### b18
* B17 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* `lf-who-was-here_version.json` geändert.
* Kleinere Korrekturen in den Sprachdateien.
* Kleinere Code Änderungen, primär Formatierungen.
* Etliche Dateien umbenannt.
* Migration geändert: geänderte Dateinamen des ACP-Moduls berücksichtigt.
* Dienstname geändert `lukewcs.whowashere.helper` -> `lukewcs.whowashere.core_lfwwh`.
#### b17
* Kleinere Korrekturen in den deutschen Sprachdateien.
* `README.md` geändert.
* `LICENSE.md` geändert. Lizenz von "phpBB Skeleton Extension" übernommen.
* `composer.json` geändert. Versionsprüfung erfolgt jetzt auf das neue GH Repository "lf-who-was-here-2".
* Unsichtbare Benutzer können sich jetzt selbst in der Benutzerliste sehen.
#### b16
* Autoreninfo in allen Dateien geändert.
#### b15
* Autoreninfo in allen Dateien auf ein einheitliches Format gebracht und überall dort eingefügt, wo es noch fehlte. Als Muster diente dazu "phpBB Skeleton Extension".
* Templates: INCLUDEJS ist jetzt an eine Bedingung geknüpft und wird dadurch nur einmal ausgeführt. Relevant bei der Einstellung "Zeige alle Template-Positionen gleichzeitig:" oder bei der Ext "Bridge".
* Mehrere Texte in den Sprachdateien für das ACP-Template geändert. Stichworte "Administrator" und "administrative Rechte".
* Code bereinigt in Hinsicht auf die Veröffentlichung des 2.0 Zweiges.
* Build Changelog vom normalen Changelog abgetrennt.
* Build Changelog und normales Changelog werden ab jetzt mit dem Suffix .md (Markdown) geführt, wodurch diese Dateien bei GitHub direkt interpretiert werden. Das Format entsprach ja bereits Markdown.
* `composer.json` aktualisiert und Update-Prüfung auf den 2.0 Zweig umgestellt.
#### b14
* Kleine Änderung in englischer Sprachdatei.
* Kleine Änderung im Core Skript.
* `.editorconfig` geändert.
* `.gitattributes` geändert.
* `README.md` geändert.
#### b13
* Fix: Bei Erstinstallation wurden Gäste nicht angezeigt, da in b6 der Standardwert versehentlich von 1 auf 0 geändert wurde.
* Die CSS Klassennamen geändert (gekürzt).
* Admin Modus eingebaut.
* Code bez. Rechte verbessert und Rechte-Zuweisungen im Code an einer Stelle zusammengefasst.
* Migration geändert: Neue Konfig-Variable `lfwwh_admin_mode`.
#### b12
* Logik für die Anzeige des Info Buttons weiter verbessert.
* Fix: Tooltip des Info Buttons bei Firefox. (Meldung Kirk)
* Code bereinigt.
#### b11
* Fix: Der Info Button wurde in einer bestimmten Situation angezeigt, obwohl er nicht benötigt wurde.
* Code für die Anzeige von Zeit und IP optimiert. Diese ignoriert jetzt Gäste, wodurch etliche unnötige Abfragen entfallen.
#### b10
* B9 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Fix: Migration: bei `lfwwh_record_ips` und `lfwwh_record_time` wurde `is_dynamic` nicht gesetzt.
* Sprachdateien geändert.
* Code bereinigt.
#### b9
* Wunsch von Wolkenbruch eingebaut bez. IP-Mouse-Over.
* Den Code für die Generierung der Anzeige von Zeit und IP komplett neu geschrieben.
* Schalter "Zeige die Benutzer-IP:" auf Auswahlliste umgestellt.
* Abblend-Funktion angepasst.
* Funktion für "Standard" angepasst.
* Sprachdateien geändert.
#### b8
* Fix: Bei deaktiviertem Cache wurde die automatische Bereinigung nicht mehr durchgeführt. (Meldung Kirk)
* Alle Style-Anpassungen ausser "prosilver" entfernt.
#### b7
* B6 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Vorschlag von Kirk eingebaut bez. Cache Deaktivierung.
* Neuer Schalter im ACP-Template.
* Neuer Abschnitt im ACP-Template, Optionen verschoben.
* Sprachdateien geändert.
* Migration geändert: Neue Konfig-Variable `lfwwh_use_cache`.
#### b6
* B5 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Erweiterte Rechte geändert: "Mitglieder und Statistik" -> "Mitglieder".
* Einfache Rechte geändert: Neue Option "Mitglieder" für Gäste-Anzeige.
* Migration geändert: Standards für Rechte und Rollen angepasst.
* In den Templates ist `LFWWH_POS_ALL` nicht länger notwendig, da die aktive Position jetzt über Bit-Wert festgelegt und per Bit-Operator abgefragt wird.
* Twig Syntax in allen Templates geändert: wegen Rechte und wegen `<br>`.
* ACP- und Rechte-Sprachdateien geändert.
#### b5
* B4 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Alle Sprachdateien umbenannt.
* Alle Dateien des ACP-Moduls umbenannt.
* Migration geändert.
* In `acp_whowashere_module.php` konsequent `$this` verwendet.
* Das Unterscheidungsmerkmal auf (2.x) geändert und konsequent überall verwendet.
* Weitere Sprach-Variablen umbenannt.
#### b4
* Weitere Konfig-Variablen umbenannt. Darum muss zuerst b3 deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Das Unterscheidungsmerkmal "(Gen 4)" an allen Stellen im ACP entfernt wo es überflüssig ist, sprich wo eine Versionsnummer sichtbar ist.
* Javascript Bestätigung bei `lfwwh_record_reset` von alert() auf confirm() umgestellt mit zurücksetzen des Schalters bei `Cancel`. Event bei "Ja" von `onclick` auf `onchange` umgestellt.
* Hinweis für `lfwwh_record_reset_time` eingebaut.
#### b3 
* Fix: Wurde der Zeit-Modus auf "Heute" (Wert 1) umgeschaltet, hatte das keine Auswirkung da die falsche Konfig-Variable `lfwwh_time_of_period_mode` abgefragt wurde und somit immer "Zeitraum" (Wert 0) galt.
* Im ACP-Template eine weitere Template-Variable umbenannt.
#### b2 
* B1 muss zuerst deinstalliert werden, also unbedingt "Arbeitsdaten löschen"!
* Weitere Konfig-Variablen umbenannt.
* Fix: "Undefined index: WWH_SAVED_SETTINGS" (Meldung Kirk)
* Die Bereinigungs-Benachrichtigung eingebaut. @Kirk: Da wäre ein Test in 3.1.12 sinnvoll.
* Die Informationszeile im ACP-Template über die Sprachdatei frei gestaltbar gemacht.
#### b1
* Initial Release, kompletter Umbau auf `lukewcs/whowashere`.
