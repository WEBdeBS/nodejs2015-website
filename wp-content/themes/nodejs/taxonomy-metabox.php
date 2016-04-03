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
	
	$my_meta->addText($prefix.'supporter_max_number',array('name'=> __('Quantità massima','nodejsconf'), 'desc' => 'Serve per stampare i box vuoti'));

    $my_meta->addRadio($prefix.'thumbnail_dim',array('small'=>'Small','middle'=>'Middle', 'big' => 'Big'),array('name'=> __('Thumbnail dimension','nodejsconf'), 'std'=> array('small')));

    $my_meta->addCheckbox($prefix.'supporter_service',array('name'=> __('Supporter di servizio','nodejsconf')));

    $my_meta->addCheckbox($prefix.'media_partner',array('name'=> __('Media partner','nodejsconf')));

    $my_meta->addCheckbox($prefix.'no_logo',array('name'=> __('No logo','nodejsconf')));
   
    $my_meta->Finish();
}