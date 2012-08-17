<?php include 'includes/page-admin-menu.php'; ?>
<section id="wrapper" class="container">
  <?php include 'includes/page-header.php'; ?>
  <?php include 'includes/page-menu-main.php'; ?>
  <section class="row-fluid" id="main" role="document">
    <article class="span12" id="main-content" role="article">
      <?php include 'includes/page-tabs-messages.php'; ?>
      <?php include 'includes/page-title.php'; ?>
      <?php include 'includes/page-action-links.php'; ?>
      <?php print render($page['content']); ?>
    </article>	
  </section>
  <?php include 'includes/page-footer.php'; ?>
</section>