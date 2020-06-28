Fontawesome 0.8.4
=================
Icons und Symbole.

![Bildschirmfoto](fontawesome-screenshot.jpg?raw=true)

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/fontawesome.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `fontawesome.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man ein Icon hinzufügt

Füge `:shortcode:` zum Text einer Seite hinzu. Hier ist eine [komplette Liste mit Icons](https://fontawesome.com/icons).

Es ist auch möglich eine `[fa]`-Abkürzung zu erstellen oder HTML `<i class="fa fa-name"></i>` zu benutzen. Du kannst weitere Stile an den Namen anhängen, beispielsweise `fa-lg`, `fa-2x`, `fa-3x`, `fa-4x` und `fa-5x`.

Diese Erweiterung verwendet [Font Awesome v4.5.0](https://github.com/FortAwesome/Font-Awesome) von Dave Gandy, es unterstützt ungefähr 600 piktografische Symbole. Es ist unter [OFL 1.1](https://opensource.org/licenses/OFL-1.1) lizenziert. Font Awesome hat Symbole für Webanwendungen, Schaltflächen und Formulare.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`FontawesomeToolbarButtons` = Symbolleistenschaltflächen für die [Edit-Erweiterung](https://github.com/datenstrom/yellow-extensions/tree/master/features/edit/README-de.md)  

## Beispiele

Icon hinzufügen:

    :fa-envelope-o:
    :fa-twitter:
    :fa-github:

Icon hinzufügen, normale Größe:

    [fa fa-envelope-o]
    [fa fa-twitter]
    [fa fa-github]
    
Icon hinzufügen, doppelte Größe:

    [fa fa-envelope-o fa-2x]
    [fa fa-twitter fa-2x]
    [fa fa-github fa-2x]

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
