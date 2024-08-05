<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$author_photo = get_field('author_photo', 'options');
$logo_color = get_field('logo_color', 'options');
$main_title = get_field('main_title');
$main_description = get_field('main_description');
$main_bg_image = get_field('main_bg_image');
/**
 *  Main Page
 */
get_header();
?>

    <section class="hero position-relative" style="<?php if($main_bg_image) { ?>background-image:url( <?php echo $main_bg_image['url']; ?> ) <?php } else {?>background-color:#191919<?php } ?>">
        
        <div class="hero__inner ct-container d-flex flex-column justify-content-start justify-content-md-center justify-content-xl-end" >
            <a href="/" class="header__logo d-md-none">
                <?php
                if( $logo_color ) { ?>
                    <img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
                <?php } else { ?>						
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_header.svg" />
                <?php } ?>
            </a>

            <div class="hero__wrapper hero-wrapper position-relative">
                <h1 class="hero-wrapper__title">
                    <?php echo $main_title ? $main_title : 'Разработка сайтов для&nbsp;бизнеса'; ?>
                </h1>

                <div class="hero-wrapper__description">
                    <?php echo $main_description; ?>
                </div>

                <a class="button red-btn hero-wrapper__btn" href="/quizle/rasschitat-stoimost-razrabotki/">    
                    Рассчитать стоимость
                </a>
            </div>
        </div>

        <?php if( $author_photo ) { ?>
            <div class="hero__author position-relative position-md-absolute"
                    data-aos="fade-left"
                    data-aos-offset="0"
                    data-aos-delay="0"
                    data-aos-duration="1400"
                    data-aos-easing="linear"           
                    data-aos-once="true" 
                    data-aos-anchor-placement="top-center"
                >
                <figure class="position-relative">
                    <img src="<?php echo $author_photo['url']; ?>" alt="<?php echo $author_photo['alt']; ?>">

                    <div class="hero__status hero-status position-absolute">
                        <h5 class="hero-status__name">
                            Моисеев Юрий
                        </h5>

                        <p class="hero-status__text">
                            Web-разработчик<br>
                            сайтов под ключ<br>
                            с 2018 года
                        </p>
                    </div>                                       
                </figure>
            </div>
        <?php } ?>

        <a href="#tariffes" class="hero-wrapper__link position-absolute d-none d-lg-inline-block js-slideTo">тарифы</a>
    </section>

    <!-- Block Services -->
    <?php get_template_part('template-parts/block', 'services'); ?>

    <!-- Block Text Image (Чем я могу быть полезен) -->
    <?php get_template_part('template-parts/block', 'text-image'); ?>

    <!-- Block Portfolio -->
    <?php get_template_part('template-parts/block', 'portfolio'); ?>

    <!-- Block Reviews -->
    <?php get_template_part('template-parts/block', 'reviews'); ?>

    <!-- Block Work Levels -->
    <?php get_template_part('template-parts/block', 'levels'); ?>

    <!-- Block Work Tariffs -->
    <?php get_template_part('template-parts/block', 'tariffes'); ?>

    <!-- Block CTA -->
    <?php get_template_part('template-parts/cta', 'zakaz'); ?>

<?php
get_footer();