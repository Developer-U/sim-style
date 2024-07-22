<?php
/**
 * Display Block CTA Single
 * Блок CTA для страниц Single
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$cta_single_title = get_field('cta_single_title','options');
$cta_single_text = get_field('cta_single_text','options');
$cta_single_image = get_field('cta_single_image','options');
$phone_num = get_field('tel', 'options');
$tel = str_replace([' ', '(', ')', '-', '+7'], '',  $phone_num);
?>

    <section class="tariffs cta-single dark"> 
        <div class="container">   
            <h2>
                <?php if ($cta_single_title) {
                    echo $cta_single_title; 
                } else {
                    echo 'Хотите такой же?';
                } ?>
            </h2>
         
            <?php
            if ($cta_single_image) { ?>
                <div class="cta-single__cta tariffes-cta cta-single d-grid align-items-center">
                    <figure class="tariffes-cta__image tariffes-cta__image_single">
                        <img src="<?php echo $cta_single_image['url']; ?>"
                            alt="<?php echo $cta_single_image['alt']; ?>">
                    </figure>
            <?php } else { ?>
                <div class="cta-single__cta tariffes-cta">  
            <?php } ?>
                    <div class="tariffes-cta__right">
                        <div class="cta-single__text post">
                            <?php echo $cta_single_text; ?>
                        </div>

                        <?php
                            if( $phone_num ) { ?>			
                            <a class="header__tel header__tel_footer header__tel_single" href="tel:+7<?php echo $tel; ?>" >
                                <?php echo $phone_num; ?>
                            </a>		
                        <?php } ?>

                        <?php get_template_part('template-parts/buttons', 'messengers'); ?>
                    </div>
                </div>
            
        </div>
    </section>


    