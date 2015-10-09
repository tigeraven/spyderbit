<?php
/**
 * @file
 * Template.php.
 *
 * Filename:     template.php
 * Website:      http://www.ordasoft.com
 * Description:  template
 * Author:       ordasoft dev team ordasoft.com.
 */

/**
 * Override or insert variables into the page template.
 */
function os_delta_preprocess_page(&$vars) {

  os_delta_modules_check($vars);

  os_delta_library_check($vars);

  if (module_exists('color')) {
    _color_page_alter($vars);
  }

  $gmass = array(
    "twitter",
    "facebook",
    "flickr",
    "linkedin",
    "youtube",
    "pinterest",
    "google",
    "dribbble",
    "vimeo",
    "instagram",
    "vk",
    "video_id",
    "show_hide_video",
    "show_hide_icon",
    "show_hide_copyright",
    "copyright_url",
    "copyright_developedby",
  );

  foreach ($gmass as $value) {
    $vars[$value] = check_plain(theme_get_setting(($value), 'os_delta'));
  }
}

/**
 * Modules check.
 */
function os_delta_modules_check(&$vars) {

  $libmass = array(
    "libraries" => "Libraries",
    "admin_menu" => "Admin menu",
    "advanced_help" => "Advanced help",
    "contact_form_blocks" => "Contact form blocks",
    "ctools" => "Ctools",
    "imageblock" => "Imageblock",
    "media" => "Media",
    "multiform" => "Multiform",
    "navigation404" => "Page 404",
    "panels" => "Panels",
    "views" => "Views",
    "wysiwyg" => "Wysiwyg",
  );
  $no_modules = '';
  foreach ($libmass as $key => $value) {
    if (!module_exists($key)) {
      // No needed_module means we need to add it, let everyone know.
      if ($no_modules) {
        $no_modules .= ', ';
      }
      $no_modules .= $value;
    }
  }
  if ($no_modules) {
    drupal_set_message(t("Theme requires that module %f installed. Please read Doc.", array('%f' => $no_modules))
                           . "<h6>" . t('warning generated in file: %f', array('%f' => __FILE__)) . "</h6>", 'warning');
  }

}

/**
 * Library check.
 */
function os_delta_library_check(&$vars) {
  global $base_root, $base_path;
  $libmass = array(
    "/sites/all/libraries/jquery.fancybox.js",
    "/sites/all/libraries/jquery.viewportchecker.js",
    "/sites/all/libraries/jquery.tubular.1.0.js",
  );
  foreach ($libmass as $key) {
    if (file_exists(DRUPAL_ROOT . $key)) {
      drupal_add_js($base_root . $base_path . $key);
    }
    else {
      drupal_set_message(t("Please install library %key More deatil in Doc.", array('%key' => $key)), 'warning');
    }
  }
  if (drupal_is_front_page()) {
    unset($vars['page']['content']['system_main']['default_message']);
  }

}

/**
 * Override or insert variables into the main menu.
 */
function os_delta_links__system_main_menu($vars) {
  $pid = variable_get('menu_main_links_source', 'main-menu');
  $tree = menu_tree($pid);
  return drupal_render($tree);
}

/**
 * Override or insert variables into the secondary_menu.
 */
function os_delta_links__system_secondary_menu(&$vars) {
  $pid = variable_get('menu_secondary_links_source', 'menu-secondary-menu');
  $tree = menu_tree($pid);
  return drupal_render($tree);
}

/**
 * Override or insert fields output node.
 */
function os_delta_get_field_value($vars, $node) {
  $icon = field_get_items('node', $node, $vars);
  $icon_show = field_view_value('node', $node, $vars, $icon[0]);
  return drupal_render($icon_show);
}

/**
 * Override or insert variables into the setting template.
 */
function os_delta_process_html(&$vars) {
  if (module_exists('color')) {
    _color_html_alter($vars);
  }

  $tmas = array(
    "b_decor",
    "m_decor",
    "f_decor",
    "b_decor_hover",
    "m_decor_hover",
    "f_decor_hover",
    "layout_pattern",
    "body_font",
    "main_menu_font",
    "body_links_font",
    "footer_links_font",
    "h1_font",
    "h2_font",
    "h3_font",
    "h4_font",
    "h5_font",
    "h6_font",
  );

  foreach ($tmas as $value) {
    $vars[$value] = theme_get_setting($value, 'os_delta');
  }
}
