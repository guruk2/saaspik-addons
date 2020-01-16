<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Saaspik_Login extends Widget_Base {

    /**
    * Get widget name.
    *
    * Retrieve alert widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'saaspiklogin';
    }

    // public function get_id() {
    //    	return 'header-search';
    // }

    public function get_title() {
        return __( 'Login Form', 'saaspik-add-ons' );
    }

    public function get_icon() {
        // Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
        return 'fa fa-font';
    }

    /**
    * Get widget categories.
    *
    * Retrieve the widget categories.
    *
    * @since 1.0.0
    * @access public
    *
    * @return array Widget categories.
    */
    public function get_categories() {
        return [ 'saaspik-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Form', 'saaspik-add-ons' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Log in Now',
                'label_block' => true,
                
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => 'Explore some of the best tips from around the city from our partners and friends.',
                // 'show_label' => false,
            ]
        );
        
        $this->add_control(
            'btn_title',
            [
                'label' => __( 'Button Title', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => 'Log In',
                // 'show_label' => false,
            ]
        );
        $this->add_control(
            'btn_title_sign',
            [
                'label' => __( 'Button Title Sign Up', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => 'Not a member? Sign up',
                // 'show_label' => false,
            ]
        );
        $this->add_control(
            'link_sign',
            [
             'label' => __( 'URL Sign Up', 'saaspik-add-ons' ),
             'type' => Controls_Manager::URL,
             'default' => [
                'url' => '#',
                'is_external' => '',
             ],
             'show_external' => true, // Show the 'open in new tab' button.
            ]
        );
        $this->add_control(
            'btn_title_forget',
            [
                'label' => __( 'Button Title Forget', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXTAREA, // WYSIWYG,
                'default' => 'Forget my password',
                // 'show_label' => false,
            ]
        );
        $this->add_control(
            'link_forget',
            [
             'label' => __( 'URL Forget Password', 'saaspik-add-ons' ),
             'type' => Controls_Manager::URL,
             'default' => [
                'url' => '#',
                'is_external' => '',
             ],
             'show_external' => true, // Show the 'open in new tab' button.
            ]
        );
        $this->add_control(
            'is_external',
            [
                'label' => __( 'Is External Links', 'saaspik-add-ons' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_on' => __( 'Show', 'saaspik-add-ons' ),
                'label_off' => __( 'Hide', 'saaspik-add-ons' ),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'class',
            [
                'label' => __( 'Css Class', 'saaspik-add-ons' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
                
            ]
        );
        

        $this->end_controls_section();

    }

    protected function render( ) {

        $settings = $this->get_settings();
        $link_sign_up = $settings['link_sign'];
        $link_forget_pass = $settings['link_forget'];
        $target = $settings['is_external'] == 'yes'? ' target="_blank"':'';

        $css_classes_wrap = array(
            'welcome-page',
        );
        $css_class_wrap = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( $css_classes_wrap ) ) );

        
            
        ?>
        <div class="<?php echo esc_attr($css_class_wrap );?>">
            <?php if($settings['title']!==''): ?>
                <h1><?php echo $settings['title'] ?></h1>
            <?php endif; ?>
            <?php if($settings['content']!==''): ?>
                <p class="mb-50px"><?php echo $settings['content']; ?></p>
            <?php endif; ?>
            <form id="saaspik-login" class="mt-30px mb-20px" method="post">
                <div class="log-message"></div>
                <div class="form-group p-relative">
                    <label for="user_login">
                        <input id="user_login" name="log" type="text" placeholder="Your Email" class="d-block mb-20px" onClick="this.select()" value="" required>
                        <i class="fa fa-envelope fs-20 color-blue p-absolute"></i> 
                    </label>
                </div>
                <div class="form-group p-relative">
                    <label for="user_pass">
                        <input id="user_pass" name="pwd" type="password" placeholder="Your Password" class="d-block mb-20px" onClick="this.select()" value="" required>
                        <i class="fa fa-lock fs-20 color-blue p-absolute"></i> 
                    </label>
                </div>
                <button id="log-submit" role="button" class="main-btn btn-3 before-gray"><?php echo $settings['btn_title']; ?>
                </button>
                <?php
                    // this prevent automated script for unwanted spam
                    if ( function_exists( 'wp_nonce_field' ) ) 
                        wp_nonce_field( 'saaspik-login', '_loginnonce' );
                ?>
                <?php 
                $login_redirect_page = saaspik_option('login_redirect_page');
                if($login_redirect_page != 'cth_current_page' && is_numeric($login_redirect_page) )
                    $login_redirect_url = get_permalink( $login_redirect_page );
                else 
                    $login_redirect_url = saaspik_addons_get_current_url();

                ?>
                <input type="hidden" name="redirection" value="<?php echo $login_redirect_url; ?>" />

                <input type="hidden" name="action" value="saaspik_login">
            </form>
            <a href="register-page" class="float-left mb-10px" <?php echo $target; ?>><?php echo $settings['btn_title_sign']; ?></a>
            <a href="lost-password-page" class="float-right" <?php echo $target; ?>><?php echo $settings['btn_title_forget']; ?></a>
        </div>
        <?php

    }

    // protected function _content_template() {
    //     
    //     <div class="section-title">
    //         <# if(settings.title){ #><h2>{{{settings.title}}}</h2><# } #>
    //         <# if(settings.over_title){ #><div class="section-subtitle">{{{settings.over_title}}}</div><# } #>
    //         <# if(settings.show_sep == 'yes'){ #><span class="section-separator"></span><# } #>
    //         {{{settings.sub_title}}}
    //     </div>
    //     <?php

    // }

   
   

}

// Plugin::instance()->widgets_manager->register_widget( 'Elementor\Widget_Header_Search' );

// Plugin::$instance->elements_manager->create_element_instance

