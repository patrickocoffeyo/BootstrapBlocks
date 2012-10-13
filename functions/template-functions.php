<?php
/**
 * Button to bootstrap
 * @param
 *   Button text
 * @return
 *   The the btn-class to add the appropriate Bootstrap color
 * @todo
 *   Add theme settings so users can add custom button names and classes
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
 * @param
 *   Menu link text
 * @return
 *   The icon-class of the appropriate Font Awesome icon from the text passed in
 * @todo
 *   Add theme settings so users can add custom icons
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
 * Return the top level Management Menu
 * @param $menu_name
 *   The name of the menu structure you would like to return
 * @return
 *   An array of top-level menu links that belong to the passed in $menu_name
 */
function BaseBuildingBlocks_get_menu($menu_name) {
  if ($menu_name) {
    return db_query('SELECT link_title, link_path, has_children, weight, mlid FROM {menu_links} WHERE menu_name = :name AND depth = 2 ORDER BY weight', array(':name' => $menu_name))->fetchAll();
  }
  return NULL;
}
/**
 * Return children of a menu item
 * @param $plid
 *   The parent's link ID.
 * @return
 *   An array of menu links that are children of the passed in $plid
 */
function BaseBuildingBlocks_get_children($plid) {
  if ($plid) {
    return db_query('SELECT link_title, link_path, has_children, mlid FROM {menu_links} WHERE plid = :plid', array(':plid' => $plid))->fetchAll();
  }
  return NULL;
}

/**
 * Builds a navbar for any passed in menu
 * @param $menu_name
 *   The name of the menu you would like to build a navbar from
 * @return
 *   The dom structure for a navbar from the passed in menu name
 **/
function BaseBuildingBlocks_build_navbar($menu_name) {
  if ($menu_name) {
    global $user;
    global $base_url;
  
    $items = BaseBuildingBlocks_get_menu($menu_name);
    
    $output = '';
    foreach ($items as $item) {
      if ($item->link_title == 'Help' || $item->link_title == 'Tasks' || $item->link_title == 'Dashboard') {}
      elseif ($item->has_children == 1) {
        $output .= '<li class="dropdown"><a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown"><i class="' . BaseBuildingBlocks_link_to_icon($item->link_title) . '"></i>' . $item->link_title . '<b class="caret"></b></a><ul class="content-dropdown dropdown-menu">';
        foreach (BaseBuildingBlocks_get_children($item->mlid) as $child) {
          $output .= '<li><a href="'.$base_url.'/' . $child->link_path . '"><i class="' . BaseBuildingBlocks_link_to_icon($child->link_title) . '"></i> ' . $child->link_title . '</a></li>';
        }
        $output .= '</ul></li>';
        } 
        else {
          $output .= '<li><a href="'.$base_url.'/' . $item->link_path . '"><i class="' . BaseBuildingBlocks_link_to_icon($item->link_title) . '"></i> ' . $item->link_title . '</a></li>';
      }
    }
  }
  else {
    $output = NULL;
  }
  return $output;
}

/*
 * Return Header Scripts
 * @return
 *   Dom for scripts added. By default, adds jQuery 1.8 in no conflict mode
 */
function BaseBuildingBlocks_scripts() {
  global $base_url, $theme_path; 
  $path = $base_url . '/' . $theme_path;
  $js = '<script type="text/javascript" src="' . $path . '/js/vendor/jquery-1.8.2.min.js"></script>' . "\n";
  $js .= '<script>var jq8 = jQuery.noConflict();</script>' . "\n";
  return $js;
}

/*
 * Return Footer Scripts
 * @return
 *   Scripts added in the theme setting footer_scripts
 */
function BaseBuildingBlocks_footer_scripts() {
  if (theme_get_setting('footer_scripts')) {
    return '<script>'. theme_get_setting('footer_scripts') . '</script>';
  }
  return NULL;
}

/*
 * Return touch icons
 * @return
 *   Apple Touch Icons in all the right sizes.
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

/*
 * Return Author Link
 * @return
 *   Link tag for the Google+ author that owns the site
 */
function BaseBuildingBlocks_author() {
  if (theme_get_setting('author_id')) {
    return '<link rel="author" href="https://plus.google.com/'.theme_get_setting('author_id').'">';
  }
  return NULL;
}
