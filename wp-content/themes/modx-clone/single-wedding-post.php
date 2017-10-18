<?php get_header(); ?>

   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

   <?php
   		// Get custom fields
   		$photog_name = types_render_field("wedding-photographer-name", array("raw"=>"true"));
   		$photog_url = types_render_field("wedding-photographer-link", array("raw"=>"true"));
	    //$date = types_render_field("wedding-date", array("output"=>"html"));
	    $subtitle = types_render_field("wedding-sub-title", array("raw"=>"true","separator"=>";"));
	   	$venue_ceremony = types_render_field("ceremony-venues", array("raw"=>"true","separator"=>";"));
		$venue_reception = types_render_field("reception-venues", array("raw"=>"true","separator"=>";"));
		
    ?>

   <?php get_template_part( 'entry-crumb' ); ?>  

	
	<div>
	   	<h1 class="entry-title" id="wedding-title"><?php echo the_title(); ?></h1>
	   	<h3 id="wedding-sub-title"><?php echo $subtitle; ?></h3>
	   	<section id="wedding-meta" class="entry-meta">
	   		<div class="">
				
	   			<?php if ((!empty($venue_ceremony)) && ($venue_ceremony != 'none') ){?>
					<div  id="ceremony-venue" class="wedding-blog-info"><span>Ceremony Venue:</span><a href="<?php echo $venue_ceremony; ?>"><?php echo(types_render_field('ceremony-venues',array()));?></a></div><?php
				} ?>
				<?php if ((!empty($venue_reception)) && ($venue_reception != 'none')){ ?>
					<div  id="ceremony-venue" class="wedding-blog-info"><span>Reception Venue:</span><a href="<?php echo $venue_reception; ?>"><?php echo(types_render_field('reception-venues',array()));?></a></div><?php
				} ?>
				<?php if (!empty($photog_name)){ ?><div  id="wedding-date" class="wedding-blog-info"><span>Photographs by:</span><a href="<?php echo $photog_url; ?>"><?php echo $photog_name; ?></a></div><?php } ?>
					
			</div>
	   	</section>
   	</div>

   	<section class="entry-content">
   		<?php the_content(); ?>
   	</section>
 
	<div class="pinit-gallery">
		<!--<div class="filters" data-pinit="#[[+wrapperId:default=`pinit-default`]]">[[+filter]]</div> -->
  			<div id="wedding-pinit-gallery" class="wedding-post-pinit-wrapper">

				<?php $attachments = new Attachments( 'cp_wedding_post_attachments' ); ?>
					<?php if( $attachments->exist() ) : ?>
					  <ul class="no-custom-bullets gallery-strip-wrapper"  >
					    <?php while( $attachment = $attachments->get() ) : ?>
					      <li style="top: 0px" class="gallery-strip-element " >

					      		<a class="jackbox"                         
									data-group="weddingpinit" 
									data-thumbnail="<?php echo $attachments->src('wedding-thumb'); ?>" 
									data-thumbTooltip="Click to View Gallery" 
									data-title="<span class='hidden-phone'><?php $caption_length = count_chars($attachments->field('photo-title')); ?>
									       	<?php echo substr($attachments->field( 'photo-title' ), 0, 60); ?></span>"            
									href=" <?php echo $attachments->url(); ?>"     >
									<div class="jackbox-hover jackbox-hover-black jackbox-hover-magnify"><p></p></div>
									 <img src="<?php echo $attachments->src( 'wedding-thumb' ); ?>" alt="<?php echo $attachments->field( 'photo-title' ); ?>"/>
								</a>

								<div style="position: relative;">
									<div class="pinit-text">
									      	<?php $caption_length = count_chars($attachments->field('photo-title')); ?>
									       	<?php echo substr($attachments->field( 'photo-title' ), 0, 60); ?>
									</div>
									<div class="pinit-icons">

									<?php 
										$encode_url = urlencode($attachments->url());
     									$encode_image = urlencode($attachments->url());
     									$encode_description = urlencode(get_bloginfo() . ' ' . get_the_title());
     								?>


										<a  href="http://www.pinterest.com/pin/create/button/?url=<?php echo $encode_url;?>&media=<?php echo $encode_image;?>&description=<?php echo $encode_description;?>"
											target="_blank"
											data-pin-do="buttonPin"
											class="fgms-pinit-social-pinit"
											data-pin-config="above">                
										</a>
									</div>	        
								</div>
					      
					      </li>
					    <?php endwhile; ?>
					  </ul>
			
				<?php endif; ?>

			</div>
		</div>	  



   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
   <?php endwhile; endif; ?>

   <footer class="footer">
       <?php get_template_part( 'nav', 'below-single' ); ?>
   </footer>
<?php get_footer(); ?>

<script  type="text/javascript">
	
$(function(){
	if (typeof setup_pinit2 == 'function'){
		setup_pinit2('#wedding-pinit-gallery',{});		
	}
	else {

	}



if (($(".jackbox[data-group]").length > 0) ){
  $(".jackbox[data-group]").jackBox("init",{ baseName:'../../../assets/plugins/jackbox'});
  $('.jackbox-link').click(function(){
     $(this).closest('.pull-left').find('.jackbox').trigger('click');
  })
  $('.clone-image-link').click(function(event){
    if ($(this).closest('.jackbox-thumb-list-element').length > 0){
     $(this).closest('.jackbox-thumb-list-element').find('.jackbox[data-group]').trigger('click')
    }
   else{
    $(this).find('.jackbox').trigger('click');
   }
    
   event.preventDefault();
   return false;
  })
 }								  
})



function setup_pinit2(selectorId, options_loaded){
	// imagesLoaded insures all images are loaded before creating pinit gallery 
    if (($('html').hasClass('ie7'))){
		$('<div style="font-style:italic; color: red; font-size: 12px;">This feature requires IE 8 or higher</div>').insertBefore(selectorId);
		return;
	}
	if (typeof imagesLoaded != 'function'){ console.log('no imagesLoaded Plugin');return; }
	imagesLoaded( selectorId, function(){
		var defaults = {
			autoResize : true, 			
			container : $(selectorId),	
			offset : 5,					
			outerOffset : 10,			
			itemWidth: 210				
		}
		var options = $.extend({}, defaults, options_loaded);

	  	if ($(selectorId + ' .gallery-strip-wrapper').length > 0){
			var handler = $(selectorId + ' .gallery-strip-wrapper li');
			handler.wookmark(options);      
			var filters = $(selectorId).closest('.pinit-gallery').find('.filters select');
			
			 function onClickFilter(e) {
			    var filterObject = $('select[name="pinit-filter"]').val();
				if (filterObject == null){
					filterObject = ['null'];
				}

				handler.wookmarkInstance.filter(filterObject,'or');
				
			}
			 filters.on('change', onClickFilter);
		}
		console.log('pinit gallery setup');
	$('#wedding-pinit-gallery').animate(
		{	'-moz-opacity' : 1,
			'-khtml-opacity' : 1,
			'opacity' : 1,
			'-ms-filter' :'"progid:DXImageTransform.Microsoft.Alpha"(Opacity=100)',
			'filter: progid': 'DXImageTransform.Microsoft.Alpha(opacity=100)',
			'filter':'alpha(opacity=100)'
		},1000);
	});
}

</script>