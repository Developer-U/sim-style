<?php
/**
* Display Block Levels
* Вывод Блока Этапы работы - сквозной
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$levels_block_title = get_field('levels_block_title', 'options'); 

if( have_rows('new_work_level', 'options') ) {
?>

    <section class="services-block levels-block">
        <div class="container">            
            <h2 class="levels-block__title">
                <?php echo $levels_block_title ? $levels_block_title : 'Как мы будем работать'; ?>
            </h2>

            <ul class="levels-block__list levels-list d-grid">            

                <?php if( have_rows('new_work_level', 'options') ): ?>
                <?php $i = 0; while( have_rows('new_work_level', 'options') ): the_row();               
                $work_level_text = get_sub_field('work_level_text', 'options');
                $index = $i++; // Создаём счётчик
                ?>

                    <li class="levels-list__item levels-item position-relative <?php if( $index == 0 || ($index % 2) == 0 ) {?>up<?php } ?>"
                        data-aos="fade-left"
                        data-aos-delay="<?php echo 100 * ($index * 2.5); ?>"
                        data-aos-duration="1000"
                        data-aos-easing="ease-in-out"
                        data-aos-once="true"
                        data-aos-anchor-placement="top"
                    >
                        <div class="levels-item__circle position-absolute"></div>

                        <div class="levels-item__wrapper position-relative">
                            <span class="levels-item__num">
                                0<?php echo $index+1; ?>
                            </span>

                            <p class="levels-item__text">
                                <?php echo $work_level_text; ?>
                            </p>
                        </div>                        
                    </li>                    

                <?php endwhile; ?>
                <?php endif; ?>

            </ul>
        </div>
    </section>

<?php } ?>
         