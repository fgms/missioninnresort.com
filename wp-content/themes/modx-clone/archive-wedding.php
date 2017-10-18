<?php get_header(); ?>

                     <?php get_template_part( 'entry-crumb' ); ?>  
                        <div class="header">
                        <h1 class="entry-title"><?php 
                            if ( is_day() ) { printf( __( 'Daily Archives: %s', 'blankslate' ), get_the_time( get_option( 'date_format' ) ) ); }
                            elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'blankslate' ), get_the_time( 'F Y' ) ); }
                            elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'blankslate' ), get_the_time( 'Y' ) ); }
                            else { _e( '', 'blankslate' ); }
                        ?></h1>
                        </div>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        
                        <?php echo  get_template_part( 'entry','nolink' );                      	
                           
                        
                        <?php }
                        endwhile; endif; ?>
                        <?php get_template_part( 'nav', 'below' ); ?>

<?php get_footer(); ?>