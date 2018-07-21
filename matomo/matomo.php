<?php
// Matomo plugin, https://github.com/datenstrom/yellow-plugins/tree/master/matomo
// Copyright (c) 2013-2018 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowMatomo
{
	const VERSION = "0.6.4";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("matomoUrl", "");
		$this->yellow->config->setDefault("matomoSiteId", "yellow");
	}
	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name=="footer")
		{
			$url = $this->yellow->config->get("matomoUrl");
			$siteId = $this->yellow->config->get("matomoSiteId");
			if(empty($url)) $url = $this->yellow->toolbox->getServerUrl();
			$output = "<script type=\"text/javascript\">\n";
			$output .= "var _paq = _paq || [];\n";
			$output .= "(function(){ var u=\"".strencode($url)."\";\n";
			$output .= "_paq.push(['setSiteId', '".strencode($siteId)."']);\n";
			$output .= "_paq.push(['setTrackerUrl', u+'piwik.php']);\n";
			$output .= "_paq.push(['trackPageView']);\n";
			$output .= "_paq.push(['enableLinkTracking']);\n";
			$output .= "var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.defer=true; g.async=true; g.src=u+'piwik.js';\n";
			$output .= "s.parentNode.insertBefore(g,s); })();\n";
			$output .= "</script>\n";
		}
		return $output;
	}
}

$yellow->plugins->register("matomo", "YellowMatomo", YellowMatomo::VERSION);
?>
