<?php
/**
 * Display Block Reviews
 * Вывод Отзывов из Custom Post Type "Отзывы" - reviews
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$reviews_length = is_page('otzyvy') ? 99 : 3;
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

    <section class="services-block portfolio-block js-reviews dark">
        <div class="container">
            <?php if (is_page('otzyvy')) {
                if (have_rows('new_reviews')) { ?>
                    <ul class="tab__btns tab-btns d-flex">
                        <li class="button tab-btns__button js-pathTabs col-auto active" data-path="text"
                            data-tabpathrep="reviews_text">
                            Текстовые
                        </li>

                        <li class="button tab-btns__button js-pathTabs col-auto" data-path="video" data-tabpathrep="reviews_video">
                            Видео отзывы
                        </li>
                    </ul>
                <?php } ?>

                <article class="js-targetTabs active" data-target="text" data-tabTargetReprep="reviews_text">
                    <h2 class="gallery-tab-target__title visually-hidden">Текстовые</h2>

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
                </article>

                <?php
                if (have_rows('new_reviews')) { ?>
                    <article class="js-targetTabs active" data-target="video" data-tabTargetReprep="reviews_video">
                        <h2 class="gallery-tab-target__title visually-hidden">Видео отзывы</h2>

                        <ul class="reviews__video reviews-video d-grid">
                            <?php if (have_rows('new_reviews')): ?>
                                <?php while (have_rows('new_reviews')):
                                    the_row();
                                    $reviews_video_type = get_sub_field('reviews_video_type');
                                    $reviews_video = get_sub_field('reviews_video');
                                    $reviews_video_id = get_sub_field('reviews_video_id');
                                    ?>

                                    <li class="reviews-video__item">
                                        <?php
                                        if ($reviews_video_type == 'файл' && $reviews_video) { ?>
                                            <video controls class="reviews-video-wrap__file">
                                                <source src="<?php echo esc_url($reviews_video['url']); ?>" type="video/webm" />

                                                <source src="<?php echo esc_url($reviews_video['url']); ?>" type="video/mp4" />
                                            </video>

                                        <?php } else if ($reviews_video_type == 'ссылка' && $reviews_video_id) { ?>
                                                <iframe width="720" height="344" src="https://rutube.ru/play/embed/<?php echo $reviews_video_id; ?>"
                                                    frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen
                                                    allowFullScreen>
                                                </iframe>
                                        <?php } ?>
                                    </li>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </article>
                <?php }
            } else { ?>

                <?php if ($reviews_block_title) { ?>
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
            
                <a href="/otzyvy" class="button transparent-btn">смотреть все отзывы</a>  
            <?php } ?>      
        </div>
    </section>

<?php } ?>