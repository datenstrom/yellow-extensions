<?php
// Norwegian extension, https://github.com/datenstrom/yellow-extensions/tree/master/languages/norwegian
// Copyright (c) 2020 Per Arne Solvik
// This file may be used and distributed under the terms of the public license.

class YellowNorwegian {
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
            $this->yellow->system->save($fileName, array("language" => "nb"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("language")=="nb") {
            $language = reset(array_diff($this->yellow->text->getLanguages(), array("nb")));
            $this->yellow->system->save($fileName, array("language" => $language));
        }
    }
}
