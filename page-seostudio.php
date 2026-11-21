<?php
/**
 * Страница Студия продвижения сайтов
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

get_template_part('template-parts/hero', 'black-bg');

get_template_part('template-parts/block', 'simple-text');

get_template_part('template-parts/block', 'four-numbers');

get_template_part('template-parts/block', 'gallery');

get_template_part('template-parts/block', 'text-image');

get_template_part('template-parts/block', 'three-items');

get_template_part('template-parts/block', 'services');

get_template_part('template-parts/block', 'accordion');

get_template_part('template-parts/block', 'social-invite');

get_template_part('template-parts/cta', 'zakaz');

get_footer();