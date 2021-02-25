<?php
/**
Template Name: Full width
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Oranje
 */

get_header();



if (get_post_meta( get_the_ID(), 'oranje_webmakerbd_page_option', true )) {
	$page_meta =  get_post_meta( get_the_ID(), 'oranje_webmakerbd_page_option', true );
}else{
	$page_meta = array();
}
if (array_key_exists('enable_breadcum', $page_meta)) {
	$enable_breadcum = $page_meta['enable_breadcum'];
}else{
	$enable_breadcum = true;
}
if (array_key_exists('custom_page_title', $page_meta)) {
	$custom_page_title = $page_meta['custom_page_title'];
}else{
	$custom_page_title = '';
}
if (array_key_exists('overlay_perchanetage', $page_meta)) {
	$overlay_perchanetage = $page_meta['overlay_perchanetage'];
}else{
	$overlay_perchanetage = esc_attr__( '.6', 'heus-templateacademy' );
}
if (array_key_exists('bradcum_overlay_color', $page_meta)) {
	$bradcum_overlay_color = $page_meta['bradcum_overlay_color'];
}else{
	$bradcum_overlay_color = esc_attr__( '#222222', 'heus-templateacademy' );;
}
 


 
?>
 
<!-- Breadcum area start --> 
<?php if ($enable_breadcum == true): ?>
<div class="breadcum-area position-relative" <?php if (has_post_thumbnail(  )): ?>
	style="background-image: url(<?php the_post_thumbnail_url( 'large' ) ?>);"
<?php endif; ?> >
<?php if (has_post_thumbnail(  )): ?>
	<div class="overlay-breadcum-area" style="background: <?php echo esc_attr( $bradcum_overlay_color ) ?> ; opacity: <?php echo esc_attr( $overlay_perchanetage ) ?>"></div>
<?php endif ?>
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="breadcum-custom-title">
					<?php if (!empty($custom_page_title)): ?>
							<h1><?php echo $custom_page_title; ?></h1>
						<?php else: ?>
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php endif ?>

					 
				</div> 
			</div>
 

			<?php if (function_exists('bcn_display')): ?>
				<div class="col-lg-6">
					<div class="breadcum-nav-xt-area text-right">
						<?php  bcn_display(); ?>
					</div>
				</div>
			<?php endif ;?>

			

		</div>
	</div>
</div>
<?php endif ;?> 

<!-- Breadcum area end -->
<div class="site-page-content-area padding-none">
	<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
	?>
</div>
 
<?php
 
get_footer();
