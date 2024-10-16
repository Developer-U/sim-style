<?php
/**
 * Archive MAIN page post type: post
 * Основная Архивная страница (Публикации)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});

get_header();
$archive_post_title = get_field('archive_post_title', 'options');
$archive_post_image = get_field('archive_post_image', 'options');
$archive_post_description = get_field('archive_post_description', 'options');
?>

<!-- Top Block -->
<section class="top-block single position-relative"
	style="background-image: url( <?php echo $archive_post_image['url']; ?> )">
	<span class="overlay"></span>

	<div class="container text-center position-relative">
		<h1 class="top-block__title">
			<?php echo $archive_post_title; ?>
		</h1>

		<?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
	</div>
</section>

<section class="archive-post">
	<div class="ct-container post">
		<?php echo $archive_post_description; ?>
	</div>
</section>

<section class="publications">
	<div class="ct-container">
		<div class="blog__main">
			<!-- Категории постов -->
			<?php

		

			if (have_posts()):
				get_template_part('template-parts/article', 'tabs');
				?>

				<div class="blog-main__content archive-content">
					<?php
					// while ($blog_query->have_posts()):
					// 	$blog_query->the_post();
					while (have_posts()):
						the_post();
						get_template_part('template-parts/article', 'content');
					endwhile;

					wp_reset_query(); ?>
				</div>

				<?php
				$args = [
					'prev_next' => true,
					'prev_text' => __('&#8592'),
					'next_text' => __('&#8594'),
					'end_size' => 2,
					'mid_size' => 2,
					'type' => 'list',
					'class' => 'page-numbers',
				];

				the_posts_pagination($args);

			endif;

			?>
		</div>
	</div>
</section>

<?php
get_footer();