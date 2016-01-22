<?php

  /**
   * @file
   * Default simple view template to display a list of rows.
   *
   * @ingroup views_templates
   */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php
  $pos = 0;
  foreach ($rows as $id => $row):
    if ($pos++ == 0) {
      ?>
      <div class="mainJsFoto">
        <?php print $row; ?>
      </div>
      <div<?php if ($classes_array[$id]) {
        print ' class="' . $classes_array[$id] . '"';
      } ?>>
        <?php print $row; ?>
      </div>
    <?php
    }
    else {
      ?>
      <div<?php if ($classes_array[$id]) {
        print ' class="' . $classes_array[$id] . '"';
      } ?>>
        <?php print $row; ?>
      </div>
    <?php
    }
    ?>

  <?php endforeach; ?>