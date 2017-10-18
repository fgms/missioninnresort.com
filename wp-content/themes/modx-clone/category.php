<?php get_header(); ?>

   <?php get_template_part( 'entry-crumb' ); ?>  
  <div class="header">
  <h1 class="entry-title"><?php _e( 'Category: ', 'blankslate' ); ?><?php single_cat_title(); ?></h1>
  <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
  </div>
  <ul class="article-index no-custom-bullets">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'entry' ); ?>
  <?php endwhile; endif; ?>
  </ul>
  <?php get_template_part( 'nav', 'below' ); ?>

<?php get_footer(); ?>