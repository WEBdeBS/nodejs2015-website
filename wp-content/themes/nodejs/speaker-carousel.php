<?php
  	echo '<div class="content speaker-carousel">';
	$args = array(
	  'posts_per_page'   => -1,
	  'orderby'          => 'title',
	  'order'            => 'DESC',
	  'post_type'        => 'speaker',
	  'post_status'      => 'publish',
	  'suppress_filters' => true 
	);
	$speakers_array = get_posts($args);
	$speaker_count = count($speakers_array);
	if($speaker_count > 0){
		echo '<div class="speaker-carousel__icon title">';
		echo '<img src="' . get_template_directory_uri() . '/images/title-speakers.png" alt="">';
		echo 'Speaker</div>';
		echo '<div class="speaker-carousel__container">';
		echo '<div id="speaker-carousel" class="owl-carousel">';
		foreach($speakers_array as $speaker){
			echo '<div class="speaker-carousel__item">';
			
			$img = types_render_field('speaker-photo', array('post_id' => $speaker->ID));
			$company = types_render_field('speaker-company', array('post_id' => $speaker->ID));
			echo '<div class="speaker-carousel__item-info">';
			echo '<div class="speaker-carousel__item-image">' . $img . '</div>';
			echo '<h3>' . get_the_title($speaker->ID) . '</h3>';
			if($company){
				echo '<div class="speaker-carousel__item-company">' . $company . '</div>';
			}
			echo '</div>';
			$talk = wpcf_pr_post_get_belongs($speaker->ID, 'talk');
			if($talk){
				echo '<div class="speaker-carousel__item-talk">';
				echo get_the_title($talk);
				echo '</div>';
				echo '<a href="' . get_the_permalink($talk) . '" class="speaker-carousel__item-link"></a>';	
			}
			echo '</div>';
		}
		if($speaker_count < 3){
			for($i = $speaker_count; $i < 3; $i++){
				echo '<div class="speaker-carousel__item speaker-carousel__item-cooming">';
				echo '<h3>Cooming soon</h3>';
				echo '</div>';
			}
		}
		echo '</div>';
		echo '</div>';
		
	}
echo '</div>';
?>