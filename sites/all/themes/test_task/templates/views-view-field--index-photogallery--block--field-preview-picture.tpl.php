<?php

    /**
     * @file
     * This template is used to print a single field in a view.
     *
     * It is not actually used in default Views, as this is registered as a theme
     * function which has better performance. For single overrides, the template is
     * perfectly okay.
     *
     * Variables available:
     * - $view: The view object
     * - $field: The field handler object that can process the input
     * - $row: The raw SQL result that can be used
     * - $output: The processed output that will normally be used.
     *
     * When fetching output from the $row, this construct should be used:
     * $data = $row->{$field->field_alias}
     *
     * The above will guarantee that you'll always get the correct data,
     * regardless of any changes in the aliasing that might happen if
     * the view is modified.
     */

    $url =   url(drupal_get_path_alias($row->field_field_preview_picture[0]['rendered']['#path']['path']), array('absolute' => TRUE));
    $title = $row->field_field_preview_picture[0]['rendered']['#path']['options']['entity']->title;
    $jpgUrl = file_create_url($row->field_field_preview_picture[0]['rendered']['#item']['uri']);
    if( $view->row_index == 0 ){
        ?>
        <a href="<?php print $url;?>">
            <div class="TitleHover"><?php print $title;?></div>
            <img src="<?php print $jpgUrl;?>">
        </a>
    <?php
    }
?>
    <a href="<?php print $url;?>"
       nameForlink="<?php print $jpgUrl;?>"
       nameForTitle='<?php print $title;?>'>
        <img src="<?php print $jpgUrl;?>"/>
    </a>
