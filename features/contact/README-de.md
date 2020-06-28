Contact 0.8.11
==============
E-Mail-Kontaktseite.

<p align="center"><img src="contact-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/contact.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `contact.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man eine Kontaktseite benutzt

Die Kontaktseite ist auf deiner Webseite vorhanden als `http://website/contact/`. Der Webmaster erhält alle Kontaktnachrichten. Die E-Mail des Webmasters wird in der Datei `system/settings/system.ini` festgelegt. Ganz oben auf einer Seite kannst du einen anderen `Author` und `Email` in den [Einstellungen](https://github.com/datenstrom/yellow-extensions/tree/master/features/core/README-de.md#einstellungen) festlegen. Um ein Kontaktformular auf anderen Seiten anzuzeigen, benutze eine `[contact]`-Abkürzung. Du kannst auch einen Link zur Kontaktseite irgendwo auf deiner Webseite einbauen.

## Wie man eine Kontaktseite beschränkt

Falls du nicht willst dass Nachrichten an beliebige Person geschickt werden, beschränke E-Mails. Öffne die Datei `system/settings/system.ini` und ändere `ContactEmailRestriction: 1`. Benutzer dürfen dann keine E-Mail festlegen, alle Kontaktnachrichten gehen direkt an den Webmaster.

Falls du nicht willst dass Nachrichten mit Links verschickt werden, beschränke Links. Öffne die Datei `system/settings/system.ini` und ändere `ContactLinkRestriction: 1`. E-Mails dürfen dann keine anklickbare Links enthalten, das blockiert viele unerwünschte Nachrichten. Du kannst ausserdem Stichwörter im Spamfilter einstellen, netterweise schicken viele Spammer die selbe Nachricht mehrfach.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`Author` = Name des Webmasters  
`Email` = E-Mail des Webmasters  
`ContactLocation` = Ort der Kontaktseite  
`ContactEmailRestriction` = E-Mail-Beschränkung aktivieren, 1 oder 0  
`ContactLinkRestriction` = Linkbeschränkung aktivieren, 1 oder 0  
`ContactSpamFilter` = Spamfilter als regulärer Ausdruck, `none` um zu deaktivieren  

Die folgenden Einstellungen können in der Datei `system/settings/text.ini` vorgenommen werden:

`ContactStatusNone` = Begrüßungstext auf der Kontaktseite  
`ContactMailFooter` = Fusszeile von Kontaktnachrichten  

Die folgenden Dateien können angepasst werden:

`system/layouts/contact.html` = Layoutdatei für Kontaktseite  

## Beispiele

Kontaktformular hinzufügen:

    [contact]
    [contact /contact/]
    [contact /de/contact/]

Inhaltsdatei mit Kontaktformular:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [contact]

Inhaltsdatei mit Kontaktlink:

    ---
    Title: Über
    ---
    Für Menschen die kleine Webseiten machen. [Kontaktiere mich](/contact/).
    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    Diese Webseite ist erstellt mit [Datenstrom Yellow](https://datenstrom.se/de/yellow/).

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
