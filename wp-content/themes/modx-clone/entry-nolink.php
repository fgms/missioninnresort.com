<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div>
<?php 
    if ( is_singular() ) { 
        echo '<h1 class="entry-title">';  
        the_title(); 
        echo '<h3 class="entry-title">Blog Post</h3>';


        
    } 
    else {  echo '<h2 class="entry-title">';  
         the_title();
        } 
    if ( is_singular() ) { echo '</h1>'; }
    else { echo '</h2>'; } ?> <?php //edit_post_link(); ?>
<?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
</div>
<?php get_template_part( 'entry', ( is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
</article> 
