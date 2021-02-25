<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oranje
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<!-- Start Header Area -->
<header class="header_area" id="header_area">
	<div class="main_menu">
		<nav class="navbar navbar-expand-xl">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo_attachment = wp_get_attachment_image_src($custom_logo_id, "full");
				?>
				<a class="navbar-brand" href="<?php echo home_url('/') ?>"><img class="img-fluid" src="<?php echo $logo_attachment["0"]; ?>" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<?php 
						wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container' => 'ul',
							'menu_class' => 'nav navbar-nav',
						));
					?>
					<div class="header-button ml-auto">
						<a class="contact-link" href="http://creativepeoples.xyz/projects/oranje/contact-us/">Contact Sales</a>
						<a data-toggle="modal" data-target="#exampleModalCenter" href="<?php echo get_field('header_button_url', 'option'); ?>" class="header-btn"><img src="<?php echo get_field('header_button_icon', 'option'); ?>" alt=""> <?php echo get_field('header_button_label', 'option'); ?></a>
						<!-- <a data-toggle="modal" data-target="#disinfection-modal" href="<?php echo get_field('header_button_url', 'option'); ?>" class="header-btn"><img src="<?php echo get_field('header_button_icon', 'option'); ?>" alt=""> Disinfection</a> -->
					</div>
				</div>
			</div>
		</nav>
	</div>
</header>
<!-- End Header Area -->


<!-- cleaning form shortcode -->
<?php echo do_shortcode('[cleaning-form bg="#000" ]') ?>
<?php echo do_shortcode('[disinfection-form]') ?>


