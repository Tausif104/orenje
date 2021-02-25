<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oranje
 */


$footer_logo_options = get_field('footer_logo_options','option');
$footer_contact_us_options = get_field('footer_contact_us_options','option');
$footer_copyright_options = get_field('footer_copyright_options','option');
?>


<!-- footer area startt -->
<footer class="footer-area">
	<div class="footer-area-left">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cleaning-brick-road-left.png" alt="">
	</div>
	<div class="footer-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">
					<div class="footer-widget footer-info">
						<?php if (!empty($footer_logo_options['upload_footer_logo'])): ?>
							 <a class="navbar-brand" href="<?php echo get_site_url( ); ?>"><img class="img-fluid" src="<?php echo $footer_logo_options['upload_footer_logo']['url'] ?>" alt="<?php bloginfo( 'name' ); ?>"></a> 
							<?php else: ?>
								 <a class="navbar-brand" href="<?php echo get_site_url( ); ?>"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/footer-logo.png" alt="<?php bloginfo( 'name' ); ?>"></a> 
						<?php endif ?>
					  
					</div>
				</div>
				<div class="col-lg-2">
					<div class="ooter-widget explore-menu">
						<?php  dynamic_sidebar( 'footer-explore' ); ?>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="ooter-widget cleaning-service-menu">
						<?php  dynamic_sidebar( 'cleaning-service' ); ?>
					</div>
				</div>
				<div class="col-lg-3">

					<div class="ooter-widget contact-us">
						<?php if (!empty($footer_contact_us_options['footer_contact_us_title'])): ?>
							 <h3 class="footer-widgett-title mb-50"><?php echo $footer_contact_us_options['footer_contact_us_title'] ?></h3>
							<?php else: ?>
								 <h3 class="footer-widgett-title mb-50">Contact us</h3>
						<?php endif ?>
						

						<?php if (!empty($footer_contact_us_options['footer_contact_us_box'])): ?>
							 <ul>

							 	<?php foreach ($footer_contact_us_options['footer_contact_us_box'] as $key => $contactbox): ?>
							 		<?php if ($contactbox['footer_contact_box__link']): ?>
							 			<li class="d-flex align-items-center">
												<div class="infobox-icon">
													<?php echo $contactbox['footer_contact_box_icon'] ?>
												</div>
												<div class="infobox-content">
													<a href="<?php echo $contactbox['footer_contact_box__link'] ?>"><?php echo $contactbox['footer_contact_box_content'] ?></a>
												</div>
										</li>
							 			<?php else: ?>
							 				<li class="d-flex align-items-center">
												<div class="infobox-icon">
													<?php echo $contactbox['footer_contact_box_icon'] ?>
												</div>
												<div class="infobox-content">
													<?php echo $contactbox['footer_contact_box_content'] ?>
												</div>
											</li>

							 		<?php endif ?>
							 	<?php endforeach ;?>							
								
								
							</ul>

							<?php else: ?>
								<ul>
									<li class="d-flex align-items-center">
										<div class="infobox-icon">
											<i class="fas fa-phone-alt"></i>
										</div>
										<div class="infobox-content">
											<a href="tel:480.725.9715">480.725.9715</a>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<div class="infobox-icon">
											<i class="fas fa-envelope"></i>
										</div>
										<div class="infobox-content">
											<a href="mailto:hello@oranje.com">hello@oranje.com</a>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<div class="infobox-icon">
											<i class="fas fa-map-marker-alt"></i>
										</div>
										<div class="infobox-content">
											2524 North 24th Street,  <br>Phoenix, AZ 85008
										</div>
									</li>
								</ul>
						<?php endif ?>
 

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer copyright area start -->
	<div class="footer-copyright-area">
		<div class="container">
			<div class="copyright-area-outer-row">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<?php if (!empty($footer_copyright_options['footer_copyright_tex'])): ?>
							<div class="copytext">
								<?php echo wpautop( $footer_copyright_options['footer_copyright_tex'] ); ?>
							</div>
							<?php else: ?>
								<div class="copytext">
							<p>2020 © <a href="#">oranje</a>. All rights reserved.</p>
						</div>
						<?php endif ?>
						
					</div>
					<div class="col-lg-6">
						<div class="footer-copyright-menu text-right">
							<?php
								wp_nav_menu( array(
						             'menu'           => 'Footer menu', // Do not fall back to first non-empty menu.
								'theme_location' => 'footer-menu', 
							) );


							 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- footer copyright area end -->
	
<div class="footer-area-right">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/cleaning-brick-road-right.png" alt="">
	</div>


</footer>
<!-- footer area end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
