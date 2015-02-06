<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php wp_title("|", true, "right"); ?>
      <?php bloginfo("name"); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
    <?php wp_head(); ?>
  </head>
  <body>
    <div class="topbar">
      <a target="_blank" href="https://www.facebook.com/groups/webdebs/">
        <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="">
      </a>
      <a target="_blank" href="https://twitter.com/webdebresa">
        <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="">
      </a>
      <a target="_blank" href="http://vimeo.com/user8514282">
        <img src="<?php echo get_template_directory_uri(); ?>/images/vimeo.png" alt="">
      </a>
    </div>
    <div class="header">
      <img class="header__knot" src="<?php echo get_template_directory_uri(); ?>/images/header-node-corner.png" alt="">
      <header class="header__title">
        <h1>
          - Node.js -
        </h1>
        <h2>
          Italian Conference - IV Edition
        </h2>
        <h3>
          October 2015
        </h3>
      </header>
    </div>
    <nav class="nav">
      <?php wp_nav_menu(); ?>
      <div class="hr"></div>
    </nav>
