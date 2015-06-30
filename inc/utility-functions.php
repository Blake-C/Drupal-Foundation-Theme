<?php

/**
 * Push all script to the bottom of the page
 *
 * @link http://koplowiczandsons.com/content/performance-making-js-sit-back-bus
 */
function drupal_foundation_theme_js_alter(&$javascript) {
  // Scripts allowed to load in the head
  $header_scripts = array(
    path_to_theme() . '/js/modernizr-min.js',
    path_to_theme() . '/js/jquery-1.11.2.min.js',
    path_to_theme() . '/js/jquery-min.js',
    path_to_theme() . '/js/ie-scripts-min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
    'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.4/jquery.min.js',
  );

  // Remove drupal scripts, added above to be below new jQuery
  unset($javascript ['misc/jquery.js']);

  // Remove new jQuery if less than IE 9
  if( preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ) {
    unset($javascript [path_to_theme() . '/js/jquery-min.js']);
    unset($javascript ['https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js']);
  }

  // Loop through scripts and set them to load in the footer
  // unless they are in the excluded scripts array that are allowed to load in the head
  foreach ($javascript as $key => &$script) {
    if ($script['scope'] == 'header' && !in_array($script['data'], $header_scripts)) {
      $script['scope'] = 'footer';
    }
  }
}


/**
 * HTTP Headers repsonse function (200, 404...)
 *
 * @link http://php.net/manual/en/function.get-headers.php
 */
function get_http_response_code( $theURL ) {
  $headers = get_headers( $theURL);
  return substr( $headers[0], 9, 3 );
}


/**
 * Check & Load jQuery on CDN
 *
 */
function get_js_cdn( $cdnLocation, $localLocation, $loadLocation ) {
  // Load jQuery from cdn if available
  if ( get_http_response_code($cdnLocation ) == 200 ) {
    drupal_add_js($cdnLocation, array('type' => 'file', 'scope' => $loadLocation, 'weight' => -25));
  } else {
    drupal_add_js(path_to_theme() . $localLocation, array('type' => 'file', 'scope' => $loadLocation, 'weight' => -25));
  }
}