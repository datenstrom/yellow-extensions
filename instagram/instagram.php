<?php
// Instagram plugin, https://github.com/datenstrom/yellow-plugins/tree/master/instagram
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowInstagram {
    const VERSION = "0.7.4";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("instagramStyle", "instagram");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="instagram" && $shortcut) {
            list($id, $dummy, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("instagramStyle");
            if (empty($width)) $width = "100%";
            $css = $this->getInstagramStyle($width, $height);
            $output = "<div class=\"".htmlspecialchars($style)."\" style=\"".htmlspecialchars($css)."\">";
            $output .= "<blockquote class=\"instagram-media\" data-instgrm-captioned style=\"".htmlspecialchars($css)."display:none;\">";
            $output .= "<a href=\"https://www.instagram.com/p/".htmlspecialchars($id)."/\">Instagram</a>";
            $output .= "</blockquote></div>";
        }
        return $output;
    }

    // Return CSS style
    public function getInstagramStyle($width, $height) {
        if (is_numeric($width)) $width .= "px";
        if (is_numeric($height)) $height .= "px";
        if (!empty($width)) $css .= " width:$width;";
        if (!empty($height)) $css .= " height:$height;";
        return trim($css);
    }
    
    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name=="header") {
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output = "<script type=\"text/javascript\" src=\"{$pluginLocation}instagram.js\"></script>\n";
        }
        return $output;
    }
}

$yellow->plugins->register("instagram", "YellowInstagram", YellowInstagram::VERSION);
