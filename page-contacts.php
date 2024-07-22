<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 *  Page Contacts
 */

$phone_num = get_field('tel', 'options');
$tel = str_replace([' ', '(', ')', '-', '+7'], '',  $phone_num);
$email = get_field('email', 'options');

get_header();

// Block Top
get_template_part('template-parts/top', 'block');
?>

<section class="contacts">
    <div class="container">
        <?php
        if( $phone_num ) { ?>	
            <div class="footer-top__block contacts-block">
                <p>
                    Тел. / WhatsApp / Telegram
                </p>                        
                <a class="header__tel header__tel_footer" href="tel:+7<?php echo $tel; ?>" >
                    <?php echo $phone_num; ?>
                </a>
            </div>
        <?php }
        if( $email ) { ?>	
            <div class="footer-top__block contacts-block">
                <p>
                    Email
                </p>           		
                <a class="header__tel header__tel_footer" href="mailto:<?php echo $email; ?>" >
                    <?php echo $email; ?>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<?php
get_footer();
?>