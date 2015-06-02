<?php 

// Opzioni del tema
include 'theme-options.php';

// Campi extra Taxonomy
require_once (get_stylesheet_directory() . '/taxonomy-metabox.php');

// Registro il Main menu
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('footer-menu', 'Footer Menu');
register_nav_menu('policy-menu', 'Policy Menu');

?>