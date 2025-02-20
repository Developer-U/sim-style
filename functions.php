<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
	
});


// Добавим Страницу опций на ACF PRO options_theme

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Основная информация',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Идентичные блоки',
		'menu_title'	=> 'Идентичные блоки',
		'icon_url' => 'dashicons-table-col-after',
		'menu_slug'	=> 'theme-general-blocks',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/*
 * Скрипты и стили
 */
require get_stylesheet_directory() . '/includes/enqueue-scripts.php';

/*
 * Файл навигации (меню на сайте)
 */
require get_stylesheet_directory() . '/includes/navigations.php';

/*
 * Добавим произвольные типы записей
 */
require get_stylesheet_directory() . '/includes/post-types.php';

/*
 * Дублирование записей
 */
require get_stylesheet_directory() . '/includes/duplicate-types.php';

/*
 * Блоки Гуттенберга
 */
require get_stylesheet_directory() . '/includes/gutenberg-blocks.php';

/*
 * Шорткоды
 */
require get_stylesheet_directory() . '/includes/shortcodes.php';

add_filter( 'jpeg_quality', function() {
    return 100;
} );

add_filter( 'big_image_size_threshold', '__return_false' );

function add_rewrite_rules( $wp_rewrite )
{
    $new_rules = array(
        'blog/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    );

    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'add_rewrite_rules'); 

function change_blog_links($post_link, $id=0){

    $post = get_post($id);

    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/blog/'. $post->post_name.'/');
    }

    return $post_link;
}
add_filter('post_link', 'change_blog_links', 1, 3);