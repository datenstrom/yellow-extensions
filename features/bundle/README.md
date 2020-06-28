Bundle 0.8.12
=============
Bundle website files.

<p align="center"><img src="bundle-screenshot.png?raw=true" width="795" height="512" alt="Screenshot"></p>

## How to install extension

1. [Download and install Datenstrom Yellow](https://github.com/datenstrom/yellow/).
2. [Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/bundle.zip). If you are using Safari, right click and select 'Download file as'.
3. Copy `bundle.zip` into your `system/extensions` folder.

To uninstall delete the [extension files](extension.ini).

## How to bundle website files

This extension bundles and minifies files for a better loading time. Your website may contain multiple CSS and JavaScript files. Usually these will be cached in the browser, but nevertheless each file has to be checked. This is where a file bundler comes in. It looks for included files and replaces them with one single file for CSS and one for JavaScript.

This extension uses [Minify v1.3.62](https://github.com/matthiasmullie/minify) by Matthias Mullie. It's licensed under [MIT license](https://opensource.org/licenses/MIT).

## Examples

Website with unbundled CSS and JavaScript files:

```
<!DOCTYPE html>
<html>
<head>
<title>Example page</title>
<link rel="stylesheet" type="text/css" media="all" href="/user/mark/media/extensions/gallery.css" />
<link rel="stylesheet" type="text/css" media="all" href="/user/mark/media/extensions/twitter.css" />
<link rel="stylesheet" type="text/css" media="all" href="/user/mark/media/resources/stockholm.css" />
<script type="text/javascript" defer="defer" src="/user/mark/media/extensions/gallery-photoswipe.min.js"></script>
<script type="text/javascript" defer="defer" src="/user/mark/media/extensions/gallery.js"></script>
<script type="text/javascript" defer="defer" src="/user/mark/media/extensions/twitter.js"></script>
</head>
<body>
<h1>Hello world</h1>
</body>
</html>
```

Website with bundled CSS and JavaScript files:

```
<!DOCTYPE html>
<html>
<head>
<title>Example page</title>
<link rel="stylesheet" type="text/css" media="all" href="/media/resources/bundle-dfd1ef8a4c.min.css" />
<script type="text/javascript" defer="defer" src="/media/resources/bundle-3808f805bc.min.js"></script>
</head>
<body>
<h1>Hello world</h1>
</body>
</html>
```

## Developer

Datenstrom. [Get support](https://datenstrom.se/yellow/help/).

<p>
<a href="README-de.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-de.png" width="15" height="15" alt="Deutsch">&nbsp; Deutsch</a>&nbsp;
<a href="README.md"><img src="https://raw.githubusercontent.com/datenstrom/yellow-extensions/master/features/help/language-en.png" width="15" height="15" alt="English">&nbsp; English</a>&nbsp;
</p>
