<?php
/**
* Display Block CTA
* Блок Заказать сайт с формой CF7
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
if( is_archive() || is_single()) {
    $page_type = 'options';
} else  {
    $page_type = $page_id;
}
$cta_block_title = get_field('cta_block_title', $page_type); 
$cta_block_images = get_field('cta_block_images', $page_type); 
?>

    <section class="cta-block"
        data-aos="fade-up"
        data-aos-delay="50"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
        data-aos-once="false"
        data-aos-mirror="true"
        data-aos-anchor-placement="center top"
    >
        <div class="container">
            <?php if( $cta_block_title ) { ?>
                <h2>
                    <?php echo $cta_block_title; ?>
                </h2>
            <?php } ?>

            <div class="cta-block__wrapper cta-wrapper d-grid align-items-start">
                <div class="cta-wrapper__form">
                    <?php echo do_shortcode('[contact-form-7 id="0e1e3b6" title="Заказать сайт"]'); ?>
                </div>

                <?php if($cta_block_images['first'] || $cta_block_images['second']) { ?>
                    <div class="cta-wrapper__images cta-images">
                        <?php if($cta_block_images['first']) { ?>
                            <figure class="cta-images__image first">
                                <img src="<?php echo $cta_block_images['first']['url']; ?>" alt="<?php echo $cta_block_images['first']['alt']; ?>">
                            </figure>
                        <?php }

                        if($cta_block_images['second']) { ?>
                            <figure class="cta-images__image second">
                                <img src="<?php echo $cta_block_images['second']['url']; ?>" alt="<?php echo $cta_block_images['second']['alt']; ?>">
                            </figure>
                        <?php } ?>
                    </div>
                        
                <?php } ?>
            </div>
        </div>
    </section>