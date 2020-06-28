Disqus 0.8.3
============
Disqus-Kommentare im Blog anzeigen.

<p align="center"><img src="disqus-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man diese Erweiterung installiert

1. [Datenstrom Yellow herunterladen und installieren](https://github.com/datenstrom/yellow/).
2. [Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/disqus.zip). Falls du Safari verwendest, rechtsklicke und wähle "Verknüpfte Datei laden unter".
3. Kopiere `disqus.zip` in dein `system/extensions`-Verzeichnis.

Zum Deinstallieren lösche einfach die [Erweiterungsdateien](extension.ini).

## Wie man Kommentare anzeigt

[Disqus](https://disqus.com) ist ein Kommentarservice für Webseiten. Um diese Erweiterung zu verwenden, öffnen die Datei `system/settings/system.ini` und ändere `DisqusShortname: website`. Du kannst den Namen deiner Webseite im Disqus-Dashboard finden. Kommentare werden auf Blogseiten angezeigt. Um Kommentare auf anderen Seiten anzuzeigen, füge eine `[disqus]`-Abkürzung in die Seite hinzu.

Diese Erweiterung benutzt einen Online-Service, es gibt die [Comments-Erweiterung](https://github.com/GiovanniSalmeri/yellow-comments) als Alternative.

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/settings/system.ini` vorgenommen werden:

`DisqusShortname` = dein Disqus-Name  

## Beispiele

Inhaltsdatei mit Kommentare:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [disqus]

Layoutdatei mit Kommentare:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getContent() ?>
    <?php echo $this->yellow->page->getExtra("disqus") ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Entwickler

Datenstrom. [Support finden](https://datenstrom.se/de/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
