<?php

  /**
   * @file
   * Default theme implementation for displaying search results.
   *
   * This template collects each invocation of theme_search_result(). This and
   * the child template are dependent to one another sharing the markup for
   * definition lists.
   *
   * Note that modules may implement their own search type and theme function
   * completely bypassing this template.
   *
   * Available variables:
   * - $search_results: All results as it is rendered through
   *   search-result.tpl.php
   * - $module: The machine-readable name of the module (tab) being searched, such
   *   as "node" or "user".
   *
   *
   * @see     template_preprocess_search_results()
   *
   * @ingroup themeable
   */
?>
<?php if ($search_results): ?>

  <div class="container-main rounding search">
    <div style="font-size: 14px;"></div>
    <div
      style="font-size: 14px; line-height: 14px;margin-bottom: 10px;"><?php print t('За запитом') ?>
      "<strong><?php print arg(2) ?></strong>" <?php print t('знайдено') ?>
      <strong><?php print $count ?></strong> <?php print t('статті') ?>.
    </div>
    <?php print $search_results; ?>
    <div align="center" class="paginator mT40"></div>
  </div>
  <?php print $pager; ?>
<?php else : ?>
  <div class="container-main rounding">
    <div
      style="font-size: 14px;"><?php print t('Your search yielded no results'); ?></div>
  </div>
  <?php //print search_help('search#noresults', drupal_help_arg()); ?>
<?php endif; ?>
