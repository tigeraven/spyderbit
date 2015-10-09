<?php
/**
 * @file
 * Style stting.css.
 *
 * Filename:     style_stting.css
 * Website:      http://www.ordasoft.com
 * Description:  system styles
 * Author:       ordasoft dev team ordasoft.com.
 */

global $base_root, $base_path;
?>
<style type="text/css">
body {
  <?php
    if (isset($layout_pattern) && $layout_pattern != "") :
      print ("background-image: url(" . $base_root . $base_path . path_to_theme() . "/images/" . $layout_pattern . ".png);");
    endif;
  ?>
  background-repeat: repeat;
  font-family: <?php print $body_font; ?>;
}
a {
  font-family: <?php print $body_links_font; ?>;
  text-decoration: <?php print (($b_decor == 1) ? 'underline' : 'none'); ?>;
}
a:hover {
    text-decoration: <?php print (($b_decor_hover == 1) ? 'underline' : 'none'); ?>!important;
}
.mainMenu li a {
  font-family: <?php print $main_menu_font; ?>;
  text-decoration: <?php print (($m_decor == 1) ? 'underline' : 'none'); ?>;
}
.mainMenu li a:hover {
    text-decoration: <?php print (($m_decor_hover == 1) ? 'underline' : 'none'); ?>;
}
#footer a {
  font-family: <?php print $footer_links_font; ?>;
  text-decoration: <?php print (($f_decor == 1) ? 'underline' : 'none'); ?>;
}
#footer a:hover {
    text-decoration: <?php print (($f_decor_hover == 1) ? 'underline' : 'none'); ?>;
}

h1 {font-family: <?php print $h1_font; ?>;}
h2 {font-family: <?php print $h2_font; ?>;}
h3 {font-family: <?php print $h3_font; ?>;}
h4 {font-family: <?php print $h4_font; ?>;}
h5 {font-family: <?php print $h5_font; ?>;}
h6 {font-family: <?php print $h6_font; ?>;}
</style>
