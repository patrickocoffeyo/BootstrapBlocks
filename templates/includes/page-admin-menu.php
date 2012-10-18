<?php if (isset($admin_menu_expanded)): ?>
  <?php 
    global $user;
    global $base_url;
   ?>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><i class="icon-reorder"></i></a>
        
        
        <?php if ($site_name): ?>
          <a class="brand" href="/"><i class="icon-home"></i></a>
        <?php endif; ?>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="divider-vertical"></li>
            <?php print render($admin_menu_expanded); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>
