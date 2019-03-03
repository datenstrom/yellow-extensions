<?php
// Googlemaps extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/googlemaps
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowGooglemaps {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("googlemapsZoom", "15");
        $this->yellow->system->setDefault("googlemapsStyle", "flexible");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="googlemaps" && ($type=="block" || $type=="inline")) {
            list($address, $zoom, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($zoom)) $zoom = $this->yellow->system->get("googlemapsZoom");
            if (empty($style)) $style = $this->yellow->system->get("googlemapsStyle");
            $language = $page->get("language");
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe src=\"https://maps.google.com/maps?q=".rawurlencode($address)."&amp;ie=UTF8&amp;t=m&amp;z=".rawurlencode($zoom)."&amp;hl=$language&amp;iwloc=near&amp;num=1&amp;output=embed\" frameborder=\"0\"";
            if ($width && $height) $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
