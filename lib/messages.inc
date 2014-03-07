<?php
/**
 * @file
 * Modifies message markup
 */

/**
 * Bootstrapping the messages
 */
function BootstrapBlocks_get_status($status) {
  switch($status) {
    case 'status':
      return 'alert-success';
      break;
    case 'warning':
      return 'alert-warning';
      break;
    case 'error':
      return 'alert-danger';
      break;
  }
  return NULL;
}


/**
 * Implimenting hook_status_messages()
 */
function BootstrapBlocks_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= '<div class="alert ' . BootstrapBlocks_get_status($type) . ' alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

    foreach ($messages as $message) {
      $output .= $message . '<br/>';
    }
    $output .= '</div>';
  }
  return $output;
}
