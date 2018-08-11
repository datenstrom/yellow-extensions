<?php
// Twitter plugin, https://github.com/datenstrom/yellow-plugins/tree/master/twitter
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowTwitter {
    const VERSION = "0.7.6";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->config->setDefault("twitterTheme", "light");
    }
    
    // Handle page content parsing of custom block
    public function onParseContentBlock($page, $name, $text, $shortcut) {
        $output = null;
        if ($name=="twitter" && $shortcut) {
            list($id, $theme, $style, $width, $height) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($theme)) $theme = $this->yellow->config->get("twitterTheme");
            $language = $page->get("language");
            if (is_numeric($id)) {
                $output = "<div class=\"twitter\" data-mode=\"tweet\" data-id=\"".htmlspecialchars($id)."\" data-conversation=\"none\"";
                if (!empty($width)) $output .=" data-width=\"".htmlspecialchars($width)."\"";
                if (!empty($height)) $output .=" data-height=\"".htmlspecialchars($height)."\"";
                if (!empty($style)) $output .=" data-align=\"".htmlspecialchars($style)."\"";
                $output .= " data-theme=\"".htmlspecialchars($theme)."\" data-lang=\"$language\" data-dnt=\"true\"></div>";
            } else {
                $output = "<div class=\"twitter\" data-mode=\"timeline\" data-id=\"".htmlspecialchars($id)."\" data-chrome=\"noheader nofooter\"";
                if (!empty($width)) $output .=" data-width=\"".htmlspecialchars($width)."\"";
                if (!empty($height)) $output .=" data-height=\"".htmlspecialchars($height)."\"";
                if (!empty($style)) $output .=" data-align=\"".htmlspecialchars($style)."\"";
                $output .= " data-theme=\"".htmlspecialchars($theme)."\" data-lang=\"$language\" data-dnt=\"true\"></div>";
            }
        }
        if ($name=="twitterfollow" && $shortcut) {
            list($id, $dummy, $style) = $this->yellow->toolbox->getTextArgs($text);
            $language = $page->get("language");
            if (!empty($style)) $output .= "<div class=\"".htmlspecialchars($style)."\">";
            $output .= "<a class=\"twitter-follow-button\" data-size=\"large\"";
            $output .= " data-lang=\"$language\" data-dnt=\"true\" href=\"https://twitter.com/".rawurlencode($id)."\">@".htmlspecialchars($id)."</a>";
            if (!empty($style)) $output .= "</div>";
        }
        return $output;
    }

    // Handle page extra HTML data
    public function onExtra($name) {
        $output = null;
        if ($name=="header") {
            $pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
            $output = "<script type=\"text/javascript\" src=\"{$pluginLocation}twitter.js\"></script>\n";
        }
        return $output;
    }
}

$yellow->plugins->register("twitter", "YellowTwitter", YellowTwitter::VERSION);
