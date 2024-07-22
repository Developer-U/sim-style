<?php
/**
* Display Block Portfolio Listing preview
* Блок отображения превью работы из портфолио в листинге
*/
?>

<li class="portfolio-item position-relative">
    <figure class="portfolio-item__image" style="background: #ddd;">
        <?php
        if( has_post_thumbnail() ) {              
            the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));    
        } ?>
    </figure>

    <a class="portfolio-item__block item-block" href="<?php the_permalink(); ?>">        
        <h4 class="item-block__title">
            <?php the_title(); ?>
        </h4>             

        <div class="item-block__excerpt post">
            <?php the_excerpt(); ?>

            <p class="item-block__excerpt small">
                (- Смотреть -)
            </p>
        </div>

        
    </a>
</li>


