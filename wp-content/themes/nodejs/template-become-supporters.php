<?php

/**
 * 	Template Name: Become a supporter
 */

?>

<?php get_header(); ?>
	<?php 
		if (have_posts()) {
			while(have_posts()){
				$args = array(
					'hide_empty'        => false
				);
				$terms = get_terms('supporter-type', $args);
				/*echo '<div class="content supporter-list__supercontainer">';
				foreach($terms as $term){
					$no_logo = get_tax_meta($term->term_id,'nodejsconf_no_logo');
					if(!$no_logo){
						echo '<div class="supporter-list__container">';
						echo '<div class="supporter-title">';
						$icon = get_tax_meta($term->term_id,'nodejsconf_supporter_type_icon');
						if($icon){
							echo '<div class="supporter-title__img" style="background-image: url(\'' . $icon['url'] . '\')"></div>';
						}
						echo '<h2>' . $term->name . '</h2>';
						echo '</div>';
						echo '<div class="supporter-list">';
						$max_supporter = get_tax_meta($term->term_id,'nodejsconf_supporter_max_number');
						$box_type = get_tax_meta($term->term_id,'nodejsconf_thumbnail_dim');
						$max_supporter = intval($max_supporter);
						$box_type = $box_type == '' ? 'small' : $box_type;
						$supporters = get_posts(array(
							'post_type' => 'supporter',
						  	'numberposts' => -1,
						  	'tax_query' => array(
						    	array(
						      		'taxonomy' => 'supporter-type',
						      		'field' => 'id',
						      		'terms' => $term->term_id,
						      		'include_children' => false
						    	)
						  	)
						));

						for ($i = 0; $i < $max_supporter; $i++){
							echo '<div class="supporter-item supporter-item--' . $box_type . '">';
							echo '<div class="supporter-item__content">';
							if(isset($supporters[$i])){
								$src = get_the_post_thumbnail($supporters[$i]->ID);
								$href = $supporters[$i]->post_content;
								echo '<a href="' . $href . '" target="_blank">'. $src . '</a>';
							}
							echo '</div>';
							echo '</div>';
						}				
						echo '</div>';
						echo '</div>';
					}
				}
				echo '</div>';
				echo '<div class="supporter-separator" id="become-supporter">';
				echo '<img src="' .  get_template_directory_uri() . '/images/flags.png" alt="">';
				echo '</div>';
				*/
				echo '<div class="content supporters__container">';
				the_post(); 
				the_title('<h1>','</h1>');
				echo '<div class="supporters__content">';
				the_content();
				echo '</div>';
				$service_terms = array();
				echo '<div class="supporters-type__container">';
				foreach($terms as $term){
					$is_media_partner = get_tax_meta($term->term_id,'nodejsconf_media_partner');
					if(!$is_media_partner){
						$is_service = get_tax_meta($term->term_id,'nodejsconf_supporter_service');
						if($is_service){
							array_push($service_terms, $term);
						} else {
							echo '<div class="supporters-type__content">';
							$price = get_tax_meta($term->term_id,'nodejsconf_supporter_price');
							$icon = get_tax_meta($term->term_id,'nodejsconf_supporter_type_icon');
							echo '<div class="supporters-type__img" style="background-image: url(\'' . $icon['url'] . '\')"></div>';
							echo '<h2>' . $term->name . '</h2>';
							echo '<p class="supporters-type__price">&euro; ' . $price . '</p>';
							echo '<div class="supporters-type__description">' . apply_filters('the_content', $term->description) . '</div>';
							echo '</div>';
						}
					}
				}
				echo '</div>';
				if(count($service_terms) > 0){
					echo '<div class="service__container">';
					$count = 0;
					foreach($service_terms as $service){
						$icon = get_tax_meta($service->term_id,'nodejsconf_supporter_type_icon');
						echo '<div class="service-type__content ' . (++$count%2 ? "odd" : "even");
						if($icon){
							echo ' content_with_icon" style="background-image: url(\'' . $icon['url'] . '\')">';
						} else {
							echo '" >';
						}
						$price = get_tax_meta($service->term_id,'nodejsconf_supporter_price');
						echo '<h2>' . $service->name . '</h2>';
						echo '<p class="service__price">&euro; ' . $price . '</p>';
						echo '<div class="service__description">' . apply_filters('the_content', $service->description) . '</div>';
						echo '</div>';
					}
					echo '</div>';
				}
				echo '</div>';
			}
		}
	?>	
<?php get_footer(); ?>