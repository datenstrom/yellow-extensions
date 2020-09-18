---
Title: 故障排除
TitleSlug: troubleshooting
---
学习如何查找和修复错误。

[toc]

## 安装问题

可能发生以下故障：

**Datenstrom Yellow requires configuration file**

把提供的`.htaccess`文件复制到安装目录，检查FTP软件是否设置为现实隐藏文件。在安装过程中有时会发生`.htaccess`文件被忽视，把缺失的配置文件复制到服务器后鼓掌应该可以得到解决。

**Datenstrom Yellow requires write access**

在安装目录运行命令`chmod -R a+rw *`，也可以用FTP软件赋予全部文件写入权限，建议给安装目录内的所有文件和文件夹赋予写入权限，只要服务器在`system`文件夹有足够的写入权限，故障应该可以得到解决。

**Datenstrom Yellow requires rewrite support**

参考以下配置文件对服务器进行配置，给Web服务器写一个配置文件，或者也可以在本地电脑用软件内置的Web服务器，内置Web服务器对开发者来说很方便。只要服务器能把HTTP请求转发给`yellow.php`，这个故障应该可以得到解决。

**Datenstrom Yellow requires PHP extension**

在服务器安装PHP相应扩展。

**Datenstrom Yellow requires PHP 5.6 or higher**

安装或者升级最新版PHP。

## Apache的故障

这是Apache的`.htaccess`配置文件：

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

这是用于子文件夹的`.htaccess`配置文件，例如网站放在`http://website/yellow/`：

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

这是用于子域名的`.htaccess`配置文件，例如域名是`http://sub.domain.website/`：

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

当网站不工作时，要检查启用[启用rewrite模块](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2 "英文资料")并[更新全局配置](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all "英文资料")，配置改动后要要重启/重新加载Apache。

## Nginx的故障

这是Nginx服务器的的一个`nginx.conf`配置文件：

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

这是`nginx.conf`配置静态网站：

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    error_page 404 /404.html;
}
```

当网站不工作时，检查配置文件的`server_name`和`root`，配置改动后要要[重启/重新加载Nginx](https://stackoverflow.com/questions/21292533/reload-nginx-configuration "英文资料")。

## 系统诊断

文件`system/extensions/yellow.log`记录了重要信息和报错，这是一段范例：

```
2020-07-12 13:33:37 info Datenstrom Yellow 0.8.15, PHP 7.1.33, Apache 2.4.33, Mac
2020-07-12 13:33:37 info Install extension 'English 0.8.21'
2020-07-12 13:33:37 info Install extension 'French 0.8.21'
2020-07-12 13:33:37 info Install extension 'German 0.8.21'
2020-07-12 13:33:49 info Install extension 'Blog 0.8.7'
2020-07-12 13:33:49 info Add user 'Anna'
```

有关更多信息请打开文件`system/extensions/core.php`并修改为`<?php define("DEBUG", 1);`

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage language:en layout:blogpages theme:stockholm parser:markdown
YellowCore::processRequest file:content/1-en/2-features/1-blog/page.md
YellowCore::request status:200 time:19 ms
```

将debug等级提升至`<?php define("DEBUG", 2);`以获得系统文件信息。
```
YellowSystem::load file:system/settings/system.ini
YellowUser::load file:system/settings/user.ini
YellowLanguage::load file:system/extensions/english.txt
YellowLanguage::load file:system/extensions/french.txt
YellowLanguage::load file:system/extensions/german.txt
YellowLanguage::load file:system/settings/language.ini
```

将debug等级提升至`<?php define("DEBUG", 3);`获得最大量信息。
```
YellowSystem::load file:system/settings/system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Language:en
YellowSystem::load Layout:default
```

## 相关信息

* [如何开启内置Web服务器](https://github.com/datenstrom/yellow-extensions/tree/master/source/command "英文资料")
* [如何创建帐号](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit "英文资料")
* [如何恢复被删除页面](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit "英文资料") 
