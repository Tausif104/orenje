<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs-dashboard-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jobs-dashboard';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
     
?>

<!-- start job dashboard area  -->
<section class="jobs-dashboard-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode('[job_dashboard]'); ?>
            </div>
        </div>
    </div>
</section>
<!-- end job listing area  -->