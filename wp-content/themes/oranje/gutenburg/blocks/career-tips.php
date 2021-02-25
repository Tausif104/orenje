<?php 

// Create id attribute allowing for custom "anchor" value.
$id = 'quick-tips-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quick-tips';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$career_section_title = get_field('career_section_title');
$career_section_description = get_field('career_section_description');

?>


<section class="quick-tips">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="site-title">
                    <h2><?php echo $career_section_title; ?></h2>
                    <p><?php echo $career_section_description; ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php  
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3
                );

                $posts_q = new WP_Query($args);
            ?>
            <?php while($posts_q->have_posts()) : $posts_q->the_post(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-career-tip">
                    <a class="career-thumb" href="<?php the_permalink(); ?>">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    </a>
                    <div class="career-tip-content-wrap">
                        <div class="career-meta d-flex justify-content-between">
                            <span class="career-date"><?php echo get_the_date(); ?></span>
                            <span class="career-comment"><?php comments_number(); ?></span>
                        </div>
                        <div class="career-tip-text">
                            <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a></h3>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="inline-btn">Read More <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>