<?php
/**
 * Display Block width text on left side (Action) & image on right side
 * Вывод блока Изображение справа и текст слева (Акция)
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_action_color = get_field('block_action_color'); // Цвет фона блока
$block_action_title = get_field('block_action_title');
$block_action_text = get_field('block_action_text');
$block_action_image = get_field('block_action_image');
$block_action_btn = get_field('block_action_btn');

?>

<?php if ($block_action_text) { ?>

    <section class="text-image action-block overflow-hidden position-relative 
        <?php if ($block_action_color == 'тёмный') { ?>dark<?php } elseif ($block_action_color == 'белый') { ?>white<?php }
        ?>
        <?php if ($block_action_image_position == 'справа') { ?>right<?php }
        if (is_single()) { ?> single-section<?php }
        ?>
    ">
        <div class="container">
            <div class="action-block__wrap action-block-wrap d-grid">
                <div class="action-block-wrap__text">
                    <?php if ($block_action_title) { ?>
                        <h2>
                            <?php echo $block_action_title; ?>
                        </h2>
                    <?php } ?>

                    <div class="text-image__text action-block-wrap__descr post" data-aos="fade-right" data-aos-offset="50"
                        data-aos-delay="0" data-aos-duration="800" data-aos-easing="ease-in" data-aos-once="true">
                        <?php echo $block_action_text; ?>
                    </div>                   

                    <?php
                    if ($block_action_btn['link'] && $block_action_btn['title']) {
                        echo '<a class="button red-btn action-block__btn" href=" ' . $block_action_btn['link'] . '">' . $block_action_btn['title'] . '</a>';
                    } ?>
                </div>

                <?php if ($block_action_image) { ?>
                    <figure class="action-block-wrap__image">
                        <img src="<?php echo $block_action_image['url']; ?>" alt="<?php echo $block_action_image['alt']; ?>">
                    </figure>
                <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>