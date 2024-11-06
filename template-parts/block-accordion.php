<?php
/**
 * Display Block width accordion
 * Вывод блока c аккордионом
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_accordion_color = get_field('block_accordion_color', $page_id); // Цвет фона блока
$block_accordion_title = get_field('block_accordion_title', $page_id);
$block_accordion_text = get_field('block_accordion_text', $page_id);
$block_accordion_image = get_field('block_accordion_image', $page_id);

if (have_rows('new_accordion_item', $page_id)) {
    ?>

    <section id="block_<?php echo $page_id; ?>" class="text-image position-relative right block-accordion
    <?php if ($block_accordion_color == 'тёмный') { ?>dark
    <?php } elseif ($block_accordion_color == 'белый') { ?>white<?php } ?>
    ">
        <?php if ($block_accordion_image) {
            echo '<figure class="text-image__image d-none d-lg-block"><img src=" ' . $block_accordion_image['url'] . '" alt=" ' . $block_accordion_image['alt'] . ' "></figure>';
        } ?>
        <div class="container">
            <?php if ($block_accordion_image) {
                echo '<div class="text-image__wrap">';
            } ?>
            <?php if ($block_accordion_title) {
                echo '<h2>' . $block_accordion_title . '</h2>';
            }
            if ($block_accordion_text) {
                echo '<div class="three-block__text post">' . $block_accordion_text . '</div>';
            }
            ?>

            <ul class="block-accordion__list block-accord-list my-accordion accordionjs">
                <?php
                if (have_rows('new_accordion_item', $page_id)) { ?>
                    <?php while (have_rows('new_accordion_item', $page_id)) {
                        the_row();
                        $new_accordion__item_title = get_sub_field('new_accordion_item_title', $page_id);
                        $new_accordion__item_text = get_sub_field('new_accordion_item_text', $page_id);
                        ?>

                        <li class="block-accord-list__item accord-list-item mb-2 mb-lg-4">
                            <div>
                                <?php echo $new_accordion__item_title; ?>
                                <span></span>
                            </div>

                            <div>
                                <?php echo $new_accordion__item_text; ?>
                            </div>
                        </li>
                    <?php }
                    ;
                } ?>
            </ul>

        </div>
    </section>

<?php } ?>