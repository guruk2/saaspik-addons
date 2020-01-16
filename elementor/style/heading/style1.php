<div class="section-title wow pixFadeUp <?php echo esc_attr('text-'.$title_align); ?>">
    <?php if(!empty($sub_title)): ?>
        <h3 class="sub-title"><?php echo $sub_title; ?></h3>
    <?php endif; ?>
    <?php if(!empty($title)): ?>
        <h2 <?php echo $this->get_render_attribute_string( 'title_text' ); ?>><?php echo $title; ?></h2>
    <?php endif; ?>
    <?php if(!empty($description_text)): ?>
        <p class="description"><?php echo $description_text; ?></p>
    <?php endif; ?>
</div>