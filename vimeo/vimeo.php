<?php
// Vimeo plugin, https://github.com/datenstrom/yellow-plugins/tree/master/vimeo
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowVimeo {
    const VERSION = "0.6.1";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("vimeoStyle", "flexible");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="vimeo" && $shortcut) {
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

$yellow->plugins->register("vimeo", "YellowVimeo", YellowVimeo::VERSION);
