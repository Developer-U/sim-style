<?php
/**
* Display Block width text on left side & image on right side
* Вывод блока Изображение справа и текст слева
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_color = get_field('block_color', $page_id); // Цвет фона блока
$block_title = get_field('block_title', $page_id);
$block_text = get_field('block_text', $page_id);
$block_image_position = get_field('block_image_position', $page_id); // Расположение изображения в блоке
$block_image = get_field('block_image', $page_id);
$need_btns = get_field('need_btns_text_image', $page_id);
$btns_type = get_field('btns_type_text_image', $page_id);
?>

<?php if($block_text) { ?>

    <section class="text-image position-relative 
        <?php if( $block_color == 'тёмный') { ?>dark<?php } ?>
        <?php if( $block_image_position == 'справа') { ?>right<?php } ?>
    ">

        <?php if($block_image) { ?>
            <figure class="text-image__image d-none d-lg-block">
                <img src="<?php echo $block_image['url']; ?>" alt="<?php echo $block_image['alt']; ?>">
            </figure>
        <?php } ?>
        <div class="container"> 
            <div class="text-image__wrap">
                <?php if($block_title) { ?>
                    <h2>
                        <?php echo $block_title; ?>
                    </h2>
                <?php } ?>

                <div class="text-image__text post">
                    <?php echo $block_text; ?>
                </div>

                <?php if($block_image) { ?>
                    <figure class="text-image__image d-block d-lg-none">
                        <img src="<?php echo $block_image['url']; ?>" alt="<?php echo $block_image['alt']; ?>">
                    </figure>
                <?php } ?>

                <?php 
              
                if($need_btns == 'да' && $btns_type =='type_1') {
                    get_template_part('template-parts/buttons', 'cta');
                } elseif ($need_btns == 'да' && $btns_type =='type_2') {
                    get_template_part('template-parts/buttons', 'messengers');
                } elseif ($need_btns == 'да' && $btns_type =='type_3') {
                    get_template_part('template-parts/buttons', 'view');
                } ?>    
            </div>             
        </div>
    </section>

<?php } ?>
