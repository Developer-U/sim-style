<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

register_nav_menus( array(
    'primary' => 'Основное',
    'footer-menu' => 'Основное в футере',    
    'works-menu' => 'Меню услуг',
    'studio-menu' => 'Меню студий',
));

function estore_primary_menu() {
    wp_nav_menu( [
        'theme_location'  => 'primary',    
        'menu_id'         => 'primary-menu'   
    ] );
}

function estore_footer_menu() {
    wp_nav_menu( [
        'theme_location'  => 'footer-menu',    
        'menu_id'         => 'footer-menu',
        'menu_class'      => 'footer-menu'   
    ] );
}

function estore_works_menu() {
    wp_nav_menu( [
        'theme_location'  => 'works-menu',    
        'menu_id'         => 'works-menu',
        'menu_class'      => 'footer-menu'     
    ] );
}

function estore_studio_menu() {
    wp_nav_menu( [
        'theme_location'  => 'studio-menu',    
        'menu_id'         => 'studio-menu',
        'menu_class'      => 'footer-menu'     
    ] );
}