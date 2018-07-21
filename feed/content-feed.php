<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main">
<h1><?php echo $yellow->page->getHtml("titleContent") ?></h1>
<ul>
<?php foreach($yellow->page->getPages() as $page): ?>
<?php if($yellow->page->get("feedChronologicalOrder")): ?>
<?php $sectionNew = $page->getDateHtml("modified") ?>
<?php else: ?>
<?php $sectionNew = $page->getDateHtml("published") ?>
<?php endif ?>
<?php if($section!=$sectionNew) { $section = $sectionNew; echo "</ul><h2>$section</h2><ul>\n"; } ?>
<li><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></li>
<?php endforeach ?>
</ul>
<?php $yellow->snippet("pagination", $yellow->page->getPages()) ?>
</div>
</div>
