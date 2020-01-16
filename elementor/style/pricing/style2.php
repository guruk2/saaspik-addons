<div class="container">
    <div class="tab-content priceing-tab">
        <?php if ( 'yes' === $settings['show_tab'] ) { ?>        
            <nav class="pricing-tab wow pixFadeUp" data-wow-delay="0.3s">
                <span class="tab-btn monthly_tab_title">
                    <?php echo esc_html( $settings['monthly_title'] ) ?>
                </span>
                <span class="pricing-tab-switcher"></span>
                <span class="tab-btn annual_tab_title">
                <?php echo esc_html( $settings['anual_title'] ) ?>
                </span>
            </nav>
        <?php } ?>

        <div class="row justify-content-center advanced-pricing-table">
            <?php if($tables) {
                foreach ( $tables as $table ) {              
                
                    $purchase_btn = $table['purchase_btn_url'];
                    $purchase_btn_target = $purchase_btn['is_external'] ? 'target="_blank"' : '';
                    ?>
                    <div class="col-lg-4 col-md-6 price wow pixFadeUp" data-wow-dealy="0.4s">
                        <div class="pricing-table featured style-two <?php echo esc_attr($table['select_color']); ?>">
                            <?php if ( 'yes' === $table['popular'] ) { ?>
                                <?php if(! empty($table['popular_text'])) : ?>
                                    <div class="trend">
                                        <p><?php echo $table['popular_text'] ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>    
                            <div class="pricing-header pricing-amount">
                                <div class="annual_price style-two price-two">
                                    <h3 class="price"><span><?php echo esc_html($table['currency']) ?></span><?php echo esc_html($table['annual_price']) ?></h3>
                                </div>
                                <!-- /.annual_price -->

                                <div class="monthly_price">
                                    <h3 class="price"><span><?php echo esc_html($table['currency']) ?></span><?php echo esc_html($table['monthly_price']) ?></h3>
                                </div>
                                <!-- /.monthly_price -->

                                <h2 class="price-title"><?php echo esc_html($table['title']) ?></h2>
                                <p class="dur-month"><?php echo esc_html($table['duration']) ?></p>
                                <p class="dur-year"><?php echo esc_html($table['duration_year']) ?></p>
                            </div>
                            <ul class="price-feture">
                                <?php echo $table['list_items']; ?>
                            </ul>

                            <div class="action">
                                <?php if(!empty($table['try_btn_label'])) : ?>
                                    <!-- <a href="<?php //echo esc_url($try_btn['url']); ?>" class="pix-btn btn-outline" <?php //echo esc_attr($try_btn_target); ?>>
                                        <?php //echo esc_html($table['try_btn_label']) ?>
                                    </a> -->
                                <?php endif; ?>
                                <?php if(!empty($table['purchase_btn_label'])) : ?>
                                    <a href="<?php echo esc_url($purchase_btn['url']); ?>" class="pix-btn btn-outline" <?php echo $purchase_btn_target; ?>>
                                        <?php echo esc_html($table['purchase_btn_label']) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
    </div>
</div>
<!-- /.container -->