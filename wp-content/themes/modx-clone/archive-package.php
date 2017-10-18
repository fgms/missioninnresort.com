<?php get_header();  echo '<div style="color:red">' . $_REQUEST['package_type'] . '</div>'; ?>
						
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
                        
                        <?php get_template_part( 'entry','nolink' );
                        	
                            $pdf_info =  get_post_meta(get_the_ID(), 'sat_fgms_wp_pdf_attachment', true);
                            if (strlen($pdf_info['url']) > 10) {?>
                            <a href="<?php echo $pdf_info['url'];?>" target="_blank"><div class="pdf-download-wrapper"><img src="/assets/images/template/iconPDF.png" alt="pdf icon"/><span style="margin-left:8px;" >Download PDF</span></div></a>
                            
                        
                        <?php }
                        endwhile; endif; ?>
                        <?php get_template_part( 'nav', 'below' ); ?>

<?php get_footer(); ?>