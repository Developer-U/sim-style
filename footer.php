<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blocksy
 */

blocksy_after_current_template();
do_action('blocksy:content:bottom');

$logo_color = get_field('logo_color', 'options');
$phone_num = get_field('tel', 'options');
$tel = str_replace([' ', '(', ')', '-', '+7'], '',  $phone_num);
$socials =  get_field('social_icons', 'options');
$dzen_view = substr($socials['dzen'], 8);
$copyright = get_field('copyright', 'options');
?>
	</main>

	<?php
		do_action('blocksy:content:after');
		do_action('blocksy:footer:before');
		?>

			<section class="footer dark">
				<div class="container">
					<div class="footer__top footer-top d-grid grid-four align-items-start">
						<div class="footer-top__item first">
							<a href="/" class="header__logo header__logo_footer">
								<?php
								if( $logo_color ) { ?>
									<img src="<?php echo $logo_color['url']; ?>" alt="<?php echo $logo_color['alt']; ?>">
								<?php } else { ?>						
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_header.svg" />
								<?php } ?>
							</a>

							<?php get_template_part('template-parts/social'); ?>
						</div>
						<div class="footer-top__item second">
							<h3 class="footer-top__title">
								Разделы
							</h3>

							<?php estore_footer_menu(); ?> 
						</div>
						<div class="footer-top__item third">
							<h3 class="footer-top__title">
								Услуги
							</h3>

							<?php estore_works_menu(); ?> 
						</div>
						<div class="footer-top__item fourth">
							<?php
							if( $phone_num || $socials['dzen'] ) { ?>	
								<h3 class="footer-top__title">
									Контакты
								</h3>

								<div class="footer-top__block">
									<p>
										Тел. / WhatsApp / Telegram
									</p>
									<?php
										if( $phone_num ) { ?>			
										<a class="header__tel header__tel_footer" href="tel:+7<?php echo $tel; ?>" >
											<?php echo $phone_num; ?>
										</a>		
									<?php } ?>
								</div>

								<?php
								if( $socials['dzen'] ) { ?>
									<div class="footer-top__block">
										<p>
											Канал в Яндекс.дзен
										</p>
										
										<a class="header__tel header__tel_footer dzen" href="<?php echo $socials['dzen']; ?>" target="_blank">
											<?php echo $dzen_view; ?>
										</a>
									</div>
								<?php }
							} ?>	
						</div>
					</div>

					<div class="footer__bottom footer-bottom d-grid">
						<p class="footer-bottom__item copyright">
							<?php if( $copyright ) { ?>
								©&nbsp;<?php echo date("Y");?>&nbsp; <?php echo $copyright; ?>
							<?php } ?>
						</p>

						<a class="footer-bottom__item" href="/privacy">
							Политка конфиденциальности
						</a>
					</div>
				</div>
			</section>

		<?php
		do_action('blocksy:footer:after');
	?>
</div>

<?php wp_footer(); ?>

</body>
</html>
