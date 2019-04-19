
### Changelog 2.0.0

#### Beta 2 (2019--)

* Sprachdateien:
  * Die Sprach-Variablen `LFWWH_LAST1` und `LFWWH_LAST2` haben ab dieser Version wieder einen Standardinhalt.
  * In `who_was_here.php` die Variable 'LFWWH_RECORD' in 'LFWWH_RECORD_DAY' umbenannt, da es sonst Überschneidungen mit `info_acp_who_was_here.php` gäbe, in der diese Variable ebenfalls benutzt wurde.
  * Kleinere Korrekturen.
  * Umbenennung einiger Variablen.
* Bei der Anzeige der Zeit von Benutzern und Bots können jetzt die Inhalte der Sprach-Variablen `LFWWH_LAST1` und `LFWWH_LAST2` dynamisch über die Platzhalter `$1` und `$2` direkt im Zeitformat eingefügt werden. Das hat neben erhöhter Flexibilität auch den Vorteil, das die Einstellung für die Anzeige von "zuletzt um" regulär in der Konfiguration gespeichert wird und nicht mehr über die Sprachdatei durch setzen/löschen der Variable gesteuert werden muss.
  * Im ACP-Modul wird entsprechend beim Erklärungstext für "Zeit-Format:" auf die Platzhalter `$1` und `$2` hingewiesen.
    * Den Erklärungstext in der Sprachdatei so gestaltet, das bei diesem die aktuellen Inhalte der Platzhalter dynamisch aus der Sprachdatei eingefügt werden können.
	* Als Standard wird der Platzhalter `$1` bei "Zeit-Format:" eingetragen, wodurch per Standard auch wieder "zuletzt um" angezeigt wird. Das betrifft eine Neuinstallation von LFWWH und die Standard-Schaltfläche im ACP-Modul.
* ACP-Modul:
  * Die Einstellung "Datums-Format für den Besucherrekord:" hat jetzt einen eigenen Erklärungstext. Dieser wurde bisher von "Zeit-Format:" bezogen.
    * Entsprechend in den Sprachdateien 1 neue Variable hinzugefügt.
* Template-Änderungen: Nein

#### Beta 1 (2019-04-14)

* Kompletter Umbau auf eine eigenständige Erweiterung mit eigenen Strukturen. Dadurch baut der Fork nicht länger auf "bb3mobi\washere" auf. Das betrifft die folgenden Bereiche:
  * Ordner der Erweiterung ("lukewcs\whowashere").
  * Alle Pfadangaben innerhalb der Dateien (.php, .html, .yml, .json).
  * Konfigurations-Variablen in der Datenbank.
  * Tabelle der Besucher in der Datenbank.
  * Rechte.
  * Variablen der Templates.
  * Variablen der Sprachdateien.
* Automatische Datenübernahme von NV-WWH (beliebige Version) und LF-WWH 1.x (beliebige Version):
  * Dazu muss die alte WWH-Erweiterung zunächst installiert bleiben, damit bei der Installation von LF-WWH 2.x die Daten importiert werden können. Dies geschieht automatisch, sobald LF-WWH 2.x das erste Mal aktiviert wird. Dabei wird die komplette Konfiguration inklusive Besucherrekord übernommen, sowie die aktuelle Besucher-Tabelle. Die alte Erweiterung darf dabei auch aktiviert bleiben, das ist technisch vorgesehen und legitim.
  * Die Rechte werden dabei jedoch nicht übernommen, diese müssen nach der Installation also ggf. angepasst werden, sofern das vollständige Rechtesystem von phpBB genutzt wurde. Wurde nur das vereinfachte Rechtesystem von LF-WWH genutzt ("Anzeige für Gäste:"), kann dieser Schritt entfallen.
  * Die Datenübernahme hat auch den Vorteil, das damit selbst eine defekte Installation von NV-WWH quasi-aktualisiert werden kann, weil dabei nur die Daten übernommen werden, aber keine Ordner- und Datei-Strukturen.
* Wenn Benutzerkonten gelöscht werden und infolgedessen eine Bereinigung der WWH-Tabelle und der WWH-Anzeige nötig wird, dann wird jetzt innerhalb der Lösch-Bestätigung (die von phpBB angezeigt wird) zusätzlich eine Benachrichtigung von LF-WWH eingefügt, das die WWH-Anzeige bereinigt wurde. Diese Benachrichtigung erscheint nur dann, wenn die Bereinigung auch aktiviert ist (Standard) und wenn auch tatsächlich bereinigt werden musste.
* ACP-Modul:
  * Der Seitentitel (Browser) hat jetzt den Zusatz " - Einstellungen".
  * Die Informationszeile für die Version und für den Link kann jetzt in den Sprachdateien frei gestaltet werden.
    * Dementsprechend in den Sprachdateien die Variable `LFWWH_INSTALLED` angepasst und `LFWWH_MOD_SUPPORT` entfernt.
  * Bei "Besucherrekord zurücksetzen -> Ja" wird jetzt nicht nur eine Nachricht angezeigt, das beim Speichern der Rekord zurückgesetzt wird, sondern zusätzlich eine Rückfrage ausgeführt. Wird diese Rückfrage mit "Abbrechen" bestätigt, wird der Reset-Schalter wieder auf "Nein" zurückgestellt.
    * Entsprechend in den Sprachdateien den bisherigen Text der Nachricht angepasst.
    * Das Optionsfeld "Ja" reagiert nicht länger auf mehrmaliges Klicken. Dadurch wird die Nachricht auch nur einmal angezeigt, solange der Schalter nicht auf "Nein" zurückgestellt wird.
  * Schon seit dem Ur-WWH ("NV who was here?" für phpBB 3.0) wurde beim Zurücksetzen des Besucherrekords das Datum des Resets in die Datenbank gespeichert, jedoch nie angezeigt oder sonst wie ausgewertet. Dieses Datum wird jetzt bei "Besucherrekord zurücksetzen" hinter "Ja/Nein" angezeigt, sofern ein Reset stattgefunden hat.
    * In den Sprachdateien für "Zurückgesetzt am:" 1 neue Variable hinzugefügt.  
  * Einen neuen Abschnitt eingefügt.
    * In den Sprachdateien für "Serverlast" 1 neue Variable hinzugefügt.
    * Die Punkte "Cache für die Besuchertabelle verwenden:", "Aktualisiere mit der Zeitspanne für die Online-Anzeige:" und "Intervall der Aktualisierung:" in den neuen Abschnitt verschoben.
  * Bei "Zeitraum:" sind die Eingabefelder für Stunden, Minuten und Sekunden nicht länger für Text, sondern für Zahlen definiert. Diese werden jetzt ausserdem auf Untergrenze (0) und Obergrenze (99999) geprüft.
* Die Rechte wurden geändert:
  * Das bisherige Recht "Kann Mitglieder und Statistik sehen" wurde in "Kann Mitglieder sehen" geändert. Wenn eine Gruppe also sowohl die Statistik als auch die Mitglieder-Liste sehen soll, dann müssen jetzt auch beide Rechte gesetzt sein. So ist es jetzt auch möglich, z.B. nur die  Mitglieder-Liste anzuzeigen.
  * Im ACP-Modul dementsprechend für das einfache Rechtesystem die neue Option "Mitglieder" hinzugefügt.
  * Installationsstandard für die Standard Gruppen und Benutzer-Rollen entsprechend angepasst.
  * In den Sprachdateien 1 Variable hinzugefügt und 3 geändert.
* Die Templates wurden erneut überarbeitet:
  * Notwendige Änderungen bezüglich der geänderten Rechte vorgenommen.
  * Twig Logik bezüglich dem Einfügen von `<br />` geändert.
  * Twig Logik bezüglich dem Schalter "Zeige alle Template-Positionen gleichzeitig:" so geändert, das die bisherige Template-Variable `LFWWH_POS_ALL` entfallen kann. Das wird jetzt über Bit-Werte in der Variable `LFWWH_POS` geregelt und im Template per Bit-Operator abgefragt.
  * Ein `INCLUDE` erfolgt nur noch einmal. Das ist relevant bei der Einstellung "Zeige alle Template-Positionen gleichzeitig:" oder beim Einsatz von Erweiterungen die WWH per Template Variablen einbinden, wie z.B. "Brücke zwischen “LF who was here” und “Stat BLock”".
* Alle Style-Anpassungen ausser "prosilver" wieder entfernt. Die bisherigen 10 Anpassungen für phpBB 3.2 sind als gesondertes Archiv für LF-WWH 2.0.0 verfügbar, werden jedoch bei zukünftigen Updates nicht mehr berücksichtigt.
* Der Cache kann jetzt auch komplett deaktiviert werden. Dadurch wird die WWH-Anzeige quasi ohne Verzögerung aktualisiert. Diese Funktion ist nur für kleinere Foren mit wenig Besucher geeignet. Bei grösseren Foren kann eine Deaktivierung des Caches zu Performance-Problemen führen und wird nicht empfohlen. (Wunsch von Kirk)
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt, mit der der Cache bei Bedarf deaktiviert werden kann. Per Standard ist er aktiviert.
  * In den Sprachdateien für "Cache für die Besuchertabelle verwenden:" 2 neue Variablen hinzugefügt.
* Die Anzeige der IP ist nicht mehr an die Anzeige der Zeit gekoppelt, sondern kann jetzt völlig unabhängig (wie die Anzeige der Zeit) eingestellt werden. (basiert auf einem Wunsch von Wolkenbruch)
  * Um diese Funktion flexibler (unabhängig) gestalten zu können, wurde der entsprechende Code-Abschnitt (für die Anzeige von Zeit und IP hinter dem Namen oder als Tooltip) im Core-Skript von Grund auf neu geschrieben und optimiert.
  * Der Schalter "Zeige die Benutzer-IP:" hat jetzt nicht mehr die Optionsfelder "Ja/Nein" als Auswahlmöglichkeit, sondern eine Auswahlliste mit den gleichen 3 Optionen wie bei "Zeige die Zeit...".
  * Sprach-Variable entsprechend angepasst.
* WWH-Anzeige:
  * Für die Schaltfläche zur Anzeige von Zeit und/oder IP wird nicht mehr das Zeit-Symbol verwendet, sondern das Info-Symbol.
  * Für die Schaltfläche kann jetzt ein separater Tooltip in den Sprachdateien definiert werden. Bisher wurde als Tooltip die alternative Beschriftung für phpBB 3.1 verwendet.
  * Die alternative Beschriftung der Schaltfläche für phpBB 3.1 wurde jetzt durch ein Unicode-Zeichen ersetzt, das ähnlich aussieht, wie das Info-Symbol vom Awesome-Font für phpBB 3.2.
    * In den Sprachdateien die betreffende Variable entfernt.
* Fix: Wenn bei der Einstellungskombination "Zeige Bots: > Mit den Benutzern" und "Zeige die Zeit von Bots: > Bei überfahren" aktuell keine Bots in der Tabelle gelistet waren, wurde trotzdem die Schaltfläche zur Anzeige der ausgeblendeten Infos erzeugt.
* Fix: Firefox zeigte für die Info-Schaltfläche keinen Tooltip. (Meldung von Kirk)
* Der neue Administrator-Modus erlaubt es, das nur Benutzer mit administrativen Rechten WWH sehen können. Dabei werden die anderen Berechtigungssysteme ausser Kraft gesetzt. Das ist z.B. hilfreich, wenn man Änderungen an den Einstellungen oder Rechten vornehmen und testen will, ohne das WWH währenddessen für alle sichtbar ist.
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt.
  * In den Sprachdateien für "Administrator-Modus:" 2 neue Variablen hinzugefügt.
* Benutzer die das Merkmal "Unsichtbar" temporär (bei Anmeldung) oder dauerhaft (im Profil) aktiviert haben, können sich jetzt selber in der Benutzerliste der WWH-Anzeige sehen, wie das auch bei "Wer ist online?" der Fall ist.
* CSS:
  * Der bisherige sekundäre Klassenname `online-list` wurde in `whowashere-list` geändert, damit von Style Designer und Ext Coder der Bereich "Wer war da?" unabhängig vom Bereich "Wer ist online?" angesprochen werden kann.
  * Das CSS für die Info-Schaltflächen wurde vom Code in eine eigene CSS-Datei ausgelagert.
* Eine neue Einstellung erlaubt es nun, die Generierung der Info-Schaltfläche und der ausgeblendeten Informationen (Zeit, IP) komplett deaktivieren zu können.
  * Im ACP Modul eine neue Einstellung hinzugefügt, mit der diese Funktion deaktiviert werden kann. Per Standard ist diese Funktion aktiviert.
  * In den Sprachdateien für "Erzeuge ausgeblendete Informationen:" 2 neue Variablen hinzugefügt.
* Template-Änderungen: Ja 
  * Hinweis für Erweiterungs-Autoren: Die Template Bedingung `&& !LFWWH_API_MODE` darf nicht übernommen werden, da diese ausschliesslich für LF-WWH bestimmt ist.
  * Neu: `overall_header_head_append.html`, `who_was_here.css`
  * Geändert: `index_body_birthday_block_before.html`, `index_body_stat_blocks_after.html`, `index_body_stat_blocks_before.html`
  * Gelöscht: -

### Changelog 1.5.1 (2019-03-03)

* Fix: Bei der Erstinstallation von LF-WWH kann die Migration beim Update-Schritt 1.4.0 fehlschlagen, wenn vom Admin eine der sechs Standard Benutzer-Rollen gelöscht wurde. Eine entsprechende Meldung wäre in diesem Fall z.B. "Die Berechtigungs-Rolle „ROLE_USER_NOAVATAR“ existiert unerwarteterweise nicht.". Dementsprechend wird jetzt in der Migration von 1.4.0 bei jeder Benutzer-Rolle geprüft, ob sie vorhanden ist. Wenn eine Rolle fehlt, wird sie korrekt übersprungen. Realisiert mit der Funktion `role_exists()` von combuster. (Meldung von Dr.Death)
* Template-Änderungen: Nein

### Changelog 1.5.0 (2019-03-02)

**Hinweis: Wer "B3P Who was here Modul" (von Kirk) und/oder "Brücke zwischen Wwh Ext und Statblock EXT" (von chris1278) im Einsatz hat, der sollte mit dem Update von LF-WWH warten, bis die Autoren ihre jeweiligen Erweiterungen ebenfalls aktualisiert haben, da deren alten Versionen inkompatibel mit dieser Version von LF-WWH sind.**

* Alle HTML Templates (ACP Modul und Events) von phpBB-Syntax auf Twig-Syntax umgestellt. Dazu wurde kasimi's "Twig Converter" verwendet.
* Eine neue Funktion ermöglicht eine automatische Bereinigung der WWH-Tabelle und des WWH-Caches wenn Benutzerkonten gelöscht wurden. Damit werden gelöschte Benutzer sofort aus der Ansicht entfernt, nicht erst nach Ablauf des eingestellten Zeitraums (Heute oder beliebiger Zeitraum). (Wunsch von Kirk)
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt, mit der diese Funktion bei Bedarf deaktiviert werden kann. Per Standard ist sie aktiviert.
  * In den Sprachdateien für "Bei gelöschten Benutzern automatisch bereinigen:" 2 neue Variablen hinzugefügt.
* Im ACP Modul einen neuen Abschnitt eingefügt.
  * In den Sprachdateien für "Zurücksetzen" 1 neue Variable hinzugefügt.
  * Die Punkte "Einstellungen zurücksetzen:" und "Besucherrekord zurücksetzen:" in den neuen Abschnitt verschoben.
* Eine Änderung der Einstellung "Sortiere Benutzer nach:" wirkt sich jetzt sofort aus, nicht erst bei der nächsten Aktualisierung (abgelaufene Cache-Dauer). Das wird erreicht durch direktes löschen des WWH-Caches, sofern die Einstellung geändert wurde. Dadurch wird automatisch eine neue MySQL-Abfrage ausgeführt und die Anzeige aktualisiert. Diese Änderung basiert auf der Erfahrung mit der Bereinigungsfunktion für gelöschte Benutzer.
  * Dementsprechend in den Sprachdateien den Hinweis entfernt, der darüber informiert hat, das eine Änderung dieser Einstellung erst für die nächste Aktualisierung gilt. (Siehe 1.3.2)
* Korrekturen und kleinere Änderungen in den Sprachdateien des ACP Moduls vorgenommen.
* Bisher wurde die IP unnötigerweise auch dann als Tooltip angezeigt, wenn Zeit und IP bereits hinter dem Namen angezeigt wurden. Die Anzeige der IP im Tooltip ist jetzt davon abhängig, ob im Kontext die Zeit als Tooltip angezeigt wird.
  * Entsprechend im ACP Modul die Abblend-Funktion an die neue Regel angepasst.
  * Texte in den Sprachdateien bezüglich "Zeige die Benutzer-IP:" angepasst.
* Als Variablen-Präfix wurde sowohl "WHO_WAS_HERE_" als auch "WWH_" verwendet. Konsequent auf "WWH_" umgestellt.
  * Core-Skript, Sprachdateien und Event-Templates angepasst.
* Angepasste Templates für verschiedene Styles hinzugefügt. Dabei wurde die Style-Vererbung genutzt, das heisst jede Anpassung enthält nur die Änderungen gegenüber "prosilver". In Klammern ist die interne Style-Version angegeben.
  * Absolution 3.2.3 (3.2.3)
  * AcidTech 3.2.5 (3.2.5)
  * BlackBoard 3.2.5 (3.2.0)
  * Blackfog 3.2.5 (3.2.5)
  * CleanSilver 3.2.5 (1.0.2) - Hinweis: Die Einstellung "Position der Anzeige:" muss entweder auf "Oben" oder "Unten" gesetzt werden. Bei "Vor Geburtstage" wird dagegen die Anzeige unterdrückt, da diese sonst das Layout im Stats-Block stören würde.
  * Flat Style 3.2.5 (1.0.7)
  * HexagonReborn 3.2.4 (3.1.2)
  * Orange_BBEs 3.2.5 (2.0.6)
  * rain_forest 3.2.4 (1.1.3)
  * Rock'n Roll 3.2.5 (2.0.4)
* Eine Inkonsistenz bei der Generierung der Template-Variablen behoben. Der Inhalt der Variable `WWH_RECORD` wurde mit abschliessendem `<br />` generiert, was aber korrekterweise per Template erzeugt werden sollte, wie bei den Variablen `WWH_LIST` und `WWH_BOTS`. Dementsprechend wird die Variable jetzt ohne dieses HTML-Tag generiert, wodurch das Verhalten aller Variablen konsistent ist und auch mehr Kontrolle in den Templates bietet.
  * Alle Event-Templates an das neue Verhalten angepasst.
* Eine neue Template-Funktion erlaubt die Anzeige aller Template-Positionen gleichzeitig. Diese Funktion dient nur zu Testzwecken. Zum Beispiel um WWH an einen neuen Style anpassen zu können, ohne mühselig jede Position einzeln testen zu müssen.
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt, mit der dieser Modus aktiviert werden kann. Diese befindet sich im Abschnitt "Sonstiges".
  * In den Sprachdateien für "Zeige alle Template-Positionen gleichzeitig:" 2 neue Variablen hinzugefügt.
* Im ACP Modul den Link zu Anvar's WWH-Thema auf bb3.mobi entfernt, da sich die Diskussion dort auf das inzwischen veraltete NV-WWH bezieht.
  * Die zugehörige Sprachvariable `WWH_UPDATE_NEED` in `WWH_MOD_SUPPORT` umbenannt.
* In `composer.json` bei `homepage` statt dem phpbb.de-Forenthema die GitHub Adresse hinterlegt, da dies eher einer Homepage entspricht.
* Template-Änderungen: Ja 
  * Hinweis für Erweiterungs-Autoren: Die Template Bedingung `&& !WWH_API_MODE` darf nicht übernommen werden, da diese ausschliesslich für WWH bestimmt ist.
  * Neu: `who_was_here.html`
  * Geändert: `index_body_birthday_block_before.html`, `index_body_stat_blocks_after.html`, `index_body_stat_blocks_before.html`
  * Gelöscht: -

### Changelog 1.4.2 (2019-02-08)

* Korrekturen und kleinere Änderungen in den Sprachdateien des ACP Moduls vorgenommen.
* Bei phpBB 3.2 und der Einstellung "Zeige die Zeit von..." > "Bei überfahren" hat die Schaltfläche zur Anzeige der Zeiten jetzt einen Tooltip. Der Text wird dabei von der Sprachvariable `WHO_WAS_HERE_SHOW_TIME` bezogen. Bei phpBB 3.1 ändert sich nichts.
* Im ACP Modul die Einstellungen "Aktualisiere mit der Zeitspanne für die Online-Anzeige:" und "Intervall der Aktualisierung:" in den Bereich "Sonstiges" verschoben.
* Fix: Bei einer bestimmten (theoretischen) Kombination der Einstellungen von phpBB und WWH konnte das Intervall der Aktualisierung mit 0 Minuten definiert werden, wodurch effektiv der Cache umgangen wurde. Das wird jetzt abgefangen und auf ein Minimum von 1 Minute korrigiert.
* Im HTML-Teil des ACP Moduls alle Optionsfelder (Ja/Nein) auf eine einheitliche Logik gebracht mit Abfrage auf 0/1 anstelle auf false/true, passend zu den Abfragen der Auswahllisten.
* Template-Änderungen: Nein

### Changelog 1.4.1 (2018-11-22)

* Da bei WWH die Zeitangaben ohnehin in der Vergangenheit liegen, ist der Text "zuletzt:" überflüssig. Dieser repetitive Text bläht vor allem in grösseren Foren die Benutzerliste unnötig auf, sofern die Zeiten angezeigt werden. Darum die Handhabung der Sprachvariable so geändert, das diese auch komplett leer sein kann.
  * In den Sprachdateien den besagten Text entfernt. Die betreffende Sprachvariable ist nach wie vor vorhanden und wird unterstützt, sie hat per Standard nur keinen Inhalt mehr.
* Korrekturen in den Sprachdateien vorgenommen.
* Fix: Wenn bei aktivierter Einstellung "Bei überfahren" aktuell kein Benutzer oder Bot als Besucher in der WWH Tabelle registriert war und demnach in der Benutzerliste "0 Mitglieder" stand, dann wurde trotzdem die Schaltfläche zur Anzeige der Zeiten erzeugt. Nicht direkt ein Fehler, aber unschön.
* Template-Änderungen: Nein

### Changelog 1.4.0 (2018-10-20)

* Bei der Einstellung "Zeige die Zeit von..." > "Bei überfahren" wird jetzt vor der Benutzerliste eine Schaltfläche (Zeitsymbol aus Awesome-Font) eingeblendet, mit der auch Benutzer von Smartphones und Tablet-PCs die Zeiten anzeigen lassen können, die sonst nur bei "mouseover" sichtbar wären. Diese Schaltfläche gibt es auch für Mitglieder und Bots getrennt, je nachdem wie "Zeige Bots:" eingestellt wurde. Realisiert mit Javascript und etwas CSS.
  * Entsprechend in den Sprachdateien eine Erklärung bei den Einstellungen "Zeige die Zeit von ...:" hinzugefügt.
  * In den Sprachdateien die Variablen für "Mitglieder" und "Bots" so geändert, das die Schaltfläche dynamisch über `%s` eingefügt wird.
  * In den Sprachdateien eine neue Variable für "zeige Zeit" als Alternative für die Schaltfläche hinzugefügt. Diese Variable wird nur bei phpBB 3.1 verwendet, da es hier noch kein Awesome-Font gibt. (Hinweis von Kirk)
* Eine neue Funktion erlaubt es, die Anzeige von WWH abschalten zu können, so das nur die Template Variablen erzeugt werden. Diese Funktion ist gedacht für andere Erweiterungen oder spezielle Styles die bereits WWH selber darstellen. Damit ist es z.B. auch möglich, die Anzeige auf das Portal zu begrenzen und WWH im Forum abzuschalten.
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt, mit der dieser Modus aktiviert werden kann.
  * In den Sprachdateien für "API-Modus:" 2 neue Variablen hinzugefügt.
* Da das ACP Modul inzwischen einigermassen umfangreich ist, gibt es als kleine Hilfe nun eine Funktion die Einstellungen abblendet (schwächer darstellt) die aktuell keine Bedeutung/Wirkung haben. Somit sieht man auf einen Blick, welche Einstellungen die Anzeige gerade beeinflussen und welche nicht. Abgeblendete Einstellungen können weiterhin geändert werden. Diese Methode nutze ich im beruflichen Umfeld bei Programmen, die teilweise sehr komplexe Einstellungs-Menüs haben.
  * Dementsprechend in den Sprachdateien alle Erklärungen mit "Nicht relevant wenn ..." entfernt.
* Fix: Bei der Deinstallation von NV-WWH (und somit auch bei LF-WWH) wurde `wwh_last_clean` bislang nicht aus der Datenbank entfernt, da diese Variable in den Migrationsdateien von NV-WWH nicht berücksichtigt war.
* Es kann jetzt für jede Benutzergruppe einzeln festgelegt werden, welchen Umfang die Anzeige (Mitglieder und Statistik/Statistik/Nichts) haben soll. Dazu wird das Berechtigungssystem von phpBB benutzt. Sobald diese Funktion aktiviert ist, werden die Rechte freigeschaltet und können dann pro Gruppe festgelegt werden. Wer das nicht benötigt und wie bisher lediglich die Anzeige für die Gäste regeln möchte, der kann diesen Schalter einfach deaktiviert lassen. Danke an Kirk, der das alles bereits vorab realisiert hatte und so einen Wegweiser für mich schuf. (Wunsch von Jonson, Vorschläge von Kirk und chris1278)
  * Entsprechend für "Benutze das Berechtigungssystem von phpBB:" 2 neue Variablen in den Sprachdateien hinzugefügt. 
  * Rechte per Migrationsdatei hinzugefügt:
    * Wer war da: Kann Statistik sehen
    * Wer war da: Kann Mitglieder und Statistik sehen
  * Für die Gruppen-Rechte gelten dabei folgende Standardvorgaben:
    * Administratoren: Kann Mitglieder und Statistik sehen = Ja
    * Globale Moderatoren: Kann Mitglieder und Statistik sehen = Ja
    * Registrierte Benutzer: Kann Statistik sehen = Ja
    * Registrierte Benutzer: Kann Mitglieder und Statistik sehen = Ja
    * Kürzlich registrierte Benutzer: Kann Mitglieder und Statistik sehen = Nie
    * Gäste: Kann Statistik sehen = Ja
  * Für die Benutzer-Rollen gelten dabei folgende Standardvorgaben:
    * Standard-Funktionalität: Kann Mitglieder und Statistik sehen = Ja
    * Eingeschränkte Funktionalität: Kann Mitglieder und Statistik sehen = Ja
    * Volle Funktionalität: Kann Mitglieder und Statistik sehen = Ja
    * Keine Privaten Nachrichten: Kann Mitglieder und Statistik sehen = Ja
    * Kein Avatar: Kann Mitglieder und Statistik sehen = Ja
    * Funktionalitäten für neu registrierte Benutzer:  Kann Mitglieder und Statistik sehen = Nie
  * Neue Sprachdatei für die Rechte hinzugefügt.
* Für das Berechtigungssystem einen neuen Abschnitt im ACP Modul eingefügt.
  * In den Sprachdateien entsprechend eine Variable für "Berechtigungen" hinzugefügt.
* In Bezug auf das Berechtigungssystem einige Änderungen bei "Anzeige für Gäste:" vorgenommen:
  * Die Einstellung in den neuen Bereich "Berechtigungen" verschoben.
  * Erklärung und Auswahlliste an die Texte der Rechte des Berechtigungssystems angepasst.
  * Bei deaktiviertem Berechtigungssystem sind Bots jetzt komplett ausgeschlossen. Diese Gruppe kann also weder die Benutzerliste noch die Statistik "sehen".
  * Bei einer Neuinstallation von LF-WWH gilt nun "Statistik" als neuer Standard, passend zu "Wer ist online?" von phpBB 3.2.
    * Das gilt ebenso für die Schaltfläche "Standard" von "Einstellungen zurücksetzen:".
* Template-Änderungen: Ja 
  * Hinweis für Erweiterungs-Autoren: Die neue Template Bedingung `&& !WHO_WAS_HERE_API_MODE` darf nicht übernommen werden, da diese ausschliesslich für WWH bestimmt ist.
  * Neu: `who_was_here.js`
  * Geändert: `index_body_birthday_block_before.html`, `index_body_stat_blocks_after.html`, `index_body_stat_blocks_before.html`
  * Gelöscht: -

### Changelog 1.3.3 (2018-10-06)

* Im ACP Modul können Optionsfelder (Ja/Nein) jetzt auch über ihre Bezeichnungen angeklickt werden, wie dies allgemein üblich ist.
* Im ACP Modul die Variablennamen der Überschriften geändert.
  * Entsprechend in den Sprachdateien angepasst.
* Der dritte Einstellungs-Bereich hat nun ebenfalls eine Überschrift.
  * Entsprechend in den Sprachdateien eine neue Variable für "Sonstiges" hinzugefügt.
* In `acp_wwh.html` einen veralteten deaktivierten Block entfernt, der noch von 1.3.2 stammte.
* Alle Optionsfelder mit mehr als Ja/Nein konsequent auf Auswahlliste umgestellt. Das betrifft "Zeige Bots:", "Zeige die Zeit von Benutzern:" und "Zeige die Zeit von Bots:".
  * Entsprechend in den Sprachdateien pro Einstellung je 2 zusätzliche Variablen hinzugefügt und 1 geändert. Texte zu einer Auswahlliste passend geändert.
* Eine neue Funktion im ACP Modul erlaubt das zurücksetzen aller Einstellungen auf den Installations-Standard von WWH 1.2.2, welcher auch Standard für "LF who was here" ist.
  * Dafür einen weiteren Abschnitt samt Erklärung und Schaltfläche hinzugefügt.
  * In den Sprachdateien 3 weitere Variablen für "Einstellungen zurücksetzen:" hinzugefügt.
* Die Einstellung "Position der Anzeige:" in den zweiten Einstellungs-Bereich verschoben, da sie hier besser passt.
* In den Sprachdateien bei mehreren Variablen Korrekturen vorgenommen.
* Seit WWH 1.2.2 war das Intervall der Aktualisierung (cache time) direkt vom Wert "Zeitspanne für die Online-Anzeige:" von phpBB abhängig. Das Intervall kann nun unabhängig davon eingestellt werden. Als Untergrenze gilt 1 Minute und als Obergrenze gilt immer der genannte Wert "Zeitspanne für die Online-Anzeige:". (Wunsch von chris1278)
  * Entsprechend im ACP ein Textfeld hinzugefügt, das auf einen gültigen Wert mit den genannten Grenzen prüft.
  * In den Sprachdateien für "Intervall der Aktualisierung:" 2 neue Variablen hinzugefügt.
* Eine zusätzliche Funktion bezüglich der Aktualisierung erlaubt die Wahl zwischen dem bisherigen Standardverhalten von WWH und der neuen Eingabemöglichkeit für das Intervall. (Vorschlag von Kirk)
  * Entsprechend im ACP eine neue Einstellung hinzugefügt, mit der zwischen beiden Methoden gewählt werden kann.
  * In den Sprachdateien für "Aktualisiere mit der Zeitspanne für die Online-Anzeige:" 2 neue Variablen hinzugefügt.
* Im ACP Modul gibt es bei den Erklärungen die das Datum-Format betreffen, in den offiziellen deutschen Sprachpaketen von phpBB noch einen Fehler. Darum statt der Board-eigenen Variable `L_BOARD_DATE_FORMAT_EXPLAIN` eine eigene eingebaut.
  * Entsprechend in den Sprachdateien 1 neue Variable hinzugefügt.
* Die Anforderungen für phpBB und PHP in `composer.json` basierend auf Kirk's Test mit phpBB 3.1.12 reduziert.
* Das ACP Modul nach Prüfung durch den W3C Validator überarbeitet.
* Template-Änderungen: Nein

### Changelog 1.3.2 (2018-09-23)

* Die neue Funktion von 1.3.0 mit der die Anzeige der Benutzerliste für Gäste unterdrückt werden kann, wurde so erweitert, das die WWH Anzeige auch komplett ausgeschaltet werden kann. Gäste bekommen also nichts mehr von WWH zu sehen.
  * Dementsprechend die Einstellung "Zeige die Benutzerliste auch Gästen:" im ACP umbenannt und statt Optionsfelder (Ja/Nein) eine Auswahlliste eingebaut, mit den Punkten "Alles", "Statistik" und "Nichts".
  * In den Sprachdateien für "Anzeige für Gäste:" entsprechende Variablen hinzugefügt und bestehende geändert.
* Die Funktion zur Anzeige des letzten Aktivität-Zeitpunkts kann nun Benutzer und Bots getrennt behandeln. So ist es z.B. möglich, die Zeit bei Benutzern direkt anzuzeigen und die Zeit bei Bots nur bei überfahren.
  * Entsprechend gibt es im ACP Modul statt "Zeige Zeit:" jetzt die Einstellungen "Zeige die Zeit von Benutzern:" sowie "Zeige die Zeit von Bots:".
  * In den Sprachdateien für "Zeige die Zeit von Bots:" entsprechende Variablen hinzugefügt.
* Im ACP Modul die Auswahlliste der Einstellung "Position der Anzeige:" um eine dritte Option erweitert, mit der die WWH Ausgabe optional auch vor den Geburtstagen positioniert werden kann. Dadurch kann erreicht werden, das "Wer war da?" unmittelbar unter "Wer ist online?" angezeigt wird. Dazu wird ein Event benutzt der sich ausserhalb von DIV Containern befindet, wodurch die Modularität gewahrt bleibt.
  * Entsprechend eine dritte Template-Datei hinzugefügt.
* Der Anzeige-Name ist nicht länger Bestandteil der Sprachdateien, sondern fest eingebaut im Core. Dadurch werden versehentliche Übersetzungen vermieden.
  * In den Sprachdateien wird dieser Anzeige-Name bei der betreffenden Variable dynamisch über `%s` eingefügt.
* Im ACP Modul haben beide Einstellungs-Bereiche nun individuelle Überschriften.
  * In den Sprachdateien entsprechend für "Anzeige Einstellungen" eine weitere Variable hinzugefügt.
* Im ACP Modul gibt es nun für die Einstellung "Sortiere Benutzer nach:" einen Hinweis der darüber informiert, das eine Änderung dieser Einstellung erst für die nächste Aktualisierung in x Minuten gilt. Dabei wird x direkt aus der "Server-Konfiguration" bezogen: "Server-Last" > "Zeitspanne für die Online-Anzeige:".
  * Entsprechend die bestehende Variable in den Sprachdateien um diesen Hinweis ergänzt. Die Anzahl Minuten wird dabei über `%s` dynamisch eingefügt.
* Weitere Dateibereinigung vorgenommen: 4 x index.html entfernt.
* Ab dieser Version ist die Versionsprüfung im ACP eingerichtet. Alle Zugriffe finden diesbezüglich auf GitHub und über HTTPS statt.
* Template-Änderungen: Ja
  * Neu: `index_body_birthday_block_before.html`
  * Geändert: -
  * Gelöscht: -

### Changelog 1.3.1 (2018-09-18)

* Ausser Englisch und Deutsch alle anderen Sprachpakete entfernt, da diese im Vergleich zum englischen Sprachpaket teils gravierende Unterschiede bei den Variablen-Namen, bei der Anzahl der Variablen und der Dateistruktur selbst aufweisen. Das deutet auf mehrere unterschiedliche Versionsstände hin.
* Style Anpassungen für "bb3-mobi" entfernt, da diese mit Sicherheit nicht mehr dem aktuellen Stand des Styles entsprechen.
* Die Prüfung durch EPV (Extension Pre Validator) ergab bei Version 1.3.0 insgesamt 2 schwere Fehler, 1 Fehler und 119 Warnungen.
  * 2 schwere Fehler waren auf die Datei `services.yml` bezogen, da diese aufgrund des Alters nicht mehr dem aktuellen Syntax-Stand entsprach. Behoben.
  * 1 Fehler wurde versursacht da im GitHub Repository nicht die erwartete Ordnerstruktur `bb3mobi/washere/` vorhanden war. Behoben.
  * 117 Warnungen kamen von den besagten veralteten Sprachdateien wegen stark unterschiedlicher Versionsstände. 2 weitere Warnungen betrafen eine mögliche Sicherheitslücke bezüglich "SQL injection" und die für EPV unbekannte Datei `.editorconfig`. Behoben, bis auf `.editorconfig`, da diese Datei nichts mit phpBB zu tun hat und darum die Warnung diesbezüglich ignoriert werden kann.
* Im ACP Modul die Variablen-Namen für die Template-Positionen geändert.
  * Ebenso in den Sprachdateien.
* Template-Änderungen: Nein

### Changelog 1.3.0 (2018-09-16)

* 2 neue Sprach-Variablen für "Benutzer" und "Bots" hinzugefügt und im Core entsprechend referenziert, damit diese unabhängig von den Sprachpaketen des Forums angepasst werden können. Das war insofern notwendig, da WWH 1.2.2 "Benutzer" statt "Mitglieder" angezeigt hat und dies in den Sprachdateien von WWH nicht geändert werden konnte.
* Eine Funktion eingebaut, mit der optional die komplette Benutzerliste (also Benutzer und Bots) für Gäste und Bots unterdrückt werden kann. Somit kann erreicht werden, das sich "Wer war da?" identisch zu "Wer ist online?" von phpBB 3.2 verhält, diese Informationen also nur noch angemeldeten Benutzern zur Verfügung stehen. Per Standard verhält sich diese Funktion wie WWH 1.2.2, die Benutzerliste wird Gästen also angezeigt.
  * Im ACP Modul die Einstellungen um den Punkt "Zeige die Benutzerliste auch Gästen:" erweitert, mit dem die oben genannte Funktion aktiviert/deaktiviert werden kann.
  * In den Sprachdateien für "Zeige die Benutzerliste auch Gästen:" entsprechende Variablen hinzugefügt.
* In der Migration entsprechende Ergänzungen vorgenommen, damit ein direktes Update des original WWH auf meinen Fork möglich wird und die nötigen Anpassungen (neue Datenbank Einträge) automatisch vorgenommen werden.
* Im ACP Modul bei den Einstellungen einen Link zum zugehörigen Thema auf phpbb.de eingefügt. Den ursprünglichen Link zum Support-Thema auf bb3.mobi dahinter gesetzt.
* Eine weitere Sprach-Variable hinzugefügt und im ACP Modul entsprechend referenziert, damit der Titel der Einstellungen-Seite unabhängig vom Titel der Navigation definiert werden kann. Das ermöglicht es, in Klammern den tatsächlichen Anzeige-Name der Erweiterung darzustellen, damit diese im Bereich "Erweiterungen verwalten" zweifelsfrei zugeordnet werden kann, unabhängig vom jeweiligen Sprachpaket.
* Anzeige-Name von "Nv who was here" auf "LF who was here" geändert.
* Statt dem Namen der Erweiterung steht bei der Beschreibung in der Erweiterungs-Verwaltung nun genau das, was man hier eigentlich auch erwarten würde, also eine kurze Beschreibung.
* Kosmetische Korrekturen im ACP Modul und in den Sprachdateien vorgenommen.
* Eine Funktion eingebaut, mit der optional die Anzeige der Bot-Namen für Administratoren beschränkt werden kann. Per Standard verhält sich diese Funktion wie WWH 1.2.2, die Bot-Namen werden also allen angezeigt, sofern die Anzeige der Bots nicht generell deaktiviert wurde.
  * Im ACP Modul die Einstellungen um den Punkt "Zeige Bot-Namen nur Administratoren:" erweitert, mit dem die oben genannte Funktion aktiviert/deaktiviert werden kann.
  * In den Sprachdateien für "Zeige Bot-Namen nur Administratoren:" entsprechende Variablen hinzugefügt.
* Eine weitere Funktion eingebaut, mit der die Position der WWH Ausgabe geändert werden kann ohne die zuständige Template-Datei umbenennen zu müssen. Per Standard verhält sich diese Funktion wie WWH 1.2.2, die Ausgabe der WWH Daten erfolgt im Online/Statistik-Bereich also oben.
  * Im ACP Modul die Einstellungen um den Punkt "Position der Anzeige:" erweitert, mit dem die oben genannte Funktion gesteuert werden kann.
  * In den Sprachdateien für "Position der Anzeige:" entsprechende Variablen hinzugefügt.
* Template-Änderungen: Ja
  * Neu: `index_body_stat_blocks_after.html`
  * Geändert: `index_body_stat_blocks_before.html`
  * Gelöscht: -
