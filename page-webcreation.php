<?php
/**
 * Страница Студия создания сайтов
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

get_template_part('template-parts/hero', 'slider');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'text-image');

get_template_part('template-parts/block', 'simple-text');

get_template_part('template-parts/block', 'portfolio');

get_template_part('template-parts/block', 'tariffes');

get_template_part('template-parts/last', 'posts');

get_template_part('template-parts/cta', 'zakaz');

get_footer();
?>