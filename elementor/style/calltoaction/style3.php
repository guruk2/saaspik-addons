<section class="signup-section">
	<div class="bg-shape">
		<img src="<?php echo $settings['leftshape']['url'] ?>" data-parallax='{"x": -130}' alt="shape" class="shape-left">
		<img src="<?php echo $settings['rightshape']['url'] ?>" data-parallax='{"x": 130}' alt="shape" class="shape-right">
	</div>


	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-8">
				<div class="signup-heading wow pixFadeUp">
					<?php if(!empty($title)): ?>
						<h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $title; ?></h2>
					<?php endif; ?>

					<?php if(!empty($description_text)): ?>
               			<p class="description"><?php echo $description_text; ?></p>
            		<?php endif; ?>
				</div>
				<!-- /.signup-heading -->
			</div>
			<!-- /.col-lg-8 -->

			<div class="col-lg-4 text-right">
				<div class="button-container text-right wow pixFadeUp">
					<?php if(! empty($settings['link_text'])) :?>
						<a <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo $settings['link_text']?></a>
					<?php endif; ?>
				</div>
				<!-- /.button-container -->
			</div>
			<!-- /.col-lg-5 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->

</section>
<!-- /.call-to-action -->
