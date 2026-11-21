<?php
/**
 * Archive NEWS page post type: news
 * Архивная страница Новости
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});

$current_page = !empty($_GET['num']) ? $_GET['num'] : 1;

get_header();
$archive_news_title = get_field('archive_news_title', 'options');
$archive_news_image = get_field('archive_news_image', 'options');
?>

<!-- Top Block -->
<section class="top-block single position-relative"
	style="background-image: url( <?php echo $archive_news_image['url']; ?> )">
	<span class="overlay"></span>

	<div class="container text-center position-relative">
		<h1 class="top-block__title">
			<?php echo $archive_news_title; ?>
		</h1>

		<?php get_template_part('template-parts/block', 'breadcrumbs'); ?>
	</div>
</section>

<section class="publications">
	<div class="ct-container">
		<div class="blog__main">
			<!-- Категории постов -->
			<?php
			$arg_news = array(
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => '12', // Поставь нужное число в листинге
				'post_type' => 'news', // Подходит к любому типу постов
				'post_status' => 'publish',
				'paged' => $current_page,
			);

			$query_news = new WP_Query($arg_news);

			if ($query_news->have_posts()):				
				?>

				<div class="blog-main__content archive-content">
					<?php
					if ($query_news->have_posts()) {
						while ($query_news->have_posts()):
							$query_news->the_post();

							get_template_part('template-parts/article', 'content');

						endwhile;
						wp_reset_postdata();
					} ?>
				</div>

				<?php
				echo paginate_links(array(
					'prev_next' => true,
					'prev_text' => __('🠔'),
					'next_text' => __('🠖'),
					'end_size' => 2,
					'mid_size' => 2,
					'type' => 'list',
					'base' => site_url() . '/news/%_%', // 'blog' - должно совпадать со слагом страницы Блога в админке
					'format' => '?num=%#%', // Здесь - переменная 'num'. которую задали на стр. 16. Если что, поменяй.
					'total' => $query_news->max_num_pages,
					'current' => $current_page,
				));

			endif;

			?>
		</div>
	</div>
</section>

<?php
get_footer();