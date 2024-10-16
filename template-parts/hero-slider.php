<?php
/**
 * Display Hero block slider
 * Вывод блока Hero со слайдером
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_slider_text = get_field('block_slider_text', $page_id);
?>

<section class="hero position-relative" style="background-color:#191919">
    <div class="hero__bg"></div>

    <div class="swiper hero-slider">
        <div class="swiper-wrapper">

            <?php if (have_rows('dobavit_slide_hero', $page_id)) { ?>
                <?php while (have_rows('dobavit_slide_hero', $page_id)) {
                    the_row();
                    $hero_slide_image = get_sub_field('izobrazhenie_v_slajdere_hero', $page_id);
                    ?>

                    <article class="swiper-slide hero-slider__slide" style="background-image: url(<?php echo $hero_slide_image['url']; ?>)">
                    </article>

                <?php }
            } ?>
        </div>

        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
    </div>

    <div
        class="ct-container hero__box d-flex flex-column justify-content-start justify-content-md-center justify-content-xl-end">
        <div class="hero-slider__wrapper hero-slider-wrapper position-relative d-grid">
            <h1 class="hero-wrapper__title hero-slider-wrapper__title">
                <?php the_title(); ?>
            </h1>

            <?php if ($block_slider_text) {
                echo '<div class="hero-slider-wrapper__description">';
                echo $block_slider_text;
                echo '</div>';
            } ?>
        </div>

        <a class="button red-btn hero-wrapper__btn" href="/quizle/rasschitat-stoimost-razrabotki/">
            Рассчитать стоимость
        </a>
    </div>
</section>