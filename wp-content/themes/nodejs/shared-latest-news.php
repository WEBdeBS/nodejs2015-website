<div class="latest-news col-sm-3">
	<h4>All bullettin news</h4>
	<ul class="latest-news__list">
	<?php 
		$args = array(
			'posts_per_page'   => 3,
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
		);
		$posts_array = get_posts($args);
		foreach($posts_array as $p){
			echo '<li><a href="' . get_permalink($p->ID) . '">' . get_the_title($p->ID) . '</a></li>';
		}
	?>
	</ul>
</div>	