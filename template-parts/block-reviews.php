<?php
/**
 * Display Block Reviews
 * Вывод Отзывов из Custom Post Type "Отзывы" - reviews
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$reviews_length = is_archive('works') ? 99 : 3;
$reviews_block_title = get_field('reviews_block_title', $page_id);
$reviews_block_text = get_field('reviews_block_text', $page_id);

$arg_reviews = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $reviews_length,
    'post_type' => 'reviews',
    'post_status' => 'publish',
);

$query_reviews = new WP_Query($arg_reviews);

if ($query_reviews->have_posts()) { ?>

    <section class="services-block portfolio-block dark">
        <div class="container">
            <?php if ($reviews_block_title && !is_archive('reviews')) { ?>
                <h2>
                    <?php echo $reviews_block_title; ?>
                </h2>
            <?php }

            if ($reviews_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $reviews_block_text; ?>
                </div>
            <?php } ?>

            <ul class="reviews__list services-list d-grid align-items-start">
                <?php
                if ($query_reviews->have_posts()) {                     
                    while ($query_reviews->have_posts()):
                        $query_reviews->the_post();                        

                        get_template_part('template-parts/reviews', 'listing-content');
                    endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php if (!is_archive('reviews')) { ?>
                <a href="/reviews" class="button transparent-btn">смотреть все отзывы</a>
            <?php } ?>
        </div>
    </section>

<?php } ?>