<header class="row-fluid clearfix" id="header" role="banner">
  <?php if ($logo): ?>
    <div class="span1 header-logo">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img id="header-logo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" role="img"/>
      </a>
    </div>
  <?php endif; ?>
  
  <div class="span11 header-text">
    <?php if ($site_name): ?>
      <a href="<?php print $front_page; ?>">
        <h1 class="header-title">
          <?php print $site_name; ?>
        </h1>
      </a>
    <?php endif; ?>
    <?php if ($site_slogan): ?>
      <h2 class="header-slogan">
        <?php print $site_slogan; ?>
      </h2>
    <?php endif; ?>
  </div>
</header>