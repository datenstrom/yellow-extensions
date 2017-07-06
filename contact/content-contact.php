<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main">
<h1><?php echo $yellow->page->getHtml("titleContent") ?></h1>
<?php if($yellow->page->get("status")!="done"): ?>
<p class="<?php echo $yellow->page->getHtml("status") ?>"><?php echo $yellow->text->getHtml("contactStatus".ucfirst($yellow->page->get("status"))) ?></p>
<form class="contact-form" action="<?php echo $yellow->page->getLocation(true) ?>" method="post">
<p class="contact-name"><label for="name"><?php echo $yellow->text->getHtml("contactName") ?></label><br /><input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($_REQUEST["name"]) ?>" /></p>
<p class="contact-from"><label for="from"><?php echo $yellow->text->getHtml("contactEmail") ?></label><br /><input type="text" class="form-control" name="from" id="from" value="<?php echo htmlspecialchars($_REQUEST["from"]) ?>" /></p>
<p class="contact-message"><label for="message"><?php echo $yellow->text->getHtml("contactMessage") ?></label><br /><textarea class="form-control" name="message" id="message" rows="7" cols="70"><?php echo htmlspecialchars($_REQUEST["message"]) ?></textarea></p>
<input type="hidden" name="referer" value="<?php echo htmlspecialchars($_REQUEST["referer"]) ?>" />
<input type="hidden" name="status" value="send" />
<input type="submit" value="<?php echo $yellow->text->getHtml("contactButton") ?>" class="btn contact-btn" />
</form>
<?php else: ?>
<p><?php echo $yellow->text->getHtml("contactStatusDone") ?><p>
<?php endif ?>
</div>
</div>
