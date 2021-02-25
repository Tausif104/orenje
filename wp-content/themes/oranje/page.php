<?php get_header(); ?>
<?php if(!is_front_page()) : ?>

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

<?php endif; ?>
<?php the_content(); ?>
<?php get_footer(); ?>
