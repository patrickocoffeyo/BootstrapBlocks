<section id="wrapper" class="container">
  <?php include 'includes/page-header.php'; ?>
  <?php include 'includes/page-menu-main.php'; ?>
  
  <section class="row-fluid" id="main" role="document">
    <article class="span9" id="main-content" role="article">
      <?php if ($tabs): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      
      <?php if ($messages): ?>
        <?php print $messages; ?>
      <?php endif; ?>
      
      <?php if ($title): ?>
        <h2 class="main-content-title">
          <?php print $title; ?>
        </h2>
      <?php endif; ?>
      
      <?php if ($action_links): ?>
        <ul class="btn-group action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      
      <?php print render($page['content']); ?>
    </article>	
    
    <?php include 'includes/page-sidebar-left.php'; ?>
  </section>
  
  <?php include 'includes/page-footer.php'; ?>
</section>