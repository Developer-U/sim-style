<?php
/**
 * Display Block Last News
 * Блок последние статьи на сайте
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$news_blockcolor = get_field('news_blockcolor', $page_id); // Цвет фона блока
$news_line_up = get_field('news_line_up', $page_id); // Серая верхняя окантовка
$news_length = get_field('news_length', 'options');
$news_block_title = get_field('news_block_title', 'options');

$arg_news = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => $news_length,
    'post_type' => 'post',
    'post_status' => 'publish',
);

$query_news = new WP_Query($arg_news);

if ($query_news->have_posts() && $news_block_title) { ?>

    <section class="block-publications
    <?php if ($news_blockcolor == 'тёмный') { ?>dark
    <?php } elseif ($news_blockcolor == 'белый') { ?>white<?php } ?>
    <?php if ($news_line_up == 'да') { ?>line-up<?php } ?>
    ">
        <div class="ct-container">
            <?php if ($news_block_title) { ?>
                <h2 class="block-publications__title"><?php echo $news_block_title; ?></h2>
            <?php } ?>

            <div class="blog-main__content archive-content">
                <?php
                if ($query_news->have_posts()) {
                    while ($query_news->have_posts()) {
                        $query_news->the_post();

                        get_template_part('template-parts/article', 'content');

                    }
                    wp_reset_postdata();
                }
                ?>
            </div>

        </div>
    </section>

<?php }