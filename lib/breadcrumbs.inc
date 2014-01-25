<?php
/**
 * @file
 * Overrides breadcrumb markup
 */

/**
 * Overriding theme_breadcrumb()
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
