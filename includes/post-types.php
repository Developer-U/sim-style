<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/* Регистрируем новый тип записей - Услуги
-----------------------------------------------*/
add_action('init', 'services');
function services()
{
  $labels = array(
    'name' => 'Услуги',
    'singular_name' => 'Услуга',
    'add_new' => 'Добавить услугу',
    'add_new_item' => 'Добавить новую услугу',
    'edit_item' => 'Редактировать услугу',
    'new_item' => 'Новая услуга',
    'view_item' => 'Посмотреть Услуги',
    'search_items' => 'Найти Услуги',
    'not_found' =>  'Услуг не найдено',
    'not_found_in_trash' => 'В корзине услуг не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Услуги'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-megaphone',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => true,    
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'custom-fields'),

  );
  register_post_type('services',$args);  
}


/* Регистрируем новый тип записей - Портфолио
-----------------------------------------------*/
add_action('init', 'works');
function works()
{
  $labels = array(
    'name' => 'Портфолио',
    'singular_name' => 'Работа в портфолио',
    'add_new' => 'Добавить работу',
    'add_new_item' => 'Добавить новую работу',
    'edit_item' => 'Редактировать данные работы',
    'new_item' => 'Новая работа в портфолио',
    'view_item' => 'Посмотреть данные работы',
    'search_items' => 'Найти работу',
    'not_found' =>  'Работ в портфолио не найдено',
    'not_found_in_trash' => 'В корзине данных не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Портфолио'
  );

  $args_works = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'description' => 'Реальные проекты. Интересные истории успеха моих клиентов.',
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => 'dashicons-portfolio',
    'menu_position' => 2,
    'supports' => array('title', 'excerpt', 'thumbnail', 'editor', 'custom-fields'),	
  );
  register_post_type('works',$args_works);  
}

/* Регистрируем новый тип записей - Отзывы
-----------------------------------------------*/
add_action('init', 'reviews');
function reviews()
{
  $labels = array(
    'name' => 'Отзывы',
    'singular_name' => 'Отзыв',
    'add_new' => 'Добавить Отзыв',
    'add_new_item' => 'Добавить новый Отзыв',
    'edit_item' => 'Редактировать Отзыв',
    'new_item' => 'Новый Отзыв',
    'view_item' => 'Посмотреть Отзывы',
    'search_items' => 'Найти Отзывы',
    'not_found' =>  'Отзывов не найдено',
    'not_found_in_trash' => 'В корзине отзывов не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Отзывы'
  );

  $args = array(
    'labels' => $labels,
    'public' => false,
    'menu_icon' => 'dashicons-format-status',
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail', 'custom-fields'),

  );
  register_post_type('reviews',$args);  
}

/* Регистрируем новый тип записей - Виды сайтов
-----------------------------------------------*/
add_action('init', 'web_type');
function web_type()
{
  $labels = array(
    'name' => 'Типы сайтов',
    'singular_name' => 'Тип сайта',
    'add_new' => 'Добавить тип сайта',
    'add_new_item' => 'Добавить новый тип сайта',
    'edit_item' => 'Редактировать тип сайта',
    'new_item' => 'Новый тип сайта',
    'view_item' => 'Посмотреть тип сайта',
    'search_items' => 'Найти типы сайтов',
    'not_found' =>  'Типов сайта не найдено',
    'not_found_in_trash' => 'В корзине типов сайтов не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Типы сайтов'
  );

  $args_web_types = array(
    'labels' => $labels,
    'public' => true,
    'menu_icon' => 'dashicons-block-default',
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title', 'excerpt', 'editor','thumbnail', 'custom-fields'),

  );
  register_post_type('web_type',$args_web_types);  
}