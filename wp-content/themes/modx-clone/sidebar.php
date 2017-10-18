<div style="padding-right: 36px;" id="sidebar">
	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
	<div id="primary" class="widget-area">
		<ul>
			<?php dynamic_sidebar( 'primary-widget-area' ); ?>
		</ul>
	</div>
	<?php endif; ?>
</div>
        