
<?php 
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Oranje
 */
get_header(); 
?>

<section class="common-banner" style="background-image:url(<?php the_post_thumbnail_url(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="common-banner-content">
					<h1>
						<?php 
							if(get_field('custom_page_title')) {
								the_field('custom_page_title');
							}else{
								the_title();
							}
						?>
					</h1>

					<?php  
						if(get_field('page_breadcrumb') == 'show_bc') {
							?>
							<span class="page-breadcrumb"><?php bcn_display(); ?></span>

							<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="single-view-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'oranje' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'oranje' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</div>
<?php the_content(); ?>
<?php get_footer(); ?>


