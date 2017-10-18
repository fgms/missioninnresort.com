<?php
add_theme_support('post-thumbnails');
// only enqueue these scripts on the wedding post page
function wedding_post_scripts_enqueue() {

if(get_post_type() == 'wedding-post'){
	    // Register scripts
	    wp_register_script( 'imagesLoadedJS', '../../../assets/plugins/imagesloaded-master/imagesloaded.pkgd.min.js', array('jquery'), null, true );
	   // wp_register_script( 'jackboxAudioJS', '../../../assets/plugins/jackbox/js/jackbox-audio.min.js', array('jquery'), null, false );
	   // wp_register_script( 'jackboxEffectsJS', '../../../assets/plugins/jackbox/js/jackbox-effects.min.js', array('jquery'), null, false );
	    wp_register_script( 'jackboxPackedJS', '../../../assets/plugins/jackbox/js/jackbox-packed.min.js', array('jquery'), null, true );
	   //	wp_register_script( 'jackboxVideoJS', '../../../assets/plugins/jackbox/js/jackbox-video.min.js', array('jquery'), null, false );
	    wp_register_script( 'WookmarkJS', '../../../assets/js/jquery.wookmark.min.js', array('jquery'), null, true );
	    wp_register_style( 'jackboxCSS', '../../../assets/plugins/jackbox/css/jackbox.min.css' );

	    
	    // Enqueue the scripts:
	    wp_enqueue_script( 'imagesLoadedJS' );
	    // wp_enqueue_script( 'jackboxAudioJS' );
	    // wp_enqueue_script( 'jackboxEffectsJS' );
	    wp_enqueue_script( 'jackboxPackedJS' );
	    // wp_enqueue_script( 'jackboxVideoJS' );
	    wp_enqueue_script( 'WookmarkJS' );
	    wp_enqueue_style( 'jackboxCSS');
	}
}

add_action( 'wp_enqueue_scripts', 'wedding_post_scripts_enqueue' );

function new_excerpt_more( $more ) {
	return '<a class="action" href="'. get_permalink( get_the_ID() ) . '">&hellip;</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
function url_shortcode() {
	//this returns the main site url
	return get_bloginfo('url') . '/..';
}

add_filter ('widget_posts_args', 'widget_posts_args_add_custom_type');
function widget_posts_args_add_custom_type($params) {
	$params['post_type'] = array('post','wedding-post');
	return $params;
}



add_shortcode('url','url_shortcode');


add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup(){
	load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(	array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )	);
	add_image_size('pinterest-thumb', 200, 9999);
}
// We don't need jquery
/*add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}*/
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
	if ( $title == '' ) {
	return '&rarr;';
	} else {
	return $title;
	}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="btn btn-primary"';
}

function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

// Message for character limit

function init_my_attachments_extension( $attachments )
{
    echo '<p>Photo captions will be cut off after 60 characters.</p>';
}

add_action( 'attachments_extension', 'init_my_attachments_extension', 10, 1 );

// Register custom thumbnail size
function wedding_thumb(){
	add_image_size( 'wedding-thumb', 210 ); // 210 pixels wide (and unlimited height)
}

add_action('after_setup_theme', 'wedding_thumb');

// Register custom attachments with wedding-post cp type

function cp_wedding_post_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'photo-title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Photo Title', 'attachments' ),    // label to display
      'default'   => 'photo title',                         // default value upon selection
    ),/*
    array(
      'name'      => 'photo-caption',                       // unique field name
      'type'      => 'textarea',                      // registered field type
      'label'     => __( 'Photo Caption', 'attachments' ),  // label to display
      'default'   => 'photo caption',                       // default value upon selection
    ),*/
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Photo Uploads',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'Wedding-Post' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attach photos here!  Keep captions under 260 characters.',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'cp_wedding_post_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'cp_wedding_post_attachments' );

?>