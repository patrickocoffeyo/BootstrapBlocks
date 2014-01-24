<?php

include('lib/template-functions.php');
/**
 * Implimenting hook_process_page()
 * Allows you to use node-type based page templates.
 */
function BootstrapBlocks_preprocess_page(&$vars) {
  global $user;
  //Allows you to use node-type, and node ID base page templates
  //Adds custom 404 error page template
  if (!empty($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->vid;
  } 
  elseif (drupal_get_http_header('status')) {
    $vars['theme_hook_suggestions'][] = 'page__404';
  }
}

/**
 * Implimenting hook_css_alter()
 * Turning off some system.css files
 */
function BootstrapBlocks_css_alter(&$css) {
  // Turn off some styles from the system module
  unset($css[drupal_get_path('module', 'book') . '/book.css']);
  unset($css[drupal_get_path('module', 'comment') . '/comment.css']);
  unset($css[drupal_get_path('module', 'dblog') . '/dblog.css']);
  unset($css[drupal_get_path('module', 'file') . '/file.css']);
  unset($css[drupal_get_path('module', 'filter') . '/filter.css']);
  unset($css[drupal_get_path('module', 'forum') . '/forum.css']);
  unset($css[drupal_get_path('module', 'help') . '/help.css']);
  unset($css[drupal_get_path('module', 'menu') . '/menu.css']);
  unset($css[drupal_get_path('module', 'node') . '/node.css']);
  unset($css[drupal_get_path('module', 'openid') . '/openid.css']);
  unset($css[drupal_get_path('module', 'poll') . '/poll.css']);
  unset($css[drupal_get_path('module', 'search') . '/search.css']);
  unset($css[drupal_get_path('module', 'statistics') . '/statistics.css']);
  unset($css[drupal_get_path('module', 'syslog') . '/syslog.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.maintenance.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.admin.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.css']);
  unset($css[drupal_get_path('module', 'taxonomy') . '/taxonomy.css']);
  unset($css[drupal_get_path('module', 'tracker') . '/tracker.css']);
  unset($css[drupal_get_path('module', 'update') . '/update.css']);
  unset($css[drupal_get_path('module', 'user') . '/user.css']);
  unset($css[drupal_get_path('module', 'user') . '/user.css']);
}


/**
 * Implimenting hook_html_head_alter()
 */
function BootstrapBlocks_html_head_alter(&$vars) {
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
      'content' => 'width=device-width, initial-scale=1.0',
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
