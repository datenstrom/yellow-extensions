<?php
// Release plugin, https://github.com/datenstrom/yellow-developers
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowRelease
{
	const VERSION = "0.7.7";

	// Handle plugin initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("releaseSoftwareDir", "/Users/Datenstrom/Documents/GitHub/");
		$this->yellow->config->setDefault("releasePluginsDir", "/Users/Datenstrom/Documents/GitHub/yellow-plugins/");
		$this->yellow->config->setDefault("releaseThemesDir", "/Users/Datenstrom/Documents/GitHub/yellow-themes/");
		$this->yellow->config->setDefault("releaseDocumentationFile", "README.md");
	}

	// Handle command help
	function onCommandHelp()
	{
		return "release [DIRECTORY]\n";
	}
	
	// Handle command
	function onCommand($args)
	{
		list($command) = $args;
		switch($command)
		{
			case "release":	$statusCode = $this->releaseCommand($args); break;
			default:		$statusCode = 0;
		}
		return $statusCode;
	}

	// Create software releases
	function releaseCommand($args)
	{
		$statusCode = 0;
		list($command, $path) = $args;
		$pathPlugins = rtrim($this->yellow->config->get("releasePluginsDir"), '/').'/';
		$pathThemes = rtrim($this->yellow->config->get("releaseThemesDir"), '/').'/';
		$path = rtrim(empty($path) ? $this->yellow->config->get("releaseSoftwareDir") : $path, '/').'/';
		if($path=="plugins/") $path = $pathPlugins;
		if($path=="themes/") $path = $pathThemes;
		if(is_dir($path))
		{
			$statusCode = max($statusCode, $this->updateSoftwareRepository($path, $pathPlugins, $pathThemes));
			foreach($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, true) as $entry)
			{
				$statusCode = max($statusCode, $this->updateSoftwareRepository("$entry/", $pathPlugins, $pathThemes));
			}
		} else {
			$statusCode = 500;
			echo "ERROR updating files: Can't find directory '$path'!\n";
		}
		echo "Yellow $command: Release files ".($statusCode!=200 ? "not " : "")."updated\n";
		return $statusCode;
	}
	
	// Update software repository
	function updateSoftwareRepository($path, $pathPlugins, $pathThemes)
	{
		$statusCode = 200;
		$fileNameInformation = $path.$this->yellow->config->get("updateInformationFile");
		if(is_file($fileNameInformation))
		{
			$pathDestination = $this->getSoftwareDestination($path, $pathPlugins, $pathThemes);
			if(is_dir($pathDestination))
			{
				list($software, $version) = $this->getSoftwareVersion($path);
				$statusCode = max($statusCode, $this->updateSoftwareInformation($path, $version));
				$statusCode = max($statusCode, $this->updateSoftwareDocumentation($path, $version));
				$statusCode = max($statusCode, $this->updateSoftwareArchive($path, $pathDestination, $software));
				$statusCode = max($statusCode, $this->updateSoftwareVersion($path, $pathDestination));
				$statusCode = max($statusCode, $this->updateSoftwareResource($path, $pathDestination));
				if(defined("DEBUG") && DEBUG>=1) echo "YellowRelease::updateSoftwareRepository $software $version<br/>\n";
			} else {
				$statusCode = 500;
				echo "ERROR updating files: Can't find directory '$pathDestination'!\n";
			}
		}
		return $statusCode;
	}
	
	// Update software information file
	function updateSoftwareInformation($path, $version)
	{
		$statusCode = 200;
		$fileNameInformation = $path.$this->yellow->config->get("updateInformationFile");
		if(is_file($fileNameInformation) && !empty($version))
		{
			$fileData = $this->yellow->toolbox->readFile($fileNameInformation);
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
				if(!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], '/'))
				{
					list($dummy, $entry) = explode('/', $matches[1], 2);
					if($dummy[0]!='Y') list($entry, $flags) = explode(',', $matches[2], 2); //TODO: remove later, converts old file format
					if(is_file($path.$entry)) { $published = filemtime($path.$entry); break; }
				}
			}
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
				if(lcfirst($matches[1])=="version") $line = "Version: $version\n";
				if(lcfirst($matches[1])=="published") $line = "Published: ".date("Y-m-d H:i:s", $published)."\n";
				if(lcfirst($matches[1])=="plugin" || lcfirst($matches[1])=="theme") $software = $matches[2]; //TODO: remove later
				if(!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], '/')) //TODO: remove later, converts old file format
				{
					list($dummy, $entry) = explode('/', $matches[1], 2);
					list($fileShort, $flags) = explode(',', $matches[2], 2);
					if($dummy[0]!='Y') $line = "$software/$fileShort: $dummy/$entry,$flags\n";
				}
				$fileDataNew .= $line;
			}
			if($fileData!=$fileDataNew)
			{
				if(!$this->yellow->toolbox->createFile($fileNameInformation, $fileDataNew))
				{
					$statusCode = 500;
					echo "ERROR updating files: Can't write file '$fileNameInformation'!\n";
				}
			}
			if(defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateSoftwareInformation file:$fileNameInformation<br/>\n";
		}
		return $statusCode;
	}

	// Update software documentation file
	function updateSoftwareDocumentation($path, $version)
	{
		$statusCode = 200;
		$fileNameDocumentation = $path.$this->yellow->config->get("releaseDocumentationFile");
		if(is_file($fileNameDocumentation) && !empty($version))
		{
			$fileData = $this->yellow->toolbox->readFile($fileNameDocumentation);
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^(.*?)([0-9\.]+)\s*$/", $line, $matches);
				if(!empty($matches[1]) && !empty($matches[2]) && !$found)
				{
					$fileDataNew .= "$matches[1]$version\n";
					$found = true;
				} else {
					$fileDataNew .= $line;
				}
			}
			if($fileData!=$fileDataNew)
			{
				if(!$this->yellow->toolbox->createFile($fileNameDocumentation, $fileDataNew))
				{
					$statusCode = 500;
					echo "ERROR updating files: Can't write file '$fileNameDocumentation'!\n";
				}
			}
			if(defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateSoftwareDocumentation file:$fileNameDocumentation<br/>\n";
		}
		return $statusCode;
	}
	
	// Update software archive
	function updateSoftwareArchive($pathSource, $pathDestination, $software)
	{
		$statusCode = 200;
		$fileNameInformation = $pathSource.$this->yellow->config->get("updateInformationFile");
		if(is_file($fileNameInformation) && !empty($software))
		{
			$zip = new ZipArchive();
			$softwareName = $this->getSoftwareName($software);
			$fileNameZipArchive = $pathDestination."zip/$softwareName.zip";
			if($zip->open($fileNameZipArchive, ZIPARCHIVE::CREATE|ZIPARCHIVE::OVERWRITE)===true)
			{
				$modified = 0;
				$fileNamesRequired = $this->getSoftwareEntries($pathSource);
				$fileNamesFound = $this->yellow->toolbox->getDirectoryEntries($pathSource, "/.*/", true, false);
				foreach($fileNamesFound as $fileName)
				{
					if(!in_array($fileName, $fileNamesRequired)) continue;
					$zip->addFile($fileName, $softwareName."/".basename($fileName));
					$modified = max($modified, $this->yellow->toolbox->getFileModified($fileName));
					unset($fileNamesRequired[array_search($fileName, $fileNamesRequired)]);
				}
				if(count($fileNamesRequired))
				{
					$statusCode = 500;
					foreach($fileNamesRequired as $fileName)
					{
						echo "ERROR updating files: Can't find file '$fileName'!\n";
					}
				}
				if(!$zip->close() || !$this->yellow->toolbox->modifyFile($fileNameZipArchive, $modified))
				{
					$statusCode = 500;
					echo "ERROR updating files: Can't write file '$fileNameZipArchive'!\n";
				}
			} else {
				$statusCode = 500;
				echo "ERROR updating files: Can't write file '$fileNameZipArchive'!\n";
			}
			if(defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateSoftwareArchive file:$fileNameZipArchive<br/>\n";
		}
		return $statusCode;
	}
	
	// Update software version file
	function updateSoftwareVersion($pathSource, $pathDestination)
	{
		$statusCode = 200;
		$fileNameVersion = $pathDestination.$this->yellow->config->get("updateVersionFile");
		if(is_file($fileNameVersion))
		{
			list($software, $version) = $this->getSoftwareVersion($pathSource);
			$fileData = $this->yellow->toolbox->readFile($fileNameVersion);
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
				if(!empty($matches[1]) && !empty($matches[2]) && $matches[1]==$software)
				{
					list($dummy, $url) = explode(',', $matches[2]);
					$fileDataNew .= "$matches[1]: $version,$url\n";
					$found = true;
				} else {
					$fileDataNew .= $line;
				}
			}
			if(!$found)
			{
				$softwareName = $this->getSoftwareName($software);
				$fileDataNew .= "\n# Datenstrom Yellow version, new\n\n";
				$fileDataNew .= "$software: $version,https://github.com/datenstrom/yellow-plugins/raw/master/zip/$softwareName.zip\n";
			}
			if($fileData!=$fileDataNew)
			{
				if(!$this->yellow->toolbox->createFile($fileNameVersion, $fileDataNew))
				{
					$statusCode = 500;
					echo "ERROR updating files: Can't write file '$fileNameVersion'!\n";
				}
			}
			if(defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateSoftwareVersion file:$fileNameVersion<br/>\n";
		}
		return $statusCode;
	}

	// Update software resource file
	function updateSoftwareResource($pathSource, $pathDestination)
	{
		$statusCode = 200;
		$fileNameResource = $pathDestination.$this->yellow->config->get("updateResourceFile");
		if(is_file($fileNameResource))
		{
			list($software, $resource) = $this->getSoftwareResource($pathSource);
			$fileData = $this->yellow->toolbox->readFile($fileNameResource);
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
				if(!empty($matches[1]) && !empty($matches[2]) && preg_match("/^$software\//", $matches[1]))
				{
					if(!$found)
					{
						$fileDataNew .= $resource;
						$found = true;
					}
				} else {
					$fileDataNew .= $line;
				}
			}
			if(!$found)
			{
				$fileDataNew .= "\n# Datenstrom Yellow resource, new\n\n";
				$fileDataNew .= $resource;
			}
			if($fileData!=$fileDataNew)
			{
				if(!$this->yellow->toolbox->createFile($fileNameResource, $fileDataNew))
				{
					$statusCode = 500;
					echo "ERROR updating files: Can't write file '$fileNameResource'!\n";
				}
			}
			if(defined("DEBUG") && DEBUG>=2) echo "YellowRelease::updateSoftwareResource file:$fileNameResource<br/>\n";
		}
		return $statusCode;
	}
	
	// Return software files
	function getSoftwareEntries($path)
	{
		$entries = array();
		$fileNameInformation = $path.$this->yellow->config->get("updateInformationFile");
		$fileData = $this->yellow->toolbox->readFile($fileNameInformation);
		foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
		{
			preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
			if(!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], '/'))
			{
				list($dummy, $entry) = explode('/', $matches[1], 2);
				list($fileName, $flags) = explode(',', $matches[2], 2);
				if($dummy[0]!='Y') list($entry, $flags) = explode(',', $matches[2], 2); //TODO: remove later, converts old file format
				if(!preg_match("/delete/i", $flags)) array_push($entries, "$path$entry");
			}
		}
		array_push($entries, $fileNameInformation);
		return $entries;
	}
	
	// Return software version
	function getSoftwareVersion($path)
	{
		$software = $version = "";
		foreach($this->yellow->toolbox->getDirectoryEntries($path, "/^.*\.php$/", false, false) as $entry)
		{
			$fileData = $this->yellow->toolbox->readFile($entry, 4096);
			foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
			{
				preg_match("/^\s*(.*?)\s+(.*?)$/", $line, $matches);
				if($matches[1]=="class" && !strempty($matches[2])) $software = $matches[2];
				if($matches[1]=="const" && preg_match("/\"([0-9\.]+)\"/", $line, $matches)) $version = $matches[1];
				if($matches[1]=="function") break;
			}
		}
		return array($software, $version);
	}

	// Return software resource
	function getSoftwareResource($path)
	{
		$software = $resource = "";
		$fileNameInformation = $path.$this->yellow->config->get("updateInformationFile");
		$fileData = $this->yellow->toolbox->readFile($fileNameInformation);
		foreach($this->yellow->toolbox->getTextLines($fileData) as $line)
		{
			preg_match("/^\s*(.*?)\s*:\s*(.*?)\s*$/", $line, $matches);
			if(lcfirst($matches[1])=="plugin" || lcfirst($matches[1])=="theme") $software = $matches[2];
			if(!empty($matches[1]) && !empty($matches[2]) && strposu($matches[1], '/'))
			{
				list($dummy, $entry) = explode('/', $matches[1], 2);
				list($fileName, $flags) = explode(',', $matches[2], 2);
				if($dummy[0]!='Y') //TODO: remove later, converts old file format
				{
					$matches[1] = "$software/$fileName";
					$matches[2] = "$dummy/$entry,$flags";
				}
				$resource .= "$matches[1]: $matches[2]\n";
			}
		}
		return array($software, $resource);
	}
	
	// Return software destination
	function getSoftwareDestination($path, $pathPlugins, $pathThemes)
	{
		list($software) = $this->getSoftwareVersion($path);
		return preg_match("/^YellowTheme/", $software) ? $pathThemes : $pathPlugins;
	}
	
	// Return software name
	function getSoftwareName($software)
	{
		$softwareName = $this->yellow->lookup->normaliseName($software, true, false, true);
		$softwareName = preg_replace("/yellowtheme|yellow/", "", $softwareName);
		return $softwareName;
	}
}

$yellow->plugins->register("release", "YellowRelease", YellowRelease::VERSION);
?>
