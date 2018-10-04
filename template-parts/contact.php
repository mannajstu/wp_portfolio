<div class="mail_us">
			<div class="col-md-6 mail_left">
				<div class="contact-grid1-left">
					<div class="contact-grid1-left1">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						<h4>Contact By Email</h4>
						<ul>
							<li>Mail1: <a href="mailto:<?php echo $wp_preface['contact-email-1']; ?>"><?php echo $wp_preface['contact-email-1']; ?></a></li>
							<li>Mail2: <a href="mailto:<?php echo $wp_preface['contact-email-2']; ?>"><?php echo $wp_preface['contact-email-2']; ?></a></li>
						</ul>
					</div>
				</div>
					<div class="contact-grid1-left">
						<div class="contact-grid1-left1">
							<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							<h4>Contact By Phone</h4>
							<ul>
								<li>Phone: <?php echo $wp_preface['contact-phone']; ?></li>
								<li>Fax: <?php echo $wp_preface['contact-fax']; ?></li>
							</ul>
						</div>
					</div>
					<div class="contact-grid1-left">
						<div class="contact-grid1-left1">
							<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
							<h4>Looking For Address</h4>
							<ul>
								<li><?php echo $wp_preface['contact-address']; ?></li>
								<li><br></li>
								<br></li><li>
								
								
							</ul>
						</div>
					</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-6 mail_right">
				   <?php echo do_shortcode($wp_preface['contact-form']); ?>
			</div>
			<div class="clearfix"></div>
		</div>