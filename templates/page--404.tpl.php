<?php echo render($admin_navbar); ?>
<section id="wrapper" class="container">
  <?php include('includes/page-head.php'); ?>
  <?php if ($page['menu']): ?>
    <?php echo render($page['menu']); ?>
    <?php echo $mobile_select_menu; ?>
  <?php endif; ?>
  <section class="row-fluid" id="main" role="document">
    <article class="container" id="main-content" role="article">
      <?php include('includes/page-title.php'); ?>
      <?php include('includes/page-utility.php'); ?>
      <h1><?php print t('Oops! Looks like a 404. :('); ?></h1>
      <?php echo render($page['content']); ?>
    </article>
  </section>
</section>