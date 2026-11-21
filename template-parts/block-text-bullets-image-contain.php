<?php
/**
 * Вывод блока текст со стилизованными буллетами и изображением Conain с увеличением
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_color = get_field('block_bullets_color', $page_id); // Цвет фона блока
$block_title = get_field('block_bullets_title', $page_id);
$block_text = get_field('block_bullets_text', $page_id);
$block_image = get_field('block_bullets_image', $page_id);
$need_btns = get_field('need_btns_text_bullets_image', $page_id);
$btns_type = get_field('btns_type_text_bullets_image', $page_id);
?>

<?php if ($block_text) { ?>

    <section class="text-image position-relative bullets
        <?php if ($block_color == 'тёмный') { ?>dark<?php } elseif ($block_color == 'белый') { ?>white<?php }
        ?>
        <?php
        if (is_single()) { ?> single-section<?php }
        ?>
    ">
        <div class="container">
            <div class="text-image__grid d-grid align-items-start">
                <div class="text-image__text post" data-aos="fade-right" data-aos-offset="50" data-aos-delay="0"
                    data-aos-duration="800" data-aos-easing="ease-in" data-aos-once="true">
                    <?php if ($block_title) { ?>
                        <h2>
                            <?php echo $block_title; ?>
                        </h2>
                    <?php } ?>
                    <?php echo $block_text; ?>
                </div>

                <?php if ($block_image) { ?>
                    <a class="text-bullets__image bullets d-block position-relative"
                        href="<?php echo $block_image['url']; ?>" data-fancybox>
                        <span class="gallery-zoom position-absolute"></span>

                        <img src="<?php echo $block_image['url']; ?>" alt="<?php echo $block_image['alt']; ?>">
                    </a>
                <?php } ?>

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
    </section>

<?php } ?>