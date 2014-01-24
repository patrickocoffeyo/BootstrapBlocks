<?php if ($breadcrumb): ?>
  <?php echo $breadcrumb; ?>
<?php endif; ?>

<?php if ($tabs): ?>
  <?php echo render($tabs); ?>
<?php endif; ?>

<?php if ($messages): ?>
  <?php echo $messages; ?>
<?php endif; ?>

<?php if ($action_links): ?>
  <ul class="action-links">
    <?php echo render($action_links); ?>
  </ul>
<?php endif; ?>
