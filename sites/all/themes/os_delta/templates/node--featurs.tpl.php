<?php
/**
 * @file
 * Node--featurs.tpl.php.
 *
 * Filename: node--featurs.tpl.php.
 * Website:  http://www.ordasoft.com
 * Author: ordasoft dev team ordasoft.com
 * Description: this node is output fields content type features.
 * Create this content type and add to it the following fields:
 *  Icons - machine name - field_icon_name_featurs;
 *  Title - machine name - title;
 *  Body - machine name -  field_body_featurs.
 */
?>
<div class="featuresTitle">
    <span class="circle"><i class="fa <?php print os_delta_get_field_value('field_icon_name_featurs', $node); ?>"></i></span>
    <h4 class="titleFeatures"><?php print $title; ?></h4>
</div>
<p class="descFeatures"><?php print os_delta_get_field_value('field_body_featurs', $node); ?></p>
