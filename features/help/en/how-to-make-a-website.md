---
Title: How to make a website
---
Learn how to make your own website.

## Installing website

1. [Download and unzip Datenstrom Yellow](https://github.com/datenstrom/yellow/archive/master.zip).
2. Copy all files to your web server.
3. Open your website in a web browser and select 'Website'.

Your website is immediately available. The installation comes with a home page. This is just an example to get you started, change everything as you like. You can make a website by adding more files and folders.

When there are problems, please check the [server configuration](troubleshooting) or ask the [support](./).

## Writing web pages

Have a look inside your `content` folder, here are all your web pages. Open the file `content/1-home/page.md`. You'll see settings and text of the page. You can change `Title` and other [settings](markdown-cheat-sheet#settings) at the top of a page. Below that you can use [Markdown](markdown-cheat-sheet). Here's an example:

```
---
Title: Home
---
Your website works! 

[edit - You can edit this page] or use your text editor.

You can install more features and themes.
[Learn more](https://datenstrom.se/yellow/help/).
```

To create a new page, add a new file to the home folder or another `content` folder. The [navigation](adjusting-content) is automatically created from your `content` folders. Here's another example:

```
---
Title: Demo
---
[edit - You can edit this page]. The help gives you more information 
about how to create small web pages, blogs and wikis. 
[Learn more](https://datenstrom.se/yellow/help/).
```

Now let's add an image:

```
---
Title: Demo
---
[image picture.jpg Example rounded]

[edit - You can edit this page]. The help gives you more information 
about how to create small web pages, blogs and wikis. 
[Learn more](https://datenstrom.se/yellow/help/).
```

## Showing header

To show a header create the file `content/shared/header.md`. You can also create a `header.md` in any `content` folder and it will only be shown on pages in the same folder. Here's an example:

```
---
Title: Header
Status: shared
---
I like Markdown.
```

## Showing footer

To show a footer create the file `content/shared/footer.md`. You can also create a `footer.md` in any `content` folder and it will only be shown on pages in the same folder. Here's an example:

```
---
Title: Footer
Status: shared
---
[Made with Datenstrom Yellow](https://datenstrom.se/yellow/)
```

## Get extensions

There are [extensions](https://github.com/datenstrom/yellow-extensions) for your website. Here are some examples:

* [How to add an image gallery](https://github.com/datenstrom/yellow-extensions/tree/master/features/gallery)
* [How to use a search](https://github.com/datenstrom/yellow-extensions/tree/master/features/search)
* [How to use a sitemap](https://github.com/datenstrom/yellow-extensions/tree/master/features/sitemap)
* [How to use a contact page](https://github.com/datenstrom/yellow-extensions/tree/master/features/contact)
* [How to build a static website](https://github.com/datenstrom/yellow-extensions/tree/master/features/command)
