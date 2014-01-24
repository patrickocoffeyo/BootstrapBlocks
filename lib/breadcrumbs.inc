<?php
/**
 * @file
 * Modifies breadcrumb markup
 */

/**
 * Implimenting hook_breadcrumb()
 */
function BootstrapBlocks_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $output = theme('item_list', array(
      'attributes' => array(
        'class' => array('breadcrumb'),
      ),
      'items' => $breadcrumb,
      'type' => 'ol',
    ));

    return $output;
  }
}
