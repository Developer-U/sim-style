<?php
/**
 * Display Article content Block
 * Отображает карточку публикации в листинге
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<article class="archive-content__article">
    <div class="archive-content__top">
        <a href="<?php the_permalink(); ?>">
            <div class="archive-content__picture">
                <?php
                if (has_post_thumbnail()) { // условие, если есть миниатюра
                    the_post_thumbnail('full'); // если параметры функции не указаны, то выводится миниатюра текущего поста, размер thumbnail
                } else {
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/no-post-thumbnail.jpg" />'; // изображение по умолчанию, если миниатюра не установлена
                } ?>
            </div>
        </a>

        <div class="archive-content__block">
            <div class="blog__box d-flex align-items-center justify-content-between gap-2 flex-wrap mb-4">
                <span class="archive-content__date col-auto"><?php echo get_the_date(); ?></span>

                <button class="archive-content__date blog-btn col-auto"><?php the_category(', '); ?></button>
            </div>

            <a class="archive-content__heading" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>

            <div class="archive-content__description post">
                <?php the_excerpt(); ?>
            </div>            
        </div>
    </div>

    <div class="archive-content__bottom">
        <a href="<?php the_permalink(); ?>" class="archive-content__btn button transparent-btn">
            Читать статью
        </a>
    </div>
</article>