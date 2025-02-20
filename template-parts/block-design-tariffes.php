<?php
/**
 * Display Block Design Tariffs
 * Блок тарифов на услуги
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$tariffs_design_block_color = get_field('tariffs_design_block_color', $page_id); // Цвет фона блока
$tariffs_design_line_up = get_field('tariffs_design_line_up', $page_id); // Серая верхняя окантовка
$tariffs_design_block_title = get_field('tariffs_design_block_title', $page_id);
$tariffs_design_block_text = get_field('tariffs_design_block_text', $page_id);
$socials = get_field('social_icons', 'options');

if (have_rows('new_design_tarif', 'options')) {
    ?>

    <section id="design_tariffes" class="tariffs
    <?php if ($tariffs_design_block_color == 'тёмный') { ?>dark
    <?php } elseif ($tariffs_design_block_color == 'белый') { ?>white<?php } ?>
    <?php if ($tariffs_design_line_up == 'да') { ?>line-up<?php } ?>
    ">
        <div class="container">
            <h2>
                <?php echo $tariffs_design_block_title; ?>
            </h2>

            <?php
            if ($tariffs_design_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $tariffs_design_block_text; ?>
                </div>
            <?php } ?>

            <ul class="tariffs__list tariffs-list d-grid grid-four">
                <?php
                if (have_rows('new_design_tarif', 'options')) { ?>
                    <?php while (have_rows('new_design_tarif', 'options')) {
                        the_row();
                        $design_tarif_title = get_sub_field('design_tarif_title', 'options');
                        $design_tarif_description = get_sub_field('design_tarif_description', 'options');
                        $design_tarif_price = get_sub_field('design_tarif_price', 'options');
                        $design_tarif_image = get_sub_field('design_tarif_image', 'options');
                        ?>

                        <li class="tariffs-list__item tariffs-list__item_design d-grid">
                            <div class="tariffs-list__top">
                                <h3 class="tariffs-list__title js-title">
                                    <?php echo $design_tarif_title; ?>
                                </h3>

                                <?php
                                if ($design_tarif_image) {
                                    echo '<figure class="tariffs-list__image mb-3"><img src=" ' . $design_tarif_image['url'] . ' " alt=" ' . $design_tarif_image['alt'] . '"></figure>';
                                }

                                if ($design_tarif_description) { ?>
                                    <div class="tariffs-list__text post">
                                        <?php echo $design_tarif_description; ?>
                                    </div>
                                <?php }

                                if ($design_tarif_price) { ?>
                                    <h3 class="tariffs-list__title tariffs-list__title_price">
                                        <?php echo $design_tarif_price; ?>&nbsp;₽
                                    </h3>
                                <?php } ?>
                            </div>

                            <?php
                            if ($socials['telegram']) { ?>
                                <div class="tariffs-list__bottom">
                                    <a href="https://t.me/<?php echo $socials['telegram']; ?>" target="_blank" class="button red-btn">
                                        Быстрый заказ
                                    </a>
                                </div>
                            <?php }
                            ; ?>
                        </li>
                    <?php }
                    ;
                } ?>
            </ul>
        </div>
    </section>

<?php } ?>