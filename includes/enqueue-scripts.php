<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){
	wp_register_style( 'bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );
	wp_enqueue_style('bootstrap_css');
	wp_register_style( 'simplebar_css', 'https://unpkg.com/simplebar@latest/dist/simplebar.css' );
	wp_enqueue_style('simplebar_css');
	wp_enqueue_style( 'global', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), null, 'all');
    wp_enqueue_style( 'social', get_stylesheet_directory_uri() . '/assets/css/social.css', array(), null, 'all');
    wp_enqueue_style( 'menu', get_stylesheet_directory_uri() . '/assets/css/menu.css', array(), null, 'all');
	wp_enqueue_style( 'reviews_css', get_stylesheet_directory_uri() . '/assets/css/reviews.css', array(), null, 'all');
	wp_enqueue_style( 'form_css', get_stylesheet_directory_uri() . '/assets/css/contact-form.css', array(), null, 'all');
	wp_enqueue_style( 'text-open_css', get_stylesheet_directory_uri() . '/assets/css/text-open.css', array(), null, 'all');
	wp_enqueue_style( 'breadcrumbs_css', get_stylesheet_directory_uri() . '/assets/css/breadcrumbs.css', array(), null, 'all');
	wp_enqueue_style( 'player', get_stylesheet_directory_uri() . '/assets/css/captcha.css', array(), null, 'all');

	wp_register_script( 'bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', null, null, true );
	wp_enqueue_script('bootstrap_js');
	wp_register_script( 'simplebar_js', 'https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js', null, null, true );
	wp_enqueue_script('simplebar_js');
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), null, true );
	wp_enqueue_script( 'player-js', get_stylesheet_directory_uri() . '/assets/js/youtube_player.js', array(), null, true );
	wp_enqueue_script( 'reviews-js', get_stylesheet_directory_uri() . '/assets/js/reviews.js', array(), null, true );
	wp_enqueue_script( 'text-open-js', get_stylesheet_directory_uri() . '/assets/js/text_open.js', array('jquery'), null, true );
	wp_enqueue_script( 'inputmask-js', get_stylesheet_directory_uri() . '/assets/js/inputmask.js', array(), 'all', true );	
	// wp_enqueue_script( 'sidebar-js', get_stylesheet_directory_uri() . '/assets/js/sidebar.js', array('jquery'), null, true );

	/*
	* Если меню без подменю
	*/
    // wp_enqueue_script( 'menu-simple-js', get_stylesheet_directory_uri() . '/assets/js/menu-simple.js', array(), null, true );	

	/*
	* Если меню с подменю первого уровня
	*/
	wp_enqueue_script( 'menu-js', get_stylesheet_directory_uri() . '/assets/js/menu-submenu1.js', array(), null, true );	

	/*
	* Если меню с подменю второго уровня
	*/
	// wp_enqueue_script( 'menu-js', get_stylesheet_directory_uri() . '/assets/js/menu-submenu2.js', array(), null, true );	
}