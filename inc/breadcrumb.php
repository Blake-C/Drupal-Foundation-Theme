<?php

/**
 * Put Breadcrumbs in a ul li structure
 *
 * @link https://api.drupal.org/api/drupal/includes%21theme.inc/function/theme_breadcrumb/7
 */
function drupal_foundation_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $crumbs = '';

  if (!empty($breadcrumb)) {
    $crumbs = '<ul class="breadcrumbs">';

    foreach($breadcrumb as $value) {
         $crumbs .= '<li>'.$value.'</li>';
    }
    $crumbs .= '</ul>';
  }
  return $crumbs;
}