<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in html.tpl.php and page.tpl.php.
 * Some may be blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 *
 * @ingroup themeable
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<!--<![endif]-->

<head>
  <title><?php print $head_title; ?></title>

  <meta http-equiv="content-type" content="text/html; charset=utf-8"><!-- https://developer.mozilla.org/en-US/docs/Mozilla/Mobile/Viewport_meta_tag -->
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><!-- http://www.validatethis.co.uk/news/fix-bad-value-x-ua-compatible-once-and-for-all/ -->

  <link rel="apple-touch-icon" sizes="57x57" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/<?php print path_to_theme(); ?>/icons/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/<?php print path_to_theme(); ?>/icons/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="/<?php print path_to_theme(); ?>/icons/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="/<?php print path_to_theme(); ?>/icons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="/<?php print path_to_theme(); ?>/icons/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="/<?php print path_to_theme(); ?>/icons/manifest.json">
  <link rel="shortcut icon" href="/<?php print path_to_theme(); ?>/icons/favicon.ico">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="/<?php print path_to_theme(); ?>/icons/mstile-144x144.png">
  <meta name="msapplication-config" content="/<?php print path_to_theme(); ?>/icons/browserconfig.xml">
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

  <!-- Header -->
  <header class="row">
    <div class="medium-12 columns">

      <?php if (!empty($logo)): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name || $site_slogan)): ?>
        <div id="name-and-slogan">
          <?php if (!empty($site_name)): ?>
            <?php if (!empty($title)): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>

      <?php print render($page['header']); ?>

    </div>
  </header>

  <!-- Navigation --> 
  <div class="row">
    <div class="medium-12 columns">
      <?php if (!empty($main_menu || $secondary_menu)): ?>
        <nav>
          <div class="section">
            <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
            <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')))); ?>
          </div>
        </nav> <!-- /.section, /#navigation -->
      <?php endif; ?>

      <?php if (!empty($breadcrumb)): ?>
        <nav id="breadcrumb"><?php print $breadcrumb; ?></nav>
      <?php endif; ?>

      <?php print $messages; ?>
    </div>
  </div>

  <!-- Page Content -->
  <div id="main" class="row">

    <!-- First Sidebar -->
    <?php if (!empty($page['sidebar_first'])): ?>
      <div id="sidebar-first" class="medium-4 columns">
        <?php print render($page['sidebar_first']); ?>
      </div>
    <?php endif; ?>

    <!-- Main Content -->
    <div id="content" class="medium-8 columns">
      <?php if (!empty($page['highlighted'])): ?>
        <div id="highlighted">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <a id="main-content"></a>
      
      <?php print render($title_prefix); ?>

      <?php if (!empty($title)): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      
      <?php print render($title_suffix); ?>

      <?php if (!empty($tabs)): ?>
        <div class="tabs"><?php print render($tabs); ?></div>
      <?php endif; ?>
    
      <?php print render($page['help']); ?>
    
      <?php if (!empty($action_links)): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

      <?php print $content; ?>
      <?php print $feed_icons; ?>
    </div>

  </div>

  <!-- Footer -->
  <footer class="row">
    <div class="medium-12 columns">
      <?php print render($page['footer']); ?>
    </div>
  </footer> <!-- /.section, /#footer -->

</body>
</html>
