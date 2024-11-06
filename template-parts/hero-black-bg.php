<?php
/**
 * Display Hero on Black background
 * Вывод блока Hero просто на чёрном фоне с вариантом добавления контактной формы
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$hero_black_text = get_field('hero_black_text', $page_id);
$hero_black_form_shortcode = get_field('hero_black_form_shortcode', $page_id);
?>

<section class="hero-black dark">
    <div class="ct-container">
        <h1 class="hero-wrapper__title hero-black__title">
            <?php the_title(); ?>
        </h1>

        <div class="hero-black__box <?php if ($hero_black_form_shortcode) { ?>d-grid align-items-start<?php } ?>">
            <div class="hero-black__wrapper">
                <?php if ($hero_black_text) {
                    echo '<div class="hero-slider-wrapper__description">';
                    echo $hero_black_text;
                    echo '</div>';
                } ?>

                <p class="hero-black__cta">Узнайте стоимость продвижения в&nbsp;пару&nbsp;кликов!&nbsp;→</p>
            </div>

            <?php if ($hero_black_form_shortcode) { ?>
                <div id="hero_black_<?php echo $page_id; ?>" class="hero-black__right">
                    <?php echo do_shortcode($hero_black_form_shortcode); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>