<?php
/**
 * @file
 * Modifies menu markup
 */

/**
 * Implimenting hook_menu_tree()
 * Bootstrapping Main Menu
 */
function BootstrapBlocks_menu_tree($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
}

/**
 * Implimenting hook_menu_tree()
 * Adding active class to active LIs
 */
function BootstrapBlocks_preprocess_menu_link(&$vars) {
  if ($vars['element']['#href'] == $_GET['q'] || (drupal_is_front_page() && $vars['element']['#href'] === '<front>')) {
    $vars['element']['#attributes']['class'][] = 'active';
  }
}

/**
 * Implimenting hook_menu_local_tasks()
 * Bootstrapping Tabs 
 */
function BootstrapBlocks_menu_local_tasks(&$vars) {
  $output = '';

  if (!empty($vars['primary'])) {
    $vars['primary']['#prefix'] = '<ul class="nav nav-tabs">';
    $vars['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['primary']);
  }

  if (!empty($vars['secondary'])) {
    $vars['secondary']['#prefix'] = '<ul class="nav nav-pills">';
    $vars['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}
