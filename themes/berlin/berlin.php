<?php
// Berlin extension, https://github.com/datenstrom/yellow-extensions/tree/master/themes/berlin
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowBerlin {
    const VERSION = "0.8.8";
    const TYPE = "theme";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreSettingDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("theme" => "berlin"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("theme")=="berlin") {
            $theme = reset(array_diff($this->yellow->extensions->getExtensions("theme"), array("berlin")));
            $this->yellow->system->save($fileName, array("theme" => $theme));
        }
    }
}
