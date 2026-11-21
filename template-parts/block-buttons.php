<?php
/**
* Display Block Buttons
* Вывод блока с кнопками на чёрном
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$need_btns = get_field('need_btns_block_buttons', $page_id);
$btns_type = get_field('btns_type_block_buttons', $page_id);

if($need_btns == 'да') {
?>

    <section class="block-buttons dark">
        <div class="container">
            <?php
            if($need_btns == 'да' && $btns_type =='type_1') {
                get_template_part('template-parts/buttons', 'cta');
            } elseif ($need_btns == 'да' && $btns_type =='type_2') {
                get_template_part('template-parts/buttons', 'messengers');
            } elseif ($need_btns == 'да' && $btns_type =='type_3') {
                get_template_part('template-parts/buttons', 'view');
            } ?>  
        </div>
    </section>

<?php } ?>