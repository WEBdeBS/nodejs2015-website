<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_init(){
	register_setting('nodejs_options', 'nodejs_theme_options', 'theme_options_validate');
}

function theme_options_add_page() {
	add_theme_page('Theme Options', 'Opzioni del tema', 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}


function theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated'])){
		$_REQUEST['settings-updated'] = false;
	}
	echo '<div class="wrap">';
	screen_icon(); 
	echo "<h2>" . wp_get_theme() . __( ' Options', 'nodejs' ) . "</h2>";
	if (false !== $_REQUEST['settings-updated']){
		echo '<div class="updated fade"><p><strong>' . __( 'Options saved', 'nodejs' ) . '</strong></p></div>';
	}
	echo '<form method="post" action="options.php">';
	settings_fields('nodejs_options');
	$options = get_option('nodejs_theme_options');
	echo '<h3>INFORMAZIONI EVENTO</h3>';
	$value = isset($options['nodejs_luogo']) ? $options['nodejs_luogo'] : '';
	echo create_text_input('Luogo', 'nodejs_luogo', $value, "Inserisci il luogo dell'evento");
	$value = isset($options['nodejs_data']) ? $options['nodejs_data'] : '';
	echo create_text_input('Data', 'nodejs_data', $value, "Inserisci la data dell'evento");
	$value = isset($options['nodejs_eventbrite_code']) ? $options['nodejs_eventbrite_code'] : '';
	echo create_text_input('Eventbrite Code', 'nodejs_eventbrite_code', $value, "Inserisci il codice dell'evento su Eventbrite");
	echo '<h3>SOCIAL</h3>';
	$value = isset($options['nodejs_facebook']) ? $options['nodejs_facebook'] : '';
	echo create_text_input('Facebook', 'nodejs_facebook', $value, "Inserisci l'indirizzo della pagina Facebook");
	$value = isset($options['nodejs_twitter']) ? $options['nodejs_twitter'] : '';
	echo create_text_input('Twitter', 'nodejs_twitter', $value, "Inserisci l'indirizzo dell'account Twitter");
	$value = isset($options['nodejs_vimeo']) ? $options['nodejs_vimeo'] : '';
	echo create_text_input('Vimeo', 'nodejs_vimeo', $value, "Inserisci l'indirizzo del canale Vimeo");
	echo '<p class="submit">';
	echo '<input type="submit" class="button-primary" value="' . __( 'Save Options', 'nodejs' ) . '" />';
	echo '</p>';
	echo '</form>';
	echo '</div>';
}

function create_text_input($name, $option, $value, $message){
	$html = '';
	$html .= '<h4>' . __($name, 'nodejs' ) . '</h4>';
	$html .= '<div>';
	$html .= '<input id="nodejs_theme_options[' . $option . ']" class="regular-text" type="text" ';
	$html .= 'name="nodejs_theme_options[' . $option . ']" value="' . $value . '" />&nbsp;';						
	$html .= '<label class="description" for="nodejs_theme_options[' . $option . ']">'. __($message, 'nodejs' ) . '</label>';
	$html .= '</div>';
	return $html;
}

function create_checkbox_input($name, $option, $checked, $message){
	$html = '';
	$html .= '<h4>' . __($name, 'nodejs' ) . '</h4>';
	$html .= '<div>';
	$checked_text = $checked ? 'checked = checked' : '';
	$html .= '<input id="nodejs_theme_options[' . $option . ']" type="checkbox" ';
	$html .= 'name="nodejs_theme_options[' . $option . ']" ' . $checked_text . '/>&nbsp;';						
	$html .= '<label class="description" for="nodejs_theme_options[' . $option . ']">'. __($message, 'nodejs' ) . '</label>';
	$html .= '</div>';
	return $html;
}


function theme_options_validate( $input ) {
	return $input;
}

?>