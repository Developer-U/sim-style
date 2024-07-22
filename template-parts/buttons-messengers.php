<?php
/**
* Display Block Buttons Messengers CTA type 2
* Блок кнопок - "Написать в Telegram", и т.д.
*/
$socials =  get_field('social_icons', 'options');
$phone_num = get_field('tel', 'options');
$phone_block_phone_num = str_replace([' ', '(', ')', '-', '+7'], '',  $phone_num); 

if( $socials['telegram'] || $socials['whatsapp'] || $phone_num ) {
?>

    <ul class="buttons-list d-flex align-items-center gap-3">
        <?php
        if( $socials['telegram'] ) { ?>
            <li class="buttons-list__btn">
                <a href="@<?php echo $socials['telegram']; ?>" target="blank" class="button red-btn">Написать в Telegram</a>
            </li>
        <?php }

        if( $socials['whatsapp'] ) { ?>
            <li class="buttons-list__btn">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="blank" class="button red-btn">Написать в WhatsApp</a>
            </li>
        <?php }

        if( $phone_num ) { ?>
            <li class="buttons-list__btn">
                <a href="tel:+7<?php echo $phone_block_phone_num; ?>" class="button transparent-btn">
                    <?php echo $phone_num; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

<?php } ?>