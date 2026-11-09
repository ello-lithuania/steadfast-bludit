<?php defined('BLUDIT') or die('Bludit CMS.'); ?>
<?php Theme::plugins('pageBegin'); ?>
<div class="container page-wrap">
  <article class="prose">
    <h1><?php echo $page->title(); ?></h1>
    <?php if (!$page->isStatic()): ?><p><time datetime="<?php echo $page->dateRaw('Y-m-d'); ?>"><?php echo $page->date(); ?></time></p><?php endif; ?>
    <?php if ($page->coverImage()): ?><p><img class="img-fluid rounded-4" src="<?php echo $page->coverImage(); ?>" alt=""></p><?php endif; ?>
    <?php echo $page->content(); ?>
  </article>
</div>
<?php Theme::plugins('pageEnd'); ?>
