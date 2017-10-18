<section class="entry-summary">
<?php if (has_post_thumbnail()){ ?>
<div class="row" style="padding-top: 8px;">
	<div class="col-xs-3" style=""><a href="<?php echo post_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
	<div class="col-xs-9" style=""><?php the_excerpt(); ?></div>	
</div>
<?php
}
else { the_excerpt();}
?>


<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>