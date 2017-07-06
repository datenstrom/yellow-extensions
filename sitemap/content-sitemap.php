<div class="content">
<?php $yellow->snippet("sidebar") ?>
<div class="main">
<h1><?php echo $yellow->page->getHtml("title") ?></h1>
<ul>
<?php foreach($yellow->page->getPages() as $page): ?>
<?php $sectionNew = htmlspecialchars(strtoupperu(substru($page->get("title"), 0, 1))) ?>
<?php if($section!=$sectionNew) { $section = $sectionNew; echo "</ul><h2>$section</h2><ul>\n"; } ?>
<li><a href="<?php echo $page->getLocation(true) ?>"><?php echo $page->getHtml("title") ?></a></li>
<?php endforeach ?>
</ul>
<?php $yellow->snippet("pagination", $yellow->page->getPages()) ?>
</div>
</div>
