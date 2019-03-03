<?php
// Matomo extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/matomo
// Copyright (c) 2013-2019 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowMatomo {
    const VERSION = "0.8.2";
    const TYPE = "feature";
    public $yellow;            //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("matomoUrl", "");
        $this->yellow->system->setDefault("matomoSiteId", "yellow");
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = NULL;
        if ($name=="footer") {
            $url = $this->yellow->system->get("matomoUrl");
            $siteId = $this->yellow->system->get("matomoSiteId");
            if (empty($url)) $url = $this->yellow->toolbox->getServerUrl();
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
