<?php 

// Opzioni del tema
include 'theme-options.php';

// Campi extra Taxonomy
require_once (get_stylesheet_directory() . '/taxonomy-metabox.php');

// Registro il Main menu
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('footer-menu', 'Footer Menu');
register_nav_menu('policy-menu', 'Policy Menu');

function modify_num_posts_for_talks($query){
    if ($query->is_main_query() && $query->is_post_type_archive('talk') && !is_admin()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'modify_num_posts_for_talks');

?>