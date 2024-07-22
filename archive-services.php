<?php
/**
  * Template name: Шаблон архива Услуги
 *  Template post type: services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

get_header();
?>

    <!-- Top Block -->
    <?php get_template_part('template-parts/top', 'block'); ?>

    <!-- Block Services -->
    <?php get_template_part('template-parts/block', 'services'); ?>

<?php
get_footer();
