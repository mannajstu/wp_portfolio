<!-- about -->
			<div id="about" class="about">
				<div class="col-md-6 about-left">
					<div id="owl-demo1" class="owl-carousel owl-carousel2">
						<?php if (isset($wp_preface['about-slides']) && !empty($wp_preface['about-slides'])):?>
						<?php foreach ($wp_preface['about-slides'] as $slide):?>

					                <div class="item">
					                	<div class="about-left-grid">
											<h2><?php echo $slide['title']?></h2>
											<p class="text-justify"><?php echo $slide['description']?></p>
											<ul>
												<li><a class="a-btn-a scroll" href="#port">My Work</a></li>
												<li><a class="a-btn-h scroll" href="#contact">Hire Me</a></li>
											</ul>
										</div>
					                </div>


					            <?php endforeach?>
					            <?php endif?>
					               
					</div>
				</div>
				 
				<div class="col-md-6 about-right"  style="background:url(<?php echo $wp_preface['about-backgroud-image']['url']?>) rgba(0, 0, 0, 0)  no-repeat scroll 0 0 / cover ;
				">
					
				</div>
				<div class="clearfix"> </div>
							 
			</div>
			<!-- /about -->