<?php
/**
 * Страница Студия создания сайтов
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

get_template_part('template-parts/hero', 'slider');

get_template_part('template-parts/block', 'simple-text');

get_template_part('template-parts/block', 'videos');

get_template_part('template-parts/block', 'text-image');

get_template_part('template-parts/block', 'gallery');

get_template_part('template-parts/block', 'design-tariffes');

get_template_part('template-parts/block', 'reviews');

get_template_part('template-parts/cta', 'zakaz');

get_footer();
?>