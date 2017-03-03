Traffic plugin 0.6.11
====================
Create traffic analytics from web server logfiles.

## How do I install this?

1. [Download and install Yellow](https://github.com/datenstrom/yellow/).
2. [Download plugin](https://github.com/datenstrom/yellow-plugins/raw/master/zip/traffic.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `traffic.zip` into your `system/plugins` folder.

To uninstall delete the plugin files.

## How to create traffic analytics?

The traffic analytics are available at the [command line](https://github.com/datenstrom/yellow-plugins/tree/master/commandline). It shows referring sites, popular content, search queries and error pages. Open a terminal window. Go to your Yellow installation, where the `yellow.php` is. Type `php yellow.php traffic`, you can add optional days, location and file name. See example below.

This plugins analyses your web server logfiles, use [Piwik](https://github.com/datenstrom/yellow-plugins/tree/master/piwik) for more detailed web analytics.

## How to configure traffic analytics?

The following settings can be configured in file `system/config/config.ini`:

`TrafficDays` = number of days  
`TrafficLinesMax` = number of lines to show per category  
`TrafficLogDir` = log file directory  
`TrafficLogFile` = log file name as [regular expression](https://en.wikipedia.org/wiki/Regular_expression)  
`TrafficLocationIgnore` = location to ignore as [regular expression](https://en.wikipedia.org/wiki/Regular_expression)  
`TrafficSpamFilter` = spam filter as [regular expression](https://en.wikipedia.org/wiki/Regular_expression)  

## Example

Creating traffic analytics at the command line:

`php yellow.php traffic`  
`php yellow.php traffic 1`  
`php yellow.php traffic 30 /yellow/ /var/log/apache2/website_access.log` 

~~~~
Referring sites

- 181 http://www.queness.com/post/16142/11-lightning-fast-flat-file-cms
- 159 http://www.datamation.com/open-source/50-noteworthy-new-open-source-projects-1.html
- 52 http://www.hongkiat.com/blog/flat-cms/
- 27 http://trendschau.net/blog/uebersicht-flat-file-cms
- 24 http://www.flatphile.co/yellow

Popular content

- 980 https://datenstrom.se/yellow/
- 442 https://datenstrom.se/
- 305 https://datenstrom.se/ideas/
- 101 https://datenstrom.se/contact/

Error pages

- 20 https://datenstrom.se/index.php - Not found
- 12 https://datenstrom.se/admin/admin.php - Not found

Yellow traffic: 30 days, 2903 views
~~~~

## Developer

Datenstrom
