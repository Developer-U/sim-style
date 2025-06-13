<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package estore
 */

get_header();
$error_page_text = get_field('error_page_text', 'options');
$error_page_image = get_field('error_page_image', 'options');
?>

<section id="primary" class="content-area error-404">
    <div class="container">
        <div
            class="error-404__box error-404-box <?php if ($error_page_image) { ?>d-md-grid justify-content-between<?php } ?>">
            <div class="error-404-box__left">
                <h1 class="error-404__title">#404</h1>

                <h2 class="error-404__subtitle">Страница не найдена</h2>

                <?php if ($error_page_text) {
                    echo '<div class="error-404__text">' . $error_page_text . '</div>';
                } ?>
            </div>

            <?php if ($error_page_image) {
                echo '<figure class="error-404-box__image d-none d-md-block"><img src=" ' . $error_page_image['url'] . ' " alt=" ' . $error_page_image['alt'] . ' "></figure>';
            } ?>
        </div>
    </div><!-- .error-404 -->
</section><!-- #primary -->

<?php
get_template_part('template-parts/block', 'services');

get_template_part('template-parts/cta', 'zakaz');

get_footer();