<section class="newsletter">

	<?php if (! empty($settings['bg_image_overlay'])) : ?>
		<div class="background-overlay">
			<img src="<?php echo $settings['bg_image_overlay']['url'] ?>" alt="overlay">
		</div>
	<?php endif; ?>
	<!-- /.background-overlay -->

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<div class="newsletter-content">
					<?php if(!empty($title_text)): ?>
						<h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $title_text; ?></h2>
					<?php endif; ?>
				</div>
				<!-- /.newsletter-content -->
			</div>
			<!-- /.col-lg-5 -->

			<div class="col-lg-7">
				<form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post"
					class="newsletter-form wow pixFadeUp" data-saaspik-form="newsletter-subscribe">
					<input type="hidden" name="action" value="saaspik_mailchimp_subscribe">

					<div class="newsletter-inner">
						<input type="email" name="email" class="form-control" id="newsletter-form-email"
							placeholder="<?php echo esc_attr__( 'Please enter your email', 'sasspik-addons'); ?>"
							required>
						<button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit">
							<span><?php echo esc_html__( 'Subscribe', 'sasspik-addons'); ?></span>
							<i class="fa fa-circle-o-notch fa-spin"></i>
						</button>
					</div>

					<div class="form-result alert">
						<div class="content"></div>
					</div><!-- /.form-result-->
				</form><!-- /.newsletter-form -->
			</div>
			<!-- /.col-lg-7 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->


	
	<?php if(! empty ($settings['bg_image_shape_two'])) : ?>
    <div class="scroll-circle wow pixFadeUp">
        <img src="<?php echo $settings['bg_image_shape_two']['url'] ?>" data-parallax='{"y" : -230}' alt="circle6">
    </div>
    <?php endif; ?>

</section>
<!-- /.newsletter -->