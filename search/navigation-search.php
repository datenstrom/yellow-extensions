<?php $pages = $yellow->pages->top() ?>
<?php $yellow->page->setLastModified($pages->getModified()) ?>
<div class="navigation">
<ul>
<?php foreach($pages as $page): ?>
<li><a<?php echo $page->isActive() ? " class=\"active\"" : "" ?> href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("titleNavigation") ?></a></li>
<?php endforeach ?>
</ul>
</div>
<div class="navigation-banner"></div>
<div class="navigation-search">
<div class="navigation-search-fields">
<form class="search-form" action="<?php echo $yellow->page->base.$yellow->config->get("searchLocation") ?>" method="post">
<input class="search-text" type="text" name="query" placeholder="<?php echo $yellow->text->getHtml("searchButton") ?>" value="<?php echo htmlspecialchars($_REQUEST["query"]) ?>" />
<?php if($yellow->plugins->isExisting("fontawesome")):?>
<button class="search-button" type="submit"><i class="fa fa-search"></i></button>
<?php endif ?>
<input type="hidden" name="clean-url" />
</form>
</div>
</div>
