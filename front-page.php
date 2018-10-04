
	<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wp_preface
 */

get_header();
?>
			
		<?php require_once get_template_directory().'/template-parts/header-info.php';?> 	
		</div>
	</div>
		
			<?php require_once get_template_directory().'/template-parts/about.php';?> 
			<?php require_once get_template_directory().'/template-parts/services.php';?> 
			<?php require_once get_template_directory().'/template-parts/work-exp.php';?> 
			<?php require_once get_template_directory().'/template-parts/portfolio.php';?> 
			<?php require_once get_template_directory().'/template-parts/pro-blog.php';?> 
			

		
   

			<!-- /header -->

			
<?php get_footer();?>
