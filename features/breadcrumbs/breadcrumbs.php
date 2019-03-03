<?php
// Breadcrumbs extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/breadcrumbs
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowBreadcrumbs {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("breadcrumbsSeparator", ">");
        $this->yellow->system->setDefault("breadcrumbsStyle", "breadcrumbs");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="breadcrumbs" && ($type=="block" || $type=="inline")) {
            list($separator, $style) = $this->yellow->toolbox->getTextArgs($text);
            if (empty($separator)) $separator = $this->yellow->system->get("breadcrumbsSeparator");
            if (empty($style)) $style = $this->yellow->system->get("breadcrumbsStyle");
            $pages = $this->yellow->content->path($page->getLocation(true), true);
            $page->setLastModified($pages->getModified());
            $output = "<div class=\"".htmlspecialchars($style)."\">";
            foreach ($pages as $pageBreadcrumb) {
                $output .= "<a href=\"".$pageBreadcrumb->getLocation(true)."\">".$pageBreadcrumb->getHtml("titleNavigation")."</a>";
                if ($pageBreadcrumb->getLocation(true)!=$page->getLocation(true)) $output .= " ".htmlspecialchars($separator)." ";
            }
            $output .= "</div>\n";
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        return $this->onParseContentShortcut($page, $name, "", "block");
    }
}
