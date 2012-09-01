<?php include 'includes/page-admin-menu.php'; ?>
<section id="wrapper" class="container">
  <?php include 'includes/page-header.php'; ?>
  <section class="row-fluid" id="main" role="document">
    <article class="span9" id="main-content" role="article">
      <h1><?php print t("Oops! Looks like a 404. :("); ?></h1>
      <?php print render($page['content']); ?>
    </article>
  </section>
</section>