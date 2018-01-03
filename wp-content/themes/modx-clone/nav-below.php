<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
<nav id="nav-below" class="navigation row" role="navigation">
<div class="nav-previous col-md-6"><?php next_posts_link(sprintf( __( '%s older', 'blankslate' ), '<span class="meta-nav">&laquo;</span>' ) ) ?></div>
<div class="nav-next col-md-6 align-right"><?php previous_posts_link(sprintf( __( 'newer %s', 'blankslate' ), '<span class="meta-nav">&raquo;</span>' ) ) ?></div>

</nav>
<?php }


?>