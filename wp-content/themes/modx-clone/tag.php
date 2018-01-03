<?php get_header(); ?>
                <section id="content" role="main">
                    <div class="header">
                        <h1 class="entry-title"><?php _e( 'Tag Archives: ', 'blankslate' ); ?><?php single_tag_title(); ?></h1>
                    </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'entry' ); ?>
                    <?php endwhile; endif; ?>
                    <?php get_template_part( 'nav', 'below' ); ?>
                </section>        
                </div> 
            </div>
            
            <!-- sidebar -->
            <div class="span4" >
                <div id="page-sidebar"><?php get_sidebar(); ?></div>
                
            </div>
        </div>

<?php get_footer(); ?>