<?php
/*
Template Name: Standart page
*/

get_header();
?>

    <section class="top-block">
        <div class="container text-center position-relative standart">
            <h1 class="top-block__title standart__title">
                <?php the_title(); ?>
            </h1>

            <?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
        </div>

        <div class="container standart__wrapper post">
            <?php the_content(); ?>
        </div> 
    </section>    

<?php get_footer(); ?>