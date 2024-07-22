<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Page About me
 */
get_header();

// Block Top
get_template_part('template-parts/top', 'block');

// Block Text Image (Обо мне)
get_template_part('template-parts/block', 'text-image');

// Block Text Image (Как я нашёл себя)
get_template_part('template-parts/block', 'about');

// Block Buttons
get_template_part('template-parts/block', 'buttons');

// Block Services
get_template_part('template-parts/block', 'services');

// Block Tariffs
get_template_part('template-parts/block', 'tariffes');

// Block CTA
get_template_part('template-parts/cta', 'zakaz');

get_footer();
?>