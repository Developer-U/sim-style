<?php
/**
 * Display Block Table two cols
 * Блок Таблица в две колонки
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$table_two_block_blockcolor = get_field('table_two_block_blockcolor', $page_id); // Цвет фона блока

$table_two_block_title = get_field('table_two_block_title', $page_id);
$table_two_block_text = get_field('table_two_block_text', $page_id);
$table_two_block_title_key = get_field('table_two_block_title_key', $page_id);
$table_two_block_title_value = get_field('table_two_block_title_value', $page_id);

if (have_rows('add_table_two_item', $page_id)) {
    ?>

    <section class="table-two
    <?php if ($table_two_block_blockcolor == 'тёмный') { ?>dark
        <?php } elseif ($table_two_block_blockcolor == 'белый') { ?>white<?php } ?>
    ">
        <div class="container">
            <?php if ($table_two_block_title) { ?>
                <h2>
                    <?php echo
                        $table_two_block_title;
                    ?>
                </h2>

            <?php }

            if ($table_two_block_text) { ?>
                <div class="services-block__text post">
                    <?php echo $table_two_block_text; ?>
                </div>
            <?php } ?>

            <div class="table-wrapper">
                <table class="table-two__table table-two-cols">
                    <thead>
                        <tr>
                            <th class="table-two-cols key fw-bold"><?php echo
                                $table_two_block_title_key;
                            ?></th>
                            <th class="table-two-cols value"><?php echo
                                $table_two_block_title_value;
                            ?></th>
                        </tr>
                    </thead>

                    <?php
                    if (have_rows('add_table_two_item', $page_id)) { ?>
                        <?php while (have_rows('add_table_two_item', $page_id)) {
                            the_row();
                            $table_two_item_key = get_sub_field('table_two_item_key', $page_id);
                            $table_two_item_value = get_sub_field('table_two_item_value', $page_id);
                            ?>

                            <tr>
                                <td class="fw-bold"><?php echo
                                    $table_two_item_key;
                                ?></td>
                                <td><?php echo
                                    $table_two_item_value;
                                ?></td>
                            </tr>

                        <?php }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

<?php }