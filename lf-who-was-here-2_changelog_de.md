### 2.1.4
GH (2022-12-03) / CDB (2022-12-22)

* Fix: Folgende Optionen wurden im ACP-Modul bei der Funktion "Einstellungen zurücksetzen" seit 2.1.1 nicht mehr berücksichtigt:
  * "Zeige die Bot-Namen nur bei administrativen Rechten"
  * "Zeige alle Template-Positionen gleichzeitig"
* ACP Template:
  * Bei den Einstellungen werden für Ja/Nein-Optionen jetzt Checkboxen mit Toggle-Style verwendet. Dabei wurden für Menschen mit Farbseh-Schwäche (Rot/Grün Problematik und Farbblindheit) zwei Merkmale berücksichtigt: 1) Beibehaltung der gewohnten Positionen für Ja und Nein. 2) Eindeutige Symbole für die Zustände Ja und Nein. Toggle Funktionalität in angepasster Form von "Style Changer" übernommen. (Danke an Kirk)
  * In der Rückfrage beim Besucherrekord Reset, wird jetzt wie bei "Extension Manager Plus" ein Titel mit Name und Version der Ext ausgegeben.
  * "Absenden" und "Zurücksetzen" sind jetzt in einer eigenen Untergruppe, die auf dieselbe Weise dargestellt wird, wie bei ACP Seiten von phpBB.
* Optimierung:
  * Code Optimierung bei PHP, Javascript, Twig und HTML. Mehrere Eigenschaften und aktuelle Entwicklungen von "Extension Manager Plus" übernommen.
  * Javascript Events und alle unnötigen IDs (78) aus dem HTML entfernt.
  * Javascript Events werden jetzt direkt in jQuery registriert und Elemente werden nicht mehr über die ID sondern über den Element-Namen angesprochen, der ohnehin vorhanden sein muss.

### 2.1.3
GH (2022-07-23) / CDB (2022-10-17)

* PHP Maximalversion von 8.0 auf 8.1 geändert.
* ACP Template:
  * Der Button zum speichern der Seite ist nicht mehr mit "Absenden" beschriftet, sondern mit "Seite speichern" um deutlich zu machen, dass alle Speichern-Buttons immer die ganze Seite speichern.
  * Kleinere Änderungen.
* XHTML Syntax aus allen Dateien entfernt die HTML enthalten oder generieren.
* Die aktualisierten Funktionen des Sprachpaket-Infosystems von "Extension Manager Plus" übernommen.
* Code Optimierungen.
* Sprachdateien.
  * Neue Sprachvariable für die Button-Beschriftung.
  * Kleinere Änderungen

### 2.1.2
GH (2022-02-18) / CDB (2022-04-05)

* Fix:
  * Im Sprachpaket `en` waren bei `acp_who_was_here.php` die Texte von 2 Sprach-Variablen vertauscht. Davon betroffen waren im ACP die Einstellungen "Zeige die Zeit von Benutzern:", "Zeige die Zeit von Bots:" und "Zeige die Benutzer-IP:". (Meldung von: Kirk, warmweer [Validierung])
* Änderungen bei den Einstellungen (ACP).
  * Den Schalter "Erzeuge ausgeblendete Informationen:" an die Abblend-Funktion gekoppelt. Der Schalter wird nur als aktiv angezeigt, wenn mindestens eine der Tooltip-Optionen aktiv ist.
  * Die Nach-oben Funktion auf dieselbe Weise realisiert, wie es bei Beiträgen gemacht wird.
  * Das CSS für den Titel der Optionsgruppen so geändert dass der Text einen eigenen Hintergrund hat, was Lesbarkeit und Aussehen verbessert. Die Titel sehen jetzt so aus wie Karteireiter.
* Sonstiges:
  * Code: Optimierungen (Validierungs-Kritik).
  * Changelog: Da bei Google Translator die Unterstützung für `.txt` Dateien entfernt wurde, werde ich kein separates englisches Changelog mehr führen da mir der Aufwand zu hoch ist. Stattdessen wird das Changelog direkt per Google Translator verlinkt.

### 2.1.1
GH (2021-10-25) / CDB (2022-01-16)

Ich bedanke mich erneut bei Kirk und chris1278 für die gute Zusammenarbeit. Ich bedanke mich ebenfalls bei kasimi für Infos und Empfehlungen.

* Das PHP Event `lukewcs.whowashere.display_condition` eingebaut, mit dem bestimmte Variablen übersteuert werden können um das Verhalten von LFWWH zu ändern. Hilfreich für WWH-Bridge-Entwickler.
  * Die folgenden Event-Variablen werden erstmalig unterstützt:
    * `force_display`: Erzwingt eine Generierung der WWH Template Variablen auch ausserhalb der Index-Seite. Wichtig: Per Event darf diese Variable nur auf `true` gesetzt werden, jedoch niemals auf `false`.
    * `force_api_mode`: Erzwingt den API-Modus damit WWH nicht angezeigt wird, sondern lediglich die WWH Template Variablen erzeugt werden.
  * Das Event wird erstmalig bei folgenden WWH-Bridge-Erweiterungen eingesetzt:
    * "LF Who was here Module for Board3 Portal" version 0.0.9: Event-Variablen: `force_display`
    * "Sidebar" version 1.2.3: Event-Variablen: `force_display`
    * "Bridge between “LF who was here” and “Statistics Block" version 2.1.1. Event-Variablen: `force_api_mode`
* Änderungen bei den Einstellungen (ACP).
  * Die Option "Zeige die Bot-Namen nur bei administrativen Rechten:" in den Abschnitt "Berechtigungen" verschoben und an die Abblend-Funktion gekoppelt.
  * Die Buttons zum Speichern und Zurücksetzen sind jetzt unterhalb jeder Einstellungsgruppe vorhanden. (Vorschlag von: Kirk)
  * Fehlermeldung bei ungültigem Formular wird jetzt rot dargestellt statt grün. In der phpBB Extension Doku wurde das falsch gezeigt. Ausserdem Back-Link hinzugefügt.
  * Fallback eingebaut wenn vorhandenes Sprachpaket keine Variable für die Meldung bezüglich veraltetes Sprachpaket enthält.
* Änderungen bei den Details (ACP).
  * Homepage Link auf den CDB Bereich von LFWWH geändert.
* Änderungen im Forenindex (Frontend).
  * Beim Button-Icon wird jetzt für Benutzer und Gäste ein Zeit-Symbol angezeigt. Admins sehen unverändert das Info-Symbol. (Vorschlag von: Kirk)
  * Statt Doppelpunkt wird hier jetzt ebenfalls wie im ACP-Template die Sprach-Variable `COLON` verwendet.
  * Für die Positions-Hinweise werden jetzt Variablen der Einstellungen verwendet. Die bisherige Sprach-Variable im Frontend wird nicht mehr benötigt.
  * Die Positions-Hinweise werden nicht mehr in PHP als Template Variablen generiert, sondern direkt per Twig aus den Sprachdateien geholt und im Template zusammengesetzt.
* Änderungen bei den Sprachdateien.
  * ACP: Die Variablen sind jetzt bedarfsgerecht auf verschiedene Dateien aufgeteilt. Somit werden die Variablen der Einstellungen nicht mehr unnötig überall geladen.
  * ACP: Etliche Sprach-Variablen umbenannt und bei manchen auch die Reihenfolge in der Datei geändert.
  * ACP: Unnötige redundante Erklärungstexte (insgesamt 3) entfernt. Das betrifft die Funktionalität bezüglich ausgeblendete Infos.
  * ACP: Beim API-Modus wurde der Hinweis auf "Statistics Block" entfernt, da StatBlock-WWH-Bridge diesen Modus nun selbst per Event steuert.
  * ACP: Kleinere Textänderungen.
  * Frontend: 1 Sprach-Variable gelöscht.
* Sonstiges:
  * Code: Die bisherige Überprüfung ob das Portal im Kontext aktiv ist wurde entfernt. Diese Überprüfung wird jetzt direkt durch das B3P-WWH-Module durchgeführt und steuert dann per Event das Verhalten von LFWWH.
  * Code: Optimierungen.

### 2.1.0
GH (2021-08-18) / CDB (2021-09-12)

* Die Voraussetzungen haben sich geändert:
  * phpBB 3.2.10 (vorher 3.1.11) bis einschliesslich phpBB 3.3.
  * PHP 7.0 (vorher 5.3) bis einschliesslich PHP 8.0.
* Die Erweiterung wurde auf die Funktionsbasis von phpBB 3.2 gestellt, wodurch sie jetzt inkompatibel mit phpBB 3.1 ist.
  * Alte phpBB Funktionen die bereits seit phpBB 3.2 als DEPRECATED eingestuft sind, werden nicht mehr verwendet. Stattdessen werden Funktionen genutzt die bei phpBB 3.2 eingeführt wurden und auch bei 3.3. noch gültig sind.
  * Sonderanpassungen die noch für phpBB 3.1 nötig waren, wurden entfernt.
* Die Erweiterung kann nur noch aktiviert und installiert werden, wenn die Voraussetzungen bei phpBB und PHP erfüllt sind. Dabei wird sowohl die Mindestversion als auch die Maximalversion berücksichtigt.
* Änderungen bei den Einstellungen (ACP).
  * Das einfache Berechtigung-System hat zusätzlich eine Option für die Bots. Diese Einstellung hat noch gefehlt, um LFWWH bei Bedarf komplett auf das Verhalten von NVWWH einstellen zu können.
  * Bei Datumsformat-Feldern wird dahinter deren aktuelle Anzeige als Demo dargestellt.
  * Unterhalb des Titels wird ein Hinweis angezeigt, wenn das Sprachpaket veraltet ist.
  * Es wurde ein Footer hinzugefügt, der die Autoren-Info des Sprachpaket-Übersetzers anzeigt.
  * Der tatsächliche Name der Erweiterung ist nicht mehr Teil des Titels, sondern der Beschreibung unterhalb des Titels.
  * Die Beschreibung unterhalb des Titels wurde neu gestaltet. Unter anderem wurde der CDB Link entfernt.
  * Unterhalb jeder Einstellungsgruppe die phpBB Standardfunktion "Nach oben" hinzugefügt.
* Änderungen im Forenindex (Frontend).
  * Der HTML Code wurde weitestgehend von PHP ins Template verlagert. So kann z.B. das HTML des Buttons und der Debug-Meldung geändert werden, sowie die Zeilen für Benutzer und Bots besser angepasst werden.
  * Die Position der Schaltfläche für das Einblenden der zusätzlichen Informationen (Zeit, IP) wird nicht mehr über eine Sprach-Variable geregelt, sondern direkt im Template.
  * Es gibt 4 neue Template Variablen.
  * CSS Klassen für Zeit und IP hinzugefügt, damit diese Informationen per Style Template angepasst werden können. (Wunsch von: Kirk)
  * Der Ordner `prosilver` wurde entfernt und alles nach `all` verschoben. Das ermöglicht einfachere Anpassungen von prosilver selbst, da dessen Ordner bei Updates nicht länger von Änderungen betroffen ist.
* Änderungen bei den Sprachdateien.
  * Mehrere Sprach-Variablen umbenannt.
  * Mehrere Sprach-Variablen hinzugefügt.
  * Kleinere Text-Änderungen.
  * Die bisherige Autoren-Info des Sprachpaket-Übersetzers aus dem Kommentar-Block entfernt.
* Sonstiges:
  * Javascript weitestgehend auf jQuery umgestellt.

### 2.0.0
GH (2020-03-29) / CDB (2020-07-06)

* Durch eine kleine Änderung ist der Code jetzt auch kompatibel zu PHP 5.3 - 5.5: Potenz-Operator `**` durch `pow()` ersetzt.
* Template-Änderungen: Nein
* Sprachdatei-Änderungen: Nein

### 2.0.0 RC 2
(2019-12-24)

* Die Twig Variable `lfwwh_pos_exp` in `lfwwh_debug_msg` umbenannt, da zukünftig noch andere Debug-Informationen denkbar sind.
  * CSS Klasse `.lfwwh_pos_exp` in `.lfwwh_debug` umbenannt.
* Template-Änderungen: Ja
* Sprachdatei-Änderungen: Ja

Fehlerkorrekturen:

* Fix: Bedingt durch die Reihenfolge bei der Ausführung von Events, wurde beim Aufruf der Index-Seite nicht zwingend der tatsächliche Status angezeigt, da immer zuerst das Event für die Anzeige und dann erst das Event für die Aktualisierung ausgeführt wurde. Dadurch waren die Statistik, die Uhrzeiten und die Benutzerliste nicht aktuell. Wurde die Seite aktualisiert, also erneut geladen, wurde der korrekte Status angezeigt. Das war eher eine Designschwäche als ein echter Fehler und trat in der Praxis nur in Erscheinung, wenn der Cache deaktiviert war. Bei aktiviertem Cache werden die zuletzt aktualisierten Informationen ohnehin nur nach einer Verzögerung (>= 1 Minute) angezeigt.
  * Im Listener wird für die Anzeige jetzt ein anderes Event verwendet. Um dabei potentielle Performance-Verluste zu vermeiden, wird die Funktion für die Generierung der Template-Variablen nur dann ausgeführt, wenn sie auch tatsächlich benötigt wird, also wenn die Index-Seite oder das Portal aufgerufen wird.
* Fix: Bei manchen Styles konnte es vorkommen, dass das Info-Symbol (Awesome-Font) nicht wie beabsichtigt die Textfarbe bekam, sondern eine Farbe die über die CSS-Klasse `.icon` definiert wurde. Je nach Farbwahl war dann das Icon praktisch nicht mehr vom Hintergrund zu unterscheiden.
  * CSS geändert.

### 2.0.0 RC 1
(2019-12-14)

* Name von "LF who was here (2.x)" auf "LF who was here 2" geändert und Autoreninfo in allen Dateien angepasst.
* Mindestanforderung bei PHP von 5.3.3 auf 5.6.0 geändert.
* Kleinere Korrekturen in den Sprachdateien.
* Sprach-Variable `LFWWH_WORD` in `LFWWH_AND_SEPARATOR` umbenannt.
* Der Text für "keine Mitglieder" wird nicht länger über die Variable `NO_ONLINE_USERS` aus dem phpBB Sprachpaket geladen, sondern kann unabhängig definiert werden.
  * Sprach-Variable `LFWWH_NO_USERS` hinzugefügt.
* Die Twig Bedingung `|| LFWWH_BOTS` wird nicht benötigt und wurde aus allen Template Dateien (insgesamt 5) entfernt.
* Wenn der Testmodus "Zeige alle Template-Positionen gleichzeitig:" aktiviert ist, dann werden jetzt bei allen Templates die zugehörige Position angezeigt, wodurch ein Template zweifelsfrei identifiziert werden kann. 
  * Dazu waren ausserdem Änderungen in 4 Template Dateien und 1 CSS Datei notwendig.
  * Sprach-Variable `LFWWH_POS_EXP` hinzugefügt.
* Template-Änderungen: Ja
* Sprachdatei-Änderungen: Ja

### 2.0.0 Beta 3
(2019-06-02)

* Die Methode mit der zusätzlicher Text in die Bestätigungsmeldung beim Löschen von Benutzerkonten eingefügt wurde, musste geändert werden, da diese ab phpBB 3.2 problematisch ist. Stattdessen wird jetzt eine spezielle Sprachdatei geladen, mit der die jeweils benötigten offiziellen Sprach-Variablen für die Dauer des Vorgangs geändert (erweitert) werden.
* Gemäss dem Konzept von LF-WWH, dass diejenigen Einstellungen abgeblendet werden, die aktuell keine Bedeutung haben, gelten die gleichen Regeln nun auch für die Gruppenrechte. Das heisst die Gruppenrechte werden nun immer angezeigt. Sie werden jedoch abgeblendet dargestellt, wenn sie aktuell keine Funktion haben. Das trifft zu, wenn entweder das phpBB Rechtesystem deaktiviert ist, oder der Administrator-Modus aktiviert ist. Damit wird ausserdem der bisherige Designfehler behoben, dass die Gruppenrechte auch dann angezeigt wurden, wenn sowohl das phpBB Rechtesystem als auch der Administrator-Modus aktiviert waren.
* In den deutschen Sprachdateien des ACP-Moduls die amerikanischen Anführungszeichen durch deutsche ersetzt.
* GitHub Repository für Travis CI eingerichtet mit folgenden Tests:
  * PHP_CodeSniffer (phpcs): Analysetool zur Prüfung der PHP Programmierrichtlinien nach phpBB Standard.
  * Extension Pre Validator (EPV): Analysetool zur Prüfung der Vorgaben für Erweiterungen nach phpBB Standard.
* Alle Fehler behoben, die von PHP_CodeSniffer gemeldet wurden.
* Kleinere Code Optimierungen.
* Template-Änderungen: Nein
* Sprachdatei-Änderungen: Ja

Fehlerkorrekturen:

* Fix: Wenn im Kontext das Recht "Kann Statistik sehen" fehlte, wurden trotzdem die Template-Variablen für den Zeitraum-Erklärungstext und den Rekord generiert. Das wurde zwar von den Abfragen im Template abgefangen, aber konsequenterweise werden jetzt auch diese Template-Variablen effektiv als "leer" generiert, wenn das erforderliche Recht fehlt.
* Fix: Bei der Einstellung "Anzeige der Besucher von ..." -> "Heute" und bei der Zeitumstellung auf Sommerzeit, begann der nachfolgende Tag (2019-4-1) erst um 01:00 Uhr. (Meldung von: Wolkenbruch)
  * Fehler 1: Die Berechnung des Lösch-Zeitstempels fand fälschlicherweise auf Basis des PHP-Datums statt. Der Fehler bei der Zeitumstellung trat nun auf, wenn für PHP und phpBB unterschiedliche Zeitzonen definiert waren. Das hatte zur Folge, dass am nachfolgenden Tag, also am 2019-4-1 um 00:00:00 Uhr ein Zeitstempel berechnet wurde, der zum Vortag gehörte. Dadurch wurde zu diesem Zeitpunkt keine Umschaltung auf den neuen Tag durchgeführt, dies fand erst um 01:00:01 Uhr statt. Jetzt wird ein unabhängiges Zeit-Objekt mit eigener Zeitzone erzeugt, auf dessen Basis dann der Lösch-Zeitstempel berechnet wird. Dem Zeit-Objekt wird dabei die gleiche Zeitzone zugewiesen, die auch in phpBB eingestellt ist. Somit ist die Zeitzone von PHP nicht länger relevant.
  * Fehler 2: Eine fehlerhafte Korrektur-Formel für den Lösch-Zeitstempel hatte bei unterschiedlichen Zeitzonen von PHP und phpBB zur Folge, dass um 01:00:01 Uhr der berechnete Zeitstempel einer falschen Uhrzeit (01:00:00) entsprach. Dadurch wurden am 2019-4-1 um 01:00:01 Uhr nicht nur alle Einträge aus der Besucher-Tabelle gelöscht die älter waren als 00:00:00 Uhr, sondern auch die Einträge zwischen 00:00:00 Uhr und 01:00:00 Uhr. Durch die Behebung von Fehler 1 wird diese Korrektur-Formel nicht länger benötigt und wurde entfernt.
  * Beide Fehler hätten bei unterschiedlichen Zeitzonen von PHP und phpBB auch bei der Zeitumstellung von Sommerzeit auf Normalzeit Auswirkungen gehabt. Dabei wäre wegen Fehler 2 am 2019-10-27 schon um 23:00:01 Uhr eine Bereinigung mit falschem Zeitstempel (23:00:00) ausgeführt worden. Am 2019-10-28 um 00:00:00 Uhr hätte jedoch keine Bereinigung und damit auch keine Umschaltung stattgefunden, da der benötigte Zeitstempel wegen beiden Fehlern falsch gewesen wäre. Am 2019-10-28 um 01:00:00 Uhr hätte dann eine weitere Bereinigung stattgefunden, die dann korrekt ausgeführt worden wäre.
  * Bei der Zeitumstellung von Sommerzeit auf Normalzeit hätte es durch Fehler 2 auch dann eine falsche Umschaltung gegeben, wenn beide Zeitzonen (PHP und phpBB) identisch wären. Dieser Fehler hätte also alle Boards betroffen, bei denen es Sommerzeit (DST) gibt. Am 2019-10-27 um 23:00:01 Uhr wäre dann eine Bereinigung mit falschem Zeitstempel (23:00:00 Uhr) ausgeführt worden. Am 2019-10-28 um 00:00:00 Uhr hätte dann eine weitere Bereinigung stattgefunden, die auch korrekt ausgeführt worden wäre.
* Fix: Bei der Einstellung "Anzeige der Besucher von ..." -> "Heute" wurden aufgrund eines Fehlers in der MySQL-Abfrage Besucher des aktuellen Tages mit der exakten Uhrzeit 00:00:00 noch dem Vortag zugeordnet und somit fälschlicherweise bei der Tages-Umschaltung gelöscht.

### 2.0.0 Beta 2
(2019-04-28)

* Bei der Anzeige der Zeit von Benutzern und Bots können jetzt die Inhalte der Sprach-Variablen `LFWWH_LAST1` und `LFWWH_LAST2` dynamisch über die Platzhalter `$1` und `$2` direkt im Zeitformat eingefügt werden. Das hat neben erhöhter Flexibilität auch den Vorteil, das die Einstellung für die Anzeige von "zuletzt um" regulär in der Konfiguration gespeichert wird und nicht mehr über die Sprachdatei durch setzen/löschen der Variable gesteuert werden muss.
  * Zusätzlich gibt es die Sprach-Variable `LFWWH_LAST3` für "zuletzt am" die mit `$3` angesprochen werden kann.
  * Im ACP-Modul wird entsprechend bei "Zeit-Format:" im Erklärungstext auf die Platzhalter `$1`, $2` und $3` hingewiesen.
    * Den Erklärungstext in der Sprachdatei so gestaltet, das bei diesem die aktuellen Inhalte der Platzhalter dynamisch aus der Sprachdatei eingefügt werden.
  * Bei "Zeit-Format:" wird jetzt bei einer Neuinstallation der Platzhalter `$1` eingetragen, wodurch per Standard auch wieder "zuletzt um" angezeigt wird. Das betrifft auch die Schaltfläche "Standard" im ACP-Modul.
* Sprachdateien:
  * Ab dieser Version hat die Sprach-Variable `LFWWH_LAST1` wieder den ursprünglichen Standardinhalt. Erstmals hat auch `LFWWH_LAST2` einen Standardinhalt. Diese Änderungen geschahen, da diese Variablen bei der Anzeige der Benutzer-Zeit ab dieser Version nicht mehr generell verwendet werden, sondern bei Bedarf über Platzhalter eingefügt werden können.
  * In `who_was_here.php` die Variable `LFWWH_RECORD` in `LFWWH_RECORD_DAY` umbenannt, da es sonst Überschneidungen mit `info_acp_who_was_here.php` gäbe, in der diese Variable ebenfalls benutzt wurde.
  * Kleinere Korrekturen.
  * Umbenennung einiger Variablen.
* ACP-Modul:
  * Die Einstellung "Datums-Format für den Besucherrekord:" hat jetzt einen eigenen Erklärungstext. Dieser wurde bisher von "Zeit-Format:" bezogen, dessen Inhalt jedoch nicht mehr für beide Einstellungen gültig ist.
    * Entsprechend in den Sprachdateien 1 neue Variable hinzugefügt.
* Es ist jetzt möglich, in der Statistik-Zeile auch die Anzahl der sichtbaren Mitglieder abzuschalten, genau wie dies auch schon für unsichtbare Benutzer, Bots und Gäste möglich war. Somit ist jetzt konsequent jeder Teil ausser der Gesamtsumme abschaltbar. (Wunsch von: stefan-franz)
  * Im ACP-Modul entsprechend eine neue Einstellung hinzugefügt, per Standard ist der Schalter aktiviert. Die Statistik-Zeile wird also wie gehabt komplett angezeigt.
  * In den Sprachdateien für "Zeige sichtbare Benutzer (Anzahl):" 2 neue Variablen hinzugefügt.
  * Die Überschriften der anderen Einstellungen (unsichtbare Benutzer, Bots und Gäste) entsprechend so geändert, das auch hier sofort ersichtlich ist, ob es nur um die Anzahl oder um Anzahl plus Namen geht.
  * Damit sich die Statistik-Zeile dynamisch an jede denkbare Einstellungskombination der 4 besagten Schalter anpassen kann, wurde das Trennzeichen "::" in eine eigene Sprach-Variable verlagert, damit dieser Trenner gezielt gesteuert werden kann.
* Die Funktion die das HTML für die Info-Schaltflächen (Benutzer und Bots) generiert, komplett überarbeitet. (basiert auf einem Vorschlag von Kirk)
  * Es wird kein Button mehr erzeugt, sondern lediglich ein `<span>` Container der auf das Maus-Event `onclick` reagiert. Dadurch entfiel auch die bisherige Verschachtelung eines Button-Containers und eines Label-Containers.
  * Dadurch entfallen ausserdem spezielle Style-Anpassungen für `<button>`, die bisher nötig waren. Dementsprechend das bisherige Klassen-CSS für die Schaltfläche entfernt.
  * Dafür neues Klassen-CSS hinzugefügt, mit dem verhindert wird, dass bei schnellem Mehrfachklick der angrenzende Text der "Schaltfläche" markiert wird.
  * Javascript an diese Änderungen angepasst.
* Javascript: 
  * Info-Schaltfläche: Globale Variablen und Funktion in einem Objekt zusammengefasst sowie Direktive `use strict` gesetzt.
  * ACP-Modul: Funktionen in einem Objekt zusammengefasst sowie Direktive `use strict` gesetzt.
* Template-Änderungen: Nein
* Sprachdatei-Änderungen: Ja

### 2.0.0 Beta 1
(2019-04-14)

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
  * Die Rechte werden dabei jedoch nicht übernommen, diese müssen nach der Installation also ggf. angepasst werden, sofern das vollständige Rechtesystem von phpBB genutzt wurde. Wurde nur das einfache Rechtesystem von LF-WWH genutzt ("Anzeige für Gäste:"), kann dieser Schritt entfallen.
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
  * Ein `INCLUDE` erfolgt nur noch einmal. Das ist relevant bei der Einstellung "Zeige alle Template-Positionen gleichzeitig:" oder beim Einsatz von Erweiterungen die WWH per Template-Variablen einbinden, wie z.B. "Brücke zwischen “LF who was here” und “Stat BLock”".
* Alle Style-Anpassungen ausser "prosilver" wieder entfernt. Die bisherigen 10 Anpassungen für phpBB 3.2 sind als gesondertes Archiv für LF-WWH 2.0.0 verfügbar, werden jedoch bei zukünftigen Updates nicht mehr berücksichtigt.
* Der Cache kann jetzt auch komplett deaktiviert werden. Dadurch wird die WWH-Anzeige quasi ohne Verzögerung aktualisiert. Diese Funktion ist nur für kleinere Foren mit wenig Besucher geeignet. Bei grösseren Foren kann eine Deaktivierung des Caches zu Performance-Problemen führen und wird nicht empfohlen. (Wunsch von: Kirk)
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
* Sprachdatei-Änderungen: Ja
 
Fehlerkorrekturen:

* Fix: Wenn bei der Einstellungskombination "Zeige Bots:" -> "Mit den Benutzern" und "Zeige die Zeit von Bots:" -> "Bei überfahren" aktuell keine Bots in der Tabelle gelistet waren, wurde trotzdem die Schaltfläche zur Anzeige der ausgeblendeten Infos erzeugt.
* Fix: Firefox zeigte für die Info-Schaltfläche keinen Tooltip. (Meldung von: Kirk)

### 1.5.1
(2019-03-03)

* Template-Änderungen: Nein

Fehlerkorrekturen:

* Fix: Bei der Erstinstallation von LF-WWH kann die Migration beim Update-Schritt 1.4.0 fehlschlagen, wenn vom Admin eine der sechs Standard Benutzer-Rollen gelöscht wurde. Eine entsprechende Meldung wäre in diesem Fall z.B. "Die Berechtigungs-Rolle „ROLE_USER_NOAVATAR“ existiert unerwarteterweise nicht.". Dementsprechend wird jetzt in der Migration von 1.4.0 bei jeder Benutzer-Rolle geprüft, ob sie vorhanden ist. Wenn eine Rolle fehlt, wird sie korrekt übersprungen. Realisiert mit der Funktion `role_exists()` von combuster. (Meldung von: Dr.Death)

### 1.5.0
(2019-03-02)

**Hinweis: Wer "B3P Who was here Modul" (von Kirk) und/oder "Brücke zwischen Wwh Ext und Statblock EXT" (von chris1278) im Einsatz hat, der sollte mit dem Update von LF-WWH warten, bis die Autoren ihre jeweiligen Erweiterungen ebenfalls aktualisiert haben, da deren alten Versionen inkompatibel mit dieser Version von LF-WWH sind.**

* Alle HTML Templates (ACP Modul und Events) von phpBB-Syntax auf Twig-Syntax umgestellt. Dazu wurde kasimi's "Twig Converter" verwendet.
* Eine neue Funktion ermöglicht eine automatische Bereinigung der WWH-Tabelle und des WWH-Caches wenn Benutzerkonten gelöscht wurden. Damit werden gelöschte Benutzer sofort aus der Ansicht entfernt, nicht erst nach Ablauf des eingestellten Zeitraums (Heute oder beliebiger Zeitraum). (Wunsch von: Kirk)
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
  * Die zugehörige Sprach-Variable `WWH_UPDATE_NEED` in `WWH_MOD_SUPPORT` umbenannt.
* In `composer.json` bei `homepage` statt dem phpbb.de-Forenthema die GitHub Adresse hinterlegt, da dies eher einer Homepage entspricht.
* Template-Änderungen: Ja 
  * Hinweis für Erweiterungs-Autoren: Die Template Bedingung `&& !WWH_API_MODE` darf nicht übernommen werden, da diese ausschliesslich für WWH bestimmt ist.

### 1.4.2
(2019-02-08)

* Korrekturen und kleinere Änderungen in den Sprachdateien des ACP Moduls vorgenommen.
* Bei phpBB 3.2 und der Einstellung "Zeige die Zeit von..." > "Bei überfahren" hat die Schaltfläche zur Anzeige der Zeiten jetzt einen Tooltip. Der Text wird dabei von der Sprach-Variable `WHO_WAS_HERE_SHOW_TIME` bezogen. Bei phpBB 3.1 ändert sich nichts.
* Im ACP Modul die Einstellungen "Aktualisiere mit der Zeitspanne für die Online-Anzeige:" und "Intervall der Aktualisierung:" in den Bereich "Sonstiges" verschoben.
* Im HTML-Teil des ACP Moduls alle Optionsfelder (Ja/Nein) auf eine einheitliche Logik gebracht mit Abfrage auf 0/1 anstelle auf false/true, passend zu den Abfragen der Auswahllisten.
* Template-Änderungen: Nein

Fehlerkorrekturen:

* Fix: Bei einer bestimmten (theoretischen) Kombination der Einstellungen von phpBB und LF-WWH konnte das Intervall der Aktualisierung mit 0 Minuten definiert werden, wodurch effektiv der Cache umgangen wurde. Das wird jetzt abgefangen und auf ein Minimum von 1 Minute korrigiert.

### 1.4.1
(2018-11-22)

* Da bei WWH die Zeitangaben ohnehin in der Vergangenheit liegen, ist der Text "zuletzt:" überflüssig. Dieser repetitive Text bläht vor allem in grösseren Foren die Benutzerliste unnötig auf, sofern die Zeiten angezeigt werden. Darum die Handhabung der Sprach-Variable so geändert, das diese auch komplett leer sein kann.
  * In den Sprachdateien den besagten Text entfernt. Die betreffende Sprach-Variable ist nach wie vor vorhanden und wird unterstützt, sie hat per Standard nur keinen Inhalt mehr.
* Korrekturen in den Sprachdateien vorgenommen.
* Template-Änderungen: Nein

Fehlerkorrekturen:

* Fix: Wenn bei aktivierter Einstellung "Bei überfahren" aktuell kein Benutzer oder Bot als Besucher in der WWH Tabelle registriert war und demnach in der Benutzerliste "0 Mitglieder" stand, dann wurde trotzdem die Schaltfläche zur Anzeige der Zeiten erzeugt. Nicht direkt ein Fehler, aber unschön.

### 1.4.0
(2018-10-20)

* Bei der Einstellung "Zeige die Zeit von ..." -> "Bei überfahren" wird jetzt vor der Benutzerliste eine Schaltfläche (Zeitsymbol aus Awesome-Font) eingeblendet, mit der auch Benutzer von Smartphones und Tablet-PCs die Zeiten anzeigen lassen können, die sonst nur bei "mouseover" sichtbar wären. Diese Schaltfläche gibt es auch für Mitglieder und Bots getrennt, je nachdem wie "Zeige Bots:" eingestellt wurde. Realisiert mit Javascript und etwas CSS.
  * Entsprechend in den Sprachdateien eine Erklärung bei den Einstellungen "Zeige die Zeit von ...:" hinzugefügt.
  * In den Sprachdateien die Variablen für "Mitglieder" und "Bots" so geändert, das die Schaltfläche dynamisch über `%s` eingefügt wird.
  * In den Sprachdateien eine neue Variable für "zeige Zeit" als Alternative für die Schaltfläche hinzugefügt. Diese Variable wird nur bei phpBB 3.1 verwendet, da es hier noch kein Awesome-Font gibt. (Hinweis von Kirk)
* Eine neue Funktion erlaubt es, die Anzeige von WWH abschalten zu können, so das nur die Template-Variablen erzeugt werden. Diese Funktion ist gedacht für andere Erweiterungen oder spezielle Styles die bereits WWH selber darstellen. Damit ist es z.B. auch möglich, die Anzeige auf das Portal zu begrenzen und WWH im Forum abzuschalten.
  * Entsprechend im ACP Modul eine neue Einstellung hinzugefügt, mit der dieser Modus aktiviert werden kann.
  * In den Sprachdateien für "API-Modus:" 2 neue Variablen hinzugefügt.
* Da das ACP Modul inzwischen einigermassen umfangreich ist, gibt es als kleine Hilfe nun eine Funktion die Einstellungen abblendet (schwächer darstellt) die aktuell keine Bedeutung/Wirkung haben. Somit sieht man auf einen Blick, welche Einstellungen die Anzeige gerade beeinflussen und welche nicht. Abgeblendete Einstellungen können weiterhin geändert werden. Diese Methode nutze ich im beruflichen Umfeld bei Programmen, die teilweise sehr komplexe Einstellungs-Menüs haben.
  * Dementsprechend in den Sprachdateien alle Erklärungen mit "Nicht relevant wenn ..." entfernt.
* Es kann jetzt für jede Benutzergruppe einzeln festgelegt werden, welchen Umfang die Anzeige (Mitglieder und Statistik/Statistik/Nichts) haben soll. Dazu wird das Berechtigungssystem von phpBB benutzt. Sobald diese Funktion aktiviert ist, werden die Rechte freigeschaltet und können dann pro Gruppe festgelegt werden. Wer das nicht benötigt und wie bisher lediglich die Anzeige für die Gäste regeln möchte, der kann diesen Schalter einfach deaktiviert lassen. Danke an Kirk, der das alles bereits vorab realisiert hatte und so einen Wegweiser für mich schuf. (Wunsch von: Jonson) (Vorschläge von: Kirk, chris1278)
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

Fehlerkorrekturen:

* Fix: Bei der Deinstallation von NV-WWH (und somit auch bei LF-WWH) wurde `wwh_last_clean` bislang nicht aus der Datenbank entfernt, da diese Variable in den Migrationsdateien von NV-WWH nicht berücksichtigt war.

### 1.3.3
(2018-10-06)

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
* Seit WWH 1.2.2 war das Intervall der Aktualisierung (cache time) direkt vom Wert "Zeitspanne für die Online-Anzeige:" von phpBB abhängig. Das Intervall kann nun unabhängig davon eingestellt werden. Als Untergrenze gilt 1 Minute und als Obergrenze gilt immer der genannte Wert "Zeitspanne für die Online-Anzeige:". (Wunsch von: chris1278)
  * Entsprechend im ACP ein Textfeld hinzugefügt, das auf einen gültigen Wert mit den genannten Grenzen prüft.
  * In den Sprachdateien für "Intervall der Aktualisierung:" 2 neue Variablen hinzugefügt.
* Eine zusätzliche Funktion bezüglich der Aktualisierung erlaubt die Wahl zwischen dem bisherigen Standardverhalten von WWH und der neuen Eingabemöglichkeit für das Intervall. (Vorschlag von: Kirk)
  * Entsprechend im ACP eine neue Einstellung hinzugefügt, mit der zwischen beiden Methoden gewählt werden kann.
  * In den Sprachdateien für "Aktualisiere mit der Zeitspanne für die Online-Anzeige:" 2 neue Variablen hinzugefügt.
* Im ACP Modul gibt es bei den Erklärungen die das Datum-Format betreffen, in den offiziellen deutschen Sprachpaketen von phpBB noch einen Fehler. Darum statt der Board-eigenen Variable `L_BOARD_DATE_FORMAT_EXPLAIN` eine eigene eingebaut.
  * Entsprechend in den Sprachdateien 1 neue Variable hinzugefügt.
* Die Anforderungen für phpBB und PHP in `composer.json` basierend auf Kirk's Test mit phpBB 3.1.12 reduziert.
* Das ACP Modul nach Prüfung durch den W3C Validator überarbeitet.
* Template-Änderungen: Nein

### 1.3.2
(2018-09-23)

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

### 1.3.1
(2018-09-18)

* Ausser Englisch und Deutsch alle anderen Sprachpakete entfernt, da diese im Vergleich zum englischen Sprachpaket teils gravierende Unterschiede bei den Variablen-Namen, bei der Anzahl der Variablen und der Dateistruktur selbst aufweisen. Das deutet auf mehrere unterschiedliche Versionsstände hin.
* Style Anpassungen für "bb3-mobi" entfernt, da diese mit Sicherheit nicht mehr dem aktuellen Stand des Styles entsprechen.
* Die Prüfung durch EPV (Extension Pre Validator) ergab bei Version 1.3.0 insgesamt 2 schwere Fehler, 1 Fehler und 119 Warnungen.
  * 2 schwere Fehler waren auf die Datei `services.yml` bezogen, da diese aufgrund des Alters nicht mehr dem aktuellen Syntax-Stand entsprach. Behoben.
  * 1 Fehler wurde versursacht da im GitHub Repository nicht die erwartete Ordnerstruktur `bb3mobi/washere/` vorhanden war. Behoben.
  * 117 Warnungen kamen von den besagten veralteten Sprachdateien wegen stark unterschiedlicher Versionsstände. 2 weitere Warnungen betrafen eine mögliche Sicherheitslücke bezüglich "SQL injection" und die für EPV unbekannte Datei `.editorconfig`. Behoben, bis auf `.editorconfig`, da diese Datei nichts mit phpBB zu tun hat und darum die Warnung diesbezüglich ignoriert werden kann.
* Im ACP Modul die Variablen-Namen für die Template-Positionen geändert.
  * Ebenso in den Sprachdateien.
* Template-Änderungen: Nein

### 1.3.0
(2018-09-16)

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
