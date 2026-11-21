<?php
/**
 * Archive peage post type: reviews
 * Архивная страница с выводом постов Отзывы
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$reviews_seo_tekst = get_field('reviews_seo_tekst', 'options');

get_header();
?>

    <!-- Top Block -->
    <?php get_template_part('template-parts/top', 'block'); ?>

    <!-- Block Reviews-->
    <?php get_template_part('template-parts/block', 'reviews'); ?>

    <!-- Block Services -->
    <?php get_template_part('template-parts/block', 'portfolio');
   
    if ($reviews_seo_tekst) { 
        echo '<div class="container seo-text">';
        echo '<div class="post">' .$reviews_seo_tekst. '</div>';
        echo '</div>';
    } ?>
<?php
get_footer();