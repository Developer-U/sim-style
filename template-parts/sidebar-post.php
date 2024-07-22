<?php
/*
* Sidebar Post / Сайдбар на странице публикации
*/

?>

    <aside class="content">
        <h3 class="sidebar__heading">      
            Другие публикации
        </h3>

        <ul class="sidebar__post sidebar-post">
            <?php 
            $id = get_the_id();
            $args_sidebar_post = array(
                'posts_per_page' => 6,
                'post_type' => 'post',
                'orderby'  => 'date',
                'order' => 'DESC',
                'post__not_in' => array( $id ), // Исключим текущий пост
            );           

            $query_sidebar_post = new WP_Query( $args_sidebar_post );        

            if ( $query_sidebar_post->have_posts() ) {
                while ( $query_sidebar_post->have_posts() ) {
                    $query_sidebar_post->the_post();
                    ?>                   

                    <li class="sidebar-job__other d-grid">
                        <a href="<?php the_permalink(); ?>" class="sidebar-posts__image">                     
                            <?php
                            if( has_post_thumbnail() ) { // условие, если есть миниатюра
                                the_post_thumbnail(); // если параметры функции не указаны, то выводится миниатюра текущего поста, размер thumbnail
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/img/cyberpank.jpeg" />'; // изображение по умолчанию, если миниатюра не установлена
                            } ?>                    
                        </a>                     

                        <a href="<?php the_permalink(); ?>" class="sidebar-posts__link">
                            <?php the_title(); ?>
                        </a>                        
                    </li>
                <?php
                }
            }        
            
            // Возвращаем оригинальные данные поста. Сбрасываем $post.
            wp_reset_postdata(); ?>

        </ul>
      
    </aside><!-- #secondary -->