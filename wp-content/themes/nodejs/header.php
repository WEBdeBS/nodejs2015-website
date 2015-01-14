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
    <div class="topbar"></div>
    <div class="header">
      <header class="header__title">
        <h1>
          - Node.js -
        </h1>
        <h2>
          Italian Conference - IV Edition
        </h2>
        <h3>
          September 2015
        </h3>
      </header>
    </div>
    <nav class="nav">
      <?php wp_nav_menu(); ?>
      <div class="hr"></div>
    </nav>