<?php
/**
 * Display Block Portfolio
 * Вывод Услуг из Custom Post Type "Портфолио" - works
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$works_length = is_archive('works') ? 99 : 6;
$works_block_title = get_field('works_block_title', $page_id);
$works_block_title_archive = get_field('works_block_title_' . $page_id, 'options' );
$works_block_text = get_field('works_block_text', $page_id);

$works_block_singular_title = get_field('works_block_singular_title');

$arg_works = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $works_length,
    'post_type' => 'works',
    'post_status' => 'publish',
);

$query_works = new WP_Query($arg_works);

if ($query_works->have_posts()) { ?>

    <section class="services-block portfolio-block <?php if (is_single()) { ?>singular<?php } ?>">
        <div class="container">
            <?php if ($works_block_title && !is_archive('works')) {
                echo '<h2>' . $works_block_title . '</h2>';
            } else if( is_archive() ) {
                echo '<h2>' . $works_block_title_archive . '</h2>';
            } else if( is_singular()) { ?>
                <h2>
                    <?php echo $works_block_singular_title; ?>
                </h2>
            <?php }

            if ($works_block_text && !is_archive('works')) { ?>
                <div class="services-block__text post">
                    <?php echo $works_block_text; ?>
                </div>
            <?php } ?>

            <ul class="portfolio-block__list services-list d-grid">
                <?php
                if ($query_works->have_posts()) { ?>
                    <?php while ($query_works->have_posts()):
                        $query_works->the_post();

                        get_template_part('template-parts/portfolio', 'listing-content');

                    endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php if (!is_archive('works')) { ?>
                <a href="#" class="button transparent-btn">смотреть все работы</a>
            <?php } ?>
        </div>
    </section>

<?php } ?>