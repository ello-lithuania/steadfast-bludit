<?php defined('BLUDIT') or die('Bludit CMS.'); ?>
<span id="top"></span>

<?php if (!empty($sf['hero'])): $h = $sf['hero']; ?>
<section class="hero">
  <div class="container">
    <div class="row align-items-center gy-5 gx-lg-5">
      <div class="col-lg-6">
        <span class="eyebrow"><?php echo sf_e($h['eyebrow'] ?? ''); ?></span>
        <h1><?php echo sf_e($h['title_start'] ?? ''); ?> <span class="hero-highlight"><?php echo sf_e($h['title_mark'] ?? ''); ?></span><?php echo sf_e($h['title_end'] ?? ''); ?></h1>
        <p class="hero-lead mt-4"><?php echo sf_e($h['lead'] ?? ''); ?></p>
        <div class="d-flex flex-wrap gap-3 mt-4">
          <?php if (!empty($h['primary'])): ?><a class="btn btn-sf btn-lg" href="<?php echo sf_e($h['primary']['url']); ?>"><?php echo sf_e($h['primary']['label']); ?> <?php sf_icon('arrow', 'icon icon-sm'); ?></a><?php endif; ?>
          <?php if (!empty($h['secondary'])): ?><a class="btn btn-sf-ghost btn-lg" href="<?php echo sf_e($h['secondary']['url']); ?>"><?php echo sf_e($h['secondary']['label']); ?></a><?php endif; ?>
        </div>
        <?php if (!empty($h['trust'])): ?>
        <div class="hero-trust">
          <?php foreach ($h['trust'] as $t): ?><div><strong><?php echo sf_e($t['value']); ?></strong><?php echo sf_e($t['label']); ?></div><?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="col-lg-6">
        <div class="hero-art">
          <?php if (!empty($h['image'])): ?>
          <img class="img-fluid rounded-4" src="<?php echo sf_e($h['image']); ?>" alt="<?php echo sf_e($h['image_alt'] ?? ''); ?>">
          <?php else: ?>
          <svg viewBox="0 0 560 520" role="img" aria-label="Illustration of a small house with a ladder and a toolbox">
            <rect class="i-bg" x="30" y="30" width="500" height="460" rx="36"/>
            <circle class="i-sun" cx="430" cy="118" r="46"/>
            <path class="i-ground" d="M30 420h500v34a36 36 0 0 1-36 36H66a36 36 0 0 1-36-36z"/>
            <rect class="i-wall" x="350" y="150" width="36" height="66" />
            <path class="i-roof" d="M126 262 280 132l154 130z"/>
            <rect class="i-wall" x="152" y="262" width="256" height="170"/>
            <rect class="i-door" x="250" y="330" width="62" height="102"/>
            <circle class="i-ink" cx="298" cy="384" r="4"/>
            <rect class="i-glass" x="176" y="298" width="52" height="52"/>
            <path class="i-line" d="M202 298v52M176 324h52"/>
            <rect class="i-glass" x="334" y="298" width="52" height="52"/>
            <path class="i-line" d="M360 298v52M334 324h52"/>
            <path class="i-line" d="M84 432 126 214M128 432l42-218M99 356h44M107 316h44M115 276h44M92 394h44"/>
            <rect class="i-accent" x="414" y="392" width="84" height="40" rx="6"/>
            <rect class="i-line" x="414" y="392" width="84" height="40" rx="6"/>
            <path class="i-line" d="M438 392v-10a6 6 0 0 1 6-6h24a6 6 0 0 1 6 6v10M414 410h84"/>
            <path class="i-line" d="M60 432h440"/>
          </svg>
          <?php endif; ?>
          <?php foreach (($h['badges'] ?? array()) as $i => $b): ?>
          <div class="hero-badge b<?php echo $i + 1; ?>">
            <span class="dot"><?php sf_icon($b['icon'], 'icon icon-sm'); ?></span>
            <div><strong><?php echo sf_e($b['title']); ?></strong><span><?php echo sf_e($b['text']); ?></span></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['services'])): ?>
<section class="section section-alt" id="services">
  <div class="container">
    <?php sf_head($sf['services']); ?>
    <div class="row g-4">
      <?php foreach ($sf['services']['items'] as $s): ?>
      <div class="col-md-6 col-lg-4 reveal"><article class="sf-card">
        <div class="icon-tile"><?php sf_icon($s['icon']); ?></div>
        <h3><?php echo sf_e($s['title']); ?></h3>
        <p><?php echo sf_e($s['text']); ?></p>
        <?php if (!empty($s['from'])): ?><span class="from"><?php echo sf_e($s['from']); ?></span><?php endif; ?>
      </article></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['process'])): ?>
<section class="section" id="process">
  <div class="container">
    <?php sf_head($sf['process']); ?>
    <div class="row g-4 steps">
      <?php foreach ($sf['process']['steps'] as $s): ?>
      <div class="col-md-6 col-lg-3 reveal"><div class="step">
        <h3><?php echo sf_e($s['title']); ?></h3>
        <p><?php echo sf_e($s['text']); ?></p>
      </div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['work'])): ?>
<section class="section section-alt" id="work">
  <div class="container">
    <?php sf_head($sf['work']); ?>
    <div class="row g-4">
      <?php foreach ($sf['work']['items'] as $w): ?>
      <div class="col-md-4 reveal"><article class="work-card">
        <?php if (!empty($w['image'])): ?><img class="w-100" src="<?php echo sf_e($w['image']); ?>" alt="<?php echo sf_e($w['image_alt'] ?? ''); ?>"><?php else: sf_art($w['art'] ?? 'tap'); endif; ?>
        <div class="work-body"><?php if (!empty($w['tag'])): ?><span class="tag"><?php echo sf_e($w['tag']); ?></span><?php endif; ?><h3><?php echo sf_e($w['title']); ?></h3><p><?php echo sf_e($w['text']); ?></p></div>
      </article></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['pricing'])): ?>
<section class="section" id="pricing">
  <div class="container">
    <?php sf_head($sf['pricing']); ?>
    <div class="row g-4 align-items-stretch">
      <?php foreach ($sf['pricing']['plans'] as $p): $featured = !empty($p['featured']); ?>
      <div class="col-lg-4 reveal"><div class="price-card<?php echo $featured ? ' featured' : ''; ?>">
        <?php if (!empty($p['flag'])): ?><span class="price-flag"><?php echo sf_e($p['flag']); ?></span><?php endif; ?>
        <h3><?php echo sf_e($p['name']); ?></h3>
        <div class="price"><?php echo sf_e($p['price']); ?> <small><?php echo sf_e($p['unit']); ?></small></div>
        <p class="text-muted-sf mb-0"><?php echo sf_e($p['text']); ?></p>
        <ul class="price-list">
          <?php foreach ($p['features'] as $f): ?><li><?php sf_icon('check', 'icon icon-sm'); ?><?php echo sf_e($f); ?></li><?php endforeach; ?>
        </ul>
        <a class="btn <?php echo $featured ? 'btn-sf' : 'btn-sf-ghost'; ?> w-100" href="<?php echo sf_e($p['url']); ?>"><?php echo sf_e($p['cta']); ?></a>
      </div></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['reviews'])): ?>
<section class="section section-alt" id="reviews">
  <div class="container">
    <?php sf_head($sf['reviews']); ?>
    <div class="row g-4">
      <?php foreach ($sf['reviews']['items'] as $r): ?>
      <div class="col-md-4 reveal"><figure class="review">
        <div class="stars" role="img" aria-label="5 out of 5 stars"><?php for ($i = 0; $i < 5; $i++): ?><svg aria-hidden="true"><use href="#i-star"></use></svg><?php endfor; ?></div>
        <blockquote><?php echo sf_e($r['quote']); ?></blockquote>
        <figcaption><span class="avatar" aria-hidden="true"><?php echo sf_e($r['initials']); ?></span><div><?php echo sf_e($r['name']); ?><span><?php echo sf_e($r['detail']); ?></span></div></figcaption>
      </figure></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['faq'])): ?>
<section class="section" id="faq">
  <div class="container">
    <div class="row gy-5 gx-lg-5">
      <div class="col-lg-4 reveal">
        <span class="eyebrow"><?php echo sf_e($sf['faq']['eyebrow']); ?></span>
        <h2><?php echo sf_e($sf['faq']['title']); ?></h2>
        <?php if (!empty($sf['faq']['lead'])): ?><p class="text-muted-sf mt-3"><?php echo sf_e($sf['faq']['lead']); ?></p><?php endif; ?>
      </div>
      <div class="col-lg-8 reveal">
        <div class="accordion" id="faqList">
          <?php foreach ($sf['faq']['items'] as $i => $f): $n = $i + 1; $first = ($i === 0); ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?php echo $first ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#q<?php echo $n; ?>" aria-expanded="<?php echo $first ? 'true' : 'false'; ?>" aria-controls="q<?php echo $n; ?>"><?php echo sf_e($f['q']); ?></button></h3>
            <div id="q<?php echo $n; ?>" class="accordion-collapse collapse<?php echo $first ? ' show' : ''; ?>" data-bs-parent="#faqList"><div class="accordion-body"><?php echo sf_e($f['a']); ?></div></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['contact'])): $c = $sf['contact']; ?>
<section class="section section-alt" id="contact">
  <div class="container">
    <div class="row gy-5 gx-lg-5">
      <div class="col-lg-5 reveal">
        <span class="eyebrow"><?php echo sf_e($c['eyebrow']); ?></span>
        <h2><?php echo sf_e($c['title']); ?></h2>
        <?php if (!empty($c['lead'])): ?><p class="text-muted-sf mt-3"><?php echo sf_e($c['lead']); ?></p><?php endif; ?>
        <ul class="contact-list mt-4">
          <?php if (!empty($sf['phone'])): ?><li><?php sf_icon('phone'); ?><div><strong>Phone</strong><a href="tel:<?php echo sf_e($sf['phone_href'] ?? $sf['phone']); ?>"><?php echo sf_e($sf['phone']); ?></a></div></li><?php endif; ?>
          <?php if (!empty($sf['email'])): ?><li><?php sf_icon('mail'); ?><div><strong>Email</strong><a href="mailto:<?php echo sf_e($sf['email']); ?>"><?php echo sf_e($sf['email']); ?></a></div></li><?php endif; ?>
          <?php if (!empty($c['address'])): ?><li><?php sf_icon('pin'); ?><div><strong><?php echo sf_e($c['address_label'] ?? 'Address'); ?></strong><span><?php echo sf_e($c['address']); ?></span></div></li><?php endif; ?>
          <?php if (!empty($c['hours'])): ?><li><?php sf_icon('clock'); ?><div><strong>Hours</strong><span><?php echo sf_e($c['hours']); ?></span></div></li><?php endif; ?>
        </ul>
        <div class="map">
          <svg viewBox="0 0 480 220" role="img" aria-label="Map placeholder">
            <rect class="m-bg" width="480" height="220"/>
            <rect class="m-park" x="300" y="20" width="150" height="90" rx="12"/>
            <path class="m-road" d="M-10 150C100 130 180 170 260 120S400 60 490 150"/>
            <path class="m-road-s" d="M90 -10 150 230M260 -10l30 240M400 -10l-40 240M-10 60h500"/>
            <path class="m-pin" d="M240 140s34-30 34-56a34 34 0 0 0-68 0c0 26 34 56 34 56z"/>
            <circle class="m-pin-c" cx="240" cy="84" r="13"/>
          </svg>
        </div>
      </div>
      <div class="col-lg-7 reveal">
        <div class="contact-panel">
          <form id="contactForm" novalidate<?php echo !empty($c['form_action']) ? ' method="post" action="' . sf_e($c['form_action']) . '"' : ' data-demo'; ?>>
            <div class="row g-3">
              <div class="col-sm-6">
                <label class="form-label" for="name">Your name</label>
                <input class="form-control" id="name" name="name" type="text" autocomplete="name" required>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>
              <div class="col-sm-6">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" id="phone" name="phone" type="tel" autocomplete="tel" required>
                <div class="invalid-feedback">Please enter a phone number.</div>
              </div>
              <div class="col-12">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" autocomplete="email" required>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
              <?php if (!empty($c['options'])): ?>
              <div class="col-12">
                <label class="form-label" for="service"><?php echo sf_e($c['select_label']); ?></label>
                <select class="form-select" id="service" name="service" required>
                  <option value=""><?php echo sf_e($c['select_placeholder']); ?></option>
                  <?php foreach ($c['options'] as $o): ?><option><?php echo sf_e($o); ?></option><?php endforeach; ?>
                </select>
                <div class="invalid-feedback">Please choose an option.</div>
              </div>
              <?php endif; ?>
              <div class="col-12">
                <label class="form-label" for="message"><?php echo sf_e($c['message_label']); ?></label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="<?php echo sf_e($c['message_placeholder']); ?>" required></textarea>
                <div class="invalid-feedback">Please add a short description.</div>
              </div>
              <div class="col-12 d-flex flex-wrap align-items-center gap-3">
                <button class="btn btn-sf btn-lg" type="submit"><?php echo sf_e($c['submit']); ?> <?php sf_icon('arrow', 'icon icon-sm'); ?></button>
                <?php if (!empty($c['note'])): ?><span class="form-note"><?php echo sf_e($c['note']); ?></span><?php endif; ?>
              </div>
              <div class="col-12">
                <div class="alert alert-success form-success mb-0" role="status" tabindex="-1"><?php echo sf_e($c['success']); ?></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($sf['cta'])): ?>
<section class="section pb-0 pt-5 mt-3">
  <div class="container">
    <div class="cta-band reveal">
      <div class="row align-items-center g-4">
        <div class="col-lg-8">
          <h2><?php echo sf_e($sf['cta']['title']); ?></h2>
          <p class="mt-2"><?php echo sf_e($sf['cta']['text']); ?></p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a class="btn btn-light btn-lg" href="<?php echo sf_e($sf['cta']['url']); ?>"><?php echo sf_e($sf['cta']['label']); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
