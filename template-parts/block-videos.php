<?php
/**
 * Display Block Videos
 * Вывод Различных видео
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$page_id = get_the_ID();
$block_videos_color = get_field('block_videos_color', $page_id); // Цвет фона блока
$block_videos_title = get_field('block_videos_title', $page_id);
$block_videos_description = get_field('block_videos_description', $page_id);

if (have_rows('new_videos')) {
    ?>

    <section class="videos
<?php if ($block_videos_color == 'тёмный') { ?>dark<?php } ?>   
">
        <div class="container">
            <?php if ($block_videos_title) { ?>
                <h2>
                    <?php echo $block_videos_title; ?>
                </h2>
            <?php }
            if ($block_videos_description) { ?>
                <div class="services-block__text post">
                    <?php echo $block_videos_description; ?>
                </div>
            <?php } ?>

            <ul class="videos__video reviews-video d-grid">
                <?php if (have_rows('new_videos')): ?>
                    <?php while (have_rows('new_videos')):
                        the_row();
                        $videos_video_type = get_sub_field('videos_video_type');
                        $videos_video = get_sub_field('videos_video');
                        $videos_video_id = get_sub_field('videos_video_id');
                        $videos_video_title = get_sub_field('videos_video_title');
                        $videos_video_link = get_sub_field('videos_video_link');
                        ?>

                        <li class="reviews-video__item">
                            <?php
                            if ($videos_video_type == 'файл' && $videos_video) { ?>
                                <video controls class="reviews-video-wrap__file">
                                    <source src="<?php echo esc_url($videos_video['url']); ?>" type="video/webm" />

                                    <source src="<?php echo esc_url($videos_video['url']); ?>" type="video/mp4" />
                                </video>

                            <?php } else if ($videos_video_type == 'ссылка' && $videos_video_id) { ?>
                                    <iframe width="720" height="344" src="https://rutube.ru/play/embed/<?php echo $videos_video_id; ?>"
                                        frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen
                                        allowFullScreen>
                                    </iframe>
                            <?php }

                            echo '<div class="videos-block mt-3 d-flex flex-column flex-lg-row gap-2">';

                            if ($videos_video_title) {
                                echo '<p class="videos-block__title col">';
                                echo $videos_video_title;
                                echo '</p>';
                            }
                            if ($videos_video_link) {
                                echo '<a class="videos-block__link col-auto position-relative" href=" ' . $videos_video_link . ' " target="_blank">Готовый сайт</a>';
                            }
                            echo '</div>';
                            ?>
                        </li>

                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
<?php } ?>