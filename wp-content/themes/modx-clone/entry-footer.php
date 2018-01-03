<footer class="entry-footer">
<div class="row">          
    <div  class="col-sm-8 cat-links"><?php if (count(get_the_category()) > 0) {  _e( 'Posted in: ', 'blankslate' ); ?><?php the_category( ', ' ); } ?></div> 
    
    <?php if ( comments_open() ) { 
    echo '<div class="col-sm-4 comments-link align-right"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'blankslate' ) ) . '</a></div>';
    } ?>    
    
</div>
<div class="tag-links"><?php the_tags(); ?></div>
</footer> 
