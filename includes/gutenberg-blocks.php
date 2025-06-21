<?php
/*
** Gutenberg blocks / Пользовательские блоки для Гуттенберга
*/

// Зарегистрируем новую категорию блоков Custom blocks
add_filter( 'block_categories_all' , function( $categories ) {
    
	$categories[] = array(
		'slug'  => 'custom-blocks-category',
		'title' => 'Кастомные блоки'
	);

	return $categories;
} );

// Регистрируем блоки в нашей кастомной категории
function be_register_blocks() {
    if( ! function_exists('acf_register_block') )
        return;
    
    // Блок Заказать услугу
    acf_register_block( array(
        'name'			=> 'cta-services-block',
        'title'			=> __( 'Заказать услугу CTA' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/cta-services-block.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'welcome-write-blog',
        ),
        'mode'			=> 'preview',
        'keywords'		=> array( 'profile', 'user', 'author' )
    ));

    // Блок Портфолио
    acf_register_block( array(
        'name'			=> 'portfolio-block',
        'title'			=> __( 'Портфолио' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/portfolio-block.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'cover-image',
        ),
        'mode'			=> 'preview',
        'keywords'		=> array( 'profile', 'user', 'author' )
    ));

    // Блок Тарифы на разработку
    acf_register_block( array(
        'name'			=> 'tariffes-block',
        'title'			=> __( 'Тарифы на разработку' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/tariffes-block.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'money-alt',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Тарифы на разработку дизайна
    acf_register_block( array(
        'name'			=> 'tariffes-design-block',
        'title'			=> __( 'Тарифы на веб дизайн' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/design-tariffs.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'money-alt',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Этапы работ по веб дизайну
    acf_register_block( array(
        'name'			=> 'levels-design-block',
        'title'			=> __( 'Этапы работы веб дизайн' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/levels-design.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'editor-ol',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Текст - изображение
    acf_register_block( array(
        'name'			=> 'text-image',
        'title'			=> __( 'Текст - изображение' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/text-image.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'align-right',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Быстрый заказ
    acf_register_block( array(
        'name'			=> 'fast-cta',
        'title'			=> __( 'Быстрый заказ услуги' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/fast-cta.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'bell',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Акция (Текст - изображение)
    acf_register_block( array(
        'name'			=> 'block-action',
        'title'			=> __( 'Акция на услугу' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/action-block.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'megaphone',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));

    // Блок Текст со стилизованными буллетами - изображение с увеличением
    acf_register_block( array(
        'name'			=> 'text-image-bullets',
        'title'			=> __( 'Текст c буллетами, - изображение' ),
        'render_template'	=> get_stylesheet_directory() . '/template-parts/gutenberg/text-bullets-image-contain.php',
        'category'		=> 'custom-blocks-category',
        'icon' => array(
            // Specifying a background color to appear with the icon e.g.: in the inserter.
            'background' => '#CC0033',
            // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
            'foreground' => '#fff',
            // Specifying a dashicon for the block
            'src' => 'align-right',
        ),
        'mode'			=> 'edit',
        'keywords'		=> array( 'quote', 'mention', 'cite' )
    ));
}
add_action('acf/init', 'be_register_blocks' );