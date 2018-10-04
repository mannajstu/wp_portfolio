<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_preface
 */

?>
<?php global $wp_preface;?>

    <div class="footer" id="contact" style=" background: url(<?php echo $wp_preface['contact-backgroud-image']['url']; ?>)  rgba(0, 0, 0, 0) no-repeat scroll center top / cover ;">



    <div class="container">
    <div class="service-head one text-center">
                        <h4><?php echo $wp_preface['contact-msg']; ?></</h4>

                        <h3><?php echo $wp_preface['contact-title']; ?></h3>
                        <span class="border two"></span>
                    </div>

        <?php require_once get_template_directory() . '/template-parts/contact.php';?>


        <div class="copy_right text-center">
            <p>&copy; <?php echo $wp_preface['footer-copyright'] ?> <a href="http://w3layouts.com/" style="display: none;"target="_blank">W3layouts.</a></p>
             <ul class="social-icons two">
                            <li><a href="<?php echo $wp_preface['footer-tweet'] ?>"> </a></li>
                            <li><a href="<?php echo $wp_preface['footer-facebook'] ?>" class="fb"> </a></li>
                            <li><a href="<?php echo $wp_preface['footer-linkdin'] ?>" class="in"> </a></li>
                            <li><a href="<?php echo $wp_preface['footer-gplus'] ?>" class="dott"> </a></li>
                        </ul>
        </div>
    </div>
</div>
            <!-- //footer -->
<!-- /container -->
<?php $potfoli = new WP_Query(array(
    'post_type' => 'portfolio',
    'cat'       => $wp_preface['portfolio-category']));
?>

<?php if ($potfoli->have_posts()): while ($potfoli->have_posts()): $potfoli->the_post();?>

                <div class="portfolio-modal modal fade slideanim" id="portfolioModal<?php the_ID()?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content port-modal">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <div class="modal-body">
                                <h3><?php the_title();?></h3>
                                <img src="<?php the_post_thumbnail_url();?>" class="img-responsive img-centered" alt="">
                                <p><?php the_content()?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                                                            <?php endwhile?>
                                            <?php endif;?>

<a href="#home" id="toTop" style="display: block; background: url(<?php echo $wp_preface['back-to-top']['url']; ?>) no-repeat 0px 0px"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <!--start-smooth-scrolling-->


<?php wp_footer();?>

</body>
</html>
