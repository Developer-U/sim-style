<?php
/**
 * Display Block Shortcodes
 * Шорткоды
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/*
* Шорткод тарифы
*/
add_shortcode( 'tariffes', 'tariffes_shortcode_callback' );

function tariffes_shortcode_callback() {
	ob_start();
	
	get_template_part('template-parts/block', 'tariffes');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();
 
	return $output;
}