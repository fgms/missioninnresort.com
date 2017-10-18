<?php
/*
Plugin Name: FGMS Modx Clone
Plugin URI: http://www.turple.ca
Description: This plugin, will call predefined chunks, and load them into wp cache, see plugin options for more details
Author: Shawn Turple
Author URI: http://www.turple.ca
Version: 0.0.1Beta
Text Domain:
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
//add_action( 'admin_notices', 'sat_website_monitor_custom_error_notice' );
add_action('admin_init','sat_fgms_modx_clone_admin_int');

function sat_fgms_modx_clone_get_section($section='', $expire=14400)
{
	$response = array();
	//delete_transient('sat_fgms_modx_clone_section_' . $section);
	$cache = get_transient('sat_fgms_modx_clone_section_' . $section);
	if ($cache === false)	{
		$url = get_bloginfo('url') . '/../index/chunk-loader/&type=' . $section;
		$response =  wp_remote_get($url);
		if (($response['response']['code'] == '200')){
			if (strlen($response['body']) > 20)
				set_transient('sat_fgms_modx_clone_section_'. $section, $response['body'],$expire);
		}
		else
			echo ' error loading ... $url';
	}
	else{
		$response = array('response'=>array('code'=>200),'body'=>$cache);
	}
	if ((is_wp_error($response)) || ($response['response']['code'] != '200'))
	{
		echo 'Error';
	}
	else
	{
		echo $response['body'];
	}
}

function sat_fgms_modx_clone_admin_int(){


}

add_action( 'after_setup_theme', 'sat_fgms_modx_cone_after_setup_theme', 16 );
function sat_fgms_modx_cone_after_setup_theme()
{
	add_action( 'wp_enqueue_scripts', 'sat_fgms_modx_clone_scripts_and_styles', 999 );

}
function sat_fgms_modx_clone_scripts_and_styles(){
	if (!is_admin()) {
		// register all the scripts this will eventually be an option
		wp_register_style( 'fgms-sinister', get_bloginfo('url') . '/../assets/css/sinister.css', array(), '' );
		wp_register_style( 'fgms-plugins-css', get_bloginfo('url') .'/../assets/css/styles.plugins.v1.css', array(), '', 'all' );
		wp_register_style( 'fgms-menu-css', get_bloginfo('url') .'/../assets/plugins/orion-menu/menu/css/orion-menu.css', array(), '', 'all' );
		//wp_register_style( 'jackbox-css', get_bloginfo('url') .'/../assets/plugins/jackbox/css/jackbox.min.css', array(), '', 'all' );
		wp_register_style( 'fgms-styles', get_bloginfo('url') .'/../assets/css/styles.v2.css', array(), '', 'all' );
		wp_register_style( 'theme-styles', get_stylesheet_directory_uri() . '/style.css', array(), '' );

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
			}

		wp_enqueue_style( 'fgms-sinister' );
		wp_enqueue_style( 'fgms-plugins-css' );
		wp_enqueue_style( 'fgms-menu-css' );
		//wp_enqueue_style( 'jackbox-css' );
		wp_enqueue_style( 'fgms-styles' );
		wp_enqueue_style( 'theme-styles' );

		//register all the js
		wp_register_script( 'jquery-1-9-1', get_bloginfo('url') .'/../assets/js/jquery-1.9.1.min.js', array(), '1.9.1', false );
		wp_register_script( 'fgms-menu-js', get_bloginfo('url') .'/../assets/plugins/orion-menu/menu/js/orion-menu.js', array(), '1.9.1', true );
		//wp_register_script( 'jackbox-js', get_bloginfo('url') .'/../assets/plugins/jackbox/js/jackbox-packed.min.js', array(), '', true );
		//wp_register_script( 'imagesloaded-js', get_bloginfo('url') .'/../assets/plugins/imagesloaded-master/imagesloaded.pkgd.min.js', array(), '', true );



		wp_register_script( 'fgms-js', get_bloginfo('url') .'/../assets/js/jquery.util.v1.js', array(), '1.9.1', false );
		wp_register_script( 'google-maps', 'http://www.google.com/jsapi', array(), '0.0.0', true );
		wp_enqueue_script( 'jquery-1-9-1' );
		wp_enqueue_script( 'fgms-menu-js' );
		//wp_enqueue_script( 'jackbox-js' );
		//wp_enqueue_script( 'imagesloaded-js' );
		wp_enqueue_script( 'fgms-js' );
		wp_enqueue_script( 'google-maps' );
	}
}




function sat_website_monitor_custom_error_notice(){
	$args = array(    'post_type' => 'webmaster-site',);
	$loop = new WP_Query($args);

	while($loop->have_posts()): $loop->the_post();
	$title .= json_encode(get_metadata('post',get_the_ID(),'wpcf-monitor-url')) ;
	endwhile;
	$output = $title;

	wp_reset_query();


	 $message =  'test '.$output ;


}



/******************* Cron set **********************/
add_action( 'admin_menu', 'sat_fgms_modx_clone_admin_menu' );
function sat_fgms_modx_clone_admin_menu() {
	//create cron example settings page
    add_options_page( 'Modx Clone Settings', 'Modx Clone Settings', 'manage_options', 'sat-cron', 'sat_cron_settings' );

}

add_action('sat_cron_hook2', 'sat_cron_email_reminder');
function sat_cron_email_reminder() {
	//send scheduled email
	//wp_mail( 'shawn.turple@shaw.ca', 'Test message', 'Don\'t fall asleep!' );
}

function sat_cron_settings() {
	//verify event has not been scheduled
	if ( !wp_next_scheduled( 'sat_cron_hook2' ) ) {
		//schedule the event to run hourly
		//wp_schedule_event( time(), 'hourly', 'sat_cron_hook2' );

	}

}


/******************  View Crons *********************/
add_action( 'admin_menu', 'sat_view_cron_menu' );
function sat_view_cron_menu() {
	//create view cron jobs settings page
    add_options_page( 'View Cron Jobs', 'View Cron Jobs', 'manage_options', 'sat-view-cron', 'sat_view_cron_settings' );

}



?>
