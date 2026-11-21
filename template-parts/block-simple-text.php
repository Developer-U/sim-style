<?php
/**
* Display Block width text
* Вывод блока c простым текстом из Content
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_text_color = get_field('block_text_color', $page_id); // Цвет фона блока
$block_text_title = get_field('block_text_title', $page_id);
?>

<?php if(get_the_content()) { ?>

    <section class="text-image position-relative 
        <?php if( $block_text_color == 'тёмный') { ?>dark<?php } ?>        
    ">     
        <div class="container">
            <?php if($block_text_title) { ?>
                <h2>
                    <?php echo $block_text_title; ?>
                </h2>
            <?php } ?>

            <div class="text-image__text post"
                data-aos="fade-right"
                data-aos-offset="200"
                data-aos-delay="0"
                data-aos-duration="1200"
                data-aos-easing="ease-in"           
                data-aos-once="true"             
            >
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php } ?>