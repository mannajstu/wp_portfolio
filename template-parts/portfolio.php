<!-- portfolio -->
<?php if (!empty($wp_preface['show-portfolio'])):
?>

	<?php $cats = get_categories(
    array(
        'orderby' => 'name',
        'order'   => 'ASC',
        'include' => $wp_preface['portfolio-category'],
    )
);

$portfolio = new WP_Query(array(
    'post_type' => 'portfolio',
    'cat'       => $wp_preface['portfolio-category']));
?>
<div class="portfolio" id="port"  style=" background: <?php echo $wp_preface['portfolio-backgroud-color']; ?>;">
				<div class="service-head text-center">
						<h4><?php echo $wp_preface['portfolio-msg'] ?></h4>
						<h3><?php $prfl = $wp_preface['portfolio-title'];
echo strtok($prfl, " ");?> <span><?php echo strrchr($prfl, " "); ?></span></h3>
						<span class="border"></span>
					</div>
			<div class="portfolio-grids">


				<div class="sap_tabs">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px; ">
						<ul class="resp-tabs-list">
							<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>ALL</span></li>

							<?php foreach ($cats as $cat): ?>
							<li class="resp-tab-item" aria-controls="<?php

echo $cat->name; ?>" role="tab"><span><?php

echo $cat->name; ?></span></li>

								<?php endforeach;?>
						</ul>
						<div class="resp-tabs-container" >
							<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">

<?php if ($portfolio->have_posts()): while ($portfolio->have_posts()): $portfolio->the_post();?>

						<div class="col-md-3 team-gd ">

								<a href="#portfolioModal<?php the_ID()?>" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="<?php the_post_thumbnail_url();?>" style="height:250px;" alt="">

								</a>

						</div>

													<?php endwhile?>
										<?php endif;?>
							</div>

<?php

if(!empty($wp_preface['portfolio-category'])){$catids = $wp_preface['portfolio-category'];}
else{
	$catids =array();
} 
foreach ($catids as $catid): ?>

	<?php
$prtflio = new WP_Query(array(
    'post_type' => 'portfolio',
    'cat'       => $catid));

?>

<div class="tab-1 resp-tab-content" aria-labelledby="">
							<?php if ($prtflio->have_posts()): while ($prtflio->have_posts()): $prtflio->the_post();?>




	<div class="col-md-3 team-gd ">
		<div class="thumb">
			<a href="#portfolioModal5" class="portfolio-link b-link-diagonal b-animate-go" data-toggle="modal"><img src="<?php the_post_thumbnail_url();?>" style="height:250px;" alt="">

			</a>
		</div>
	</div>
				<?php endwhile?>
										<?php endif;?>

										<div class="clearfix"></div>
									</div>


							<?php endforeach;?>



								<div class="clearfix"></div>



						</div>
					</div>
				</div>
				</div>
<div class="clearfix"></div>
			</div>
		
	<?php endif?>
	<!-- //portfolio -->




