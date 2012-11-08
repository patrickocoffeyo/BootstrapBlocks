<?php if ($page['help']): ?>
  <?php print render($page['help']); ?>
<?php endif; ?>

<?php if ($tabs): ?>
  <?php print render($tabs); ?>
<?php endif; ?>

<?php if ($messages): ?>
  <?php print $messages; ?>
<?php endif; ?>

<?php if ($action_links): ?>
  <ul class="action-links">
    <?php print render($action_links); ?>
  </ul>
<?php endif; ?>