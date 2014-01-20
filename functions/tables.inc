<?php
/**
 * @file
 * Adds Bootstrap classes to tables, and views grids
 */

/**
 * Implimenting hook_preprocess_table()
 * Bootstrapping Tables
 */
function BootstrapBlocks_preprocess_table(&$variables) {
  $variables['attributes']['class'] = array();
  $variables['attributes']['class'][] = 'table';
  $variables['attributes']['class'][] = 'table-striped';
  $variables['attributes']['class'][] = 'table-bordered';

  //Remove classes from header
  if (!empty($variables['header'])) {
    $variables['header'] = array_map(function($row) {
      if (!empty($row['class'])) {
        if (is_array($row['class'])) {
          $checkbox = array_search('checkbox', $row['class']);
          if ($checkbox) { unset($row['class'][$checkbox]); }
        }
        else {
          $row['class'] = str_replace('checkbox', '', $row['class']);
        }
      }

      return $row;
    }, $variables['header']);
  }

  //Remove classes from rows
  if (!empty($variables['rows'])) {
    $variables['rows'] = array_map(function($row) {
      if (isset($row[0]['class'])) {
        $row[0]['class'] = str_replace('checkbox', '', $row[0]['class']);
      }

      return $row;
    }, $variables['rows']);
  }
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
