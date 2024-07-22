<?php
/**
 * The template for displaying Single works
 *
 * Template Name: Страница работы из Портфолио
 * Template Post Type: works
 */

get_header();

if (have_posts()) {
    the_post();
}

if (
    function_exists('blc_get_content_block_that_matches')
    &&
    blc_get_content_block_that_matches([
        'template_type' => 'single',
        'template_subtype' => 'canvas'
    ])
) {
    echo blc_render_content_block(
        blc_get_content_block_that_matches([
            'template_type' => 'single',
            'template_subtype' => 'canvas'
        ])
    );
    have_posts();
    wp_reset_query();
    return;
}

// Block Top
get_template_part('template-parts/top', 'block');
$process_creation = get_field('process_creation');
?>

<section class="single">
    <div class="container">
        <div class="post">
            <?php the_content(); ?>
        </div>
        
        <?php
        if ($process_creation['text']) { ?>
            <article class="single-works__process work-process">
                <h2 class="work-process__title">
                    <?php if ($process_creation['title']) {
                        echo $process_creation['title'];
                    } else {
                        echo 'Процесс создания сайта';
                    } ?>
                </h2>

                <div class="work-process__text post">
                    <?php echo $process_creation['text']; ?>
                </div>
            </article>
        <?php } ?>
    </div>
</section>

<section class="single-works">
    <div class="container">
        <?php if (have_rows('new_work_block')): ?>
            <?php $i = 0;
            while (have_rows('new_work_block')):
                the_row();
                $work_title = get_sub_field('work_title');
                $work_image = get_sub_field('work_image');
                $index = $i++; // Создаём счётчик
                ?>

                <article class="single-works__work single-work">
                    <?php if ($work_title) {
                        echo '<h3 class="single-work__title">' . $work_title . '</h3>';
                    } ?>

                    <div class="single-work__block d-grid">
                        <figure class="singke-work__image">
                            <img src="<?php echo $work_image['url']; ?>" alt="<?php echo $work_image['alt']; ?>">
                        </figure>

                        <h4 class="single-work__number">
                            <?php
                            $work_index = $index + 1;
                            echo strlen($work_index) < 2 ? '0' . $work_index : $work_index;
                            ?>
                        </h4>
                    </div>
                </article>

            <?php endwhile; ?>
        <?php endif; ?>

        <div class="post-nav">
            <?php
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle prev">' . esc_html__('←', 'estore') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle next">' . esc_html__('→', 'estore') . '</span>',
                    'screen_reader_text' => 'nav-post-links',
                )
            );
            ?>
        </div>
    </div>
</section>

<?php 
get_template_part('template-parts/cta', 'single'); 

get_template_part('template-parts/cta', 'zakaz'); 

have_posts();
wp_reset_query();

get_footer();