<?php

/**
 * Implimenting hook_preprocess_table()
 * Bootstrapping Tables
 */
function BootstrapBlocks_preprocess_table(&$variables) {
  $variables['attributes']['class'] = array();
  $variables['attributes']['class'][] = 'table';
  $variables['attributes']['class'][] = 'table-striped';
  $variables['attributes']['class'][] = 'table-bordered';
}

/**
 * Implementing template_preprocess_views_view_table().
 * Bootstrapping Views Tables
 */
function BootstrapBlocks_preprocess_views_view_table(&$variables) {
  $variables['classes_array'][] = 'table';
}

/**
 * Implementing template_preprocess_views_view_grid().
 * Bootstrapping Views Grids
 */
function BootstrapBlocks_preprocess_views_view_grid(&$variables) {
  $variables['class'] .= ' table';
}
