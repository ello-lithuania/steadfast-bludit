<?php
defined('BLUDIT') or die('Bludit CMS.');

/* Home page content lives in data/site.json inside the theme folder. */
function sf_data()
{
	$raw = file_get_contents(THEME_DIR . 'data/site.json');
	$data = $raw === false ? null : json_decode($raw, true);
	return is_array($data) ? $data : array();
}

function sf_e($text)
{
	return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

/* Links starting with # point to home page sections and work from any page. */
function sf_link($url, $homeUrl)
{
	return ($url !== '' && $url[0] === '#') ? $homeUrl . $url : $url;
}

function sf_icon($name, $class = 'icon')
{
	echo '<svg class="' . sf_e($class) . '" aria-hidden="true"><use href="#i-' . sf_e($name) . '"></use></svg>';
}

function sf_head($sec)
{
	echo '<div class="section-head reveal"><span class="eyebrow">' . sf_e($sec['eyebrow'] ?? '') . '</span><h2>' . sf_e($sec['title'] ?? '') . '</h2>';
	if (!empty($sec['lead'])) {
		echo '<p class="text-muted-sf mt-3 mb-0">' . sf_e($sec['lead']) . '</p>';
	}
	echo '</div>';
}

function sf_art($name)
{
	$art = array(
		'tap' => '<svg viewBox="0 0 400 240" role="img" aria-label="Illustration of a kitchen tap over a sink"><rect class="i-bg" width="400" height="240"/><rect class="i-soft" x="60" y="150" width="280" height="60" rx="6"/><path class="i-line" d="M200 150v-70a26 26 0 0 1 52 0v12"/><rect class="i-accent" x="186" y="136" width="28" height="16" rx="3"/><path class="i-sun" d="M252 106s10 11 10 18a10 10 0 0 1-20 0c0-7 10-18 10-18z"/><path class="i-line" d="M90 150V132M310 150v-18M60 178h280"/></svg>',
		'roller' => '<svg viewBox="0 0 400 240" role="img" aria-label="Illustration of a freshly painted wall with a paint roller"><rect class="i-bg" width="400" height="240"/><rect class="i-sun" x="0" y="0" width="210" height="240"/><rect class="i-soft" x="170" y="62" width="110" height="34" rx="8"/><path class="i-line" d="M280 79h26v42h-82v30"/><rect class="i-accent" x="214" y="150" width="20" height="60" rx="4"/><rect class="i-line" x="214" y="150" width="20" height="60" rx="4"/></svg>',
		'fence' => '<svg viewBox="0 0 400 240" role="img" aria-label="Illustration of a repaired garden fence"><rect class="i-bg" width="400" height="240"/><circle class="i-sun" cx="320" cy="62" r="30"/><path class="i-ground" d="M0 190h400v50H0z"/><path class="i-soft" d="M60 190V96l22-22 22 22v94zM116 190V96l22-22 22 22v94zM172 190V96l22-22 22 22v94zM228 190V96l22-22 22 22v94zM284 190V96l22-22 22 22v94z"/><rect class="i-accent" x="44" y="118" width="312" height="14" rx="3"/><rect class="i-accent" x="44" y="158" width="312" height="14" rx="3"/></svg>',
	);
	echo $art[$name] ?? $art['tap'];
}
