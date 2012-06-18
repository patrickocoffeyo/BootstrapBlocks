<section id="wrapper">
	<header id="header">
		<?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
        <img id="header-logo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
    <?php endif; ?>
		<?php if ($site_name): ?>
			<a href="<?php print $front_page; ?>"><h1 class="header-title"><?php print $site_name; ?></h1></a>
		<?php endif; ?>
		<?php if ($site_slogan): ?>
			<h2 class="header_slogan"><?php print $site_slogan; ?></h2>
		<?php endif; ?>
	</header>
	<?php if ($page['menu']): ?>
		<nav id="navigation">
			<?php print render($page['menu']); ?>
		</nav>
	<?php endif; ?>
	<section id="main">
		<article id="main-content">
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
			<div id="sidebar">
				<?php print render($page['sidebar']); ?>
			</div>
		<?php endif; ?>
	</section>
	<?php if ($page['footer']): ?>
		<footer id="footer">
			<?php print render($page['footer']); ?>
		</footer>
	<?php endif; ?>
</section>