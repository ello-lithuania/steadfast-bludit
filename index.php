<?php
include(THEME_DIR_PHP . 'helpers.php');
$sf = sf_data();
$isHome = ($WHERE_AM_I === 'home');
$homeUrl = $isHome ? '' : Theme::siteUrl();
?>
<!doctype html>
<html lang="<?php echo Theme::lang(); ?>" data-bs-theme="light" class="no-js">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Bludit">
  <meta name="theme-color" content="#0d5c4b">
  <?php echo Theme::metaTagTitle(); ?>
  <?php echo Theme::metaTagDescription(); ?>
  <link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='8' fill='%230d5c4b'/%3E%3Cpath d='M8 16l8-7 8 7v8H8z' fill='%23fff'/%3E%3C/svg%3E">
  <script>
    /* Set the theme before first paint so the page does not flash. */
    (function () {
      var saved = null;
      try { saved = localStorage.getItem('sf-theme'); } catch (e) {}
      var dark = saved ? saved === 'dark' : (window.matchMedia && matchMedia('(prefers-color-scheme: dark)').matches);
      var el = document.documentElement;
      el.setAttribute('data-bs-theme', dark ? 'dark' : 'light');
      el.classList.remove('no-js');
      el.classList.add('js');
    })();
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600..800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <?php echo Theme::css(array('vendor/bootstrap/bootstrap.min.css', 'css/style.css')); ?>
  <?php Theme::plugins('siteHead'); ?>
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-root-margin="-20% 0px -65% 0px" tabindex="0">
<?php Theme::plugins('siteBodyBegin'); ?>

<a class="skip-link" href="#main">Skip to content</a>

<?php include(THEME_DIR_PHP . 'sprite.php'); ?>

<?php if (!empty($sf['topbar_text']) || !empty($sf['phone'])): ?>
<div class="topbar py-2 d-none d-md-block">
  <div class="container d-flex justify-content-between">
    <span><?php echo sf_e($sf['topbar_text'] ?? ''); ?></span>
    <?php if (!empty($sf['phone'])): ?><span>Need help today? <a href="tel:<?php echo sf_e($sf['phone_href'] ?? $sf['phone']); ?>">Call <?php echo sf_e($sf['phone']); ?></a></span><?php endif; ?>
  </div>
</div>
<?php endif; ?>

<header class="site-nav sticky-top">
  <nav class="navbar navbar-expand-xl py-3" aria-label="Main navigation">
    <div class="container">
      <a class="brand" href="<?php echo Theme::siteUrl(); ?>">
        <span class="brand-mark"><?php sf_icon($sf['brand_icon'] ?? 'wrench', 'icon icon-sm'); ?></span>
        <?php echo sf_e($sf['brand'] ?? $site->title()); ?>
      </a>
      <div class="d-flex align-items-center gap-2 order-xl-3">
        <button class="btn btn-sf-ghost theme-toggle" type="button" data-theme-toggle aria-label="Switch theme">
          <?php sf_icon('sun', 'icon icon-sm icon-sun'); ?>
          <?php sf_icon('moon', 'icon icon-sm icon-moon'); ?>
        </button>
        <?php if (!empty($sf['cta_label'])): ?><a class="btn btn-sf d-none d-sm-inline-flex" href="<?php echo sf_e(sf_link($sf['cta_url'] ?? '#contact', $homeUrl)); ?>"><?php echo sf_e($sf['cta_label']); ?></a><?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse order-xl-2" id="mainNav">
        <ul class="navbar-nav mx-auto">
          <?php foreach (($sf['nav'] ?? array()) as $item): ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo sf_e(sf_link($item['url'], $homeUrl)); ?>"><?php echo sf_e($item['name']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main id="main">
<?php
if ($isHome) {
	include(THEME_DIR_PHP . 'home.php');
} elseif ($WHERE_AM_I === 'page') {
	include(THEME_DIR_PHP . 'page.php');
} else {
	include(THEME_DIR_PHP . 'list.php');
}
?>
</main>

<footer class="site-footer mt-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-5">
        <a class="brand" href="<?php echo Theme::siteUrl(); ?>">
          <span class="brand-mark"><?php sf_icon($sf['brand_icon'] ?? 'wrench', 'icon icon-sm'); ?></span>
          <?php echo sf_e($sf['brand'] ?? $site->title()); ?>
        </a>
        <?php if (!empty($sf['tagline'])): ?><p class="text-muted-sf mt-3 mb-0" style="max-width:26rem"><?php echo sf_e($sf['tagline']); ?></p><?php endif; ?>
      </div>
      <?php foreach (($sf['footer_columns'] ?? array()) as $i => $col): ?>
      <div class="col-6 col-lg-2<?php echo $i === 0 ? ' offset-lg-1' : ''; ?>">
        <h4><?php echo sf_e($col['title']); ?></h4>
        <ul>
          <?php foreach ($col['links'] as $item): ?>
          <li><a href="<?php echo sf_e(sf_link($item['url'], $homeUrl)); ?>"><?php echo sf_e($item['name']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>
      <?php if (!empty($sf['phone']) || !empty($sf['email'])): ?>
      <div class="col-lg-2">
        <h4>Get in touch</h4>
        <ul>
          <?php if (!empty($sf['phone'])): ?><li><a href="tel:<?php echo sf_e($sf['phone_href'] ?? $sf['phone']); ?>"><?php echo sf_e($sf['phone']); ?></a></li><?php endif; ?>
          <?php if (!empty($sf['email'])): ?><li><a href="mailto:<?php echo sf_e($sf['email']); ?>"><?php echo sf_e($sf['email']); ?></a></li><?php endif; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
    <div class="footer-bottom">
      <span><?php echo $site->footer() ? $site->footer() : '&copy; ' . date('Y') . ' ' . sf_e($sf['brand'] ?? $site->title()) . '. All rights reserved.'; ?></span>
      <?php if (!empty($sf['credit'])): ?><span>Theme by <a href="https://kokybiskasvetaine.lt/" rel="nofollow">KokybiskaSvetaine.lt</a></span><?php endif; ?>
    </div>
  </div>
</footer>

<?php echo Theme::js(array('vendor/bootstrap/bootstrap.bundle.min.js', 'js/main.js')); ?>
<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>
