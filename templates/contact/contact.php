<?php if(PHP_SAPI == "cli") $yellow->page->error(500, "Static website not supported!") ?>
<?php $status = getContactStatus($yellow, "href=|url=", $_REQUEST["status"]) ?>
<?php $yellow->snippet("header") ?>
<?php $yellow->snippet("sitename") ?>
<?php $yellow->snippet("navigation") ?>
<div class="content contact">
<h1><?php echo $yellow->page->getHtml("title") ?></h1>
<?php if(empty($status)): ?>
<p><?php echo $yellow->text->getHtml("contactStatusNone") ?></p>
<form class="contact-form" action="<?php echo $yellow->page->getLocation() ?>" method="post">
<p class="contact-name"><label for="name"><?php echo $yellow->text->getHtml("contactName") ?></label><br /><input type="text" class="form-control" name="name" id="name"></p>
<p class="contact-from"><label for="from"><?php echo $yellow->text->getHtml("contactEmail") ?></label><br /><input type="text" class="form-control" name="from" id="from"></p>
<p class="contact-message"><label for="message"><?php echo $yellow->text->getHtml("contactMessage") ?></label><br /><textarea class="form-control" name="message" id="message" rows="7" cols="70"></textarea></p>
<input type="hidden" name="status" value="send" />
<input type="submit" value="<?php echo $yellow->text->getHtml("contactButton") ?>" class="btn contact-btn" />
</form>
<?php else: ?>
<p><?php echo $yellow->page->getHtml("contactStatus") ?><p>
<?php endif ?>
</div>
<?php $yellow->snippet("footer") ?>
<?php function getContactStatus($yellow, $spamFilter, $status)
{
	if($status == "send")
	{
		$status = sendMail($yellow, $spamFilter) ? "done" : "error";
		switch($status)
		{
			case "done":	$yellow->page->set("contactStatus", $yellow->text->get("contactStatusDone")); break;
			case "error":	$yellow->page->error(500, $yellow->text->get("contactStatusError")); break;
		}
		$yellow->page->header("Last-Modified: ".$yellow->toolbox->getHttpTimeFormatted(time()));
		$yellow->page->header("Cache-Control: no-cache, must-revalidate");
	}
	return $status;
}
function sendMail($yellow, $spamFilter)
{
	$ok = true;
	if(empty($_REQUEST['name']) || empty($_REQUEST["from"]) || empty($_REQUEST["message"])) $ok = false; // field validation
	if(!empty($_REQUEST["from"]) && !filter_var($_REQUEST["from"], FILTER_VALIDATE_EMAIL)) $ok = false;
	if(!empty($_REQUEST["message"]) && preg_match("/$spamFilter/", $_REQUEST["message"])) $ok = false;
	$mailName = preg_replace("/[^\w\-\.\@ ]/", "-", $_REQUEST["name"]);
	$mailFrom = preg_replace("/[^\w\-\.\@ ]/", "-", $_REQUEST["from"]);
	$mailTo = $yellow->page->get("contactEmail");
	if($yellow->config->isExisting("contactEmail")) $mailTo = $yellow->config->get("contactEmail");
	$mailSubject = $yellow->page->get("title");
	$mailMessage = $_REQUEST["message"]."\r\n-- \r\n$mailName";
	$mailHeaders = "Content-Type: text/plain; charset=UTF-8;\r\n";
	$mailHeaders .= "From: ".(empty($mailFrom) ? "noreply" : (empty($mailName) ? "$mailFrom" : "$mailFrom ($mailName)"))."\r\n";
	$mailHeaders .= "X-Contact-Url: ".$yellow->page->getUrl()."\r\n";
	$mailHeaders .= "X-Remote-Addr: ".$_SERVER["REMOTE_ADDR"]."\r\n";
	if($ok) $ok = mail($mailTo, $mailSubject, $mailMessage, $mailHeaders);
	if(defined("DEBUG") && DEBUG>=1) echo "Yellow::template name:contact to:$mailTo from:$mailFrom ok:$ok<br/>\n";;
	return $ok;
}
?>