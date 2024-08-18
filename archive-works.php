<?php
/**
 * Archive peage post type: works
 * Архивная страница с выводом постов Портфолио
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

$seo_tekst = get_field('seo_tekst', 'options');

get_header();
?>

    <!-- Top Block -->
    <?php get_template_part('template-parts/top', 'block'); ?>

    <!-- Block Services -->
    <?php get_template_part('template-parts/block', 'portfolio');     
    
    if ($seo_tekst) { 
        echo '<div class="container seo-text">';
        echo '<div class="post">' .$seo_tekst. '</div>';
        echo '</div>';
    } ?>

    <!-- Block Work Tariffs -->
    <?php get_template_part('template-parts/block', 'tariffes'); ?>

    <!-- Block CTA -->
    <?php get_template_part('template-parts/cta', 'zakaz'); ?>

<?php
get_footer();