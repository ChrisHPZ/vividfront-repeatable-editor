<?php 
/*
Plugin Name: VividFront Repeatable Editor
Plugin URI: 
Description: Repeatable WP Editor Plugin
Version: 1.0
Author: Chris DeMarco & Kevin Borling
Author URI: 
*/

// *********************************************************************************** //
//			METABOX ARRAYS
// *********************************************************************************** //

include_once 'metaboxes/MetaBox.php';
include_once 'metaboxes/MediaAccess.php';
 
 $wpalchemy_media_access = new WPAlchemy_MediaAccess();
 
$features_metabox = new WPAlchemy_MetaBox( array( 
	'id' => '_wpsl_features', 
	'title' => 'Extended Content Area. Use this feature for multiple galleries on posts', 
	'types' => array('post'), 
	'template' => WP_PLUGIN_DIR . '/vividfront-repeatable-editor/metaboxes/repeating-textarea.php',
	'init_action' => 'kia_metabox_init',
	'hide_editor'	=> false,
	'wpautop' => true
	 )
 );

function kia_metabox_init(){
	// I prefer to enqueue the styles only on pages that are using the metaboxes
	wp_enqueue_style('wpalchemy-metabox', plugin_dir_url(__FILE__). 'metaboxes/css/meta.css');

	//make sure we enqueue some scripts just in case ( only needed for repeating metaboxes )
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-mouse');
	wp_enqueue_script('jquery-ui-sortable');
	global $wp_version;
	if ( $wp_version >= 3.9 ) {
     // run some code
	 wp_register_script('kia-metabox', plugin_dir_url(__FILE__). 'metaboxes/js/repeat-textarea3.9.js',array('jquery','editor'), '1.0');
	}else{
	// special script for dealing with repeating textareas
	wp_register_script('kia-metabox', plugin_dir_url(__FILE__). 'metaboxes/js/repeat-textarea.js',array('jquery','editor'), '1.0');
	}
	// needs to run AFTER all the tinyMCE init scripts have printed since we're going to steal their settings
	add_action('after_wp_tiny_mce','kia_metabox_scripts',999);
}

function kia_metabox_scripts(){
	wp_print_scripts('kia-metabox');
}

function crd_fancybox_scripts() {
    wp_register_style( 'image-gallery-styles', plugins_url('/css/repeatable_fields_styles.css', __FILE__) );
    wp_register_style( 'fancybox-styles', plugins_url('/css/jquery.fancybox-1.3.4.css', __FILE__) );
    wp_register_script( 'fancybox', plugins_url('/js/jquery.fancybox.js', __FILE__), array('jquery'), '1.0.0', false );
    wp_register_script( 'image-gallery-scripts', plugins_url('/js/image-gallery-scripts.js', __FILE__), array('jquery'), '1.0.0', false );
    wp_enqueue_style( 'image-gallery-styles' );
    wp_enqueue_style( 'fancybox-styles' );
    wp_enqueue_script( 'fancybox' );
    wp_enqueue_script( 'image-gallery-scripts' );
}
add_action( 'wp_enqueue_scripts', 'crd_fancybox_scripts' );

// Adds p tags to new wp_editors
add_filter( 'meta_content', 'wpautop' );