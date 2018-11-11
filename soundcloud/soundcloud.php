<?php
// Soundcloud plugin, https://github.com/datenstrom/yellow-plugins/tree/master/soundcloud
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSoundcloud {
    const VERSION = "0.7.1";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("soundcloudStyle", "soundcloud");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="soundcloud" && ($type=="block" || $type=="inline")) {
            list($id, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("soundcloudStyle");
            if (empty($width)) $width = "100%";
            if (empty($height)) $height = "166";
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe src=\"https://w.soundcloud.com/player/?url=https%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F".rawurlencode($id)."\" frameborder=\"0\"";
            $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
