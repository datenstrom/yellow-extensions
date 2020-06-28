---
Title: Troubleshooting
---
Here's how to find and fix errors.

[toc]

## Problems with installation

The following problems can occur:

**Datenstrom Yellow requires configuration file […]**

* Copy the supplied `.htaccess` file into the installation folder.
* Check if your FTP software has a setting to show all files.

**Datenstrom Yellow requires write access […]**

* Run the command `chmod -R a+rw *` in the installation folder. 
* You can use your FTP software to give write permissions to all files.

**Datenstrom Yellow requires rewrite support […]**

* Configure the web server, see configuration files below.
* You can use the built-in web server on your computer.

**Datenstrom Yellow requires PHP extension […]**

* Install the missing PHP extension on your web server.
* You need the following PHP extensions: curl, gd, exif, mbstring, zip.

**Datenstrom Yellow requires PHP 5.6 or higher!**

* Install the latest PHP version on your web server.

## Problems with Apache

Here's a `.htaccess` configuration file for the [Apache web server](https://httpd.apache.org):

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

Here's a `.htaccess` configuration file for a subfolder, for example `http://website/yellow/`:

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

When your website doesn't work, then you have to [enable the rewrite module](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) and [update the global configuration](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). After the configuration has been changed, you have to restart/reload the Apache web server.

## Problems with Nginx

Here's a `nginx.conf` configuration file for the [Nginx web server](https://nginx.org/):

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

Here's a `nginx.conf` configuration file for a static website:

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    error_page 404 /404.html;
}
```

When your website doesn't work, then check `server_name` and `root` in the configuration file. After the configuration has been changed, you have to [restart/reload the Nginx web server](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## System diagnostics

The log file `system/extensions/yellow.log` shows important information and errors. Here's an example:

```
2019-03-12 13:33:37 info Datenstrom Yellow 0.8.8, PHP 7.1.23, Apache 2.4.33, Darwin
2019-03-12 13:33:37 info Install extension 'English 0.8.10'
2019-03-12 13:33:37 info Install extension 'French 0.8.10'
2019-03-12 13:33:37 info Install extension 'German 0.8.10'
2019-03-12 13:33:49 info Install extension 'Blog 0.8.4'
2019-03-12 13:33:49 info Add user 'Anna'
```

For more information open file `system/extensions/core.php` and change `<?php define("DEBUG", 1);`

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage layout:blogpages theme:flatsite parser:markdown
YellowCore::processRequest file:content/1-en/2-features/1-blog/page.md
YellowCore::request status:200 time:19 ms
```

Get file system information by increasing debug level to `<?php define("DEBUG", 2);`
```
YellowSystem::load file:system/settings/system.ini
YellowEditUsers::load file:system/settings/user.ini
YellowText::load file:system/extensions/english-language.txt
YellowText::load file:system/extensions/french-language.txt
YellowText::load file:system/extensions/german-language.txt
YellowText::load file:system/settings/text.ini
```

Get maximum information by increasing debug level to `<?php define("DEBUG", 3);`
```
YellowSystem::load file:system/settings/system.ini
YellowSystem::load Sitename:Datenstrom developers
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:en
YellowSystem::load Layout:default
```

## Related information

* [How to report a problem](https://github.com/datenstrom/yellow/blob/master/CONTRIBUTING.md)
* [How to show current version](https://github.com/datenstrom/yellow-extensions/tree/master/features/update)
* [How to start the built-in web server](https://github.com/datenstrom/yellow-extensions/tree/master/features/command)
