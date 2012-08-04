<?php

/**
 * Implimenting hook_provess_page
 * Allows you to use node-type based page templates.
 */
function BaseBuildingBlocks_process_page(&$vars) {	
  if (!empty($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;	
  }
}

/**
 * Implimenting hook_css_alter
 * Turning off some system.css files
 */
function BaseBuildingBlocks_css_alter(&$css) {
  // Turn off some styles from the system module
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
}

/**
 * Implimenting hook_html_head_alter
 * Changing to html5 characterset, removing generator meta tag
 */
function BaseBuildingBlocks_html_head_alter(&$vars) {
  $vars['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  unset($vars['system_meta_generator']);
}

/**
 * Implimenting hook_menu_tree
 * Bootstrapping Main Menu
 */
function BaseBuildingBlocks_menu_tree($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
}

/**
 * Implimenting hook_preprocess_table
 * Bootstrapping Tables
 */
function BaseBuildingBlocks_preprocess_table(&$variables) {	
  $variables['attributes']['class'][] = 'table';
  $variables['attributes']['class'][] = 'table-striped';
  $variables['attributes']['class'][] = 'table-bordered';
  return;
}

/**
 * Bootstrapping Buttons
 */
function BaseBuildingBlocks_preprocess_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn';

  if (isset($vars['element']['#value'])) {
    $classes = array(
      //specifics
      t('Save and add') => 'info',
      t('Add another item') => 'info',
      t('Add effect') => 'primary',
      t('Add and configure') => 'primary',
      t('Update style') => 'primary',
      t('Download feature') => 'primary',

      //generals
      t('Save') => 'primary',
      t('Apply') => 'primary',
      t('Create') => 'primary',
      t('Confirm') => 'primary',
      t('Submit') => 'primary',
      t('Export') => 'primary',
      t('Import') => 'primary',
      t('Restore') => 'primary',
      t('Rebuild') => 'primary',
      t('Add') => 'info',
      t('Update') => 'info',
      t('Delete') => 'danger',
      t('Remove') => 'danger',
    );
    foreach ($classes as $search => $class) {
      if (strpos($vars['element']['#value'], $search) !== FALSE) {
        $vars['element']['#attributes']['class'][] = $class;
        break;
      }
    }
  }
}

/**
 * Bootstrapping Image Button
 */
function BaseBuildingBlocks_preprocess_image_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn';
}

/**
 * Bootstrapping Tabs 
 */
function BaseBuildingBlocks_menu_local_tasks(&$vars) {
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


/**
 * Bootstrapping the messages
 */
 function BaseBuildingBlocks_get_status($status) {
  if ($status == 'status') {
    return 'alert-success';
  } elseif ($status == 'warning') {
    return 'alert-block';
  } elseif ($status == 'error') {
    return 'alert-error';
  }
  
  return NULL;
}
function BaseBuildingBlocks_status_messages($variables) {
  $display = $variables['display'];
  $output = '';

  foreach (drupal_get_messages($display) as $type => $messages) { 	
    $output .= '<div class="messages alert '.BaseBuildingBlocks_get_status($type).'" data-alert="alert">';
    
    foreach ($messages as $message) {
	    $output .= $message.'<br>';
    }

    $output .= '</div>';   
  }

  return $output;
}

