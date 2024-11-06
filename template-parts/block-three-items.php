<?php
/**
 * Display Three Items
 * Блок Заголовок, текст и три плитки с изображениями
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$three_items_blockcolor = get_field('three_items_blockcolor', $page_id); // Цвет фона блока
$three_items_blocktitle = get_field('three_items_blocktitle', $page_id);
$three_items_blocktext = get_field('three_items_blocktext', $page_id);
$socials = get_field('social_icons', 'options');

if (have_rows('new_item', $page_id)) {
    ?>

    <section id="block_<?php echo $page_id; ?>" class="tariffs three-block
    <?php if ($three_items_blockcolor == 'тёмный') { ?>dark
    <?php } elseif($three_items_blockcolor == 'белый') { ?>white<?php } ?>
    ">
        <div class="container">
            <?php if ($three_items_blocktitle) {
                echo '<h2>' . $three_items_blocktitle . '</h2>';
            }
            if ($three_items_blocktext) {
                echo '<div class="three-block__text post">' . $three_items_blocktext . '</div>';
            }
            ?>

            <ul class="three-block__list three-block-list d-grid grid-three">
                <?php
                if (have_rows('new_item', $page_id)) { ?>
                    <?php while (have_rows('new_item', $page_id)) {
                        the_row();
                        $new_item_title = get_sub_field('new_item_title', $page_id);
                        $new_item_text = get_sub_field('new_item_text', $page_id);
                        $new_item_link = get_sub_field('new_item_link', $page_id);
                        $new_item_image_type = get_sub_field('new_item_image_type', $page_id);
                        $new_item_image = get_sub_field('new_item_image', $page_id);
                        ?>

                        <li class="tariffs-list__item tariffs-list__item_design d-grid">
                            <div class="tariffs-list__top">
                                <?php
                                if ($new_item_image) {
                                    if ($new_item_image_type == 'иконка') {
                                        echo '<figure class="tariffs-list__image icon mb-3"><img src=" ' . $new_item_image['url'] . ' " alt=" ' . $new_item_image['alt'] . '"></figure>';
                                    } else {
                                        echo '<figure class="tariffs-list__image mb-3"><img src=" ' . $new_item_image['url'] . ' " alt=" ' . $new_item_image['alt'] . '"></figure>';
                                    }
                                } ?>
                                <a class="grid-three__title" href="<?php echo $new_item_link; ?>" target="_blank">
                                    <?php echo $new_item_title; ?>
                                </a>
                                <?php
                                if ($new_item_text) {
                                    echo '<div class="grid-three__text mt-4">' . $new_item_text . '</div>';
                                } ?>
                            </div>

                            <?php
                            if ($socials['telegram'] && $new_item_link) { ?>
                                <div class="tariffs-list__bottom">
                                    <a href="<?php echo $new_item_link; ?>" class="tariffes-list__link three-block__link mb-3"
                                        target="_blank">Узнать больше</a>

                                    <a href="https://t.me/<?php echo $socials['telegram']; ?>" target="_blank" class="button red-btn">
                                        Заказать
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