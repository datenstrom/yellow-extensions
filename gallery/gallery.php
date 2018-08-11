<?php
// Gallery plugin, https://github.com/datenstrom/yellow-plugins/tree/master/gallery
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowGallery {
    const VERSION = "0.7.3";
    public $yellow;         //access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("galleryStyle", "photoswipe");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="gallery" && $shortcut) {
            list($pattern, $style, $size) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("galleryStyle");
            if (empty($size)) $size = "100%";
            if (empty($pattern)) {
                $files = $this->yellow->files->clean();
            } else {
                $images = $this->yellow->config->get("imageDir");
                $files = $this->yellow->files->index(true, true)->match("#$images$pattern#");
            }
            if ($this->yellow->plugins->isExisting("image")) {
                if (count($files)) {
                    $page->setLastModified($files->getModified());
                    $output = "<div class=\"".htmlspecialchars($style)."\" data-fullscreenel=\"false\" data-shareel=\"false\"";
                    if (substru($size, -1, 1)!="%") $output .= " data-thumbsquare=\"true\"";
                    $output .= ">\n";
                    foreach ($files as $file) {
                        list($widthInput, $heightInput) = $this->yellow->toolbox->detectImageInfo($file->fileName);
                        list($src, $width, $height) = $this->yellow->plugins->get("image")->getImageInfo($file->fileName, $size, $size);
                        $output .= "<a href=\"".$file->getLocation(true)."\" data-size=\"{$widthInput}x{$heightInput}\">";
                        $output .= "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".
                            htmlspecialchars($height)."\" alt=\"".basename($file->getLocation(true))."\" title=\"".
                            basename($file->getLocation(true))."\" />";
                        $output .= "</a> \n";
                    }
                    $output .= "</div>";
                } else {
                    $page->error(500, "Gallery '$pattern' does not exist!");
                }
            } else {
                $page->error(500, "Gallery requires 'image' plugin!");
            }
        }
        return $output;
    }

    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name=="header") {
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginLocation}gallery.css\" />\n";
            $output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}gallery.js\"></script>\n";
        }
        return $output;
    }
}

$yellow->plugins->register("gallery", "YellowGallery", YellowGallery::VERSION);
