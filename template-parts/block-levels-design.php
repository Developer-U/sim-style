<?php
/**
* Display Block Levels Design
* Вывод Блока Этапы работы по веб дизайну - сквозной
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$levels_design_blockcolor = get_field('levels_design_blockcolor', $page_id); // Цвет фона блока
$levels_design_line_up = get_field('levels_design_line_up', $page_id); // Серая верхняя окантовка
$levels_design_blocktitle = get_field('levels_design_blocktitle', $page_id);
$levels_design_blocktext = get_field('levels_design_blocktext', $page_id);

if( have_rows('new_work_design_level', 'options') ) {
?>

    <section class="services-block levels-block
    <?php if ($levels_design_blockcolor == 'тёмный') { ?>dark
    <?php } elseif ($levels_design_blockcolor == 'белый') { ?>white<?php } ?>
    <?php if ($levels_design_line_up == 'да') { ?>line-up<?php } ?>
    ">
        <div class="container">            
            <h2 class="levels-block__title">
                <?php echo $levels_design_blocktitle ? $levels_design_blocktitle : 'Как мы будем работать'; ?>
            </h2>

            <ul class="levels-block__list levels-list d-grid">            

                <?php if( have_rows('new_work_design_level', 'options') ): ?>
                <?php $i = 0; while( have_rows('new_work_design_level', 'options') ): the_row();               
                $work_design_level_text = get_sub_field('work_design_level_text', 'options');
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
                                <?php echo $work_design_level_text; ?>
                            </p>
                        </div>                        
                    </li>                    

                <?php endwhile; ?>
                <?php endif; ?>

            </ul>
        </div>
    </section>

<?php } ?>
         