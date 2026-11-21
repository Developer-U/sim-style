<?php
/**
 * Template part for displaying Menu / Компонент меню с превращением в бургер
 * Структура с подменю 2-х уровней
 * Get mobile menu < 1199px / Менее 1199px пренвращается в бургер
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*ACF fields*/
$tel = get_field('tel-link', 'options');
$phone_num = get_field('tel', 'options');

?>

<nav id="navbar" class="header-center__nav">
    <button class="header-center__close burger-close">
        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 1L29 29" stroke="#191919" stroke-width="2" stroke-miterlimit="10"/>
            <path d="M1 29L29 1" stroke="#191919" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </button>   

    <?php estore_primary_menu(); ?> 

    <div class="header-center__bottom header-bottom">    	
        <?php
            if( $tel && $phone_num ) { ?>			
            <a class="header__tel header__tel_mobile col-auto" href="tel:+7<?php echo $tel; ?>" >
                <?php echo $phone_num; ?>
            </a>		
        <?php } 	   
        ?>							
    </div>
</nav> 

<!-- Burger -->
<button class="burger" aria-label="Открыть меню">
    <span></span>
    <span></span>
    <span></span>
</button>
<!-- Burger end -->