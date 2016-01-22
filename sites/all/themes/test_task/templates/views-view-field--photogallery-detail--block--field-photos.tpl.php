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
  foreach ($row->field_field_photos as $item) {
    $tItem = $item['rendered']['#item'];
    $image = file_create_url($tItem['uri']);
    $rImage = image_style_url('thumbnail__180x111_', $tItem['uri']);
    ?>
    <div class="cell first" style="margin-right:8px;">
      <div class="img">
        <a href="<?php print $image?>" class="fresco"
           data-fresco-group="example" data-fresco-caption=""><img
            src="<?php print $rImage?>" border="0"></a>
      </div>
    </div>
  <?php
  }
?>