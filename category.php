<?php
/**
 * The template for displaying Category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});

get_header();

$category_id = get_query_var('cat');
$args = array(
	'posts_per_page' => 99,
	'post_type' => 'post',
	'orderby' => 'date',
	'order' => 'DESC',
	'cat' => $category_id,
);

query_posts($args);

$archive_post_title = get_field('archive_post_title', 'options');
$archive_post_image = get_field('archive_post_image', 'options');
$archive_post_description = get_field('archive_post_description', 'options');
?>

<!-- Top Block -->
<section class="top-block single position-relative"
	style="background-image: url( <?php echo $archive_post_image['url']; ?> )">
	<span class="overlay"></span>

	<div class="container text-center position-relative">
		<h1 class="top-block__title archive-title">
			<?php echo single_cat_title(); ?>
		</h1>

		<?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
	</div>
</section>

<section class="publications">
	<div class="ct-container">
		<div class="blog__main">
			<!-- Категории постов -->
			<?php
			get_template_part('template-parts/article', 'tabs'); ?>

			<div class="blog-main__content archive-content">
				<?php
				if (have_posts()) ?>
				<?php while (have_posts()):
					the_post();
					get_template_part('template-parts/article', 'content');
				endwhile;
				wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer(); ?>

<script>
	jQuery(function ($) {
		$(document).ready(function () {
			$("html,body").scrollTop(300);
		});
	});
</script>