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
 * Implimenting hook_js_alter
 * Adds Jquery 1.7 instead of Drupal Default.
 */
function BaseBuildingBlocks_js_alter(&$javascript) {
  $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'BaseBuildingBlocks') . '/js/vendor/jquery-1.7.2.min.js';
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
 */
function BaseBuildingBlocks_html_head_alter(&$vars) {
  //Change the meta content type to HTML5 content type
  $vars['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
  
  //Unsetting the content generator. (Why keep it?)
  unset($vars['system_meta_generator']);
  
  //Adding the mobile viewport
	$vars['viewport'] = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
			'name' => 'viewport',
			'content' => 'width=device-width',
		)
	);
	
	//If in IE, and chrome frame is available, and theme option says you can use it, USE IT!
	$vars['chrome_frame_compatability'] = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
			'http-equiv' => 'X-UA-Compatible',
			'content' => 'IE=edge,chrome=1',
		),
		'#access' => theme_get_setting('chrome_frame_on_off'),
	);

}


/**
 * Implimenting hook_menu_tree
 * Bootstrapping Main Menu
 */
function BaseBuildingBlocks_menu_tree($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
}


/**
 * Implimenting hook_menu_tree
 * Adding active class to active LIs
 */
function BaseBuildingBlocks_preprocess_menu_link(&$variables) {
  if ($variables['element']['#href'] == $_GET['q'] || (drupal_is_front_page() && $variables['element']['#href'] === '<front>')) {
    $variables['element']['#attributes']['class'][] = 'active';
  }
}


/**
 * Implimenting hook_menu_local_tasks
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
 * Implimenting hook_preprocess_button
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
 * Implimenting hook_preprocess_image_button
 * Bootstrapping Image Button
 */
function BaseBuildingBlocks_preprocess_image_button(&$vars) {
  $vars['element']['#attributes']['class'][] = 'btn';
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


/**
 * Implimenting hook_status_messages()
 */
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

