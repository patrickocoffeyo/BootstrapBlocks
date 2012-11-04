<?php
/**
 * Return the top level Management Menu
 * @param $menu_name
 *   The name of the menu structure you would like to return
 * @return
 *   An array of top-level menu links that belong to the passed in $menu_name
 */
function BaseBuildingBlocks_get_menu($menu_name, $depth = 1) {
  if (isset($menu_name)) {
    $query = db_select('menu_links', 'links');
    $query->addField('links', 'link_title', 'link_title');
    $query->addField('links', 'link_path', 'link_path');
    $query->addField('links', 'has_children', 'has_children');
    $query->addField('links', 'mlid', 'mlid');
    $query->condition('links.menu_name', $menu_name);
    $query->condition('links.depth', $depth);
    $query->orderBy('links.weight', 'ASC');
    $results = $query->execute()->fetchAll();
  }
  else {
    $results = NULL;
  }
  return $results;
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
  
    $items = BaseBuildingBlocks_get_menu($menu_name, 2);
    
    $output = '';
    foreach ($items as $item) {
      if ($item->link_title == 'Help' || $item->link_title == 'Tasks' || $item->link_title == 'Dashboard') {}
      elseif ($item->has_children == 1) {
        $output .= '<li class="dropdown"><a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown">'.BaseBuildingBlocks_get_link_icon($item->link_title). $item->link_title . '<b class="caret"></b></a><ul class="content-dropdown dropdown-menu">';
        foreach (BaseBuildingBlocks_get_children($item->mlid) as $child) {
          $output .= '<li><a href="'.$base_url.'/' . $child->link_path .'">' . BaseBuildingBlocks_get_link_icon($child->link_title) . $child->link_title . '</a></li>';
        }
        $output .= '</ul></li>';
        } 
        else {
          $output .= '<li><a href="'.$base_url.'/' . $item->link_path . '">' . BaseBuildingBlocks_get_link_icon($item->link_title) . $item->link_title . '</a></li>';
      }
    }
  }
  else {
    $output = NULL;
  }
  return $output;
}

/**
 * Generates HTML for a Font Awesome icon
 * @param $icon
 *   Name of icon to return, for example icon-sign-blank
 * @return
 *   HTML for the Font Awesome icon from the passed-in $icon
 */
function BaseBuildingBlocks_get_icon($icon) {
  $icon_html = '<i class="'.$icon.'"></i> ';
  return $icon_html;
}

/**
 * Returns html icon for an menu link
 * @param $link_title
 *   Title of the link to grab the icon for
 * @return
 *   HTML for the Font Awesome icon from the passed-in $link_title
 * 
 * Makes use of theme_get_setting('menu_icons');
 * Makes use of list_extract_allowed_values() from the field_list module
 */
function BaseBuildingBlocks_get_link_icon($link_title) {
  $menu_icons = theme_get_setting('menu_icons');
  $array = list_extract_allowed_values($menu_icons, 'list_text', FALSE);
  
  if (isset($array[$link_title])) {
    $icon = BaseBuildingBlocks_get_icon($array[$link_title]);
  } 
  else {
    $icon = BaseBuildingBlocks_get_icon('icon-sign-blank');
  }

  return $icon;
}
