<?php

// .info options: https://www.drupal.org/node/171205

/**
 * Add body classes if certain regions have content.
 */
function drupal_foundation_theme_preprocess_html(&$variables) {
  /* Add Scripts */
  // https://api.drupal.org/api/drupal/includes%21common.inc/function/drupal_add_js/7

  /* Register jQuery Utility Function */
  get_jquery_cdn( 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js', '/js/jquery-min.js' );

  /* IF IE 8 */
  if( preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
    get_jquery_cdn( 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js', '/js/jquery-1.11.2.min.js' );

    /* Load the CSS that will get Foundation 5 columns to work in IE-8 */
    drupal_add_css(path_to_theme() . '/css/ie8-grid-support.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 9', '!IE' => FALSE), 'preprocess' => FALSE));
    drupal_add_js(path_to_theme() .'/js/rem-min.js', array('type' => 'file', 'scope' => 'footer'));
  }

  /* Load other scripts */
  drupal_add_js(path_to_theme() .'/js/modernizr-min.js', array('type' => 'file', 'scope' => 'header'));
  drupal_add_js(path_to_theme() .'/js/global-scripts-min.js', array('type' => 'file', 'scope' => 'footer'));
}


// Custom utility functions
require path_to_theme() . '/inc/utility-functions.php';