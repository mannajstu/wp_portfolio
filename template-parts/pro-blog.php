 <!-- top-grids -->
<?php if (!empty($wp_preface['show-blog'])):
?>
 <?php
$queryblog = new WP_Query(array('posts_per_page' => 3));
?>
				<div class="blog" id="blogs"  style=" background: <?php echo $wp_preface['blog-backgroud-color']; ?>;">
					<div class="container">
						<div class="service-head text-center">
						<h4><?php echo $wp_preface['blog-msg']?></h4>
						<h3><?php $blttle= $wp_preface['blog-title']; echo strtok($blttle, " ");?> <span><?php echo strrchr($blttle, " "); ?></span></h3>
						<span class="border one"></span>
					</div>
					<?php $i=1;?>
<?php if ($queryblog->have_posts()): while ($queryblog->have_posts()): $queryblog->the_post();?>
	
<?php if ($i % 2 ==0) : ?>
									   <div class="news-grid w3l-agile">
									   	
									    <div class="col-md-6 news-img">
										  <a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>"> <img src="<?php the_post_thumbnail_url();?>" alt=" " class="img-responsive"></a>

										</div>
									    <div class="col-md-6 news-text">
										   <h3> <a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>"><?php the_title();echo $i?></a></h3>
											<ul class="news">
												<li><i class="glyphicon glyphicon-user"></i> <a ><?php the_author()?></a></li>
												<li><i class="glyphicon glyphicon-comment"></i> <a ><?php echo get_comments_number(); ?> Comments</a></li>

												<li><i class="glyphicon glyphicon-tags"></i> <a ><?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag');
        echo count($tags);?> Tags</a></li>
											</ul>
											<p><?php the_content()?></p>
											<a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>" class="read hvr-shutter-in-horizontal">Read More</a>

										</div>
									
											
										

										<div class="clearfix"></div>
									 </div>
									 
									 <?php else : ?>

<!-- end section -->

									 <div class="news-grid">

					    <div class="col-md-6 news-text two">
						   <h3> <a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>"><?php the_title(); echo $i;?></a></h3>
							<ul class="news">
								<li><i class="glyphicon glyphicon-user"></i> <a ><?php the_author()?></a></li>
								<li><i class="glyphicon glyphicon-comment"></i> <a ><?php echo get_comments_number(); ?> Comments</a></li>
								
								<li><i class="glyphicon glyphicon-tags"></i> <a ><?php $tags = wp_get_post_terms(get_the_ID(), 'post_tag');
        echo count($tags);?> Tags</a></li>
							</ul>
							<p><?php the_content()?></p>
								<a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>" class="read hvr-shutter-in-horizontal">Read More</a>
					
						</div>
						<div class="col-md-6 news-img two">
						   <a href="#" data-toggle="modal" data-target="#myModal<?php the_ID()?>"> <img src="<?php the_post_thumbnail_url();?>" alt=" " class="img-responsive"></a>
						 
						</div>
						<div class="clearfix"></div>
					 </div>
					 <?php $i++; ?>
					 <?php endif;  ?>
									  <?php endwhile;endif;$i++;?>

				</div>
				<!-- top-grids -->
	<!-- /blog-pop-->

	<?php if ($queryblog->have_posts()): while ($queryblog->have_posts()): $queryblog->the_post();?>
			<div class="modal ab fade" id="myModal<?php the_ID()?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog about" role="document">
					<div class="modal-content about">
						<div class="modal-header">
							<button type="button" class="close ab" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body about">
								<div class="about">

									  <div class="about-inner">

									      <img style="width: 100%" src="<?php the_post_thumbnail_url();?>" alt=""/>
										     <h4 class="tittle"><?php the_title()?></h4>
										   <p><?php the_content()?></p>
									  </div>

								</div>
						</div>
					</div>
				</div>
			</div>
			</div>

			 <?php endwhile;endif;?>
			<!-- //blog-pop-->
<?php endif?>