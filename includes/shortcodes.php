<?php
/**
 * Display Block Shortcodes
 * Шорткоды
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/*
 * Шорткод тарифы
 */
add_shortcode('tariffes', 'tariffes_shortcode_callback');

function tariffes_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'tariffes');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод Gallery
 */
add_shortcode('gallery-block', 'gallery_shortcode_callback');

function gallery_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'gallery');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод items-picture-grid 
 * Плитки в ряд с картинками
 */
add_shortcode('picturegrid', 'picturegrid_shortcode_callback');

function picturegrid_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'two-items');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод reviews-block 
 * Отзывы клиентов
 */
add_shortcode('reviews_block', 'reviews_block_shortcode_callback');

function reviews_block_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'reviews');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод block-accordion 
 * Блок с аккордионом
 */
add_shortcode('accordion_block', 'accordion_block_shortcode_callback');

function accordion_block_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'accordion');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод block-advantages-three
 * Блок Преимущества плитки в три колонки
 */
add_shortcode('advantages_three', 'advantages_three_shortcode_callback');

function advantages_three_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'advantages-three');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод block-table-two-cols
 * Блок Таблица в две колонки
 */
add_shortcode('table_two_cols', 'table_two_cols_shortcode_callback');

function table_two_cols_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'table-two-cols');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод block-three-items
 * Блок Плитки по 3 в ряд с картинками/иконками
 */
add_shortcode('three_items', 'three_items_shortcode_callback');

function three_items_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'three-items');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод web-type-tariff
 * Блок Таблица цен по типам сайтов
 */
add_shortcode('web_type_tariff_table', 'web_type_tariff_table_shortcode_callback');

function web_type_tariff_table_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'web-type-tariff');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод levels
 * Блок Этапы сотрудничества
 */
add_shortcode('levels_block', 'levels_block_shortcode_callback');

function levels_block_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/block', 'levels');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}

/*
 * Шорткод last_news
 * Блок Последние публикации
 */
add_shortcode('last_news', 'last_news_shortcode_callback');

function last_news_shortcode_callback()
{
	ob_start();

	get_template_part('template-parts/last', 'posts');

	$output = ob_get_contents(); // всё, что вывели, окажется внутри $output
	ob_end_clean();

	return $output;
}


