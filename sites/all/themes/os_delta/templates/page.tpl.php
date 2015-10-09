<?php
/**
 * @file
 * Delta's theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template normally located in the
 * modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/Delta.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['featured']: Items for the featured region.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['triptych_first']: Items for the first triptych.
 * - $page['triptych_middle']: Items for the middle triptych.
 * - $page['triptych_last']: Items for the last triptych.
 * - $page['footer_firstcolumn']: Items for the first footer column.
 * - $page['footer_secondcolumn']: Items for the second footer column.
 * - $page['footer_thirdcolumn']: Items for the third footer column.
 * - $page['footer_fourthcolumn']: Items for the fourth footer column.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php if($messages) :  print '<div class="messageLog">' . $messages . '</div>'; endif;  ?>

<div id="wrapper" class="default">

        <div id="staticPanel" class="row-fluid">
        <div class="container">
            <?php if($logo): ?>
                <div class="logoPanel">
                    <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>">
                        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                    </a>
                </div>
            <?php endif; ?>

            <?php if($main_menu): ?>
                <div class="navbar navButton">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".main-collapse">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="mainMenu">
                    <div class="main-collapse nav-collapse collapse">
                        <?php print theme('links__system_main_menu', array('links' => $main_menu));?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        </div>

        <?php if($site_slogan) :  print '<h1 class="siteSlogan">' . $site_slogan . '</h1>'; endif;  ?>
        
                
                <?php if($show_hide_video):?>
                    <div id="videoBox" class="<?php print $video_id; ?>">
                    <?php   if($page['video_text']) :
                     print '<div id="videoText">' . render($page['video_text']) . '</div>'; endif;  ?>
                </div>
            <?php

        endif; ?>

        <?php if($page['text_box']): ?>
            <div id="textBox" class="row-fluid">
                <div class="container">
                    <?php print render($page['text_box']); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($page['features']): ?>
            <div id="features" class="row-fluid">
                <div class="container-fluid">
                    <?php print render($page['features']); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($page['map_block']): ?>
            <div class="row-fluid">
                <?php print render($page['map_block']); ?>
            </div>
        <?php endif; ?>

    <div class="<?php print (drupal_is_front_page()) ? 'frontBox' : 'container contBox'; ?>">
<div class="row-fluid">
        <div class="<?php print ($page['categories_blog'] || $page['recent_blog'] || $page['recent_comments']) ? 'globalContant span9' : 'gCont'; ?>">
            <?php print render($page['content']); ?>
            <?php if($page['contact_info']): ?>
                <div id="contactInfo">
                    <?php print render($page['contact_info']); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if($page['categories_blog'] || $page['recent_blog'] || $page['recent_comments']): ?>
            <div class="leftSidebar span3">
                <?php
                    print render($page['categories_blog']);
                    print render($page['recent_blog']);
                    print render($page['recent_comments']);
                ?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php if($page['home_page_gallery']): ?>
    <div id="homeGallery" class="row-fluid">
        <div class="container-fluid">
            <?php print render($page['home_page_gallery']); ?>
        </div>
    </div>
<?php endif; ?>

<?php if($page['textarea']): ?>
    <div id="textTwo" class="row-fluid">
        <div class="container-fluid">
            <?php print render($page['textarea']); ?>
        </div>
    </div>
<?php endif; ?>

<?php if($page['our_team']): ?>
    <div id="ourTeam" class="row-fluid">
        <div class="container-fluid">
            <?php print render($page['our_team']);  ?>
        </div>
    </div>
<?php endif; ?>


    <div id="footer" class="row-fluid">
        <?php if($site_name) :  print '<p class="siteName">' . $site_name . '</p>'; endif;  ?>

        <?php if($page['contact_form']): ?>
            <div id="contactForm" class="row-fluid">
                <div class="container-fluid">
                    <?php print render($page['contact_form']);  ?>
                </div>
            </div>
        <?php endif; ?>

            <?php if ($show_hide_icon): ?>
                <div class="socBox">
                    <ul class="socIcons">
                    <?php
                        $soc = array(
                          "fa-twitter" => $twitter,
                          "fa-facebook" => $facebook,
                          "fa-flickr" => $flickr,
                          "fa-linkedin" => $linkedin,
                          "fa-youtube-play" => $youtube,
                          "fa-pinterest" => $pinterest,
                          "fa-google-plus" => $google,
                          "fa-dribbble" => $dribbble,
                          "fa-vimeo-square" => $vimeo,
                          "fa-instagram" => $instagram,
                          "fa-vk" => $vk,
                        );
                    foreach ($soc as $key => $value) :
                        if (trim($value) != "") : ?>
                        <li>
                            <a href="<?php print $value; ?>" target="_blank">
                                <i class="fa <?php print $key ?>"></i>
                            </a>
                        </li>
                    <?php endif;
                    endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

        <?php if ($show_hide_copyright): ?>
            <div class="copyright">
                <a href="<?php print $copyright_url; ?> " target="_blank">
                    <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <?php print $copyright_developedby; ?>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($secondary_menu): ?>
            <div class="footerMenu">
                <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu));?>
            </div>
        <?php endif; ?>

    </div> <!--footer-->
</div>  <!--wrapper-->
