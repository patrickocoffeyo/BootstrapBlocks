<?php if (isset($admin_menu_expanded)): ?>
  <?php 
    global $user;
    global $base_url;
   ?>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <?php if ($site_name): ?>
          <a class="brand" href="/"><i class="icon-home"></i></a>
        <?php endif; ?>
        
        <ul class="nav">
          <li class="divider-vertical"></li>
          <?php print render($admin_menu_expanded); ?>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?>
