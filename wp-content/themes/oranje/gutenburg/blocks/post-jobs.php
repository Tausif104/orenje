<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs-post-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jobs-post';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
     
?>

<!-- start job post area  -->
<section class="jobs-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode('[submit_job_form]'); ?>
            </div>
        </div>
    </div>
</section>
<!-- end job listing area  -->