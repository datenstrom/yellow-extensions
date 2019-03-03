<?php
// Instagram extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/instagram
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowInstagram {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("instagramStyle", "instagram");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="instagram" && ($type=="block" || $type=="inline")) {
            list($id, $dummy, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->system->get("instagramStyle");
            if (empty($width)) $width = "100%";
            $css = $this->getInstagramStyle($width, $height);
            $output = "<div class=\"".htmlspecialchars($style)."\" style=\"".htmlspecialchars($css)."\">";
            $output .= "<blockquote class=\"instagram-media\" data-instgrm-captioned style=\"".htmlspecialchars($css)."display:none;\">";
            $output .= "<a href=\"https://www.instagram.com/p/".htmlspecialchars($id)."/\">Instagram</a>";
            $output .= "</blockquote></div>";
        }
        return $output;
    }

    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header") {
            $extensionLocation = $this->yellow->system->get("serverBase").$this->yellow->system->get("extensionLocation");
            $output = "<script type=\"text/javascript\" defer=\"defer\" src=\"{$extensionLocation}instagram.js\"></script>\n";
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
}
