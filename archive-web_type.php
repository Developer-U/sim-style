<?php
/**
 * Archive peage post type: web_type
 * Архивная страница с выводом постов Типы сайтов
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('~^[^:]+: ~', '', $title);
});

$reviews_seo_tekst = get_field('reviews_seo_tekst', 'options');

get_header();

get_template_part('template-parts/top', 'block');

get_template_part('template-parts/block', 'tariffes');

get_template_part('template-parts/block', 'reviews');

get_template_part('template-parts/block', 'portfolio');

get_footer();