<?php
/**
 * The template for Single
 *
 * @package Blocksy
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
?>

<div class="ct-container">
    <main class="inner_wrapper d-flex flex-column flex-xl-row">
        <div class="sidebar_content post-block post col">
			<div>
				<?php the_content(); ?>

				<div class="post-nav">
					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle prev">' . esc_html__( '←', 'estore' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle next">' . esc_html__( '→', 'estore' ) . '</span>',           
							'class' => 'posts-nav',
						)
					);
					?>
				</div>  
			</div> 
        </div>

        <div class="sidebar_wrapper tutorial__sidebar">
            <div class="tutorial__accord tutorial-accord">    		
                <div class="sidebar"> 
                    <?php get_template_part('template-parts/sidebar', 'post'); ?> 
                </div>
            </div>
        </div>
    </main>
</div>


<?php
have_posts();
wp_reset_query();

get_footer();

