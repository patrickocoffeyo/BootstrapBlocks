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
 * Bootstrapping Main Menu
 */
function BaseBuildingBlocks_menu_tree__main_menu($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
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
function BaseBuildingBlocks_menu_local_task($variables) {

  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  $classes = array('btn');

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));

    $classes[] = 'active';
  }

  // Render child tasks if available.
  $children = '';
  if (element_children($variables['element'])) {
    $link['localized_options']['attributes']['class'][] = 'dropdown-toggle';
    $classes[] = 'dropdown';

    $children = drupal_render_children($variables['element']);
    $children = '<ul class="secondary-tabs dropdown-menu">' . $children . "</ul>";
  }

  return '<li class="' . implode(' ', $classes) . '">' . l($link_text, $link['href'], $link['localized_options']) . $children . "</li>\n";
}

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
 * Bootstrapping the messages
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

