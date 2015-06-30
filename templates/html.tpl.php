<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<!--<![endif]-->

<head>
  <title><?php print $head_title; ?></title>

  <meta http-equiv="content-type" content="text/html; charset=utf-8"><!-- https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag -->
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><!-- http://www.validatethis.co.uk/news/fix-bad-value-x-ua-compatible-once-and-for-all/ -->

  <link rel="apple-touch-icon" sizes="57x57" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php print path_to_theme() ?>/icons/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="<?php print path_to_theme() ?>/icons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php print path_to_theme() ?>/icons/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php print path_to_theme() ?>/icons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php print path_to_theme() ?>/icons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?php print path_to_theme() ?>/icons/manifest.json">
  <link rel="shortcut icon" href="<?php print path_to_theme() ?>/icons/favicon.ico">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="<?php print path_to_theme() ?>/icons/mstile-144x144.png">
  <meta name="msapplication-config" content="<?php print path_to_theme() ?>/icons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  
  <!-- Site App Name -->
  <meta name="apple-mobile-web-app-title" content="<?php print variable_get('site_name'); ?>">
  <meta name="application-name" content="<?php print variable_get('site_name'); ?>">

  <!-- Go the extra mile -->
  <!-- http://msdn.microsoft.com/en-us/library/ie/gg491732(v=vs.85).aspx -->
  <!--
  <meta name="msapplication-tooltip" content="Additional tooltip text">
  <meta name="msapplication-window" content="width=1024;height=768">
  <meta name="msapplication-starturl" content="./">
  <meta name="msapplication-navbutton-color" content="#E72C53">
  -->

  <!-- Can this be a standalone web app for ios? -->
  <!-- https://developer.apple.com/library/safari/documentation/AppleApplications/Reference/SafariHTMLRef/Articles/MetaTags.html -->
  <!-- <meta name="apple-mobile-web-app-capable" content="YES"> -->

  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  
  <a class="skip-link screen-reader-text" href="#main-content"><?php print t('Skip to main content'); ?></a>

  <!--[if lt IE 8]><p class=chromeframe>Your browser is <em>not</em> supported. <a href="http://browsehappy.com/">Upgrade to a different browser</a> to experience this site.</p><![endif]-->

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

</body>
</html>
