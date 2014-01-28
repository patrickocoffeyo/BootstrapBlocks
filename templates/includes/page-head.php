<header class="container" id="header" role="banner">
  <h1>
    <?php if ($site_name): ?>
      <a class="brand" href="<?php echo $front_page; ?>"><?php echo $site_name; ?></a>
    <?php endif; ?>

    <?php if ($site_slogan): ?>
      <small><?php echo $site_slogan; ?></small>
    <?php endif; ?>
  </h1>
</header>
