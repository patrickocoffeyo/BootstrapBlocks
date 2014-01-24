<?php
  // Add table javascript.
  drupal_add_js('misc/tableheader.js');
  drupal_add_js(drupal_get_path('module', 'block') . '/block.js');
  foreach ($block_regions as $region => $title) {
    drupal_add_tabledrag('blocks', 'match', 'sibling', 'block-region-select', 'block-region-' . $region, NULL, FALSE);
    drupal_add_tabledrag('blocks', 'order', 'sibling', 'block-weight', 'block-weight-' . $region);
  }
?>
<table id="blocks" class="table table-striped table-bordered sticky-enabled">
  <thead>
    <tr>
      <th><?php echo t('Block'); ?></th>
      <th><?php echo t('Region'); ?></th>
      <th><?php echo t('Weight'); ?></th>
      <th colspan="2"><?php echo t('Operations'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $row = 0; ?>
    <?php foreach ($block_regions as $region => $title): ?>
      <tr class="region-title region-title-<?php echo $region?>">
        <td colspan="5"><?php echo $title; ?></td>
      </tr>
      <tr class="region-message region-<?php echo $region?>-message <?php echo empty($block_listing[$region]) ? 'region-empty' : 'region-populated'; ?>">
        <td colspan="5"><em><?php echo t('No blocks in this region'); ?></em></td>
      </tr>
      <?php foreach ($block_listing[$region] as $delta => $data): ?>
      <tr class="draggable <?php echo $row % 2 == 0 ? 'odd' : 'even'; ?><?php echo $data->row_class ? ' ' . $data->row_class : ''; ?>">
        <td class="block"><h4><?php echo $data->block_title; ?></h4></td>
        <td><?php echo $data->region_select; ?></td>
        <td><?php echo $data->weight_select; ?></td>
        <td><?php echo $data->configure_link; ?></td>
        <td><?php echo $data->delete_link; ?></td>
      </tr>
      <?php $row++; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo $form_submit; ?>

