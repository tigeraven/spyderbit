<?php
/**
 * @file
 * Node--our_team.tpl.php.
 *
 * Filename: node--our_team.tpl.php.
 * Website:  http://www.ordasoft.com
 * Author: ordasoft dev team ordasoft.com
 * Description: this node is output fields vontent type our team.
 * Create this content type and add to it the following fields:
 *  Title - machine name - title;
 *  Position - machine name - field_position;
 *  Description - machine name - field_description;
 *  Imeges - machine name - field_imeges;
 *  Twitter URL - machine name - field_twitter_url;
 *  Facebook URL - machine name - field_facebook_url;
 *  Flickr URL - machine name - field_flickr_url;
 *  Linkedin URL - machine name - field_linkedin_url;
 *  YouTube URL - machine name - field_youtube_url;
 *  Pinterest URL - machine nameE - field_pinterest_url;
 *  Google+ URL - machine name - field_google_url;
 *  Dribbble URL - machine name - field_dribbble_url;
 *  Vimeo URL - machine name - field_vimeo_url;
 *  Instagram URL - machine name - field_instagram_url;
 *  Vk URL - machine name - field_vk_url.
 */
?>
<div class="contTeam">
    <h5><?php print $title; ?></h5>
    <?php
    $html_block = os_delta_get_field_value('field_position', $node);
    if(isset($html_block)) :
        print '<h5 class="position">' . $html_block . '</h5>'; endif;  ?>
    <?php
    $html_block = os_delta_get_field_value('field_description', $node);
    if(isset($html_block)) :
        print '<p class="desc">' . $html_block . '</p>'; endif;  ?>
    <div class="iconsTeam">
        <?php
            $html_block = os_delta_get_field_value('field_twitter_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-twitter" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_facebook_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-facebook" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_flickr_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-flickr" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_linkedin_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-linkedin" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_youtube_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-youtube" target="_blank" href="' .
                $html_block . '"></a></li>'; endif;
            $html_block = os_delta_get_field_value('field_pinterest_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-pinterest" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_google_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-google-plus" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_dribbble_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-dribbble" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_vimeo_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-vimeo-square" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_instagram_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-instagram" target="_blank" href="' .
                $html_block . '"></a>'; endif;
            $html_block = os_delta_get_field_value('field_vk_url', $node);
            if(isset($html_block)) :
                print '<a class="fa fa-vk" target="_blank" href="' .
                $html_block . '"></a>'; endif;
        ?>
    </div>
</div>
<img class="slImg" src="<?php print image_style_url('team', os_delta_get_field_value('field_imeges', $node, 'url')); ?>" alt="imgTeam" />
