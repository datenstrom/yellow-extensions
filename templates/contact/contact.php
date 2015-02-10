<?php /* Contact template 0.1.6 */ ?>
<?php if(PHP_SAPI == "cli") $yellow->page->error(500, "Static website not supported!") ?>
<?php $status = getContactStatus($yellow, "href=|url=", $_REQUEST["status"]) ?>
<?php $yellow->snippet("header") ?>
<?php $yellow->snippet("sitename") ?>
<?php $yellow->snippet("navigation") ?>
<div class="content contact">
<h1><?php echo $yellow->page->getHtml("title") ?></h1>
<?php if($status != "done"): ?>
<p class="<?php echo htmlspecialchars($status) ?>"><?php echo $yellow->page->getHtml("contactStatus") ?></p>
<form class="contact-form" action="<?php echo $yellow->page->getLocation() ?>" method="post">
<p class="contact-name"><label for="name"><?php echo $yellow->text->getHtml("contactName") ?></label><br /><input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($_REQUEST["name"]) ?>" /></p>
<p class="contact-from"><label for="from"><?php echo $yellow->text->getHtml("contactEmail") ?></label><br /><input type="text" class="form-control" name="from" id="from" value="<?php echo htmlspecialchars($_REQUEST["from"]) ?>" /></p>
<p class="contact-message"><label for="message"><?php echo $yellow->text->getHtml("contactMessage") ?></label><br /><textarea class="form-control" name="message" id="message" rows="7" cols="70"><?php echo htmlspecialchars($_REQUEST["message"]) ?></textarea></p>
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
		$status = sendMail($yellow, $spamFilter);
		switch($status)
		{
			case "incomplete":	$yellow->page->set("contactStatus", $yellow->text->get("contactStatusIncomplete")); break;
			case "invalid":		$yellow->page->set("contactStatus", $yellow->text->get("contactStatusInvalid")); break;
			case "done":		$yellow->page->set("contactStatus", $yellow->text->get("contactStatusDone")); break;
			case "error":		$yellow->page->error(500, $yellow->text->get("contactStatusError")); break;
		}
		$yellow->page->header("Last-Modified: ".$yellow->toolbox->getHttpDateFormatted(time()));
		$yellow->page->header("Cache-Control: no-cache, must-revalidate");
	} else {
		$status = "none";
		$yellow->page->set("contactStatus", $yellow->text->get("contactStatusNone"));
	}
	return $status;
}
function sendMail($yellow, $spamFilter)
{
	$status = "send";
	$_REQUEST["message"]=trim($_REQUEST["message"]);
	if(empty($_REQUEST["message"])) $status = "incomplete";
	if(!empty($_REQUEST["from"]) && !filter_var($_REQUEST["from"], FILTER_VALIDATE_EMAIL)) $status = "invalid";
	if(!empty($_REQUEST["message"]) && preg_match("/$spamFilter/", $_REQUEST["message"])) $status = "error";
	$name = preg_replace("/[^\pL\d\-\. ]/u", "-", $_REQUEST["name"]);
	$from = preg_replace("/[^\w\-\.\@ ]/", "-", $_REQUEST["from"]);
	if($status == "send")
	{
		$mailMessage = $_REQUEST["message"]."\r\n-- \r\n$name";
		$mailTo = $yellow->page->get("contactEmail");
		if($yellow->config->isExisting("contactEmail")) $mailTo = $yellow->config->get("contactEmail");
		$mailSubject = mb_encode_mimeheader($yellow->page->get("title"));
		$mailHeaders = empty($from) ? "From: noreply\r\n" : "From: ".mb_encode_mimeheader($name)." <$from>\r\n";
		$mailHeaders .= "X-Contact-Url: ".mb_encode_mimeheader($yellow->page->getUrl())."\r\n";
		$mailHeaders .= "X-Remote-Addr: ".mb_encode_mimeheader($_SERVER["REMOTE_ADDR"])."\r\n";
		$mailHeaders .= "Mime-Version: 1.0\r\n";
		$mailHeaders .= "Content-Type: text/plain; charset=utf-8\r\n";
		$status = mail($mailTo, $mailSubject, $mailMessage, $mailHeaders) ? "done" : "error";
	}
	return $status;
}
?>
