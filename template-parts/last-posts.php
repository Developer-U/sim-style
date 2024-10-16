<?php
/**
 * Display Block Last posts
 * Вывод блока Последние публикации
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_lasts_color = get_field('block_lasts_color', $page_id); // Цвет фона блока
$block_lasts_title = get_field('block_lasts_title', $page_id);

$args_last_post = array(
    'posts_per_page' => 4,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
);

$query_last_post = new WP_Query($args_last_post);

if ($query_last_post->have_posts()) { ?>
    <section class="text-image position-relative 
        <?php if ($block_text_color == 'тёмный') { ?>dark<?php } ?>        
    ">
        <div class="container">
            <?php if ($block_lasts_title) { ?>
                <h2>
                    <?php echo $block_lasts_title; ?>
                </h2>
            <?php } ?>
            <div class="blog-main__content archive-content">
                <?php
                while ($query_last_post->have_posts()) {
                    $query_last_post->the_post();
                    get_template_part('template-parts/article', 'content');
                }

                // Возвращаем оригинальные данные поста. Сбрасываем $post.
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php }




