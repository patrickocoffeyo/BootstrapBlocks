	<section id="wrapper" class="container">
	<section class="row-fluid" id="header">
		<?php if ($logo): ?>
			<div class="span1 header-logo">
			  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
			    <img id="header-logo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			  </a>
			</div>
		<?php endif; ?>
		
		<div class="span11 header-text">
			<?php if ($site_name): ?>
				<a href="<?php print $front_page; ?>"><h1 class="header-title"><?php print $site_name; ?></h1></a>
			<?php endif; ?>
			<?php if ($site_slogan): ?>
				<h2 class="header-slogan"><?php print $site_slogan; ?></h2>
			<?php endif; ?>
		</div>
	</section>
	
	<?php if ($page['menu']): ?>
		<nav class="row-fluid" id="navigation">
			<?php print render($page['menu']); ?>
		</nav>
	<?php endif; ?>
	
	<section class="row-fluid" id="main">
		<article class="span8" id="main-content">
			<?php if ($tabs): ?>
				<?php print render($tabs); ?>
			<?php endif; ?>
			<?php if ($messages): ?>
				<?php print $messages; ?>
			<?php endif; ?>
			<?php if ($title): ?><h2 class="main-content-title"><?php print $title; ?></h2><?php endif; ?>
			<?php if ($action_links): ?>
			  <ul class="action-links"><?php print render($action_links); ?></ul>
			<?php endif; ?>
			<?php print render($page['content']); ?>
		</article>	
		
		<?php if ($page['sidebar']): ?>
			<aside class="span4" id="sidebar">
				<?php print render($page['sidebar']); ?>
			</aside>
		<?php endif; ?>
	</section>
	
	<?php if ($page['footer']): ?>
		<div class="row-fluid">
			<section class="span12" id="footer">
				<?php print render($page['footer']); ?>
			</section>
		</div>
	<?php endif; ?>
</section>