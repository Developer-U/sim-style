<?php
/**
 * Display Block Gallery
 * Блок Галерея
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$gallery_block_title = get_field('gallery_block_title', $page_id);
$gallery_block_text = get_field('gallery_block_text', $page_id);
?>

<section class="gallery-block">
    <div class="container">
        <?php
        if ($gallery_block_title) {
            echo '<h2>';
            echo $gallery_block_title;
            echo '</h2>';
        } 
        if ($gallery_block_text) {
            echo '<div class="post mb-4">';
            echo $gallery_block_text;
            echo '</div>';
        }         
        ?>

        <ul class="gallery-block__list gallery-block-list d-grid">
            <?php if (have_rows('new_gallery_block', $page_id)):
                while (have_rows('new_gallery_block', $page_id)):
                    the_row();
                    $gallery_block_img = get_sub_field('gallery_block_img', $page_id);
                    ?>

                    <li>
                        <a href="<?php echo $gallery_block_img['url']; ?>" data-fancybox="block_gallery">
                            <img src="<?php echo $gallery_block_img['url']; ?>" alt="<?php echo $gallery_block_img['alt']; ?>">
                        </a>
                    </li>

                <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </div>
</section>