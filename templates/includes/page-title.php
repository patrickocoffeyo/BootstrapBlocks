<?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2 id="title">
      <?php print $title; ?>
    </h2>
  <?php endif; ?>
<?php print render($title_suffix); ?>
