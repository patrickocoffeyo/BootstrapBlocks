<?php
/**
 * Implimenting hook_menu_tree()
 * Bootstrapping Main Menu
 */
function BaseBuildingBlocks_menu_tree($vars) {
  return '<ul class="nav nav-pills">' . $vars['tree'] . '</ul>';
}

/**
 * Implimenting hook_menu_tree()
 * Adding active class to active LIs
 */
function BaseBuildingBlocks_preprocess_menu_link(&$vars) {
  if ($vars['element']['#href'] == $_GET['q'] || (drupal_is_front_page() && $vars['element']['#href'] === '<front>')) {
    $vars['element']['#attributes']['class'][] = 'active';
  }
}

/**
 * Implimenting hook_menu_local_tasks()
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
 * Return the top level Management Menu
 * @param $menu_name
 *   The name of the menu structure you would like to return
 * @return
 *   An array of top-level menu links that belong to the passed in $menu_name
 */
function BaseBuildingBlocks_get_menu($menu_name, $depth = 1, $sort = FALSE) {
  if (isset($menu_name)) {
    $query = db_select('menu_links', 'links');
    $query->addField('links', 'link_title', 'link_title');
    $query->addField('links', 'link_path', 'link_path');
    $query->addField('links', 'has_children', 'has_children');
    $query->addField('links', 'mlid', 'mlid');
    $query->addField('links', 'depth', 'depth');
    $query->condition('links.menu_name', $menu_name);
    $query->condition('links.depth', $depth);
    
    //If $sort = true, sort by weight
    if (isset($sort)) {
      $query->orderBy('links.weight', 'ASC');
    }
    
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
    $query = db_select('menu_links', 'links');
    $query->addField('links', 'link_title', 'link_title');
    $query->addField('links', 'link_path', 'link_path');
    $query->addField('links', 'has_children', 'has_children');
    $query->addField('links', 'mlid', 'mlid');
    $query->addField('links', 'depth', 'depth');
    $query->condition('links.plid', $plid);
    $results = $query->execute()->fetchAll();
  }
  else {
    $results = NULL;
  }
  
  return $results;
}

/**
 * Builds a select list menu from the passed in menu name
 *
 * NOTE
 * This menu only returns sub-menus to the 3rd level (grandchildren).
 * Anything longer gets annoying as select lists on mobile devices.
 *
 * @param $menu_name
 *   The name of the menu you would like to build a navbar from
 * @return
 *   The dom structure for a select menu from the passed in menu name
 */
function BaseBuildingBlocks_build_select_menu($menu_name, $depth = 1) {
   if (isset($menu_name)) {
    //go grab the menu
    $items = BaseBuildingBlocks_get_menu($menu_name, $depth);
    
    //Build an array of menu items
    $menu = array();
    foreach ($items as $item) {
      $menu[url($item->link_path)] = $item->link_title;
      
      //If this item has children, go grab the first level of them
      if ($item->has_children) {
        $children = BaseBuildingBlocks_get_children($item->mlid);
      
        foreach ($children as $child) {
          $menu[url($child->link_path)] = '- '.$child->link_title;
        }
        
        //If this child has children, go grab them
        if ($child->has_children) {
          $grandchildren = BaseBuildingBlocks_get_children($child->mlid);
          
          foreach ($grandchildren as $grandchild) {
            $menu[url($grandchild->link_path)] = '-- '.$grandchild->link_title;
          }
        }
      }
    }

    //Use the form api to build a select list from the data we constructed
    $form = drupal_get_form('BaseBuildingBlocks_select_menu_form', $menu);
    return $form;
  }
}

/**
 * Implimenting hook_form
 * Form for the select list menu
 * @param $items
 *   An array of menu items in which the key is the link path and the value is the link title
 */
function BaseBuildingBlocks_select_menu_form($form, &$form_state, $menu) {
   drupal_add_js('jQuery(document).ready(function () { jQuery(".mobile-select-menu select").change(function() {
      window.location = $(this).find("option:selected").val();
  });});', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));
 
  
  $form['#attributes'] = array(
    'class' => array('mobile-select-menu'),
  );

  $form['select'] = array(
    '#type' => 'select',
    '#options' => $menu
  );
  return $form;
}

/**
 * Builds a navbar for any passed in menu.
 *
 * NOTE
 * Does NOT include surrounding ul and classes, ONLY a collection of <li>s. 
 * This is so we can wrap it in menu pill classes, or navbar dom, whatever we need.
 *
 * @param $menu_name
 *   The name of the menu you would like to build from
 * @param $depth
 *   the depth of the menu to return
 * @param $exclude
 *   Array of strings containing the names of items that you want to exclude from the return
 * @param $sort
 *   Sort by weight?
 * @return
 *   The dom structure for a menu from the passed in menu name
 **/
function BaseBuildingBlocks_build_menu($menu_name, $depth = 1, $exclude = array(), $sort = FALSE) {
  
  if (isset($menu_name)) {
  
  //Load the menu
  $items = BaseBuildingBlocks_get_menu($menu_name, $depth, $sort);
   $output = '';
    foreach ($items as $item) {
      //If the link has been excluded, don't do anything
      if (in_array($item->link_title, $exclude)) {}
      //If the item has children, add 'em
      elseif ($item->has_children == 1) {
        $output .= '<li class="dropdown"><a href="#content-dropdown" class="dropdown-toggle" data-toggle="dropdown">'.BaseBuildingBlocks_get_link_icon($item->link_title). $item->link_title . '<b class="caret"></b></a><ul class="content-dropdown dropdown-menu">';
        foreach (BaseBuildingBlocks_get_children($item->mlid) as $child) {
          $output .= '<li>'.l(t('!icon !title', array('!icon' =>  BaseBuildingBlocks_get_link_icon($child->link_title), '!title' => $child->link_title)), $child->link_path, array('html' => TRUE)).'</li>';
        }
        $output .= '</ul></li>';
        } 
        else {
          $output .= '<li>'.l(t('!icon !title', array('!icon' =>  BaseBuildingBlocks_get_link_icon($item->link_title), '!title' => $item->link_title)), $item->link_path, array('html' => TRUE)).'</li>';
      }
    }
  }
  else {
    $output = NULL;
  }
  return $output;
}

/**
 * Builds a navbar from the passed in menu name
 *
 * @param $menu_name
 *   The name of the menu you would like to build a navbar from
 * @param $depth
 *   the depth of the menu to return
 * @param $classes
 *   Classes you may want to add to your navbar, like inverse, or navbar-fixed-top
 * @param $exclude
 *   Array of strings containing the names of items that you want to exclude from the return
 */
function BaseBuildingBlocks_build_navbar($menu_name, $depth = 1, $classes = NULL, $exclude = array()) {
  return '<div class="navbar '.$classes.'">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><i class="icon-reorder"></i></a>
        <div class="nav-collapse">
          <ul class="nav">
              '.BaseBuildingBlocks_build_menu($menu_name, $depth, $exclude).'
          </ul>
        </div>
      </div>
    </div>
  </div>';
}

/**
 * Builds an administration Menu
 *
 * @param $menu_name
 *   The name of the menu you would like to build a navbar from
 * @param $depth
 *   the depth of the menu to return
 * @param $exclude
 *   Array of strings containing the names of items that you want to exclude from the return
 */
function BaseBuildingBlocks_build_admin_navbar() {
  $exclude = array('Dashboard', 'Help', 'Tasks');
  return '<div class="navbar navbar-fixed-top inverse">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><i class="icon-reorder"></i></a>
        <a class="brand" href="/"><i class="icon-home"></i></a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="divider-vertical"></li>
              '.BaseBuildingBlocks_build_menu('management', 2, $exclude, TRUE).'
          </ul>
        </div>
      </div>
    </div>
  </div>';
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
