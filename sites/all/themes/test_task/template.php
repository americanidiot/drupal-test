<?php
  /**
   * Add body classes if certain regions have content.
   */
  function test_task_preprocess_html(&$variables) {
    if (!empty($variables['page']['featured'])) {
      $variables['classes_array'][] = 'featured';
    }

    if (!empty($variables['page']['triptych_first'])
        || !empty($variables['page']['triptych_middle'])
        || !empty($variables['page']['triptych_last'])
    ) {
      $variables['classes_array'][] = 'triptych';
    }

    if (!empty($variables['page']['footer_firstcolumn'])
        || !empty($variables['page']['footer_secondcolumn'])
        || !empty($variables['page']['footer_thirdcolumn'])
        || !empty($variables['page']['footer_fourthcolumn'])
    ) {
      $variables['classes_array'][] = 'footer-columns';
    }

  }

  /**
   * Override or insert variables into the page template for HTML output.
   */
  function test_task_process_html(&$variables) {
    // Hook into color.module.
    if (module_exists('color')) {
      _color_html_alter($variables);
    }
  }

  /**
   * Override or insert variables into the page template.
   */
  function test_task_process_page(&$variables) {
    // Hook into color.module.
    if (module_exists('color')) {
      _color_page_alter($variables);
    }
    // Always print the site name and slogan, but if they are toggled off, we'll
    // just hide them visually.
    $variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    if ($variables['hide_site_name']) {
      // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
      $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($variables['hide_site_slogan']) {
      // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
      $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
    // Since the title and the shortcut link are both block level elements,
    // positioning them next to each other is much simpler with a wrapper div.
    if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
      // Add a wrapper div using the title_prefix and title_suffix render elements.
      $variables['title_prefix']['shortcut_wrapper'] = array (
        '#markup' => '<div class="shortcut-wrapper clearfix">',
        '#weight' => 100,
      );
      $variables['title_suffix']['shortcut_wrapper'] = array (
        '#markup' => '</div>',
        '#weight' => -99,
      );
      // Make sure the shortcut link is the first item in title_suffix.
      $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
    }
  }

  /**
   * Implements hook_preprocess_maintenance_page().
   */
  function test_task_preprocess_maintenance_page(&$variables) {
    // By default, site_name is set to Drupal if no db connection is available
    // or during site installation. Setting site_name to an empty string makes
    // the site and update pages look cleaner.
    // @see template_preprocess_maintenance_page
    if (!$variables['db_is_active']) {
      $variables['site_name'] = '';
    }
    drupal_add_css(drupal_get_path('theme', 'test_task') . '/css/maintenance-page.css');
  }

  /**
   * Override or insert variables into the maintenance page template.
   */
  function test_task_process_maintenance_page(&$variables) {
    // Always print the site name and slogan, but if they are toggled off, we'll
    // just hide them visually.
    $variables['hide_site_name'] = theme_get_setting('toggle_name') ? FALSE : TRUE;
    $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
    if ($variables['hide_site_name']) {
      // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
      $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
    }
    if ($variables['hide_site_slogan']) {
      // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
      $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
    }
  }

  /**
   * Override or insert variables into the node template.
   */
  function test_task_preprocess_node(&$variables) {
    if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
      $variables['classes_array'][] = 'node-full';
    }
  }


  /**
   * Override or insert variables into the block template.
   */
  function test_task_preprocess_block(&$variables) {
    // In the header region visually hide block titles./
    //echo "<pre>_" . print_r ($variables['block'] , 1 ) . "_</pre>";
    if ($variables['block']->region == 'header') {
      $variables['title_attributes_array']['class'][] = 'element-invisible';
    }
  }

  /**
   * Implements theme_menu_tree().  menu_main_page_menu
   */
  function test_task_menu_tree__main_menu($variables) {
    return '<ul id="main-nav">' . $variables['tree'] . '</ul>';
  }

  /**
   * Implements theme_menu_tree().
   */

  function test_task_menu_tree__menu_main_page_menu($variables) {
    $type = FALSE;
    if (arg(0) == 'node') {
      $nid = arg(1);
      $node = node_load($nid);
      $type = $node->type;
    }
    if (arg(0) == 'foto' || $type) {
      return '<div>
                    <div class="green-list space_bottom_m rounding">
                        <ul>
                        ' . $variables['tree'] . '
                        </ul>
                    </div>
            </div>';
    }
    return '<div class="forMenu">
 	<div style="padding-left: 18px;">
            <div class="green-list space_bottom_m rounding">
                <ul>
                ' . $variables['tree'] . '
                </ul>
            </div>

    </div>
    </div>';

  }

  /**
   * Implements theme_menu_tree().
   */

  function test_task_menu_link__menu_main_page_menu(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';


    foreach ($element['#attributes']['class'] as $k => $class) {
      if ($class == 'leaf') {
        unset($element['#attributes']['class'][$k]);
      }
    }

    if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
  }


  /**
   * Implements theme_menu_tree(). menu_mails
   */

  function test_task_menu_tree__menu_mails($variables) {
    return $variables['tree'];
  }

  /**
   * Implements theme_menu_tree().
   */

  function test_task_menu_link__menu_mails(array $variables) {
    static $count = 0;
    $isEven = !($count % 2);
    $zebra = !$isEven ? 'even' : 'odd';
    $count++;
    $element = $variables['element'];
    $sub_menu = '';
    $output = '';

    $isFirst = FALSE;
    $isLast = FALSE;
    foreach ($element['#attributes']['class'] as $k => $class) {
      if ($class == 'leaf') {
        unset($element['#attributes']['class'][$k]);
      }

      if ($class == 'first') {
        $isFirst = TRUE;
      }

      if ($class == 'last') {
        $isLast = TRUE;
      }
    }
    $element['#localized_options']['attributes']['class'][] = $zebra;
    if (!$isEven) {
      $element['#localized_options']['attributes']['class'][] = 'mL20';
    }

    if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
    }
    if ($isFirst && $isEven) {
      $output .= '<p style="margin-top:15px;">';
    }
    elseif ($isEven) {
      $output .= '<p>';
    }

    $output .= l($element['#title'], $element['#href'], $element['#localized_options']) . $sub_menu;

    if ($isLast || !$isEven) {
      $output .= '</p>';
    }
    return $output . "\n";
  }

  /**
   * Implements theme_menu_tree(). menu_mails
   */

  function test_task_menu_tree__menu_products($variables) {
    return $variables['tree'];
  }

  function test_task_menu_link__menu_products(array $variables) {
    static $count = 0;
    $isEven = !($count % 2);
    $zebra = !$isEven ? 'even' : 'odd';
    $count++;
    $element = $variables['element'];
    $sub_menu = '';
    $output = '';

    $isFirst = FALSE;
    $isLast = FALSE;
    foreach ($element['#attributes']['class'] as $k => $class) {
      if ($class == 'leaf') {
        unset($element['#attributes']['class'][$k]);
      }

      if ($class == 'first') {
        $isFirst = TRUE;
      }

      if ($class == 'last') {
        $isLast = TRUE;
      }
    }
    $element['#localized_options']['attributes']['class'][] = $zebra;
    if (!$isEven) {
      $element['#localized_options']['attributes']['class'][] = 'mL20';
    }

    if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
    }
    if ($isFirst && $isEven) {
      $output .= '<p style="margin-top:15px;">';
    }
    elseif ($isEven) {
      $output .= '<p>';
    }

    $output .= l($element['#title'], $element['#href'], $element['#localized_options']) . $sub_menu;

    if ($isLast || !$isEven) {
      $output .= '</p>';
    }
    return $output . "\n";
  }


  /**
   * Implements theme_menu_tree(). _menu_main_page_socials
   */

  function test_task_menu_tree__menu_main_page_socials($variables) {
    return $variables['tree'];
  }

  function test_task_menu_link__menu_main_page_socials(array $variables) {
    static $count = 0;
    $isEven = !($count % 2);
    $zebra = !$isEven ? 'even' : 'odd';
    $count++;
    $element = $variables['element'];
    $sub_menu = '';
    $output = '';

    $isFirst = FALSE;
    $isLast = FALSE;
    foreach ($element['#attributes']['class'] as $k => $class) {
      if ($class == 'leaf') {
        unset($element['#attributes']['class'][$k]);
      }

      if ($class == 'first') {
        $isFirst = TRUE;
      }

      if ($class == 'last') {
        $isLast = TRUE;
      }
    }
    $element['#localized_options']['attributes']['class'][] = $zebra;

    if ($isFirst) {
      $output .= '<p style="margin-top:15px;">';
    }
    else {
      $output .= '<p>';
    }

    $output .= l($element['#title'], $element['#href'], $element['#localized_options']) . $sub_menu;
    $output .= '</p>';

    return $output . "\n";
  }

  /**
   * Implements theme_menu_tree(). menu_services
   */

  function test_task_menu_tree__menu_services($variables) {
    return $variables['tree'];
  }

  function test_task_menu_link__menu_services(array $variables) {
    static $count = 0;
    $isEven = !($count % 2);
    $zebra = !$isEven ? 'even' : 'odd';
    $count++;
    $element = $variables['element'];
    $sub_menu = '';
    $output = '';

    $isFirst = FALSE;
    $isLast = FALSE;
    foreach ($element['#attributes']['class'] as $k => $class) {
      if ($class == 'leaf') {
        unset($element['#attributes']['class'][$k]);
      }

      if ($class == 'first') {
        $isFirst = TRUE;
      }

      if ($class == 'last') {
        $isLast = TRUE;
      }
    }
    $element['#localized_options']['attributes']['class'][] = $zebra;

    if ($isFirst) {
      $output .= '<p style="margin-top:15px;">';
    }
    else {
      $output .= '<p>';
    }

    $output .= l($element['#title'], $element['#href'], $element['#localized_options']) . $sub_menu;
    $output .= '</p>';

    return $output . "\n";
  }


  /**
   * Implements theme_field__field_type().
   */
  function test_task_field__taxonomy_term_reference($variables) {
    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables['label_hidden']) {
      $output .= '<h3 class="field-label">' . $variables['label'] . ': </h3>';
    }

    // Render the items.
    $output .= ($variables['element']['#label_display'] == 'inline') ? '<ul class="links inline">' : '<ul class="links">';
    foreach ($variables['items'] as $delta => $item) {
      $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
    }
    $output .= '</ul>';

    // Render the top-level DIV.
    $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] . '>' . $output . '</div>';

    return $output;
  }


  /**
   * Registers overrides for various functions.
   *
   * In this case, overrides three user functions
   */
  function test_task_theme() {
    $items = array ();

    $items['user_login'] = array (
      'render element'       => 'form',
      'path'                 => drupal_get_path('theme', 'test_task') . '/templates',
      'template'             => 'user-login',
      'preprocess functions' => array (
        'test_task_preprocess_user_login'
      ),
    );
    $items['user_register_form'] = array (
      'render element'       => 'form',
      'path'                 => drupal_get_path('theme', 'test_task') . '/templates',
      'template'             => 'user-register-form',
      'preprocess functions' => array (
        'test_task_preprocess_user_register_form'
      ),
    );
    $items['user_pass'] = array (
      'render element'       => 'form',
      'path'                 => drupal_get_path('theme', 'test_task') . '/templates',
      'template'             => 'user-pass',
      'preprocess functions' => array (
        'test_task_preprocess_user_pass'
      ),
    );
    return $items;
  }

  function test_task_preprocess_user_login(&$vars) {
    //$vars['form']['name']['#theme_wrappers'] = array('username111');
    $vars['title'] = t('Авторизація користувача');
  }

  function test_task_preprocess_user_register_form(&$vars) {
    $vars['intro_text'] = t('This is my super awesome reg form');
  }

  function test_task_preprocess_user_pass(&$vars) {
    $vars['intro_text'] = t('This is my super awesome request new password form');
  }

  function test_task_form_alter(&$form, &$form_state, &$form_id) {
    if ($form_id == 'user_login') {
      $form['name']['#description'] = t('');
      $form['name']['#title'] = t('Логін:');
      $form['name']['#form_id'] = $form_id;
      $form['name']['#attributes']['class'] = '';
      $form['name']['#attributes']['size'] = '';
      $form['pass']['#description'] = t('');
      $form['pass']['#title'] = t('Пароль:');
      $form['pass']['#form_id'] = $form_id;
      $form['pass']['#attributes']['class'] = '';
      $form['pass']['#attributes']['size'] = '';
      $form['actions']['submit']['#value'] = t('Увійти');
      $form['actions']['submit']['#form_id'] = $form_id;
      //echo "<pre>_" . print_r ($form , 1 ) . "_</pre>";
    }
    if ($form_id == 'search_block_form') {
      $form['search_block_form']['#form_id'] = $form_id;
      $form['search_block_form']['#attributes']['placeholder'] = t('Пошук...');
      $form['search_block_form']['#attributes']['class'] = 'txt-field';
      $form['search_block_form']['#attributes']['size'] = '';
      $form['search_block_form']['#title_display'] = 'none';
      $form['#attributes']['class'] = 'search-form';
      $form['#attributes']['style'] = 'margin-top: 13px';
      $form['actions']['submit']['#form_id'] = $form_id;
      $form['actions']['submit']['#attributes']['class'] = 'submit';
      $form['actions']['submit']['#attributes']['value'] = '';
      $form['actions']['submit']['#prefix'] = '';
      $form['actions']['submit']['#suffix'] = '';
    }
  }


  /**
   * Implements theme_form_element().
   */

  function test_task_form_element($variables) {
    $element = &$variables['element'];


    if (isset($variables['element']['#form_id']) && $variables['element']['#form_id'] == 'user_login') {
      // This function is invoked as theme wrapper, but the rendered form element
      // may not necessarily have been processed by form_builder().

      $output = '<tr>';
      // If #title is not set, we don't display any label or required marker.
      if (!isset($element['#title'])) {
        $element['#title_display'] = 'none';
      }
      $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
      $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

      switch ($element['#title_display']) {
        case 'before':
        case 'invisible':
          $output .= '<td align="right"><b>' . theme('form_element_label', $variables) . '</b></td>';
          $output .= '<td>' . $prefix . $element['#children'] . $suffix . "</td>\n";
          break;

        case 'after':
          $output .= ' ' . $prefix . $element['#children'] . $suffix;
          $output .= ' ' . theme('form_element_label', $variables) . "\n";
          break;

        case 'none':
        case 'attribute':
          // Output no label and no required marker, only the children.
          $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
          break;
      }

      if (!empty($element['#description'])) {
        $output .= '<div class="description">' . $element['#description'] . "</div>\n";
      }
      $output .= '</tr>';


      return $output;
    }


    // This function is invoked as theme wrapper, but the rendered form element
    // may not necessarily have been processed by form_builder().

    $output = '';
    // If #title is not set, we don't display any label or required marker.
    if (!isset($element['#title'])) {
      $element['#title_display'] = 'none';
    }
    $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
    $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

    switch ($element['#title_display']) {
      case 'before':
      case 'invisible':
        $output .= ' ' . theme('form_element_label', $variables);
        $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
        break;

      case 'after':
        $output .= ' ' . $prefix . $element['#children'] . $suffix;
        $output .= ' ' . theme('form_element_label', $variables) . "\n";
        break;

      case 'none':
      case 'attribute':
        // Output no label and no required marker, only the children.
        $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
        break;
    }

    if (!empty($element['#description'])) {
      $output .= '<div class="description">' . $element['#description'] . "</div>\n";
    }


    return $output;
  }


  /**
   * Implements theme_form_button().
   */

  function test_task_button($variables) {
    $element = $variables['element'];

    if (isset($element['#form_id']) && $element['#form_id'] == 'user_login') {
      $element['#attributes']['type'] = $element['#type'];
      $element['#attributes']['value'] = $element['#value'];

      element_set_attributes($element, array ('id', 'name'));

      return '<tr><td></td><td><input' . drupal_attributes($element['#attributes']) . ' /></td></tr>';
    }


    $element['#attributes']['type'] = 'submit';
    $element['#attributes']['value'] = '';
    element_set_attributes($element, array ('id', 'name'));
    //_form_set_class($element, array('submit'));

    return '<input' . drupal_attributes($element['#attributes']) . ' />';
  }

  function test_task_textfield($variables) {
    $element = $variables['element'];

    $element['#attributes']['type'] = 'text';
    element_set_attributes($element, array (
      'id',
      'name',
      'value',
      'size',
      'maxlength'
    ));


    $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

    return $output;
  }

  function test_task_container($variables) {
    $element = $variables['element'];
    // Ensure #attributes is set.
    $element += array ('#attributes' => array ());

    // Special handling for form elements.
    if (isset($element['#array_parents'])) {
      // Assign an html ID.
      if (!isset($element['#attributes']['id'])) {
        $element['#attributes']['id'] = $element['#id'];
      }
      // Add the 'form-wrapper' class.
      $element['#attributes']['class'][] = 'form-wrapper1';
    }

    return $element['#children'];
  }

  /**
   * theme pager
   */

  function test_task_pager_link($variables) {
    $text = $variables['text'];
    $page_new = $variables['page_new'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $attributes = $variables['attributes'];

    $page = isset($_GET['page']) ? $_GET['page'] : '';
    if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
      $parameters['page'] = $new_page;
    }

    $query = array ();
    if (count($parameters)) {
      $query = drupal_get_query_parameters($parameters, array ());
    }
    if ($query_pager = pager_get_query_parameters()) {
      $query = array_merge($query, $query_pager);
    }

    // Set each pager link title
    if (!isset($attributes['title'])) {
      static $titles = NULL;
      if (!isset($titles)) {
        $titles = array (
          t('« first')    => t('Go to first page'),
          t('‹ previous') => t('Go to previous page'),
          t('next ›')     => t('Go to next page'),
          t('last »')     => t('Go to last page'),
        );
      }
      if (isset($titles[$text])) {
        $attributes['title'] = $titles[$text];
      }
      elseif (is_numeric($text)) {
        $attributes['title'] = t('Go to page @number', array ('@number' => $text));
      }
    }

    // @todo l() cannot be used here, since it adds an 'active' class based on the
    //   path only (which is always the current path for pager links). Apparently,
    //   none of the pager links is active at any time - but it should still be
    //   possible to use l() here.
    // @see http://drupal.org/node/1410574
    $attributes['href'] = url($_GET['q'], array ('query' => $query));
    return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '</a>  ';
  }


  /**
   * Implements theme_item_list().
   */

  function test_task_item_list($variables) {
    $items = $variables['items'];
    $title = $variables['title'];
    $type = $variables['type'];
    $attributes = $variables['attributes'];

    // Only output the list container and title, if there are any list items.
    // Check to see whether the block title exists before adding a header.
    // Empty headers are not semantic and present accessibility challenges.
    $output = '<div align="center" class="paginator mT20 mB20">';
    if (isset($title) && $title !== '') {
      $output .= '<h3>' . $title . '</h3>';
    }

    if (!empty($items)) {
      $num_items = count($items);
      $i = 0;
      foreach ($items as $item) {
        $attributes = array ();
        $children = array ();
        $data = '';
        $i++;
        if (is_array($item)) {
          foreach ($item as $key => $value) {
            if ($key == 'data') {
              $data = $value;
            }
            elseif ($key == 'children') {
              $children = $value;
            }
            else {
              $attributes[$key] = $value;
            }
          }
        }
        else {
          $data = $item;
        }
        if (count($children) > 0) {
          // Render nested list.
          $data .= theme_item_list(array (
                                     'items'      => $children,
                                     'title'      => NULL,
                                     'type'       => $type,
                                     'attributes' => $attributes
                                   ));
        }
        if ($i == 1) {
          $attributes['class'][] = 'first';
        }
        if ($i == $num_items) {
          $attributes['class'][] = 'last';
        }
        $output .= $data;
      }
    }
    $output .= '</div>';
    return $output;
  }


  /**
   * Implements theme_pager_previous().
   */

  function test_task_pager_previous($variables) {
    $text = $variables['text'];
    $element = $variables['element'];
    $interval = $variables['interval'];
    $parameters = $variables['parameters'];
    global $pager_page_array;
    $output = '';

    // If we are anywhere but the first page
    if ($pager_page_array[$element] > 0) {
      $page_new = pager_load_array($pager_page_array[$element] - $interval, $element, $pager_page_array);

      // If the previous page is the first page, mark the link as such.
      if ($page_new[$element] == 0) {
        $output = theme('pager_first', array (
          'text'       => $text,
          'element'    => $element,
          'parameters' => $parameters
        ));
      }
      // The previous page is not the first page.
      else {
        $output = theme('pager_link', array (
          'text'       => $text,
          'page_new'   => $page_new,
          'element'    => $element,
          'parameters' => $parameters
        ));
      }
    }

    return $output;
  }

  /**
   * Implements theme_pager().
   */

  function test_task_pager($variables) {
    $tags = $variables['tags'];
    $element = $variables['element'];
    $parameters = $variables['parameters'];
    $quantity = $variables['quantity'];
    global $pager_page_array, $pager_total;

    // Calculate various markers within this pager piece:
    // Middle is used to "center" pages around the current page.
    $pager_middle = ceil($quantity / 2);
    // current is the page we are currently paged to
    $pager_current = $pager_page_array[$element] + 1;
    // first is the first page listed by this pager piece (re quantity)
    $pager_first = $pager_current - $pager_middle + 1;
    // last is the last page listed by this pager piece (re quantity)
    $pager_last = $pager_current + $quantity - $pager_middle;
    // max is the maximum page number
    $pager_max = $pager_total[$element];
    // End of marker calculations.

    // Prepare for generation loop.
    $i = $pager_first;
    if ($pager_last > $pager_max) {
      // Adjust "center" if at end of query.
      $i = $i + ($pager_max - $pager_last);
      $pager_last = $pager_max;
    }
    if ($i <= 0) {
      // Adjust "center" if at start of query.
      $pager_last = $pager_last + (1 - $i);
      $i = 1;
    }
    // End of generation loop preparation.

    $li_first = theme('pager_first', array (
      'text'       => (isset($tags[0]) ? $tags[0] : t('« first')),
      'element'    => $element,
      'parameters' => $parameters
    ));
    $li_previous = theme('pager_previous', array (
      'text'       => (isset($tags[1]) ? $tags[1] : t('‹ previous')),
      'element'    => $element,
      'interval'   => 1,
      'parameters' => $parameters
    ));
    $li_next = theme('pager_next', array (
      'text'       => (isset($tags[3]) ? $tags[3] : t('next ›')),
      'element'    => $element,
      'interval'   => 1,
      'parameters' => $parameters
    ));
    $li_last = theme('pager_last', array (
      'text'       => (isset($tags[4]) ? $tags[4] : t('last »')),
      'element'    => $element,
      'parameters' => $parameters
    ));

    if ($pager_total[$element] > 1) {
      if ($li_first) {
        $items[] = array (
          'class' => array ('pager-first'),
          'data'  => $li_first,
        );
      }
      if ($li_previous) {
        $items[] = array (
          'class' => array ('pager-previous'),
          'data'  => $li_previous,
        );
      }

      // When there is more than one page, create the pager list.
      if ($i != $pager_max) {
        if ($i > 1) {
          $items[] = array (
            'class' => array ('pager-ellipsis'),
            'data'  => '…',
          );
        }
        // Now generate the actual pager piece.
        for (; $i <= $pager_last && $i <= $pager_max; $i++) {
          if ($i < $pager_current) {
            $items[] = array (
              'class' => array ('pager-item'),
              'data'  => theme('pager_previous', array (
                'text'       => $i,
                'element'    => $element,
                'interval'   => ($pager_current - $i),
                'parameters' => $parameters
              )),
            );
          }
          if ($i == $pager_current) {
            $items[] = array (
              'class' => array ('pager-current'),
              'data'  => '<span class="act">' . $i . '</span>',
            );
          }
          if ($i > $pager_current) {
            $items[] = array (
              'class' => array ('pager-item'),
              'data'  => theme('pager_next', array (
                'text'       => $i,
                'element'    => $element,
                'interval'   => ($i - $pager_current),
                'parameters' => $parameters
              )),
            );
          }
        }
        if ($i < $pager_max) {
          $items[] = array (
            'class' => array ('pager-ellipsis'),
            'data'  => '…',
          );
        }
      }
      // End generation.
      if ($li_next) {
        $items[] = array (
          'class' => array ('pager-next'),
          'data'  => $li_next,
        );
      }
      if ($li_last) {
        $items[] = array (
          'class' => array ('pager-last'),
          'data'  => $li_last,
        );
      }
      return theme('item_list', array (
        'items'      => $items,
        'attributes' => array ('class' => array ('pager')),
      ));
    }
  }


  /**
   * Implements hook_preprocess_views_view_unformatted().
   */

  function test_task_preprocess_views_view_unformatted(&$vars) {
    //If you have the devel module installed,
    //this is a great way to see all the available variables


    if ($vars['view']->name != 'bloggers_from_a_to_z') {
      return;
    }
    // echo "<pre>_" . print_r ($vars , 1 ) . "_</pre>";
    $results = $vars['view']->result;
    $rows = $vars['rows'];

    //Sort rows into letter sets
    $letters = array ();
    $i = 0;
    foreach ($results as $result) {
      $first_letter = strtolower(mb_substr($result->users_name, 0, 1, 'UTF-8'));
      if (is_array($letters[$first_letter])) {
        array_push($letters[$first_letter], $rows[$i]);
      }
      else {
        $letters[$first_letter] = array ($rows[$i]);
      }
      $i++;
    }

    //Generate glossary navigation
    $nav = '';
    foreach ($letters as $letter => $rows) {
      $num = count($rows);
      $cap_letter = strtoupper($letter);
      $nav
        .= <<<NAV
<a href="#$letter" class="letter_link">
  $cap_letter
</a>
($num)
NAV;
    }
    $all_letters = array (
      'ua' => array (),
      'en' => array ()
    );
    for ($letter = 97; $letter < 123; $letter++) {
      array_push($all_letters['en'], chr($letter));
    }
    for ($letter = 192; $letter < 198; $letter++) {
      array_push($all_letters['ua'], iconv('windows-1251', 'UTF-8', chr($letter)));
    }
    array_push($all_letters['ua'], "Є");
    for ($letter = 198; $letter < 201; $letter++) {
      array_push($all_letters['ua'], iconv('windows-1251', 'UTF-8', chr($letter)));
    }
    array_push($all_letters['ua'], "І");
    array_push($all_letters['ua'], "Ї");
    for ($letter = 201; $letter < 218; $letter++) {
      array_push($all_letters['ua'], iconv('windows-1251', 'UTF-8', chr($letter)));
    }
    array_push($all_letters['ua'], iconv('windows-1251', 'UTF-8', chr(220)));
    for ($letter = 222; $letter < 224; $letter++) {
      array_push($all_letters['ua'], iconv('windows-1251', 'UTF-8', chr($letter)));
    }

    //Add to variables
    $vars['nav'] = $nav;
    $vars['letters'] = $letters;
    $vars['all_letters'] = $all_letters;
  }

  /**
   * Implements hook_preprocess_page().
   */

  function test_task_preprocess_page(&$variables) {
    if (!empty($variables['node']) && !empty($variables['node']->type)) {
      $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
    }
  }

  /**
   * Implements hook_menu_breadcrumb_alter().
   */

  function test_task_menu_breadcrumb_alter(&$active_trail, $item) {

    //STORE THE LAST ITEM
    $end = end($active_trail);
    // echo "<pre>_" . print_r ($active_trail , 1 ) . "_</pre>";

    foreach ($active_trail as $key => $crumb) {

      //CHECK AGAINST NODE TYPE
      if ($crumb['map'][1]->type == 'rivne_news') {
        //INSERT THE REPLACEMENT CRUMB
        $active_trail[$key] = array (
          'title'             => t("Новини Рівного"),
          'href'              => '/rivne-news/all',
          'link_path'         => 'PATH',
          'localized_options' => array (),
          'type'              => 0
        );
        //RECREATE ITEM
        $active_trail[] = $crumb;
      }


      if ($crumb['map'][1]->type == 'blog') {

        if (arg(0) == 'node' && is_numeric(arg(1))) {
          $nid = arg(1);
          if ($nid) {
            $node = node_load($nid);
          }
        }

        //INSERT THE REPLACEMENT CRUMB
        $active_trail[$key] = array (
          'title'             => t("Блоги"),
          'href'              => '/blogs/all',
          'link_path'         => 'PATH',
          'localized_options' => array (),
          'type'              => 0
        );
        $active_trail[$key + 1] = array (
          'title'             => $node->name,
          'href'              => '/users/' . $node->name,
          'link_path'         => 'PATH',
          'localized_options' => array (),
          'type'              => 0
        );
        //RECREATE ITEM
        $active_trail[] = $crumb;
      }

    }
  }

  /**
   * Implements theme_breadcrumb().
   */

  function test_task_breadcrumb($variables) {
    $breadcrumb = $variables['breadcrumb'];

    if (!empty($breadcrumb)) {
      $crumbs = ' <div class="aaa" style="margin: 5px 0; font-size: 12px; margin-bottom: 10px;">';

      $first = TRUE;
      foreach ($breadcrumb as $value) {
        if (!$first) {
          $crumbs .= ' <span style="color: grey; font-size: 11px;"> &nbsp; /&nbsp; </span>' . $value;
        }
        else {
          $crumbs .= $value;
        }
        $first = FALSE;
      }
      $crumbs .= '</div>';
    }
    return $crumbs;
  }

  /**
   * Implements hook_preprocess_search_results().
   */

  function test_task_preprocess_search_results(&$variables) {
    $variables['search_results'] = '';
    if (!empty($variables['module'])) {
      $variables['module'] = check_plain($variables['module']);
    }
    foreach ($variables['results'] as $result) {
      $variables['search_results'] .= theme('search_result', array (
        'result' => $result,
        'module' => $variables['module']
      ));
    }
    $variables['count'] = count($variables["results"]);
    $variables['pager'] = theme('pager', array ('tags' => NULL));
  }
