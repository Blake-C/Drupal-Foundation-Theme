<?php

/**
 * Push all script to the bottom of the page
 *
 * @link https://www.drupal.org/node/171205
 * @link https://api.drupal.org/api/drupal/includes%21common.inc/function/drupal_add_js/7
 */
function drupal_foundation_theme_preprocess_html(&$variables) {
  /* Register jQuery - Utility Function */
  get_js_cdn( 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js', '/js/jquery-min.js', 'header' );

  /* Add assets if IE 8 or lower */
  if( preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
    /* Newer jQuery unset in drupal_foundation_theme_js_alter function */
    get_js_cdn( 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js', '/js/jquery-1.11.2.min.js', 'header' );

    /* Load the CSS that will get Foundation 5 columns to work in IE-8 */
    drupal_add_css(path_to_theme() . '/css/ie8-grid-support.css', $type = 'file', $media = 'all', $preprocess = FALSE);
    drupal_add_js(path_to_theme() .'/js/rem-min.js', array('type' => 'file', 'scope' => 'footer'));
  }

  /* Load other scripts */
  get_js_cdn( 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js', '/js/modernizr-min.js', 'header' );
  drupal_add_js(path_to_theme() .'/js/global-scripts-min.js', array('type' => 'file', 'scope' => 'footer'));
}


// Custom utility functions
require path_to_theme() . '/inc/utility-functions.php';