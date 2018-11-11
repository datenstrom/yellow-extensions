<?php
// Slider plugin, https://github.com/datenstrom/yellow-plugins/tree/master/slider
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSlider {
    const VERSION = "0.7.7";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("sliderStyle", "flickity");
        $this->yellow->config->setDefault("sliderAutoplay", "0");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="slider" && ($type=="block" || $type=="inline")) {
            list($pattern, $style, $size, $autoplay) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("sliderStyle");
            if (empty($size)) $size = "100%";
            if (empty($autoplay)) $autoplay = $this->yellow->config->get("sliderAutoplay");
            if (empty($pattern)) {
                $files = $this->yellow->files->clean();
            } else {
                $images = $this->yellow->config->get("imageDir");
                $files = $this->yellow->files->index(true, true)->match("#$images$pattern#");
            }
            if ($this->yellow->plugins->isExisting("image")) {
                if (count($files)) {
                    $page->setLastModified($files->getModified());
                    $output = "<div class=\"".htmlspecialchars($style)."\" data-prevnextbuttons=\"false\" data-clickable=\"true\" data-wraparound=\"true\"";
                    if ($autoplay!=0) $output .= " data-autoplay=\"".htmlspecialchars($autoplay)."\"";
                    $output .= ">\n";
                    foreach ($files as $file) {
                        list($src, $width, $height) = $this->yellow->plugins->get("image")->getImageInformation($file->fileName, $size, $size);
                        $output .= "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".
                            htmlspecialchars($height)."\" alt=\"".basename($file->getLocation(true))."\" title=\"".
                            basename($file->getLocation(true))."\" />\n";
                    }
                    $output .= "</div>";
                } else {
                    $page->error(500, "Slider '$pattern' does not exist!");
                }
            } else {
                $page->error(500, "Slider requires 'image' plugin!");
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginLocation}slider.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$pluginLocation}slider-flickity.min.js\"></script>\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$pluginLocation}slider.js\"></script>\n";
        }
        return $output;
    }
}
