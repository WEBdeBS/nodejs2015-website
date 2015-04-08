<?php
//include the main class file
require_once("tax-meta-class/tax-meta-class.php");
if (is_admin()) {
    $prefix = 'nodejsconf_';
    $config = array(
        'id' => 'taxonomy-meta-box',
        'title' => 'Taxonomy extra fields',
        'pages' => array(
            'supporter-type'
        ),
        'context' => 'normal',
        'fields' => array(),
        'local_images' => false,
        'use_with_theme' => get_template_directory_uri() . '/tax-meta-class'
    );
    
    $my_meta = new Tax_Meta_Class($config);
	
	$my_meta->addText($prefix.'supporter_price',array('name'=> __('Prezzo','nodejsconf'), 'desc' => 'Costo della sponsorizzazione'));
    
    $my_meta->addImage($prefix . 'supporter_type_icon', array('name' => __('Icona', 'nodejsconf')));
	
	$my_meta->addCheckbox($prefix.'supporter_service',array('name'=> __('Supporter di servizio','nodejsconf')));
   
    $my_meta->Finish();
}