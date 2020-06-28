<?php
// English extension, https://github.com/datenstrom/yellow-extensions/tree/master/languages/english
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowEnglish {
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
            $this->yellow->system->save($fileName, array("language" => "en"));
        } elseif ($action=="uninstall" && $this->yellow->system->get("language")=="en") {
            $language = reset(array_diff($this->yellow->text->getLanguages(), array("en")));
            $this->yellow->system->save($fileName, array("language" => $language));
        }
    }
}
