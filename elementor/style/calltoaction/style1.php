<section class="call-to-action">
	<?php if(! empty($settings['fimage']['url'] )) :?>
		<div class="overlay-bg"><img src="<?php echo $settings['fimage']['url'] ?>" alt="bg"></div>
	<?php endif; ?>
	<div class="container">
		<div class="action-content text-center wow pixFadeUp">
            <?php if(!empty($title)): ?>
                <h2 class="title"><?php echo $title;?></h2>
            <?php endif; ?>

		    <?php if(!empty($description_text)): ?>
                <p class="description"><?php echo $description_text; ?></p>
            <?php endif; ?>

            <?php if(! empty($settings['link_text'])) :?>
                <a href="<?php echo $settings['link']['url'] ?>" class="pix-btn btn-light"><?php echo $settings['link_text']?></a>
            <?php endif; ?>
		</div>
		<!-- /.action-content -->
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