<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Simplified-Communication-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Simplified-Communication-area-wrapper';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$m_tabs = get_field('tabs');    

?>

<!-- Simplified-Communication start -->

<div class="<?=$className?>" id="<?=$id?>">


	<div class="Simplified-Communication-navigation">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						<?php if($m_tabs and is_array($m_tabs) and count($m_tabs) > 0) foreach ($m_tabs as $key => $tabs) : ?>
							<li class="nav-item">
								<a class="nav-link <?php if($key==0) echo 'active'; ?>" id="m-tab-<?=$key?>" data-toggle="pill" href="#m-tab-content-<?=$key?>" role="tab" aria-controls="m-tab-content-<?=$key?>" <?php if($key==0) echo 'aria-selected="true"'; ?> ><?=$tabs['title']?></a>
							</li>
					  	<?php endforeach; ?>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<div class="Simplified-Communication-inner-content">
		 <div class="tab-content" id="pills-tabContent">
			
		 	<?php if($m_tabs and is_array($m_tabs) and count($m_tabs) > 0) foreach ($m_tabs as $key => $tabs) : ?>
			  <div class="tab-pane fade <?php if($key==0) echo 'show active'; ?>" id="m-tab-content-<?=$key?>" role="tabpanel" aria-labelledby="m-tab-content-<?=$key?>">
			  	<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="Simplified-Communication-inner-content-nav">
								
								<div class="nav flex-column nav-pills" id="v-pills-tab-<?=$key?>" role="tablist" aria-orientation="vertical">
									<?php if($tabs['tabs'] and is_array($tabs['tabs']) and count($tabs['tabs']) > 0) foreach ($tabs['tabs'] as $key2 => $tab) : ?>
										<a class="nav-link <?php if($key2==0) echo 'active'; ?>" id="v-pills-tab-<?=$key?>-<?=$key2?>" data-toggle="pill" href="#v-pills-content-<?=$key?>-<?=$key2?>" role="tab" aria-controls="v-pills-content-<?=$key?>-<?=$key2?>" aria-selected="true"><?=$tab['title']?></a>
									<?php endforeach; ?>
								</div>

							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="Simplified-Communication-inner-contents">
								
								<div class="tab-content" id="v-pills-tabContent-<?=$key?>">
								<?php if($tabs['tabs'] and is_array($tabs['tabs']) and count($tabs['tabs']) > 0) foreach ($tabs['tabs'] as $key2 => $tab) : ?>
										<div class="tab-pane fade <?php if($key2==0) echo 'show active'; ?>" id="v-pills-content-<?=$key?>-<?=$key2?>" role="tabpanel" aria-labelledby="v-pills-tab-<?=$key?>-<?=$key2?>">
											<?=$tab['content']?>
										</div>
									<?php endforeach; ?>
									
								</div>

							</div>
						</div>
					</div>
				</div>
			  </div>
			<?php endforeach; ?>
						  

		</div>
		
	</div>

</div>

<!-- Simplified-Communication end -->