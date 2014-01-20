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
      <th><?php print t('Block'); ?></th>
      <th><?php print t('Region'); ?></th>
      <th><?php print t('Weight'); ?></th>
      <th colspan="2"><?php print t('Operations'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php $row = 0; ?>
    <?php foreach ($block_regions as $region => $title): ?>
      <tr class="region-title region-title-<?php print $region?>">
        <td colspan="5"><?php print $title; ?></td>
      </tr>
      <tr class="region-message region-<?php print $region?>-message <?php print empty($block_listing[$region]) ? 'region-empty' : 'region-populated'; ?>">
        <td colspan="5"><em><?php print t('No blocks in this region'); ?></em></td>
      </tr>
      <?php foreach ($block_listing[$region] as $delta => $data): ?>
      <tr class="draggable <?php print $row % 2 == 0 ? 'odd' : 'even'; ?><?php print $data->row_class ? ' ' . $data->row_class : ''; ?>">
        <td class="block"><?php print $data->block_title; ?></td>
        <td><?php print $data->region_select; ?></td>
        <td><?php print $data->weight_select; ?></td>
        <td><?php print $data->configure_link; ?></td>
        <td><?php print $data->delete_link; ?></td>
      </tr>
      <?php $row++; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </tbody>
</table>

<?php print $form_submit; ?>

