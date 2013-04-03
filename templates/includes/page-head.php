<header class="container" id="header" role="banner">
  <?php if ($site_name): ?>
    <h1 class="header-title">
      <a href="<?php print $front_page; ?>">
        <?php print $site_name; ?>
      </a>
    </h1>
  <?php endif; ?>
  <?php if ($site_slogan): ?>
    <h2 class="header-slogan">
      <?php print $site_slogan; ?>
    </h2>
  <?php endif; ?>
</header>
