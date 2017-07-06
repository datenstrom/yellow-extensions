<?php
// Slider plugin, https://github.com/datenstrom/yellow-plugins/tree/master/slider
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowSlider
{
	const VERSION = "0.6.7";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("sliderStyle", "flickity");
		$this->yellow->config->setDefault("sliderAutoplay", "false");
	}
	
	// Handle page content parsing of custom block
	function onParseContentBlock($page, $name, $text, $shortcut)
	{
		$output = null;
		if($name=="slider" && $shortcut)
		{
			list($pattern, $style, $size, $autoplay) = $this->yellow->toolbox->getTextArgs($text);
			if(empty($style)) $style = $this->yellow->config->get("sliderStyle");
			if(empty($size)) $size = "100%";
			if(empty($autoplay)) $autoplay = $this->yellow->config->get("sliderAutoplay");
			if(empty($pattern))
			{
				$files = $page->getFiles(true);
			} else {
				$images = $this->yellow->config->get("imageDir");
				$files = $this->yellow->files->index(true, true)->match("#$images$pattern#");
			}
			if($this->yellow->plugins->isExisting("image"))
			{
				if(count($files))
				{
					$page->setLastModified($files->getModified());
					$output = "<div class=\"".htmlspecialchars($style)."\" data-prevnextbuttons=\"false\" data-clickable=\"true\" data-wraparound=\"true\" data-autoplay=\"".htmlspecialchars($autoplay)."\">\n";
					foreach($files as $file)
					{
						list($src, $width, $height) = $this->yellow->plugins->get("image")->getImageInfo($file->fileName, $size, $size);
						$output .= "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".
							htmlspecialchars($height)."\" alt=\"".basename($file->getLocation(true))."\" title=\"".
							basename($file->getLocation(true))."\" />\n";
					}
					$output .= "</div>";
				} else {
					$page->error(500, "Slider '$pattern' does not exist!");
				}
			} else {
				$page->error(500, "Slider requires 'image' plugin!");
			}
		}
		return $output;
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = null;
		if($name=="header")
		{
			$pluginLocation = $this->yellow->config->get("serverBase").$this->yellow->config->get("pluginLocation");
			$output = "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"{$pluginLocation}slider.css\" />\n";
			$output .= "<script type=\"text/javascript\" src=\"{$pluginLocation}slider.js\"></script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("slider", "YellowSlider", YellowSlider::VERSION);
?>