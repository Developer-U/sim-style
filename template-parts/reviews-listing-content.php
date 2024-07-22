<?php
/**
* Display Block Reviews Listing preview
* Блок отображения превью отзыва в листинге
*/
$reviews_post = get_field('reviews_post'); 
?>

<li class="reviews-item position-relative js-reviews">
    <div class="reviews-item__top reviews-top d-flex gap-2 gap-sm-3">
        <figure class="reviews-top__image" style="background: #ddd;">
            <?php
            if( has_post_thumbnail() ) {              
                the_post_thumbnail('full', get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE));    
            } else { ?>
                <img class="no-image" src="/wp-content/themes/blocksy-child/assets/img/no-image.jpg" alt="фото">
            <?php }
            ?>  
        </figure>

        <div class="reviews-top__right col">
            <h4 class="reviews-top__title">
                <?php the_title(); ?>
            </h4>

            <p>
                <?php echo $reviews_post; ?>
            </p>

            <?php if( have_rows('add_reviews_website') ) { ?>
                <h5>
                    Сайты:
                </h5>
            <?php }
            ?> 

            <ul class="reviews-top__list web-list">
                <?php if( have_rows('add_reviews_website') ): ?>
                <?php while( have_rows('add_reviews_website') ): the_row();                    
                $reviews_website_link = get_sub_field('reviews_website_link');     
                $reviews_website_name = get_sub_field('reviews_website_name');                                                 
                ?>

                    <a href="<?php echo $reviews_website_link; ?>" target="blank">
                        <?php echo $reviews_website_name; ?>
                    </a>

                <?php endwhile; ?>
                <?php endif; ?>
            </ul>            
        </div>
    </div>

    <div class="reviews-item__text">
        <div>
            <?php the_content(); ?>
        </div>        
    </div>

    <button type="button" class="main-reviews__item-more"><span>читать полностью</span></button>

    <button type="button" class="main-reviews__item-less"><span>Скрыть</span></button>
</li>