<?php
/**
 * Display Top Block in pages
 * Отображает верхний блок на страницах
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$archive_description = get_field('archive_description_' .$page_id,'options');

if (is_single()) { ?>
    <section class="top-block single position-relative"
        style="background-image:url( <?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?> )">
        <span class="overlay"></span>
    <?php } else { ?>
        <section class="top-block">
        <?php } ?>

        <div class="container text-center position-relative">
            <?php
            if (is_archive()) { ?>
                <h1 class="top-block__title">
                    <?php the_archive_title(''); ?>
                </h1>

                <?php get_template_part('template-parts/block', 'breadcrumbs');


                if ($archive_description) {                    
                    echo '<h3 class="top-block__subtitle">' . $archive_description . '</h3>';
                }

            } else if (is_single()) { ?>

                    <h1 class="top-block__title">
                    <?php the_title(); ?>
                    </h1>

                <?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
                    <?php if(is_singular('works')) { ?>
                        <div class="top-block__description post works">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php }?>

                    <?php
                    if (is_singular('services')) {
                        get_template_part('template-parts/buttons', 'cta');
                    }

            } else { ?>
                    <h1 class="top-block__title">
                    <?php the_title(); ?>
                    </h1>

                <?php get_template_part('template-parts/block', 'breadcrumbs');

                echo '<h3 class="top-block__subtitle post">' . get_the_content() . '</h3>';

            } ?>
        </div>
    </section>