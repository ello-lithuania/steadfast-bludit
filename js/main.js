/* Steadfast: small, dependency-free helpers. Bootstrap handles the navbar, scrollspy and accordion. */
(function () {
  'use strict';

  var root = document.documentElement;

  /* Theme toggle: remembers the choice, otherwise follows the system setting. */
  var toggle = document.querySelector('[data-theme-toggle]');
  if (toggle) {
    var sync = function () {
      var dark = root.getAttribute('data-bs-theme') === 'dark';
      toggle.setAttribute('aria-pressed', String(dark));
      toggle.setAttribute('aria-label', dark ? 'Switch to light theme' : 'Switch to dark theme');
    };
    sync();
    toggle.addEventListener('click', function () {
      var next = root.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-bs-theme', next);
      try { localStorage.setItem('sf-theme', next); } catch (e) { /* storage may be blocked */ }
      sync();
    });
  }

  /* Hairline under the navigation once the page has scrolled. */
  var nav = document.querySelector('.site-nav');
  if (nav) {
    var onScroll = function () { nav.classList.toggle('is-stuck', window.scrollY > 8); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* Close the mobile menu after choosing a link. */
  var menu = document.getElementById('mainNav');
  if (menu && window.bootstrap) {
    menu.addEventListener('click', function (e) {
      if (e.target.closest('.nav-link') && menu.classList.contains('show')) {
        window.bootstrap.Collapse.getOrCreateInstance(menu).hide();
      }
    });
  }

  /* Gentle reveal on scroll. */
  var items = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px' });
    items.forEach(function (el) { io.observe(el); });
  } else {
    items.forEach(function (el) { el.classList.add('in'); });
  }

  /* Contact form: validates in the browser. With form_action set it submits normally; otherwise it only shows the demo message. */
  var form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        form.classList.add('was-validated');
        var bad = form.querySelector(':invalid');
        if (bad) { bad.focus(); }
        return;
      }
      if (form.hasAttribute('data-demo')) {
        e.preventDefault();
        form.classList.remove('was-validated');
        form.classList.add('was-sent');
        form.reset();
        var ok = form.querySelector('.form-success');
        if (ok) { ok.focus(); }
      }
    });
  }
})();
