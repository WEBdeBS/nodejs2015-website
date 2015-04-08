<?php

/**
 * 	Template Name: Become a supporter
 */

?>

<?php get_header(); ?>
	<div class="content supporters__container">
	<?php 
		if (have_posts()) {
			while(have_posts()){
				the_post(); 
				the_title('<h1>','</h1>');
				echo '<div class="supporters__content">';
				the_content();
				echo '</div>';
				$args = array(
					'hide_empty'        => false
				); 
				$terms = get_terms('supporter-type', $args);
				$service_terms = array();
				echo '<div class="supporters-type__container">';
				foreach($terms as $term){
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
			}
		}
	?>	
	</div>
<?php get_footer(); ?>