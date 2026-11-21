<?php
/**
 * CTA Services block
 * Блок Заказать услугу CTA
 *
 * @package      ClientName
 * @author       Yury Moiseev
 * @since        1.0.0
 * @license      GPL-2.0+
 **/
$page_id = get_the_ID();
$service_block_title = get_field('service_block_title');
$service_block_image = get_field('service_block_image');
?>

<article id="cta_<?php echo $page_id; ?>" class="cta-wrapper gutenberg d-grid" data-aos="fade-up" data-aos-offset="50"
    data-aos-delay="0" data-aos-duration="1000" data-aos-easing="ease-in" data-aos-once="false">
    <div class="cta-wrapper__left">


        <h3 class="cta-wrapper__subtitle">
            Закажите услугу:&nbsp;<?php the_title(); ?>&nbsp;уже сегодня!
        </h3>

        <div class="cta-wrapper__form">
            <?php echo do_shortcode('[contact-form-7 id="b88c756" title="Заказать услугу"]'); ?>
        </div>
    </div>

    <?php if ($service_block_image) { ?>
        <figure class="cta-wrapper__image">
            <img src="<?php echo $service_block_image['url']; ?>" alt="<?php echo $service_block_image['alt']; ?>">
        </figure>
    <? } ?>
</article>