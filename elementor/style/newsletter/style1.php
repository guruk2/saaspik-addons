<section class="newsletter-two" id="newsletter">
    <div class="container">

        <div class="newsletter-content-two text-center wow pixFadeUp">

            <?php if(!empty($title_text)): ?>
                <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $title_text; ?></h2>
            <?php endif; ?>

            <?php if(!empty($description_text)): ?>
            <p <?php echo $this->get_render_attribute_string( 'description_text' ); ?>>
                <?php echo $description_text; ?>
            </p>
            <?php endif; ?>
        </div>
        <!-- /.newsletter-content -->


        <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post"
            class="newsletter-form-two wow pixFadeUp" data-saaspik-form="newsletter-subscribe">
            <input type="hidden" name="action" value="saaspik_mailchimp_subscribe">

            <div class="newsletter-inner">
                <input type="email" name="email" class="form-control" id="newsletter-form-email"
                    placeholder="<?php echo esc_attr__( 'Please enter your email', 'sasspik-addons'); ?>" required>
                <button type="submit" name="submit" id="newsletter-submit" class="newsletter-submit">
                    <span><?php echo esc_html__( 'Subscribe Now!', 'sasspik-addons'); ?></span>
                    <i class="fa fa-circle-o-notch fa-spin"></i>
                </button>
            </div>

            <div class="form-result alert">
                <div class="content"></div>
            </div><!-- /.form-result-->
        </form><!-- /.newsletter-form -->


    </div>
    <!-- /.container -->

    <?php if(! empty ($settings['bg_image_shape'])) : ?>
        <div class="scroll-circle wow pixFadeUp">
            <img src="<?php echo $settings['bg_image_shape']['url'] ?>" data-parallax='{"y" : -230}' alt="circle6">
        </div>
    <?php endif; ?>
</section>
<!-- /.newsletter -->