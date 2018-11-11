<?php
// Gallery plugin, https://github.com/datenstrom/yellow-plugins/tree/master/gallery
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowGallery {
    const VERSION = "0.7.8";
    public $yellow;         //access to API

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("galleryStyle", "photoswipe");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ( $name=="gallery" && ($type=="block" || $type=="inline")) {
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
                        list($widthInput, $heightInput) = $this->yellow->toolbox->detectImageInformation($file->fileName);
                        list($src, $width, $height) = $this->yellow->plugins->get("image")->getImageInformation($file->fileName, $size, $size);
                        $caption = $this->getImageCaption($file->fileName);
                        $output .= "<a href=\"".$file->getLocation(true)."\"";
                        if ($widthInput && $heightInput) $output .= " data-size=\"".htmlspecialchars("{$widthInput}x{$heightInput}")."\"";
                        if (!empty($caption)) $output .= " data-caption=\"".htmlspecialchars($caption)."\"";
                        $output .= ">";
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

    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginLocation}gallery.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$pluginLocation}gallery-photoswipe.min.js\"></script>\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$pluginLocation}gallery.js\"></script>\n";
        }
        return $output;
    }

    // Return image caption
    public function getImageCaption($fileName) {
        $key = substru($fileName, strlenu($this->yellow->config->get("imageDir")));
        return $this->yellow->text->isExisting($key) ? $this->yellow->text->get($key) : "";
    }
}
