<?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <div class="page-header">
      <h1><?php print $title; ?></h1>
    </div>
  <?php endif; ?>
<?php print render($title_suffix); ?>
