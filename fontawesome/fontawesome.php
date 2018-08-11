<?php
// Fontawesome plugin, https://github.com/datenstrom/yellow-plugins/tree/master/fontawesome
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowFontawesome {
    const VERSION = "0.7.2";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("fontawesomeToolbarButtons", ":fa-star: :fa-heart: :fa-exclamation-triangle: :fa-tag: :fa-comment: :fa-file-o: :fa-file-text-o: :fa-file-picture-o: :fa-envelope-o: :fa-phone: :fa-twitter: :fa-github: :fa-calendar: :fa-clock-o: :fa-map-marker: :fa-check:");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ((empty($name) || $name=="fa") && $shortcut) {
            list($shortname, $style) = $this->yellow->toolbox->getTextArgs($text);
            if (preg_match("/fa-(.+)/", $shortname, $matches)) {
                $shortname = $matches[1];
                $class = trim("fa fa-$shortname $style");
                $output = "<i class=\"".htmlspecialchars($class)."\"></i>";
            }
        }
        return $output;
    }
    
    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name=="header") {
            $locationStylesheet = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation")."fontawesome.css";
            $fileNameStylesheet = $this->yellow->config->get("pluginDir")."fontawesome.css";
            if (is_file($fileNameStylesheet)) {
                $output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$locationStylesheet\" />\n";
            }
        }
        return $output;
    }
}

$yellow->plugins->register("fontawesome", "YellowFontawesome", YellowFontawesome::VERSION);
