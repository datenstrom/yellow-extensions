<?php
// Contact extension, https://github.com/datenstrom/yellow-extensions/tree/master/features/contact
// Copyright (c) 2013-2020 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowContact {
    const VERSION = "0.8.11";
    const TYPE = "feature";
    public $yellow;         //access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("contactLocation", "/contact/");
        $this->yellow->system->setDefault("contactEmailRestriction", "0");
        $this->yellow->system->setDefault("contactLinkRestriction", "0");
        $this->yellow->system->setDefault("contactSpamFilter", "advert|promot|market|traffic|click here");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="contact" && ($type=="block" || $type=="inline")) {
            list($location) = $this->yellow->toolbox->getTextArguments($text);
            if (empty($location)) $location = $this->yellow->system->get("contactLocation");
            $output = "<div class=\"".htmlspecialchars($name)."\">\n";
            $output .= "<form class=\"contact-form\" action=\"".$page->base.$location."\" method=\"post\">\n";
            $output .= "<p class=\"contact-name\"><label for=\"name\">".$this->yellow->text->getHtml("contactName")."</label><br /><input type=\"text\" class=\"form-control\" name=\"name\" id=\"name\" value=\"\" /></p>\n";
            $output .= "<p class=\"contact-from\"><label for=\"from\">".$this->yellow->text->getHtml("contactEmail")."</label><br /><input type=\"text\" class=\"form-control\" name=\"from\" id=\"from\" value=\"\" /></p>\n";
            $output .= "<p class=\"contact-message\"><label for=\"message\">".$this->yellow->text->getHtml("contactMessage")."</label><br /><textarea class=\"form-control\" name=\"message\" id=\"message\" rows=\"7\" cols=\"70\"></textarea></p>\n";
            $output .= "<p class=\"contact-consent\"><input type=\"checkbox\" name=\"consent\" value=\"consent\" id=\"consent\"> <label for=\"consent\">".$this->yellow->text->getHtml("contactConsent")."</label></p>\n";
            $output .= "<input type=\"hidden\" name=\"referer\" value=\"".$page->getUrl()."\" />\n";
            $output .= "<input type=\"hidden\" name=\"status\" value=\"send\" />\n";
            $output .= "<input type=\"submit\" value=\"".$this->yellow->text->getHtml("contactButton")."\" class=\"btn contact-btn\" />\n";
            $output .= "</form>\n";
            $output .= "</div>\n";
        }
        return $output;
    }
    
    // Handle page layout
    public function onParsePageLayout($page, $name) {
        if ($name=="contact") {
            if ($this->yellow->isCommandLine()) $page->error(500, "Static website not supported!");
            if (!$page->isRequest("referer")) {
                $page->setRequest("referer", $this->yellow->toolbox->getServer("HTTP_REFERER"));
                $page->setHeader("Last-Modified", $this->yellow->toolbox->getHttpDateFormatted(time()));
                $page->setHeader("Cache-Control", "no-cache, no-store");
            }
            if ($page->getRequest("status")=="send") {
                $status = $this->sendMail();
                if ($status=="settings") $page->error(500, "Contact page settings not valid!");
                if ($status=="error") $page->error(500, $this->yellow->text->get("contactStatusError"));
                $page->setHeader("Last-Modified", $this->yellow->toolbox->getHttpDateFormatted(time()));
                $page->setHeader("Cache-Control", "no-cache, no-store");
                $page->set("status", $status);
            } else {
                $page->set("status", "none");
            }
        }
    }
    
    // Send contact email
    public function sendMail() {
        $status = "send";
        $name = trim(preg_replace("/[^\pL\d\-\. ]/u", "-", $this->yellow->page->getRequest("name")));
        $from = trim($this->yellow->page->getRequest("from"));
        $message = trim($this->yellow->page->getRequest("message"));
        $consent = trim($this->yellow->page->getRequest("consent"));
        $referer = trim($this->yellow->page->getRequest("referer"));
        $footer = $this->getMailFooter($referer);
        $spamFilter = $this->yellow->system->get("contactSpamFilter");
        $author = $this->yellow->system->get("author");
        $email = $this->yellow->system->get("email");
        if ($this->yellow->page->isExisting("author") && !$this->yellow->system->get("contactEmailRestriction")) {
            $author = $this->yellow->page->get("author");
        }
        if ($this->yellow->page->isExisting("email") && !$this->yellow->system->get("contactEmailRestriction")) {
            $email = $this->yellow->page->get("email");
        }
        if ($this->yellow->system->get("contactLinkRestriction") && $this->checkClickable($message)) $status = "review";
        if (empty($name) || empty($from) || empty($message) || empty($consent)) $status = "incomplete";
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $status = "settings";
        if (!empty($from) && !filter_var($from, FILTER_VALIDATE_EMAIL)) $status = "invalid";
        if ($status=="send") {
            $mailTo = mb_encode_mimeheader("$author")." <$email>";
            $mailSubject = mb_encode_mimeheader($this->yellow->page->get("title"));
            $mailHeaders = mb_encode_mimeheader("From: $name")." <$from>\r\n";
            $mailHeaders .= mb_encode_mimeheader("X-Referer-Url: ".$referer)."\r\n";
            $mailHeaders .= mb_encode_mimeheader("X-Request-Url: ".$this->yellow->page->getUrl())."\r\n";
            if ($spamFilter!="none" && preg_match("/$spamFilter/i", $message)) {
                $mailSubject = mb_encode_mimeheader($this->yellow->text->get("contactMailSpam")." ".$this->yellow->page->get("title"));
                $mailHeaders .= "X-Spam-Flag: YES\r\n";
                $mailHeaders .= "X-Spam-Status: Yes, score=1\r\n";
            }
            $mailHeaders .= "Mime-Version: 1.0\r\n";
            $mailHeaders .= "Content-Type: text/plain; charset=utf-8\r\n";
            $mailMessage = "$message\r\n-- \r\n$footer";
            $status = mail($mailTo, $mailSubject, $mailMessage, $mailHeaders) ? "done" : "error";
        }
        return $status;
    }
    
    // Return email footer
    public function getMailFooter($url) {
        $footer = $this->yellow->text->get("contactMailFooter");
        $footer = strreplaceu("\\n", "\r\n", $footer);
        $footer = preg_replace("/@sitename/i", $this->yellow->system->get("sitename"), $footer);
        $footer = preg_replace("/@title/i", $this->findTitle($url, $this->yellow->page->get("title")), $footer);
        return $footer;
    }
    
    // Return title for local page
    public function findTitle($url, $titleDefault) {
        $titleFound = $titleDefault;
        $serverUrl = $this->yellow->lookup->normaliseUrl(
            $this->yellow->system->get("coreServerScheme"),
            $this->yellow->system->get("coreServerAddress"),
            $this->yellow->system->get("coreServerBase"), "");
        $serverUrlLength = strlenu($serverUrl);
        if (substru($url, 0, $serverUrlLength)==$serverUrl) {
            $page = $this->yellow->content->find(substru($url, $serverUrlLength));
            if ($page) $titleFound = $page->get("title");
        }
        return $titleFound;
    }

    // Check if text contains clickable links
    public function checkClickable($text) {
        $found = false;
        foreach (preg_split("/\s+/", $text) as $token) {
            if (preg_match("/([\w\-\.]{2,}\.[\w]{2,})/", $token)) $found = true;
            if (preg_match("/^\w+:\/\//", $token)) $found = true;
        }
        return $found;
    }
}
