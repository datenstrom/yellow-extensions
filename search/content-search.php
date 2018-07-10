<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main">
<h1><?php echo $yellow->page->getHtml("titleContent") ?></h1>
<?php if($yellow->page->get("navigation")!="navigation-search"): ?>
<form class="search-form" action="<?php echo $yellow->page->getLocation(true) ?>" method="post">
<input class="form-control" type="text" name="query" value="<?php echo htmlspecialchars($_REQUEST["query"]) ?>"<?php echo $yellow->page->get("status")=="none" ? " : "" ?> />
<input class="btn search-btn" type="submit" value="<?php echo $yellow->text->getHtml("searchButton") ?>" />
<input type="hidden" name="clean-url" />
</form>
<?php endif ?>
<?php if(count($yellow->page->getPages())): ?>
<?php foreach($yellow->page->getPages() as $page): ?>
<div class="entry">
<div class="entry-title"><h2><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></h2></div>
<div class="entry-content"><?php echo htmlspecialchars($yellow->toolbox->createTextDescription($page->getContent(false, 4096), $yellow->config->get("searchPageLength"))) ?></div>
<div class="entry-location"><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getUrl() ?></a></div>
</div>
<?php endforeach ?>
<?php elseif($yellow->page->get("status")!="none"): ?>
<p><?php echo $yellow->text->getHtml("searchResults".ucfirst($yellow->page->get("status"))) ?><p>
<?php endif ?>
<?php $yellow->snippet("pagination", $yellow->page->getPages()) ?>
</div>
</div>
