<?php
/**
* Display Block Services
* Вывод Услуг из Custom Post Type "Услуги" - services
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();

$arg_services =  array(
    'orderby'      => 'name',
    'order'        => 'DESC',
    'posts_per_page' => 50,
    'post_type' => 'services',
    'post_status' => 'publish', 
);

$services_block_title = get_field('services_block_title', $page_id); 
$services_block_text = get_field('services_block_text', $page_id); 

$query_services = new WP_Query($arg_services); 

if ($query_services->have_posts() )  { ?>

    <section class="services-block">
        <div class="container">
            <?php if( !is_archive() ) { ?>
                <h2>
                    <?php echo
                    $services_block_title ? $services_block_title : 'Чем я могу быть полезен';
                    ?>
                </h2>

            <?php }

            if($services_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $services_block_text; ?>
                </div>
            <?php } ?>

            <ul class="services-block__list services-list d-grid">
                <?php
                if ($query_services->have_posts() )  { 
                    $i = 0;
                while ( $query_services->have_posts() ) : $query_services->the_post(); 
                $service_listing_icon = get_field('service_listing_icon'); 
                $index = $i++;
                ?>

                    <li class="services-list__item services-item" style="background-image:url( <?php echo $service_listing_icon['url']; ?> );"
                        data-aos="fade-<?php
                        if($index == 0 || $index == 3) echo 'right';
                        if($index == 1) echo 'down';
                        if($index == 4) echo 'up';
                        if($index == 2 || $index == 5) echo 'left';
                        ?>"
                        data-aos-offset=<?php
                        if($index == 0 || $index == 1 || $index == 2) echo '50';
                        if($index == 3 || $index == 4 || $index == 5) echo '150';
                        ?>
                        data-aos-delay="<?php echo 100 * ($index * 2); ?>"
                        data-aos-duration="1200"
                        data-aos-easing="ease-in-out"
                        data-aos-mirror="true"
                        data-aos-once="true"
                        data-aos-anchor-placement="top"
                    >
                        <div class="services-item__wrap d-flex flex-column justify-content-between">
                            <h3 class="services-item__title">
                                <?php the_title(); ?>
                            </h3>

                            <a href="<?php the_permalink(); ?>" class="button red-btn services-list__btn">
                                Подробнее
                            </a>
                        </div>                        
                    </li>

                <?php endwhile; wp_reset_postdata()?>
                <?php } ?>	 
            </ul>            
        </div>
    </section>

<?php } ?>