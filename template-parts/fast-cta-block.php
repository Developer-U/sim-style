<?php
/**
 * Display Fast CTA
 * Блок быстрого заказа
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$fast_cta_blockcolor = get_field('fast_cta_blockcolor', $page_id); // Цвет фона блока
$fast_cta_line_up = get_field('fast_cta_line_up', $page_id); // Серая верхняя окантовка
$fast_cta_blocktitle = get_field('fast_cta_blocktitle', $page_id);
$fast_cta_blocktext = get_field('fast_cta_blocktext', $page_id);
$socials = get_field('social_icons', 'options');
?>

<section class="fast-cta
    <?php if ($fast_cta_blockcolor == 'тёмный') { ?>dark
    <?php } elseif ($fast_cta_blockcolor == 'белый') { ?>white<?php } ?>
    <?php if ($fast_cta_line_up == 'да') { ?>line-up<?php } ?>    
    " data-aos="fade-right" data-aos-offset="200" data-aos-delay="0" data-aos-duration="1400" data-aos-easing="ease-in"
    data-aos-once="true">
    <div class="container">
        <?php if ($fast_cta_blocktitle) {
            echo '<h2>' . $fast_cta_blocktitle . '</h2>';
        } else {
            echo '<h2>Закажите в пару кликов</h2>';
        }
        ?>
        <div class="cta-wrapper__form">
            <?php echo do_shortcode('[contact-form-7 id="2da5944" title="Заказать услугу быстрый заказ"]'); ?>
        </div>
    </div>
</section>