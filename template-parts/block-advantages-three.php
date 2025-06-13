<?php
/**
 * Display Block Advantages two items
 * Блок Преимущества - две плитки в ряд с иконками и заголовком
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$adv_three_block_blockcolor = get_field('adv_three_block_blockcolor', $page_id); // Цвет фона блока

$adv_three_block_title = get_field('adv_three_block_title', $page_id);
$adv_three_block_text = get_field('adv_three_block_text', $page_id);

if (have_rows('adv_three_item', $page_id)) {
    ?>

    <section class="advantages-three singular
    <?php if ($adv_three_block_blockcolor == 'тёмный') { ?>dark
        <?php } elseif ($adv_three_block_blockcolor == 'белый') { ?>white<?php } ?>
    ">
        <div class="container">
            <?php if ($adv_three_block_title) { ?>
                <h2>
                    <?php echo
                        $adv_three_block_title;
                    ?>
                </h2>

            <?php }

            if ($adv_three_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $adv_three_block_text; ?>
                </div>
            <?php } ?>

            <ul class="advantages-three__list services-list d-grid">
                <?php
                if (have_rows('adv_three_item', $page_id)) {
                    $i = 0; ?>
                    <?php while (have_rows('adv_three_item', $page_id)) {
                        the_row();
                        $adv_three_item_title = get_sub_field('adv_three_item_title', $page_id);
                        $adv_three_item_text = get_sub_field('adv_three_item_text', $page_id);
                        $adv_three_item_image = get_sub_field('adv_three_item_image', $page_id);
                        $index = $i++;
                        ?>

                        <li class="services-list__item services-item"
                            style="background-image:url( <?php echo $adv_three_item_image['url']; ?> );" data-aos="fade-<?php
                                if ($index == 0 || $index == 3)
                                    echo 'right';
                                if ($index == 1)
                                    echo 'down';
                                if ($index == 4)
                                    echo 'up';
                                if ($index == 2 || $index == 5)
                                    echo 'left';
                                ?>" data-aos-offset=<?php
                                if ($index == 0 || $index == 1 || $index == 2)
                                    echo '50';
                                if ($index == 3 || $index == 4 || $index == 5)
                                    echo '150';
                                ?> data-aos-delay="<?php echo 100 * ($index * 2); ?>"
                            data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="true"
                            data-aos-anchor-placement="top">
                            <div
                                class="services-item__wrap d-flex flex-column <?php if (!is_singular('web_type')) { ?>justify-content-between<?php } ?>">
                                <h3 class="services-item__title">
                                    <?php echo $adv_three_item_title; ?>
                                </h3>

                                <?php if ($adv_three_item_text) { ?>
                                    <p class="advantages-three__text">
                                        <?php echo $adv_three_item_text; ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </li>

                    <?php }
                }
                ?>
            </ul>
        </div>
    </section>
<?php }