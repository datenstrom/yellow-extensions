Traffic 0.8.6
=============
Zugriffsanalysen aus Webserver-Logdateien erstellen.

<p align="center"><img src="traffic-screenshot.png?raw=true" width="794" height="478" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/traffic.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `traffic.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man Zugriffsanalysen erstellt

Die Zugriffsanalysen sind in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/features/command/README-de.md) vorhanden. Es zeigt verweisende Webseiten, beliebte Inhalte, Dateien und Suchanfragen.  Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die `yellow.php` befindet. Gib ein `php yellow.php traffic` gefolgt von optionalen Tagen, Ort und Dateiname.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`TrafficDays` = Anzahl Tage  
`TrafficLinesMax` = Anzahl der Zeilen pro Kategorie  
`TrafficLogDirectory` = Verzeichnis mit Logdateien  
`TrafficLogFile` = Dateiname als regulärer Ausduck  
`TrafficSpamFilter` = Spamfilter als regulärer Ausdruck, `none` um zu deaktivieren  

## Beispiele

Zugriffsanalysen in der Befehlszeile erstellen:

`php yellow.php traffic`  
`php yellow.php traffic 1`  
`php yellow.php traffic 30 /yellow/ /var/log/apache2/website_access.log` 

~~~~
Referring sites

- 58 https://github.com/datenstrom/yellow
- 43 https://github.com/myles/awesome-static-generators
- 17 https://medium.com/@nampara17/whats-the-best-cms-for-static-websites-12364ab911ef
- 9 https://github.com/

Popular content

- 3447 https://datenstrom.se/
- 927 https://datenstrom.se/yellow/
- 239 https://datenstrom.se/blue/
- 179 https://datenstrom.se/ideas/

Error pages

- 57 https://datenstrom.se/media/images/datenstrom-yellow.png - Not found
- 54 https://datenstrom.se/ - Bad request
- 27 https://datenstrom.se/ads.txt - Not found
- 6 https://datenstrom.se//wordpress/wp-includes/wlwmanifest.xml - Bad request

Yellow traffic: 30 days, 5280 views
~~~~

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
