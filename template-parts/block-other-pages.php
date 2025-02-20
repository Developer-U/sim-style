<?php
/**
 * Display Block Other services
 * Блок "другие услуги после создания сайта", для single web_type
 * Сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$other_services_block_title = get_field('other_services_block_title', 'options');
$other_services_block_text = get_field('other_services_block_text', 'options');
$socials = get_field('social_icons', 'options');

$arg_other_services = array(
    'orderby' => 'post__in',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'post_type' => 'services',
    'post_status' => 'publish',
    'post__in' => array(93, 91),
);

$query_other_services = new WP_Query($arg_other_services);

if ($query_other_services->have_posts()) { ?>

    <section id="block_<?php echo $page_id; ?>" class="tariffs three-block line-up pb-0">
        <div class="container">
            <?php if ($other_services_block_title) {
                echo '<h2>' . $other_services_block_title . '</h2>';
            }
            if ($two_items_blocktext) {
                echo '<div class="three-block__text post">' . $other_services_block_text . '</div>';
            }
            ?>

            <ul class="three-block__list three-block-list d-grid grid-two">
                <?php
                if ($query_other_services->have_posts()) {
                    while ($query_other_services->have_posts()) {
                        $query_other_services->the_post();
                        $service_listing_icon = get_field('service_listing_icon');
                        ?>

                        <li class="tariffs-list__item tariffs-list__item_design d-grid">
                            <div class="tariffs-list__top">
                                <figure class="tariffs-list__image two-items mb-3">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));
                                    } ?>
                                </figure>

                                <a class="grid-three__title" href="<?php the_permalink(); ?>" target="_blank">
                                    <?php the_title(); ?>
                                </a>
                            </div>

                            <div class="tariffs-list__bottom">
                                <a href="<?php the_permalink(); ?>" class="tariffes-list__link three-block__link mb-3"
                                    target="_blank">Перейти</a>

                                <a href="https://t.me/<?php echo $socials['telegram']; ?>" target="_blank" class="button red-btn">
                                    Заказать
                                </a>
                            </div>
                        </li>
                    <?php }
                    ;
                    wp_reset_postdata() ?>
                <?php } ?>
            </ul>
        </div>
    </section>

<?php }