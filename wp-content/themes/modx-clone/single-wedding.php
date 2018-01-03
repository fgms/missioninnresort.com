<?php get_header(); ?>
              
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <?php get_template_part( 'entry-crumb' ); ?>  

   <?php get_template_part( 'entry' ); ?>
   <?php
                           $date = types_render_field("wedding_date", array("output"=>"html"));
                        $subtitle = types_render_field("wedding-sub-title", array("output"=>"html"));

                        echo $date;
                        echo $subtitle;

    ?>
   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
   <?php endwhile; endif; ?>
   <footer class="footer">
       <?php get_template_part( 'nav', 'below-single' ); ?>
   </footer>
<?php get_footer(); ?>