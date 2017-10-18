<?php get_header(); ?>
	<?php get_template_part( 'entry-crumb' ); ?>
	<ul class="article-index no-custom-bullets">
	 
	<?php
		/* $args = array('post_type'=>'any'); */
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array ('post_type'=> array('post', 'wedding-post','special-offer'),
					   'paged'=>$paged);
		
		$query = new WP_Query($args);
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); 
				get_template_part( 'entry' );
				comments_template(); 	
			}
		}
	?>
	</ul>
	<?php get_template_part( 'nav', 'below' ); ?>  
<?php get_footer(); ?>