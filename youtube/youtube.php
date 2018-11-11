<?php
// Youtube plugin, https://github.com/datenstrom/yellow-plugins/tree/master/youtube
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowYoutube {
    const VERSION = "0.7.2";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("youtubeStyle", "flexible");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="youtube" && ($type=="block" || $type=="inline")) {
            list($id, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("youtubeStyle");
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe src=\"https://www.youtube.com/embed/".rawurlencode($id)."\" frameborder=\"0\" allowfullscreen";
            if ($width && $height) $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
