<?php
// Hungarian extension, https://github.com/datenstrom/yellow-extensions/tree/master/languages/hungarian
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowHungarian {
    const VERSION = "0.8.20";
    const TYPE = "language";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle update
    public function onUpdate($action) {
        $fileName = $this->yellow->system->get("coreSettingDirectory").$this->yellow->system->get("coreSystemFile");
        if ($action=="install") {
            $this->yellow->system->save($fileName, array("language" => "hu"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("language")=="hu") {
            $language = reset(array_diff($this->yellow->text->getLanguages(), array("hu")));
            $this->yellow->system->save($fileName, array("language" => $language));
        }
    }
}
