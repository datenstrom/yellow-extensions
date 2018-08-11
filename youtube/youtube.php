<?php
// Youtube plugin, https://github.com/datenstrom/yellow-plugins/tree/master/youtube
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowYoutube {
    const VERSION = "0.6.1";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("youtubeStyle", "flexible");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="youtube" && $shortcut) {
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

$yellow->plugins->register("youtube", "YellowYoutube", YellowYoutube::VERSION);
