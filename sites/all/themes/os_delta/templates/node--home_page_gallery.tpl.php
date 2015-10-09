<?php
/**
 * @file
 * Node--home_page_gallery.tpl.php.
 *
 * Filename: node--home_page_gallery.tpl.php.
 * Website:  http://www.ordasoft.com
 * Author: ordasoft dev team ordasoft.com
 * Description: this node is output fields content type home page gallery.
 * Create this content type and add to it the following fields:
 *  Title - machine name - title;
 *  Optional description - machine name - field_optdesc;
 *  Images - machine name - field_images.
 */
?>

<h1><?php print $title; ?></h1>
<p class="desc"><?php print os_delta_get_field_value('field_optdesc', $node); ?></p>

<div class="imgGallery">
    <?php
    $img = field_get_items('node', $node, 'field_images');
    $imgcount = count($img);
        $k = 0;
    for ($i = 0; $i < $imgcount; $i++) :
        $image_uri = $img[$i]['uri'];
        $masthead_raw = image_style_url('gallery-4-column', $image_uri);
        $alt = $img[$i]['alt'];
    if($k == 0) :  echo '<div class="rowImages">'; endif;
            $k++;
        ?>
        <a href="<?php print file_create_url($img[$i]['uri']); ?>" rel="group-<?php print $node->nid; ?>" class="fancybox">
            <?php if(!empty($alt)): ?>
                <span class="lens">
                    <h5><?php print check_plain($alt); ?></h5>
                </span>
            <?php endif; ?>
            <img class="cover" src="<?php print $masthead_raw; ?>" alt="img" />
        </a>
        <?php
        if($k == 4) :
            echo '</div>';
        $k = 0;
        endif;
    endfor; ?>
</div>
