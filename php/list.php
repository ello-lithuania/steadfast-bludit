<?php defined('BLUDIT') or die('Bludit CMS.'); ?>
<div class="container page-wrap">
  <ul class="post-list mt-0">
    <?php foreach ($content as $item): ?>
    <li>
      <h2><a href="<?php echo $item->permalink(); ?>"><?php echo $item->title(); ?></a></h2>
      <time datetime="<?php echo $item->dateRaw('Y-m-d'); ?>"><?php echo $item->date(); ?></time>
      <?php if ($item->description()): ?><p class="text-muted-sf mt-2 mb-0"><?php echo $item->description(); ?></p><?php endif; ?>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php if (Paginator::numberOfPages() > 1): ?>
  <div class="d-flex gap-3 mt-4">
    <?php if (Paginator::showPrev()): ?><a class="btn btn-sf-ghost" href="<?php echo Paginator::previousPageUrl(); ?>">Newer</a><?php endif; ?>
    <?php if (Paginator::showNext()): ?><a class="btn btn-sf-ghost" href="<?php echo Paginator::nextPageUrl(); ?>">Older</a><?php endif; ?>
  </div>
  <?php endif; ?>
</div>
