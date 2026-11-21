<?php
/**
 * Display Block Social Invite
 * Блок приглашение в социальные сети. Слева - текст, справа картинка
 * Блок сквозной
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$social_invite_blockcolor = get_field('social_invite_blockcolor', 'options'); // Цвет фона блока
$social_invite_blocktitle = get_field('social_invite_blocktitle', 'options');
$social_invite_blocktext = get_field('social_invite_blocktext', 'options');
$social_invite_image = get_field('social_invite_image', 'options');
$social_invite_link = get_field('social_invite_link', 'options');

if ($social_invite_blocktext) {
    ?>

    <section class="social_invite
    <?php if ($social_invite_blockcolor == 'тёмный') { ?>dark
    <?php } elseif ($social_invite_blockcolor == 'белый') { ?>white<?php } ?>
    ">
        <div class="container">
            <?php if ($social_invite_blocktitle) {
                echo '<h2>' . $social_invite_blocktitle . '</h2>';
            } ?>

            <div class="social_invite__wrap social-invite-wrap d-grid align-items-center">
                <div class="social-invite-wrap__text">
                    <?php echo $social_invite_blocktext; ?>
                </div>

                <?php if ($social_invite_image) {
                    echo '<a class="social-invite-wrap__link" href=" ' . $social_invite_link . ' ">';
                    echo '<figure class="social-invite-wrap__image"><img src=" ' . $social_invite_image['url'] . '" alt=" ' . $social_invite_image['alt'] . ' "></figure>';
                    echo '</a>';
                } ?>
            </div>
        </div>
    </section>
<?php } ?>