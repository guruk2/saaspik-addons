<section class="call-to-action action-padding">
	<?php if(! empty($settings['fimage']['url'] )) :?>
		<div class="overlay-bg"><img src="<?php echo $settings['fimage']['url'] ?>" alt="bg"></div>
	<?php endif; ?>
	<div class="container">
		<div class="row align-items-center justify-content-between">
			<div class="col-lg-7">
				<div class="action-content style-two wow pixFadeUp">
					<?php if(!empty($title)): ?>
						<h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $title; ?></h2>
					<?php endif; ?>
				</div>
				<!-- /.action-content -->
			</div>
			<!-- /.col-lg-7 -->

			<div class="col-lg-5 text-right">
				<?php if(! empty($settings['link_text'])) :?>
					<a <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo $settings['link_text']?></a>
				<?php endif; ?>
			</div>
			<!-- /.col-lg-5 -->
		</div>
		<!-- /.row -->		
	</div>
	<!-- /.container -->

	<?php if(! empty($settings['circleimg']['url'] )) :?>
		<div class="scroll-circle">
			<img src="<?php echo $settings['circleimg']['url'] ?>" data-parallax='{"y" : -130}' alt="circle">
		</div>
		<!-- /.scroll-circle -->
	<?php endif; ?>
</section>
<!-- /.call-to-action -->