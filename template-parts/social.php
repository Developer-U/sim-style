<?php
/**
 * Template part for displaying social icons
 *
 */
$socials =  get_field('social_icons', 'options');

if( $socials['whatsapp'] || $socials['telegram'] || $socials['vk'] || $socials['dzen'] ) { 
?>
    <!-- Social icons block -->
    <ul class="social col-auto">
        <?php
        if( $socials['whatsapp'] ) { ?>
            <li class="social__item">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $socials['whatsapp']; ?>" target="_blank" class="social__link whatsapp">									
                </a>
            </li>
        <?php };						

        if( $socials['telegram'] ) { ?>
            <li class="social__item">
                <a href="https://t.me/<?php echo $socials['telegram']; ?>" target="_blank" class="social__link telegram">								
                </a>
            </li>
        <?php };

        if( $socials['vk']) { ?>
            <li class="social__item">
                <a href="<?php echo $socials['vk']; ?>" class="social__link vk" target="_blank">							
                </a>
            </li>
        <?php } 
        
        if( $socials['dzen']) { ?>
            <li class="social__item">
                <a href="<?php echo $socials['dzen']; ?>" class="social__link dzen" target="_blank">							
                </a>
            </li>
        <?php }
        ?>
    </ul>
    <!-- Social icons block end-->
<?php } ?>