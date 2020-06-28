---
Title: Fehlerbehebung
---
Wie man Fehler findet und behebt.

[toc]

## Probleme bei der Installation

Die folgenden Probleme können auftreten:

**Datenstrom Yellow requires configuration file […]**

* Kopiere die mitgelieferte `.htaccess` Datei ins Installations-Verzeichnis. 
* Überprüfe ob deine FTP-Software eine Einstellung hat, um alle Dateien anzuzeigen.

**Datenstrom Yellow requires write access […]**

* Führe den Befehl `chmod -R a+rw *` im Installations-Verzeichnis aus. 
* Du kannst deine FTP-Software verwenden, um allen Dateien Schreibrechte zu geben.

**Datenstrom Yellow requires rewrite support […]**

* Konfiguriere den Webserver, siehe Konfigurationsdateien weiter unten.
* Du kannst den eingebauten Webserver auf deinem Computer verwenden.

**Datenstrom Yellow requires PHP extension […]**

* Installiere die fehlende PHP-Erweiterung auf deinem Webserver.
* Du brauchst die folgenden PHP-Erweiterungen: curl, gd, exif, mbstring, zip.

**Datenstrom Yellow requires PHP 5.6 or higher!**

* Installiere die neuste PHP-Version auf deinem Webserver.

## Probleme mit Apache

Hier ist eine `.htaccess` Konfigurationsdatei für den [Apache-Webserver](https://httpd.apache.org):

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Hier ist eine `.htaccess` Konfigurationsdatei für ein Unterverzeichnis, beispielsweise `http://website/yellow/`:

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /yellow/
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Wenn deine Webseite nicht funktioniert, dann musst du das [Rewrite-Modul aktivieren](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) und die [globale Konfiguration aktualisieren](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). Nachdem die Konfiguration verändert wurde, musst du den Apache-Webserver neustarten/neuladen.


## Probleme mit Nginx

Hier ist eine `nginx.conf` Konfigurationsdatei für den [Nginx-Webserver](https://nginx.org/):

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    index index.html yellow.php;

    location /cache {
        rewrite ^(.*)$ /error break;
    }

    location /content {
        rewrite ^(.*)$ /error break;
    }

    location /system {
        rewrite ^(.*)$ /error break;
    }

    location / {
        if (!-e $request_filename) {
            rewrite ^/(.*)$ /yellow.php last;
            break;
        }
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index yellow.php;
        include fastcgi_params;
    }
}
```

Hier ist eine `nginx.conf` Konfigurationsdatei für eine statische Webseite:

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    error_page 404 /404.html;
}
```

Wenn deine Webseite nicht funktioniert, dann überprüfe `server_name` und `root` in der Konfigurationsdatei. Nachdem die Konfiguration verändert wurde, musst du den [Nginx-Webserver neustarten/neuladen](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## Systemdiagnose

Die Logdatei `system/extensions/yellow.log` zeigt wichtige Informationen und Fehler an. Hier ist ein Beispiel:

```
2019-03-12 13:33:37 info Datenstrom Yellow 0.8.8, PHP 7.1.23, Apache 2.4.33, Darwin
2019-03-12 13:33:37 info Install extension 'English 0.8.10'
2019-03-12 13:33:37 info Install extension 'French 0.8.10'
2019-03-12 13:33:37 info Install extension 'German 0.8.10'
2019-03-12 13:33:49 info Install extension 'Blog 0.8.4'
2019-03-12 13:33:49 info Add user 'Anna'
```

Für weitere Informationen öffne die Datei `system/extensions/core.php` und ändere `<?php define("DEBUG", 1);`  

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage layout:blogpages theme:flatsite parser:markdown
YellowCore::processRequest file:content/1-en/2-features/1-blog/page.md
YellowCore::request status:200 time:19 ms
```

Dateisysteminformationen durch Erhöhen des Debuglevels zu `<?php define("DEBUG", 2);`
```
YellowSystem::load file:system/settings/system.ini
YellowEditUsers::load file:system/settings/user.ini
YellowText::load file:system/extensions/english-language.txt
YellowText::load file:system/extensions/french-language.txt
YellowText::load file:system/extensions/german-language.txt
YellowText::load file:system/settings/text.ini
```

Maximum Informationen durch Erhöhen des Debuglevels zu `<?php define("DEBUG", 3);`
```
YellowSystem::load file:system/settings/system.ini
YellowSystem::load Sitename:Datenstrom developers
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:en
YellowSystem::load Layout:default
```

## Verwandte Informationen

* [Wie man ein Problem meldet](https://github.com/datenstrom/yellow/blob/master/CONTRIBUTING.md)
* [Wie man die aktuelle Version anzeigt](https://github.com/datenstrom/yellow-extensions/blob/master/features/update/README-de.md)
* [Wie man den eingebauten Webserver startet](https://github.com/datenstrom/yellow-extensions/blob/master/features/command/README-de.md)
