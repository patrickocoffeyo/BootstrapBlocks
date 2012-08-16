<?php if (theme_get_setting('admin_menu_on_off') == 1 && in_array('administrator', array_values($user->roles))): ?>
	<?php global $user; ?>
	<div class="navbar">
	  <div class="navbar-inner">
	    <div class="container">
	    	<?php if ($site_name): ?>
		    	<a class="brand" href="/"><?php print $site_name; ?></a>
		    <?php endif; ?>
	      <ul class="nav">
				  <li class="dropdown">
				    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-file"></i> Content<b class="caret"></b></a>
				    <ul class="content-dropdown dropdown-menu">
					    <li><a href="?q=admin/content"><i class="icon-file"></i>Content</a></li>
					    <li><a href="?q=admin/structure/types"><i class="icon-paste"></i> Content Types</a></li>
					    <li><a href="?q=admin/content/comments"><i class=" icon-comments"></i> Comments</a></li>
				    </ul>
				  </li>
				  
				  <li class="divider-vertical"></li>
				  
				  <li class="dropdown">
				    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sitemap"></i> Structure<b class="caret"></b></a>
				    <ul class="content-dropdown dropdown-menu">
					    <li><a href="?q=admin/structure/blocks"><i class="icon-th-large"></i> Blocks</a></li>
					    <li><a href="?q=admin/structure/types"><i class="icon-paste"></i> Content Types</a></li>
					    <li><a href="?q=admin/structure/menus"><i class="icon-list-ol"></i> Menus</a></li>
					    <li><a href="?q=admin/structure/taxonomy"><i class="icon-tag"></i> Taxonomy</a></li>
					    <li><a href="?q=admin/structure/views"><i class="icon-table"></i> Views</a></li>
				    </ul>
				  </li>
				  
				  <li class="divider-vertical"></li>
				  
				  <li><a href="?q=admin/appearance"><i class="icon-eye-open"></i> Appearance</a>
				  
				  <li class="divider-vertical"></li>
				  
				  <li class="dropdown">
				    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> People<b class="caret"></b></a>
				    <ul class="content-dropdown dropdown-menu">
					    <li><a href="?q=admin/people/create"><i class="icon-plus"></i> Add User</a></li>
					    <li><a href="?q=admin/config/people/accounts"><i class="icon-cogs"></i> Account Settings</a></li>
					    <li><a href="?q=admin/people/permissions"><i class="icon-legal"></i> Permissions</a></li>
					    <li><a href="?q=admin/people/permissions/roles"><i class="icon-group"></i> Roles</a></li>
					    <li><a href="?q=admin/people/ip-blocking"><i class="icon-thumbs-down"></i> IP Blocking</a></li>
				    </ul>
				  </li>
				  
				  <li class="divider-vertical"></li>
				  
				  <li class="dropdown">
				    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th"></i> Modules<b class="caret"></b></a>
				    <ul class="content-dropdown dropdown-menu">
					    <li><a href="?q=admin/modules"><i class="icon-list-ol"></i> List</a></li>
					    <li><a href="?q=admin/modules/uninstall"><i class="icon-minus-sign"></i> Un-install</a></li>
				    </ul>
				  </li>
				  
				  <li class="divider-vertical"></li>
				  
				  <li class="dropdown">
				    <a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Configuration<b class="caret"></b></a>
				    <ul class="content-dropdown dropdown-menu">
					    <li><a href="?q=admin/index"><i class="icon-tasks"></i> Administration Page</a></li>
					    <li><a href="?q=admin/config/development/performance"><i class="icon-dashboard"></i> Performance</a></li>
					    <li><a href="?q=admin/config/development/logging"><i class="icon-align-justify"></i> Error Logging</a></li>
					    <li><a href="?q=admin/config/regional/settings"><i class="icon-globe"></i> Regional Settings</a></li>
					    <li><a href="?q=admin/config/regional/date-time"><i class="icon-time"></i> Date and Time</a></li>
					    <li><a href="?q=admin/config/system/site-information"><i class="icon-wrench"></i> Site Configuration</a></li>
					    <li><a href="?q=admin/config/search/settings"><i class="icon-search"></i> Search Settings</a></li>
					    <li><a href="?q=admin/config/search/path"><i class="icon-link"></i> URL Aliases</a></li>
				    </ul>
				  </li>
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