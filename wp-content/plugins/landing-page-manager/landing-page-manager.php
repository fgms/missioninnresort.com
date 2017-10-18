<?php
/**
 * Plugin Name: Landing Page Manager
 * Description: A Tool to Manage Landing Pages
 * Version: 1
 * Author: Myles English - Fifth Gear Development
 */

//Register Custom Post Type Program
function register_landing_page_cp_type(){
  $labels = array(
    'name'               => _x( 'Landing Page', 'post type general name'),
    'singular_name'      => _x( 'Landing Page', 'post type singular name'),
    'add_new'            => _x( 'Add New', 'Landing Page'),
    'add_new_item'       => __( 'Add New Landing Page'),
    'edit_item'          => __( 'Edit Landing Page' ),
    'new_item'           => __( 'New Landing Page' ),
    'all_items'          => __( 'All Landing Pages' ),
    'view_item'          => __( 'View Landing Pages' ),
    'search_items'       => __( 'Search Landing Pages' ),
    'not_found'          => __( 'No Landing Pages Found' ),
    'not_found_in_trash' => __( 'No Landing Pages Found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Landing Pages'
    );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Enter a Landing Page Description Here',
    'public'        => true,
    'supports'      => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
    'has_archive'   => false,
    'hierarchical'  => false,
    ); 
    register_post_type('landing-page', $args);
    flush_rewrite_rules(false);
}
add_action('init', 'register_landing_page_cp_type');
//Custom Messages for Custom Post Type Landing Page
function landing_page_cp_type_messages( $messages ) {
  $messages['Landing Page'] = array(
    0 => '', 
    1 => sprintf( __('Landing Page updated. <a href="%s">View Landing Page</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Landing Page updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Landing Page restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Landing Page published. <a href="%s">View Landing Page</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Landing Page saved.'),
    8 => sprintf( __('Landing Page submitted. <a target="_blank" href="%s">Preview Landing Page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Landing Page scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Landing Page</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Landing Page draft updated. <a target="_blank" href="%s">Preview Landing Page</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'landing_page_cp_type_messages' );

    /************** Landing Page Meta-box ***************/

    global $post;
    $post_id = get_the_ID();
        
    // Register the Metabox
    function landing_page_cp_type_meta_box() {
        add_meta_box( 'landing-page-meta-box', __( 'Landing Page Fields', 'textdomain' ), 'landing_page_meta_box_output', 'landing-page', 'normal', 'high' );
    }
    add_action( 'add_meta_boxes', 'landing_page_cp_type_meta_box' );
    
    // Output the Metabox
    function landing_page_meta_box_output( $post ) {
        // create a nonce field
        //wp_nonce_field( 'the_landing_page_meta_box_nonce', 'landing_page_meta_box_nonce' ); ?>

            </p>Enter additional information for your landing page here.</p>
            <label>Sub-Title</label><br/>
            <?php echo get_post_meta($post->id, 'landing_page_sub_title', true); ?>
            <input name="landing_page_sub_title" type="text" value="<?php echo get_post_meta($post->id, 'landing_page_sub_title', true); ?>"><br/>
            <label>Mail - To</label><br/>
            <?php echo get_post_meta($post->id, 'landing_page_mail_to', true); ?>
            <input name="landing_page_mail_to" type="text"><br/>
            <label>Mail - CC</label><br/>
            <?php echo get_post_meta($post->id, 'landing_page_mail_cc', true); ?>
            <input name="landing_page_mail_cc" type="text"><br/>

    <?php } 
    
    // Save the Metabox values

    add_action( 'save_post', 'landing_page_cp_type_meta_box_save' );

    function landing_page_cp_type_meta_box_save( $post_id ) {
        // Stop the script when doing autosave
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
        // Verify the nonce. If it does not exist, stop the script
        //if( !isset( $_POST['landing_page_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['landing_page_meta_box_nonce'], 'the_landing_page_meta_box_nonce' ) ) return;
    
        // Stop the script if the user does not have edit permissions
        if( !current_user_can( 'edit_post' ) ) return;
    
        // Save the input
        update_post_meta( $post_id, 'landing_page_sub_title',$_POST['landing_page_sub_title'] );
        update_post_meta( $post_id, 'landing_page_mail_to',$_POST['landing_page_mail_to'] );
        update_post_meta( $post_id, 'landing_page_mail_cc',$_POST['landing_page_mail_cc'] );


    }
?>