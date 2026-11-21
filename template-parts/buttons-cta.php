<?php
/**
 * Display Block Buttons CTA
 * Блок кнопок - "Узнать обо мне", "Рассчитать стоимость" и заказ
 */
$socials = get_field('social_icons', 'options');
?>

<ul class="buttons-list d-flex align-items-center gap-3">
    <?php
    if (!is_page('about')) { ?>
        <li class="buttons-list__btn">
            <a href="/about" class="button transparent-btn">Узнать больше обо мне</a>
        </li>
    <? } ?>

    <li class="buttons-list__btn">
        <a class="button red-btn" href="/quizle/rasschitat-stoimost-razrabotki/">
            Рассчитать стоимость
        </a>
    </li>

    <li class="buttons-list__btn">
        <a href="https://max.ru/u/f9LHodD0cOI1P3Ih2KZl_R5EWrkcwxjq97HGlXA52815bw_dQhj7cP1tHmA" target="_blank"
            class="button red-btn">
            Быстрый заказ
        </a>
    </li>
</ul>