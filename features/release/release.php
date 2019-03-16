<?php
// Release extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/release
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowRelease {
    const VERSION = "0.8.5";
    const TYPE = "feature";
    public $yellow;         //access to API
    public $extensions;     //number of extensions
    public $errors;         //number of errors

    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("releaseExtensionDir", "/Users/Datenstrom/Documents/GitHub/yellow-extensions/");
        $this->yellow->system->setDefault("releaseRepositoryDir", "/Users/Datenstrom/Documents/GitHub/");
        $this->yellow->system->setDefault("releaseDocumentationFile", "README.md");
    }

    // Handle command help
    public function onCommandHelp() {
        return "release [directory]\n";
    }
    
    // Handle command
    public function onCommand($args) {
        list($command) = $args;
        switch ($command) {
            case "release": $statusCode = $this->processCommandRelease($args); break;
            default:        $statusCode = 0;
        }
        return $statusCode;
    }

    // Process command to create releases
    public function processCommandRelease($args) {
        $statusCode = 0;
        list($command, $path) = $args;
        $pathExtension = rtrim($this->yellow->system->get("releaseExtensionDir"), "/")."/";
        $pathRepository = rtrim($this->yellow->system->get("releaseRepositoryDir"), "/")."/";
        if (!empty($path) && !preg_match("/[\/\\\\]/", $path)) $path = $pathRepository.$path;
        $path = rtrim(empty($path) ? $pathExtension : $path, "/")."/";
        if (is_dir($path) && is_dir($pathExtension)) {
            $this->extensions = $this->errors = 0;
            $statusCode = max($statusCode, $this->updateReleaseDirectory($path, $pathExtension));
            foreach ($this->yellow->toolbox->getDirectoryEntriesRecursive($path, "/.*/", true, true) as $entry) {
                $statusCode = max($statusCode, $this->updateReleaseDirectory("$entry/", $pathExtension));
            }
        } else {
            $statusCode = 500;
            $this->extensions = 0;
            $this->errors = 1;
            $path = !is_dir($path) ? $path : $pathExtension;
            echo "ERROR updating files: Can't find directory '$path'!\n";
        }
        echo "Yellow $command: $this->extensions extension".($this->extensions!=1 ? "s" : "");
        echo ", $this->errors error".($this->errors!=1 ? "s" : "")."\n";
        return $statusCode;
    }
    
    // Update release directory
    public function updateReleaseDirectory($path, $pathExtension) {
        $statusCode = 200;
        $fileNameExtension = $path.$this->yellow->system->get("updateExtensionFile");
        if (is_file($fileNameExtension)) {
            list($statusCode, $extension, $version) = $this->getReleaseInformation($path);
            $statusCode = max($statusCode, $this->updateReleaseInformation($path, $extension, $version));
            $statusCode = max($statusCode, $this->updateReleaseDocumentation($path, $extension, $version));
            $statusCode = max($statusCode, $this->updateReleaseArchive($path, $pathExtension, $extension));
            $statusCode = max($statusCode, $this->updateReleaseVersion($path, $pathExtension));
            $statusCode = max($statusCode, $this->updateReleaseWaffle($path, $pathExtension));
            if (defined("DEBUG") && DEBUG>=1) echo "YellowRelease::updateReleaseDirectory ".ucfirst($extension)." $version<br/>\n";
            ++$this->extensions;
            if ($statusCode!=200) ++$this->errors;
        }
        return $statusCode;
    }
    
    // Update release information file
    public function updateReleaseInformation($path, $extension, $version) {
        $statusCode = 200;
        $fileNameExtension = $path.$this->yellow->system->get("updateExtensionFile");
        if (is_file($fileNameExtension) && !empty($extension) && !empty($version)) {
            $fileData = $this->yellow->toolbox->readFile($fileNameExtension);
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
                if (!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], "/")) {
                    list($dummy, $entry) = explode(",", $matches[2], 3);
                    if (ctype_upper($matches[1][0])) {  //TODO: remove later, converts old format
                        list($dummy, $entry) = explode("/", $matches[1], 2);
                    }
                    if (is_file($path.$entry)) {
                        $published = filemtime($path.$entry);
                        break;
                    }
                }
            }
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
                if (lcfirst($matches[1])=="extension") $line = "Extension: ".ucfirst($extension)."\n";
                if (lcfirst($matches[1])=="version") $line = "Version: $version\n";
                if (lcfirst($matches[1])=="published") $line = "Published: ".date("Y-m-d H:i:s", $published)."\n";
                if (!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], "/") && $extension!="update" && $extension!="core") {
                    if (ctype_upper($matches[1][0])) {  //TODO: remove later, converts old format
                        list($dummy, $entry) = explode("/", $matches[1], 2);
                        list($fileName, $flags) = explode(",", $matches[2], 2);
                        $line = "$fileName: $dummy,$entry,$flags\n";
                    }
                }
                $fileDataNew .= $line;
            }
            if ($fileData!=$fileDataNew) {
                if (!$this->yellow->toolbox->createFile($fileNameExtension, $fileDataNew)) {
                    $statusCode = 500;
                    echo "ERROR updating files: Can't write file '$fileNameExtension'!\n";
                }
            }
            if (defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateReleaseInformation file:$fileNameExtension<br/>\n";
        }
        return $statusCode;
    }

    // Update release documentation file
    public function updateReleaseDocumentation($path, $extension, $version) {
        $statusCode = 200;
        $fileNameDocumentation = $path.$this->yellow->system->get("releaseDocumentationFile");
        if (is_file($fileNameDocumentation) && !empty($extension) && !empty($version)) {
            $fileData = $this->yellow->toolbox->readFile($fileNameDocumentation);
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^(.*?)([0-9\.]{5,})\s*$/", $line, $matches);
                if (!empty($matches[1]) && !empty($matches[2]) && !$found) {
                    $fileDataNew .= ucfirst($extension)." $version\n";
                    $found = true;
                } else {
                    $fileDataNew .= $line;
                }
            }
            if ($fileData!=$fileDataNew) {
                if (!$this->yellow->toolbox->createFile($fileNameDocumentation, $fileDataNew)) {
                    $statusCode = 500;
                    echo "ERROR updating files: Can't write file '$fileNameDocumentation'!\n";
                }
            }
            if (defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateReleaseDocumentation file:$fileNameDocumentation<br/>\n";
        }
        return $statusCode;
    }
    
    // Update release ZIP archive
    public function updateReleaseArchive($pathSource, $pathExtension, $extension) {
        $statusCode = 200;
        $fileNameExtension = $pathSource.$this->yellow->system->get("updateExtensionFile");
        if (is_file($fileNameExtension) && !empty($extension)) {
            $zip = new ZipArchive();
            $fileNameZipArchive = $pathExtension."zip/".strtoloweru("$extension.zip");
            if (is_file($fileNameZipArchive)) $this->yellow->toolbox->deleteFile($fileNameZipArchive);
            if ($zip->open($fileNameZipArchive, ZIPARCHIVE::CREATE)===true) {
                $modified = 0;
                $fileNamesRequired = $this->getExtensionFileNames($pathSource);
                $fileNamesFound = $this->yellow->toolbox->getDirectoryEntriesRecursive($pathSource, "/.*/", true, false);
                foreach ($fileNamesFound as $fileName) {
                    if (!in_array($fileName, $fileNamesRequired)) continue;
                    $zip->addFile($fileName, $extension."/".basename($fileName));
                    $modified = max($modified, $this->yellow->toolbox->getFileModified($fileName));
                    unset($fileNamesRequired[array_search($fileName, $fileNamesRequired)]);
                }
                if (count($fileNamesRequired)) {
                    $statusCode = 500;
                    foreach ($fileNamesRequired as $fileName) {
                        echo "ERROR updating files: Can't find file '$fileName'!\n";
                    }
                }
                if (!$zip->close() || !$this->yellow->toolbox->modifyFile($fileNameZipArchive, $modified)) {
                    $statusCode = 500;
                    echo "ERROR updating files: Can't write file '$fileNameZipArchive'!\n";
                }
            } else {
                $statusCode = 500;
                echo "ERROR updating files: Can't write file '$fileNameZipArchive'!\n";
            }
            if (defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateReleaseArchive file:$fileNameZipArchive<br/>\n";
        }
        return $statusCode;
    }
    
    // Update release version file
    public function updateReleaseVersion($pathSource, $pathExtension) {
        $statusCode = 200;
        $fileNameVersion = $pathExtension.$this->yellow->system->get("updateVersionFile");
        list($extension, $version, $description, $status) = $this->getExtensionInformation($pathSource);
        if (is_file($fileNameVersion) && $status!="hidden") {
            if (substru($pathSource, 0, strlenu($pathExtension))!=$pathExtension) {
                $description .= " Experimental";
            }
            $fileData = $this->yellow->toolbox->readFile($fileNameVersion);
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
                if (!empty($matches[1]) && !empty($matches[2]) && strtoloweru($matches[1])==strtoloweru($extension)) {
                    list($dummy, $url) = explode(",", $matches[2]);
                    $fileDataNew .= "$matches[1]: $version,$url,$description\n";
                    $found = true;
                } else {
                    $fileDataNew .= $line;
                }
            }
            if (!$found) {
                $url = "https://github.com/datenstrom/yellow-extensions/raw/master/zip/".strtoloweru("$extension.zip");
                $fileDataNew .= "\n# Datenstrom Yellow version, new extension\n\n";
                $fileDataNew .= ucfirst($extension).": $version,$url,$description\n";
            }
            if ($fileData!=$fileDataNew) {
                if (!$this->yellow->toolbox->createFile($fileNameVersion, $fileDataNew)) {
                    $statusCode = 500;
                    echo "ERROR updating files: Can't write file '$fileNameVersion'!\n";
                }
            }
            if (defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateReleaseVersion file:$fileNameVersion<br/>\n";
        }
        return $statusCode;
    }

    // Update release waffle file
    public function updateReleaseWaffle($pathSource, $pathExtension) {
        $statusCode = 200;
        $fileNameWaffle = $pathExtension.$this->yellow->system->get("updateWaffleFile");
        list($extension, $version, $description, $status) = $this->getExtensionInformation($pathSource);
        if (is_file($fileNameWaffle) && $status!="hidden") {
            $waffle = $this->getExtensionWaffle($pathSource);
            $fileData = $this->yellow->toolbox->readFile($fileNameWaffle);
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
                if (!empty($matches[1]) && !empty($matches[2]) && preg_match("/^$extension,/i", $matches[2])) {
                    if (!$found) {
                        $fileDataNew .= $waffle;
                        $found = true;
                    }
                } else {
                    $fileDataNew .= $line;
                }
            }
            if (!$found) {
                $fileDataNew .= "\n# Datenstrom Yellow waffle, new extension\n\n";
                $fileDataNew .= $waffle;
            }
            if ($fileData!=$fileDataNew) {
                if (!$this->yellow->toolbox->createFile($fileNameWaffle, $fileDataNew)) {
                    $statusCode = 500;
                    echo "ERROR updating files: Can't write file '$fileNameWaffle'!\n";
                }
            }
            if (defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateReleaseWaffle file:$fileNameWaffle<br/>\n";
        }
        return $statusCode;
    }
    
    // Return release information from source code
    public function getReleaseInformation($path) {
        $statusCode = 200;
        $extension = $version = "";
        foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/^.*\.php$/", false, false) as $entry) {
            $fileData = $this->yellow->toolbox->readFile($entry, 4096);
            foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
                preg_match("/^\s*(\S+)\s+(\S+)/", $line, $matches);
                if ($matches[1]=="class" && substru($matches[2], 0, 6)=="Yellow") { $extension = lcfirst(substru($matches[2], 6)); $class = $matches[2]; }
                if ($matches[1]=="const" && $matches[2]=="VERSION" && preg_match("/\"([0-9\.]+)\"/", $line, $matches)) $version = $matches[1];
                if ($matches[1]=="function" || $matches[2]=="function") break;
            }
            if (!empty($extension) && !empty($version)) {
                if ($extension!=$this->yellow->lookup->normaliseName(basename($entry), true, true)) {
                    $statusCode = 500;
                    $extension = $version = "";
                    echo "ERROR checking files: Class '$class' not possible in file '$entry'!\n";
                }
                break;
            }
        }
        if ($statusCode==200 && empty($extension) && empty($version)) {
            list($extension, $version) = $this->getExtensionInformation($path);
        }
        return array($statusCode, $extension, $version);
    }

    // Return extension information
    public function getExtensionInformation($path) {
        $extension = $version = $description = $status = "";
        $fileNameExtension = $path.$this->yellow->system->get("updateExtensionFile");
        $fileData = $this->yellow->toolbox->readFile($fileNameExtension);
        foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
            preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
            if (lcfirst($matches[1])=="extension") $extension = lcfirst($matches[2]);
            if (lcfirst($matches[1])=="version") $version = $matches[2];
            if (lcfirst($matches[1])=="description") $description = $matches[2];
            if (lcfirst($matches[1])=="status") $status = $matches[2];
        }
        return array($extension, $version, $description, $status);
    }
    
    // Return extension file names
    public function getExtensionFileNames($path) {
        $entries = array();
        $fileNameExtension = $path.$this->yellow->system->get("updateExtensionFile");
        $fileData = $this->yellow->toolbox->readFile($fileNameExtension);
        foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
            preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
            if (!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], "/")) {
                list($dummy, $entry, $flags) = explode(",", $matches[2], 3);
                if (ctype_upper($matches[1][0])) {  //TODO: remove later, converts old format
                    list($dummy, $entry) = explode("/", $matches[1], 2);
                    list($fileName, $flags) = explode(",", $matches[2], 2);
                }
                if (!preg_match("/delete/i", $flags)) array_push($entries, "$path$entry");
            }
        }
        array_push($entries, $fileNameExtension);
        return $entries;
    }
    
    // Return extension waffle
    public function getExtensionWaffle($path) {
        $waffle = "";
        $fileNameExtension = $path.$this->yellow->system->get("updateExtensionFile");
        $fileData = $this->yellow->toolbox->readFile($fileNameExtension);
        foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
            preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
            if (!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], "/")) {
                if (ctype_upper($matches[1][0])) {  //TODO: remove later, converts old format
                    list($dummy, $entry) = explode("/", $matches[1], 2);
                    list($fileName, $flags) = explode(",", $matches[2], 2);
                    $matches[1] = $fileName;
                    $matches[2] = "$dummy,$entry,$flags";
                }
                $waffle .= "$matches[1]: $matches[2]\n";
            }
        }
        return $waffle;
    }
}
