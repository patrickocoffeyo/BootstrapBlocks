<?php if (isset($admin_menu_expanded)): ?>
  <?php 
    global $user;
    global $base_url;
   ?>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <?php if ($site_name): ?>
          <a class="brand" href="/"><i class="icon-home"></i> <?php print $site_name; ?></a>
        <?php endif; ?>
        
        <ul class="nav">
          <li class="divider-vertical"></li>
          <?php print render($admin_menu_expanded); ?>
        </ul>
        
        <ul class="nav pull-right">
          <li class="divider-vertical"></li>
          <li class="dropdown pull-right">
            <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown">
              <?php print t("Welcome,") . " " . $user->name . "!"; ?><b class="caret"></b></a>
            <ul class="content-dropdown dropdown-menu">
              <li><a href="<?php echo $base_url; ?>/user"><i class="icon-user"></i> <?php print t("My Account"); ?></a></li>
              <li><a href="<?php echo $base_url; ?>/user/logout"><i class="icon-off"></i> <?php print t("Logout"); ?></a></li>
              <li><a href="<?php echo $base_url; ?>/user/<?php print $user->uid; ?>/edit"><i class="icon-wrench"></i> <?php print t("Edit"); ?></a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>