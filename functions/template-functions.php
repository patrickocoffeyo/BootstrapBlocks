<?php
/**
 * Button to bootstrap
 */
function BaseBuildingBlocks_button_class($text) {
  switch ($text) {
    case 'Save':
      return 'btn-primary';
    case 'Create':
      return 'btn-primary';
    case 'Submit':
      return 'btn-primary';
    case 'Export':
      return 'btn-primary';
    case 'Import': 
      return 'btn-primary';
    case 'Rebuild': 
      return 'btn-primary';
    case 'Add':
      return 'btn-info';
    case 'Update':
      return 'btn-info';
    case 'Restore':
      return 'btn-success';
    case 'Confirm':
      return 'btn-success';
    case 'Submit':
      return 'btn-success';
    case 'Delete':
      return 'btn-danger';
    case 'Remove':
      return 'btn-danger';
    case 'Filter':
      return 'btn-inverse';
  }
}

/**
 * Menu Item to Icon
 */
function BaseBuildingBlocks_link_to_icon($text) {
  switch ($text) {
    case 'Content':
      return 'icon-file';
    case 'Content types':
      return 'icon-paste';
    case 'Comments':
      return 'icon-comments';
    case 'Structure':
      return 'icon-sitemap';
    case 'Blocks':
      return 'icon-th-large';
    case 'Content Types':
      return 'icon-paste';
    case 'Taxonomy':
      return 'icon-tag';
    case 'Views':
      return 'icon-table';
    case 'Appearance':
      return 'icon-eye-open';
    case 'Add user':
      return 'icon-plus';
    case 'Permissions':
      return 'icon-legal';
    case 'People':
      return 'icon-group';
    case 'Configuration':
      return 'icon-cog';
    case 'Content authoring':
      return 'icon-copy';
    case 'Development':
      return 'icon-wrench';
    case 'Media':
      return 'icon-picture';
    case 'Regional and language':
      return 'icon-globe';
    case 'Search and metadata':
      return 'icon-search';
    case 'System':
      return 'icon-cogs';
    case 'User interface':
      return 'icon-columns';
    case 'Web services':
      return 'icon-list-alt';
    case 'Workflow':
      return 'icon-check-empty';
    case 'Dashboard':
      return 'icon-dashboard';
    case 'Help':
      return 'icon-question-sign';
    case 'Index':
      return 'icon-list-ul';
    case 'Modules':
      return 'icon-th-large';
    case 'Reports':
      return 'icon-bar-chart';
    case 'Field list':
      return 'icon-list-alt';
    case 'Recent log messages':
      return 'icon-list-alt';
    case 'Status report':
      return 'icon-bar-chart';
    case "Top 'access denied' errors":
      return 'icon-remove-sign';
    case "Top 'page not found' errors":
      return 'icon-paste';
    case 'Details':
      return 'icon-eye-open';
    case 'Top search phrases':
      return 'icon-search';
    case 'Fields used in views':
      return 'icon-list-alt';
    case 'Menus':
      return 'icon-book';
      
  }
  return 'icon-group';
}

/**
 * Returns the top level Management Menu
 */
function BaseBuildingBlocks_get_management_menu() {
  return db_query('SELECT link_title, link_path, has_children, weight, mlid FROM {menu_links} WHERE plid = 1 ORDER BY weight')->fetchAll();
}
/**
 * Returns children of a menu item
 */
function BaseBuildingBlocks_get_children($plid) {
  $items = db_query('SELECT link_title, link_path, has_children, mlid FROM {menu_links} WHERE plid = :plid', array(':plid' => $plid))->fetchAll();
  
  return $items;
}

/*
 * Add jquery version 1.8.0
 * Used for easily printing in html.tpl.php
 * 
*/
function BaseBuildingBlocks_scripts() {
  global $base_url, $theme_path; 
  $path = $base_url . '/' . $theme_path;
  $js = '<script type="text/javascript" src="' . $path . '/js/vendor/jquery-1.8.0.min.js"></script>' . "\n";
  $js .= '<script>var jq8 = jQuery.noConflict();</script>' . "\n";
  return $js;
}

/*
 * Add touch icons
 * Used for easily printing in html.tpl.php
 * 
*/
function BaseBuildingBlocks_touch_icons() {
  global $base_url, $theme_path; 
  $path = $base_url . '/' . $theme_path . "/img/icons/mobile/";
  $output = '<link rel="apple-touch-icon-precomposed" href="' . $path . 'touch-icon-iphone.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" href="' . $path . 'touch-icon-iphone.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $path . 'touch-icon-ipad.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $path . 'touch-icon-iphone4.png" />' . "\n";
  $output .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $path . 'touch-icon-ipad3.png" />' . "\n";
  return $output;
}

