<?php if (isset($admin_menu_expanded)): ?>
	<?php global $user; ?>
	<?php if (theme_get_setting('admin_menu_on_off') == 1 && in_array('administrator', array_values($user->roles))): ?>
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
					    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php print $user->name ?>!<b class="caret"></b></a>
					    <ul class="content-dropdown dropdown-menu">
					    	<li><a href="?q=user"><i class="icon-user"></i> My Account</a></li>
						    <li><a href="?q=user/logout"><i class="icon-off"></i> Logout</a></li>
						    <li><a href="?q=user/<?php print $user->uid; ?>/edit"><i class="icon-wrench"></i> Edit</a></li>
					    </ul>
					  </li>
					</ul>
		    </div>
		  </div>
		</div>
	<?php endif; ?>
<?php endif; ?>