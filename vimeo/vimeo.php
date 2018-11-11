<?php
// Vimeo plugin, https://github.com/datenstrom/yellow-plugins/tree/master/vimeo
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowVimeo {
    const VERSION = "0.7.2";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("vimeoStyle", "flexible");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="vimeo" && ($type=="block" || $type=="inline")) {
            list($id, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($style)) $style = $this->yellow->config->get("vimeoStyle");
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<iframe src=\"https://player.vimeo.com/video/".rawurlencode($id)."\" frameborder=\"0\" allowfullscreen";
            if ($width && $height) $output .= " width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\"";
            $output .= "></iframe></div>";
        }
        return $output;
    }
}
