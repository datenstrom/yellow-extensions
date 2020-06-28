<?php
// Googlemap extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/googlemap
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowGooglemap {
    const VERSION = "0.8.5";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("googlemapZoom", "15");
        $this->yellow->system->setDefault("googlemapStyle", "flexible");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="googlemap" && ($type=="block" || $type=="inline")) {
            list($address, $zoom, $style, $width, $height) = $this->yellow->toolbox->getTextArguments($text);
            if (empty($zoom)) $zoom = $this->yellow->system->get("googlemapZoom");
            if (empty($style)) $style = $this->yellow->system->get("googlemapStyle");
            $language = $page->get("language");
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe src=\"https://maps.google.com/maps?q=".rawurlencode($address)."&amp;ie=UTF8&amp;t=m&amp;z=".rawurlencode($zoom)."&amp;hl=$language&amp;iwloc=near&amp;num=1&amp;output=embed\" frameborder=\"0\"";
            if ($width && $height) $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
