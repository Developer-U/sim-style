<?php
/**
* Display Block About
* Вывод блока Обо мне ( Как я нашёл себя)
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_about_title = get_field('block_about_title', $page_id);
$block_about_text = get_field('block_about_text', $page_id);
$block_about_image = get_field('block_about_image', $page_id);
?>

<?php if($block_about_text) { ?>

    <section class="text-image position-relative">
        <?php if($block_about_image) { ?>
            <figure class="text-image__image d-none d-lg-block">
                <img src="<?php echo $block_about_image['url']; ?>" alt="<?php echo $block_about_image['alt']; ?>">
            </figure>
        <?php } ?>
        <div class="container"> 
            <div class="text-image__wrap">
                <?php if($block_about_title) { ?>
                    <h2
                        data-aos="fade-left"
                        data-aos-delay="50"
                        data-aos-duration="1000"
                        data-aos-easing="ease-in-out"
                        data-aos-once="true"
                        data-aos-anchor-placement="center top"
                    >
                        <?php echo $block_about_title; ?>
                    </h2>
                <?php } ?>

                <div class="text-image__text post"
                    data-aos="fade-left"
                    data-aos-delay="500"
                    data-aos-duration="1000"
                    data-aos-easing="ease-in-out"
                    data-aos-once="true"
                    data-aos-anchor-placement="center top"
                >
                    <?php echo $block_about_text; ?>
                </div>

                <?php if($block_about_image) { ?>
                    <figure class="text-image__image d-block d-lg-none">
                        <img src="<?php echo $block_about_image['url']; ?>" alt="<?php echo $block_about_image['alt']; ?>">
                    </figure>
                <?php } ?>
            </div>             
        </div>
    </section>

<?php } ?>
