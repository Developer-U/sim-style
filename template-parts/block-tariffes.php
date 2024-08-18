<?php
/**
 * Display Block Tariffs
 * Блок тарифов на услуги
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$tariffs_block_title = get_field('tariffs_block_title', $page_id);
$tariffs_block_text = get_field('tariffs_block_text', $page_id);
$tariffs_block_cta_image = get_field('tariffs_block_cta_image', $page_id);
$tariffs_block_cta_text = get_field('tariffs_block_cta_text', $page_id);
$need_btns = get_field('need_btns_tariffs', $page_id);
$btns_type = get_field('btns_type_tariffs', $page_id);

$tariffes_block_singular_title = get_field('tariffes_block_singular_title');

$arg_web_type = array(
    'orderby' => 'name',
    'order' => 'DESC',
    'posts_per_page' => 99,
    'post_type' => 'web_type',
    'post_status' => 'publish',
);

$query_web_type = new WP_Query($arg_web_type);

if ($query_web_type->have_posts()) {
    ?>

    <section id="tariffes" class="
        <?php if (!is_single()) {
            ; ?>tariffs dark<?php } else { ?>tariffs dark singular<?php } ?>">
        <div class="container">
            <?php if (!is_single() && $tariffs_block_title) { ?>
                <h2>
                    <?php echo $tariffs_block_title; ?>
                </h2>
            <?php } else if (is_single() && $tariffes_block_singular_title) { ?>
                    <h2>
                    <?php echo $tariffes_block_singular_title; ?>
                    </h2>
            <?php } else if (is_archive('works')) { ?>
                        <h2>
                            Сколько стоит разработка сайта?
                        </h2>
            <?php } ?>

            <ul class="tariffs__list tariffs-list d-grid grid-four">

                <?php
                if ($query_web_type->have_posts()) { ?>
                    <?php while ($query_web_type->have_posts()):
                        $query_web_type->the_post();
                        $web_price = get_field('web_price');
                        ?>

                        <li class="reviews-item tariffs-list__item d-grid js-item" data-name="<?php the_title(); ?>">
                            <div class="tariffs-list__top">
                                <a class="tariffs-list__get" href="<?php the_permalink(); ?>">
                                    <h3 class="tariffs-list__title js-title">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>

                                <div class="tariffs-list__text post">
                                    <?php the_excerpt(); ?>
                                </div>

                                <?php                               
                                if ($web_price) { ?>
                                    <h3 class="tariffs-list__title tariffs-list__title_price">
                                        <?php echo $web_price; ?>&nbsp;₽
                                    </h3>
                                <?php } ?>

                                <a href="<?php the_permalink(); ?>" class="tariffes-list__link">
                                    Узнать подробнее
                                </a>
                            </div>

                            <div class="tariffs-list__bottom">
                                <button type="button" class="button red-btn js-item-open">Быстрый заказ</button>

                                <div class="tariffes-list__form js-item-content">
                                    <?php echo do_shortcode('[contact-form-7 id="485f628" title="Быстрый заказ разработки сайта"]'); ?>
                                </div>
                            </div>

                        </li>

                    <?php endwhile;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>

            <?php if (is_front_page()) {
                if ($tariffs_block_text) { ?>
                    <div class="tariffs-list__cta tariffs-list__text post">
                        <?php echo $tariffs_block_text; ?>
                    </div>
                <?php }

                if ($tariffs_block_cta_image) { ?>
                    <div class="tariffes__cta tariffes-cta d-grid align-items-center"
                        data-aos="fade-left"
                        data-aos-delay="50"
                        data-aos-duration="1200"
                        data-aos-easing="ease-in-out"
                        data-aos-once="true"
                        data-aos-anchor-placement="center top"
                    >
                        <figure class="tariffes-cta__image">
                            <img src="<?php echo $tariffs_block_cta_image['url']; ?>"
                                alt="<?php echo $tariffs_block_cta_image['alt']; ?>">
                        </figure>
                    <?php } else { ?>
                        <div class="tariffes__cta tariffes-cta">
                        <?php } ?>

                        <div class="tariffes-cta__right">
                            <div class="tariffes-cta__title post">
                                <?php echo $tariffs_block_cta_text; ?>
                            </div>

                            <?php
                            if ($need_btns == 'да' && $btns_type == 'type_1') {
                                get_template_part('template-parts/buttons', 'cta');
                            } elseif ($need_btns == 'да' && $btns_type == 'type_2') {
                                get_template_part('template-parts/buttons', 'messengers');
                            } elseif ($need_btns == 'да' && $btns_type == 'type_3') {
                                get_template_part('template-parts/buttons', 'view');
                            } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </section>

<?php } ?>