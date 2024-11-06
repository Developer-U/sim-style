<?php
/**
 * Display Block Four imres width numbers
 * Вывод Блока 4 в ряд с нумерацией
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$four_numbers_block_color = get_field('four_numbers_block_color', $page_id); // Цвет фона блока
$four_numbers_title = get_field('four_numbers_title', $page_id);

if (have_rows('add_four_number_item', $page_id)) {
    ?>

    <section class="services-block levels-block four-numbers-block
    <?php if ($four_numbers_block_color == 'тёмный') { ?>dark<?php } ?>
    ">
        <div class="container">
            <?php if ($four_numbers_title) { ?>
                <h2 class="levels-block__title">
                    <?php echo $four_numbers_title; ?>
                </h2>
            <?php } ?>

            <ul class="levels-block__list levels-list d-grid">

                <?php if (have_rows('add_four_number_item', $page_id)): ?>
                    <?php $i = 0;
                    while (have_rows('add_four_number_item', $page_id)):
                        the_row();
                        $four_number_item_title = get_sub_field('four_number_item_title', $page_id);
                        $four_number_item_text = get_sub_field('four_number_item_text', $page_id);
                        $index = $i++; // Создаём счётчик
                        ?>

                        <li class="levels-list__item levels-item four-numbers-item position-relative <?php if ($index == 0 || ($index % 2) == 0) { ?>up<?php } ?>"
                            data-aos="fade-left" data-aos-delay="<?php echo 100 * ($index * 2.5); ?>" data-aos-duration="1000"
                            data-aos-easing="ease-in-out" data-aos-once="true" data-aos-anchor-placement="top">
                            <div class="levels-item__circle position-absolute"></div>

                            <div class="levels-item__wrapper position-relative">
                                <span class="levels-item__num">
                                    0<?php echo $index + 1; ?>
                                </span>

                                <p class="levels-item__text">
                                    <?php 
                                    echo '<h4 class="four-numbers-item__title">' . $four_number_item_title . '</h4>';
                                    echo $four_number_item_text;                                    
                                    ?>
                                </p>
                            </div>
                        </li>

                    <?php endwhile; ?>
                <?php endif; ?>

            </ul>
        </div>
    </section>

<?php } ?>