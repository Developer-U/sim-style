<?php
/**
 * Display Top Article tabs
 * Отображает блок табов категорий публикаций
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$arg_cat = array(
    'orderby' => 'name', // сортировка по названию
    'order' => 'ASC', // сортировка от меньшего к большему
    'hide_empty' => 1, // скрыть пустые рубрики
    'exclude' => '', // id рубрики, которые надо исключить
    'include' => '', // id рубрики, из которых надо выводить
    'taxonomy' => 'category', // название таксономии
);
$categories = get_categories($arg_cat);

if ($categories) { ?>
    <ul class="blog__tabs blog-tabs d-flex mb-3 mb-lg-4 mb-xl-5 gap-2 gap-xxl-3">
        <li class="blog-tabs__item col-auto"><a class="active" href="/blog">Все</a></li>
        <?php
        foreach ($categories as $category) {
            echo '<li class="blog-tabs__item col-auto"><a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a></li>';
        }
        echo '</ul>';
}
?>
<script>
    window.addEventListener('DOMContentLoaded', function(){
        // Открытие табов с разделами и подразделами
        var pathNums = document.querySelectorAll('.blog-tabs__item a'); // все кнопки	

        var currentTitle = document.querySelector('.archive-title').innerText; 

        pathNums.forEach(function(pathBtn){ // Итерируем все кнопки           

            pathBtn.classList.remove('active');

            if( pathBtn.innerText.toLowerCase() == currentTitle.toLowerCase() ) {
                pathBtn.classList.add('active');
            } 
        }); 
    });
</script>
