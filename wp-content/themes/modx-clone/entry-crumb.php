<?php
session_start();

$post_object = get_post_type_object(get_post_type( get_the_ID() ));
$posttitle = (strtolower($post_object->labels->name) == 'posts') ? 'Blog': ($post_object->labels->singular_name) ; 
	
if ((is_category()) && (!is_single())){
   //echo get_the_category() ;
   $categories = get_the_category();
   if ($categories != null){
	  $_SESSION['category_details'] = $categories[0];  
   }    
}
else if (!is_single()){
   unset($_SESSION['category_details']);
}


$blog_label = (isset($_SESSION['category_details'])) ? $_SESSION['category_details']-> name : 'Blog';
$blog_url = (isset($_SESSION['category_details'])) ? home_url() . '/category/' . $_SESSION['category_details']->slug : home_url() . '/' . ((get_post_type( get_the_ID()) == 'post')? '' : get_post_type( get_the_ID())) ;
?>

<ul class="B_crumbBox">
   <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="itemscope" class="B_firstCrumb">
	  <a href="<?php  bloginfo('url') ; echo '/../'?>" rel="Home" itemprop="url" class="B_homeCrumb"><span itemprop="title">Home</span></a>
   </li> » 

<?php if ( is_singular() ) { ?>
		<li itemtype="http://data-vocabulary.org/Breadcrumb" class="B_crumb" itemscope="itemscope">
			<a href="<?php echo $blog_url ?>" rel="News &amp; Events" itemprop="url" class="B_crumb">
				<span itemprop="title">	<?php  $post_object = get_post_type_object(get_post_type( get_the_ID() )); echo $blog_label;?></span>
			</a>
		</li> » 				
		<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="itemscope" class="B_lastCrumb"></li>
		<li itemtype="http://data-vocabulary.org/Breadcrumb" class="B_currentCrumb" itemscope="itemscope"><?php the_title() ?></li>	
	</ul>

	<div style="text-transform: uppercase; font-size: 18px; margin-bottom: 24px;">Mission Inn  <?php echo $posttitle ?></div>

<?php }else { ?>

		<li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="itemscope" class="B_lastCrumb"></li>
		<li itemtype="http://data-vocabulary.org/Breadcrumb" class="B_currentCrumb" itemscope="itemscope"><?php  echo (strtolower($post_object->labels->name) == 'posts') ? $blog_label : $post_object->labels->name ;?></li>	
	</ul>

	<div class="row">
		<div class="col-md-7">		
			<?php
			if (( is_front_page())){
				
			   echo '<h1>' . ((strtolower($post_object->labels->name) == 'posts') ? 'Mission Inn Blog' : $post_object->labels->name ). '</h1>';
			}
			else if (is_post_type_archive()) {
				echo '<h1>' . ((strtolower($post_object->labels->name) == 'posts') ? 'Mission Inn Blog' : $post_object->labels->name ). '</h1>';
			}
			else {
			echo '<div style="text-transform: uppercase; font-size: 18px; margin-bottom: 24px;">Mission Inn Blog</div>';
			}
	
			//'<h1>' . (strtolower($post_object->labels->name) == 'posts') ? 'Blog' : $post_object->labels->name . '</h1>'
			?>
		</div>


		<div class="rssWrapper col-md-5 align-right">
		   <?php
			  if ( is_category() ) {
				 $category = get_category( get_query_var('cat') );		 
				// echo json_encode($category);
				 $feed = get_category_feed_link($category->term_taxonomy_id);
				 $feed_name = $category->name;
			  } else {
				 $feed = get_bloginfo('rss2_url');
				 $feed_name = "";
			  }
		   ?>
		   
			<a href="<?php echo $feed; ?>">	
				<img border="0" style="padding-right: 4px;" alt="rss Icon" src="/../assets/images/template/iconRSS.png">
				<span class="rssLinkTitle">Subscribe to <?php echo $feed_name;  ?> RSS feed</span>
			</a>
	</div>   
</div>

   
<?php } ?>



