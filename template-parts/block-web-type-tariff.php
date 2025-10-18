<?php
/**
 * Display Block Web Type tariffs
 * Блок Таблица Цены по типу сайта
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$web_type_tarif_block_blockcolor = get_field('web_type_tarif_block_blockcolor', $page_id); // Цвет фона блока
$web_type_tarif_line_up = get_field('web_type_tarif_line_up', $page_id); // Серая верхняя окантовка

$web_type_tarif_block_title = get_field('web_type_tarif_block_title', $page_id);
$web_type_tarif_block_text = get_field('web_type_tarif_block_text', $page_id);
$web_type_tarif_block_time = get_field('web_type_tarif_block_time', $page_id);
$web_type_tarif_block_price = get_field('web_type_tarif_block_price', $page_id);

if (have_rows('add_tariff_table_row', $page_id)) {    
    ?>

    <section class="web-type-tarif
    <?php if ($web_type_tarif_block_blockcolor == 'тёмный') { ?>dark
        <?php } elseif ($web_type_tarif_block_blockcolor == 'белый') { ?>white<?php } ?>
        <?php if ($web_type_tarif_line_up == 'да') { ?>line-up<?php } ?>
    ">
        <div class="container">
            <?php if ($web_type_tarif_block_title) { ?>
                <h2>
                    <?php echo
                        $web_type_tarif_block_title;
                    ?>
                </h2>

            <?php }

            if ($web_type_tarif_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $web_type_tarif_block_text; ?>
                </div>
            <?php } ?>

            <div class="table-wrapper">
                <table class="table-two__table tarif-table">
                    <thead>
                        <tr>
                            <th class="tarif-table key"></th>
                            <th class="tarif-table value first">Эконом</th>
                            <th class="tarif-table value second">Стандарт</th>
                            <th class="tarif-table value third">Премиум</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (have_rows('add_tariff_table_row', $page_id)) { ?>
                            <?php while (have_rows('add_tariff_table_row', $page_id)) {
                                the_row();
                                $tariff_table_row_title = get_sub_field('tariff_table_row_title', $page_id);
                                $tariff_table_row_keys = get_sub_field('tariff_table_row_keys', $page_id);
                                $tariff_table_row_description_need = get_sub_field('tariff_table_row_description_need', $page_id);
                                $tariff_table_row_description = get_sub_field('tariff_table_row_description', $page_id);                                
                                ?>
                                <tr>
                                    <td class="fw-bold"><?php echo $tariff_table_row_title; ?></td>
                                    <td>
                                        <?php
                                        if ($tariff_table_row_keys['one'] == 'да') {
                                            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><circle style="fill: rgb(59, 108, 183);" cx="256" cy="256" r="236.17" fill="#1138F7"></circle><path style="fill: rgb(59, 108, 183);" d="M256,512C114.853,512,0,397.167,0,256C0,114.853,114.853,0,256,0c141.167,0,256,114.853,256,256 C512,397.167,397.167,512,256,512z M256,39.659C136.705,39.659,39.659,136.705,39.659,256S136.705,472.341,256,472.341 S472.341,375.275,472.341,256C472.341,136.705,375.295,39.659,256,39.659z" fill="#1138F7"></path></g><path style="" d="M225.066,350.191c-5.314,0-10.391-2.122-14.139-5.929l-73.171-74.361 c-7.674-7.813-7.575-20.345,0.238-28.039c7.813-7.654,20.365-7.575,28.039,0.238l58.458,59.409l120.941-133.195 c7.396-8.11,19.929-8.685,27.999-1.348c8.11,7.357,8.705,19.889,1.348,28.019L239.74,343.706c-3.668,4.045-8.824,6.385-14.277,6.504 C225.324,350.191,225.205,350.191,225.066,350.191z" fill="#FFFFFF"></path></svg>';
                                        }
                                        if ($tariff_table_row_description_need == 'да' && $tariff_table_row_description['one']) {
                                            echo '<span class="tarif-table__desc">' . $tariff_table_row_description['one'] . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tariff_table_row_keys['two'] == 'да') {
                                            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><circle style="fill: rgb(55, 38, 151);" cx="256" cy="256" r="236.17" fill="#1138F7"></circle><path style="fill: rgb(55, 38, 151);" d="M256,512C114.853,512,0,397.167,0,256C0,114.853,114.853,0,256,0c141.167,0,256,114.853,256,256 C512,397.167,397.167,512,256,512z M256,39.659C136.705,39.659,39.659,136.705,39.659,256S136.705,472.341,256,472.341 S472.341,375.275,472.341,256C472.341,136.705,375.295,39.659,256,39.659z" fill="#1138F7"></path></g><path style="" d="M225.066,350.191c-5.314,0-10.391-2.122-14.139-5.929l-73.171-74.361 c-7.674-7.813-7.575-20.345,0.238-28.039c7.813-7.654,20.365-7.575,28.039,0.238l58.458,59.409l120.941-133.195 c7.396-8.11,19.929-8.685,27.999-1.348c8.11,7.357,8.705,19.889,1.348,28.019L239.74,343.706c-3.668,4.045-8.824,6.385-14.277,6.504 C225.324,350.191,225.205,350.191,225.066,350.191z" fill="#FFFFFF"></path></svg>';
                                        }
                                        if ($tariff_table_row_description_need == 'да' && $tariff_table_row_description['two']) {
                                            echo '<span class="tarif-table__desc">' . $tariff_table_row_description['two'] . '</span>';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($tariff_table_row_keys['three'] == 'да') {
                                            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><circle style="fill: rgb(23, 76, 155);" cx="256" cy="256" r="236.17" fill="#1138F7"></circle><path style="fill: rgb(23, 76, 155);" d="M256,512C114.853,512,0,397.167,0,256C0,114.853,114.853,0,256,0c141.167,0,256,114.853,256,256 C512,397.167,397.167,512,256,512z M256,39.659C136.705,39.659,39.659,136.705,39.659,256S136.705,472.341,256,472.341 S472.341,375.275,472.341,256C472.341,136.705,375.295,39.659,256,39.659z" fill="#1138F7"></path></g><path style="" d="M225.066,350.191c-5.314,0-10.391-2.122-14.139-5.929l-73.171-74.361 c-7.674-7.813-7.575-20.345,0.238-28.039c7.813-7.654,20.365-7.575,28.039,0.238l58.458,59.409l120.941-133.195 c7.396-8.11,19.929-8.685,27.999-1.348c8.11,7.357,8.705,19.889,1.348,28.019L239.74,343.706c-3.668,4.045-8.824,6.385-14.277,6.504 C225.324,350.191,225.205,350.191,225.066,350.191z" fill="#FFFFFF"></path></svg>';
                                        }
                                        if ($tariff_table_row_description_need == 'да' && $tariff_table_row_description['three']) {
                                            echo '<span class="tarif-table__desc">' . $tariff_table_row_description['three'] . '</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>
                        <tr>
                            <td class="fw-bold">Срок выполнения</td>
                            <td><?php echo $web_type_tarif_block_time['first']; ?></td>
                            <td class="cell-second"><?php echo $web_type_tarif_block_time['second']; ?></td>
                            <td class="cell-third"><?php echo $web_type_tarif_block_time['third']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Стоимость разработки под ключ</td>
                            <td class="price fw-bold">
                                <?php echo number_format($web_type_tarif_block_price['first'], 0, '', ' '); ?> ₽</td>
                            <td class="price fw-bold cell-second">
                                <?php echo number_format($web_type_tarif_block_price['second'], 0, '', ' '); ?> ₽</td>
                            <td class="price fw-bold cell-third">
                                <?php echo number_format($web_type_tarif_block_price['third'], 0, '', ' '); ?> ₽</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

<?php }