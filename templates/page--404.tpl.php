<?php if ($page['navbar']): ?>
  <?php echo render($page['navbar']); ?>
<?php endif; ?>
<section id="wrapper" class="container">
  <?php include('includes/page-head.php'); ?>
  <?php if ($page['menu']): ?>
    <?php echo render($page['menu']); ?>
  <?php endif; ?>
  <section class="row-fluid" id="main" role="document">
    <article class="span9" id="main-content" role="article">
      <?php include('includes/page-title.php'); ?>
      <?php include('includes/page-utility.php'); ?>
      <?php echo render($page['content']); ?>
    </article>
    <?php if ($page['sidebar_right']): ?>
      <?php echo render($page['sidebar_right']); ?>
    <?php endif; ?>
  </section>
  <?php if ($page['footer']): ?>
    <?php echo render($page['footer']); ?>
  <?php endif; ?>
</section>
