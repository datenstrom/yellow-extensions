Traffic 0.8.2
=============
Create traffic analytics from web server logfiles.

<p align="center"><img src="traffic-screenshot.png?raw=true" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/traffic.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `traffic.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to create traffic analytics

The traffic analytics are available at the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/features/command). It shows referring sites, popular content, files and search queries. Open a terminal window. Go to your installation folder, where the `yellow.php` is. Type `php yellow.php traffic`, you can add optional days, location and file name. See example below.

The extension analyses your web server logfiles, use [Matomo](https://github.com/datenstrom/yellow-extensions/tree/master/features/matomo) for more detailed web analytics.

## How to configure traffic analytics

The following settings can be configured in file `system/settings/system.ini`:

`TrafficDays` = number of days  
`TrafficLinesMax` = number of lines to show per category  
`TrafficLogDir` = log file directory  
`TrafficLogFile` = log file name as regular expression  
`TrafficSpamFilter` = spam filter as regular expression  

## Example

Creating traffic analytics at the command line:

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

## Developer

Datenstrom. [Get support](https://developers.datenstrom.se/help/support).
