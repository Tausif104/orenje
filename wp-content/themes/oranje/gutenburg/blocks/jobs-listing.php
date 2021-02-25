<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs-listing-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jobs-listing';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$jobs_section_title = get_field('jobs_section_title');    
$jobs_section_description = get_field('jobs_section_description');       
$jobs_inner_section_title = get_field('jobs_inner_section_title');       
$jobs_section_description = get_field('jobs_section_description');       
$jobs_inner_sub_title = get_field('jobs_inner_sub_title');       
?>

<!-- start job listing area  -->
<section class="jobs-listing-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrap">
                    <div class="section-title2">
                        <h2><?php echo $jobs_section_title; ?></h2>
                        <p><?php echo $jobs_section_description; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2><?php echo $jobs_inner_section_title; ?></h2>
                    <h4><?php echo $jobs_inner_sub_title; ?></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode('[jobs]'); ?>
            </div>
        </div>
    </div>
</section>
<!-- end job listing area  -->