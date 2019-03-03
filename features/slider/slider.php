<?php
// Slider extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/slider
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSlider {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("sliderStyle", "flickity");
        $this->yellow->system->setDefault("sliderAutoplay", "0");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="slider" && ($type=="block" || $type=="inline")) {
            list($pattern, $style, $size, $autoplay) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->system->get("sliderStyle");
            if (empty($size)) $size = "100%";
            if (empty($autoplay)) $autoplay = $this->yellow->system->get("sliderAutoplay");
            if (empty($pattern)) {
                $files = $this->yellow->media->clean();
            } else {
                $images = $this->yellow->system->get("imageDir");
                $files = $this->yellow->media->index(true, true)->match("#$images$pattern#");
            }
            if ($this->yellow->extensions->isExisting("image")) {
                if (count($files)) {
                    $page->setLastModified($files->getModified());
                    $output = "<div class=\"".htmlspecialchars($style)."\" data-prevnextbuttons=\"false\" data-clickable=\"true\" data-wraparound=\"true\"";
                    if ($autoplay!=0) $output .= " data-autoplay=\"".htmlspecialchars($autoplay)."\"";
                    $output .= ">\n";
                    foreach ($files as $file) {
                        list($src, $width, $height) = $this->yellow->extensions->get("image")->getImageInformation($file->fileName, $size, $size);
                        $output .= "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".
                            htmlspecialchars($height)."\" alt=\"".basename($file->getLocation(true))."\" title=\"".
                            basename($file->getLocation(true))."\" />\n";
                    }
                    $output .= "</div>";
                } else {
                    $page->error(500, "Slider '$pattern' does not exist!");
                }
            } else {
                $page->error(500, "Slider requires 'image' extension!");
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("serverBase").$this->yellow->system->get("extensionLocation");
            $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$extensionLocation}slider.css\" />\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$extensionLocation}slider-flickity.min.js\"></script>\n";
            $output .= "<script type=\"text/javascript\" defer=\"defer\" src=\"{$extensionLocation}slider.js\"></script>\n";
        }
        return $output;
    }
}
