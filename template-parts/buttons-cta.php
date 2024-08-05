<?php
/**
* Display Block Buttons CTA
* Блок кнопок - "Узнать обо мне", "Рассчитать стоимость" и заказ
*/
$socials =  get_field('social_icons', 'options');
?>

<ul class="buttons-list d-flex align-items-center gap-3">
    <li class="buttons-list__btn">
        <a href="/about" class="button transparent-btn">Узнать больше обо мне</a>
    </li>

    <li class="buttons-list__btn">        
        <a class="button red-btn" href="/quizle/rasschitat-stoimost-razrabotki/">
            Рассчитать стоимость
        </a>
    </li>

    <li class="buttons-list__btn">       
        <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="button red-btn">
            Быстрый заказ									
        </a>
    </li>
</ul>

