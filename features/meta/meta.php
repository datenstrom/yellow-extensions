<?php
// Meta extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/meta
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowMeta {
    const VERSION = "0.8.7";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("metaDefaultImage", "icon");
    }
    
    // Handle update
    public function onUpdate($action) {
        if ($action=="update") {        //TODO: remove later, converts old settings
            $path = $this->yellow->system->get("contentDir");
            foreach ($this->yellow->toolbox->getDirectoryEntriesRecursive($path, "/^.*\.md$/", true, false) as $entry) {
                $fileData = $fileDataNew = $this->yellow->toolbox->readFile($entry);
                $fileDataNew = preg_replace("/SocialtagsImage:/i", "Image:", $fileDataNew);
                $fileDataNew = preg_replace("/SocialtagsImageAlt:/i", "ImageAlt:", $fileDataNew);
                if ($fileData!=$fileDataNew) {
                    $modified = $this->yellow->toolbox->getFileModified($entry);
                    if (!$this->yellow->toolbox->deleteFile($entry) ||
                        !$this->yellow->toolbox->createFile($entry, $fileDataNew) ||
                        !$this->yellow->toolbox->modifyFile($entry, $modified)) {
                        $this->yellow->log("error", "Can't write file '$entry'!");
                    }
                }
            }
        }
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="header" && !$page->isError()) {
            list($imageUrl, $imageAlt) = $this->getImageInformation($page);
            $output .= "<meta property=\"og:url\" content=\"".htmlspecialchars($page->getUrl().$this->yellow->toolbox->getLocationArgs())."\" />\n";
            $output .= "<meta property=\"og:type\" content=\"website\" />\n";
            $output .= "<meta property=\"og:title\" content=\"".$page->getHtml("title")."\" />\n";
            $output .= "<meta property=\"og:site_name\" content=\"".$page->getHtml("sitename")."\" />\n";
            $output .= "<meta property=\"og:description\" content=\"".$page->getHtml("description")."\" />\n";
            $output .= "<meta property=\"og:image\" content=\"".htmlspecialchars($imageUrl)."\" />\n";
            $output .= "<meta property=\"og:image:alt\" content=\"".htmlspecialchars($imageAlt)."\" />\n";
        }
        return $output;
    }
    
    // Handle page output data
    public function onParsePageOutput($page, $text) {
        $output = null;
        if ($text && preg_match("/^(.*)<html(.*?)>(.*)$/s", $text, $matches)) {
            $output = $matches[1]."<html prefix=\"og: http://ogp.me/ns#\"".$matches[2].">".$matches[3];
        }
        return $output;
    }
    
    // Return image information for page
    public function getImageInformation($page) {
        if ($page->isExisting("image")) {
            $name = $page->get("image");
            $alt = $page->isExisting("imageAlt") ? $page->get("imageAlt") : $page->get("title");
        } elseif (preg_match("/\[image(\s.*?)\]/", $page->getContent(true), $matches)) {
            list($name, $alt) = $this->yellow->toolbox->getTextArgs(trim($matches[1]));
            if (empty($alt)) $alt = $page->get("title");
        } else {
            $name = $this->yellow->system->get("metaDefaultImage");
            $alt = $page->isExisting("imageAlt") ? $page->get("imageAlt") : $page->get("title");
        }
        if (!preg_match("/^\w+:/", $name)) {
            $location = $name!="icon" ? $this->yellow->system->get("imageLocation").$name :
                $this->yellow->system->get("resourceLocation").$page->get("theme")."-icon.png";
            $url = $this->yellow->lookup->normaliseUrl(
                $this->yellow->system->get("serverScheme"),
                $this->yellow->system->get("serverAddress"),
                $this->yellow->system->get("serverBase"), $location);
        } else {
            $url = $this->yellow->lookup->normaliseUrl("", "", "", $name);
        }
        return array($url, $alt);
    }
}
