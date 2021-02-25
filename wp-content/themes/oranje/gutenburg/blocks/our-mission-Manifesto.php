<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'our-mission-Manifesto' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'our-mission-Manifesto';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.


$mission_tab_area_hole_content = get_field('mission_tab_area_hole_content');       
$Manifesto_tab_area_hole_content = get_field('Manifesto_tab_area_hole_content');       
?>
 
<div class="our-mission-area">


	<div id="mission" class="our-mission-area-nav">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav>
					  <div class="nav nav-tabs" id="nav-tab" role="tablist">
					    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
					    	<?php echo $mission_tab_area_hole_content['mission_tab_title'] ?>
					    </a>
					    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
					    	<?php echo $Manifesto_tab_area_hole_content['manifesto_tab_title'] ?>
					    </a> 
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
		  	<div class="our-mission-area-nav-content">
		  		<div class="our-mission-area-nav-content-before-image">
		  			<img src="<?php echo $mission_tab_area_hole_content['mission_tab_area_thumbnail']['url'] ?>" alt="">
		  		</div>
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="our-mission-area-nav-content-popup-video text-right">
								<div class="ideo-area-btn">
		                            <a class="video-btn-mfp  mfp-iframe" href="<?php echo $mission_tab_area_hole_content['mission_tab_section_link'] ?>">
		                               <i class="fas fa-play"></i>
		                            </a>
		                        </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="our-mission-area-nav-content-inner-content">
								<div class="mission-title">
									<?php echo $mission_tab_area_hole_content['mission_tab_section_title'] ?>
								</div>
								<div class="mission-area-content">
									<?php echo $mission_tab_area_hole_content['mission_tab_section_inner_content'] ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
		  	<div class="our-mission-area-nav-content">
		  		<div class="our-mission-area-nav-content-before-image">
		  			<img src="<?php echo $Manifesto_tab_area_hole_content['manifesto_tab_area_thumbnail']['url'] ?>" alt="">
		  		</div>
				<div class="container">
					<div class="row  align-items-center">
						<div class="col-lg-6">
							<div class="our-mission-area-nav-content-popup-video text-right">
								<div class="ideo-area-btn">
		                            <a class="video-btn-mfp  mfp-iframe" href="<?php echo $Manifesto_tab_area_hole_content['manifesto_tab_section_link'] ?>">
		                               <i class="fas fa-play"></i>
		                            </a>
		                        </div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="our-mission-area-nav-content-inner-content">
								<div class="our-mission-area-nav-content-inner-content">
									<div class="mission-title">
										<?php echo $Manifesto_tab_area_hole_content['manifesto_tab_section_title'] ?>
									</div>
									<div class="mission-area-content">
										<?php echo $Manifesto_tab_area_hole_content['manifesto_tab_section_inner_content'] ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div> 
	</div>


	


</div>






