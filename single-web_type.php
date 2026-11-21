<?php
/**
 * The template for displaying Single web_type
 *
 * Template Name: Страница Тип сайта
 * Template Post Type: web_type
 */

get_header();

if (have_posts()) {
    the_post();
}

if (
    function_exists('blc_get_content_block_that_matches')
    &&
    blc_get_content_block_that_matches([
        'template_type' => 'single',
        'template_subtype' => 'canvas'
    ])
) {
    echo blc_render_content_block(
        blc_get_content_block_that_matches([
            'template_type' => 'single',
            'template_subtype' => 'canvas'
        ])
    );
    have_posts();
    wp_reset_query();
    return;
}
?>

<!-- Block Top -->
<section class="top-block single position-relative"
    style="background-image:url( <?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?> )">
    <span class="overlay"></span>
    <div class="container text-center position-relative">
        <h1 class="top-block__title">
            <?php the_title(); ?>
        </h1>
        <?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
        <?php echo do_shortcode('[contact-form-7 id="a69f71e" title="Заказать тип сайта краткая форма"]'); ?>
    </div>
</section>

<div class="ct-container">
    <main class="inner_wrapper d-flex flex-column flex-xl-row">
        <div class="sidebar_content post-block post col single-left-block">
            <?php the_content();

            get_template_part('template-parts/block', 'other-pages');

            get_template_part('template-parts/cta', 'services-block');
            ?>

            <div class="post-nav">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle prev">' . esc_html__('←', 'estore') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle next">' . esc_html__('→', 'estore') . '</span>',
                        'class' => 'posts-nav',
                    )
                );
                ?>
            </div>
        </div>

        <div class="sidebar_wrapper tutorial__sidebar">
            <div class="tutorial__accord tutorial-accord">
                <div class="sidebar">
                    <?php get_template_part('template-parts/sidebar', 'web_type'); ?>
                </div>
            </div>
        </div>
    </main>
</div>


<?php
have_posts();
wp_reset_query();

get_footer();