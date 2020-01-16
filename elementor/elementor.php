<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Saaspik_Shortcode {

	/**
     * Holds the class object.
     *
     * @since 2.0.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 2.0.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'saaspik_elementor_init'));
        add_action('elementor/widgets/widgets_registered', array($this, 'saaspik_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
        
	}


    /**
     * Enqueue Scripts
     *
     * @return void 
     */ 
    
     public function enqueue_scripts() {
         wp_enqueue_script( 'saaspik-main-elementor', SAASPIK_SCRIPTS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), SAASPIK_ADDONS_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */

    public function editor_enqueue_styles() {
        wp_enqueue_style( 'panel-elementor', SAASPIK_CSS.'/panel.css',null, SAASPIK_ADDONS_VERSION );
        wp_enqueue_style( 'px-icon-elementor', SAASPIK_CSS.'/iconfont.css',null, SAASPIK_ADDONS_VERSION );

    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}

	/**
     * Add new Elementor Categories
     *
     * Register new widget categories for Saaspik Addons widgets.
     *
     * @since 1.7.0
     * @since 1.7.1 The method moved to this class.
     *
     * @access public
	*/

    public function saaspik_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'saaspik-elements',
            [
                'title' =>esc_html__( 'Saaspik Elements', 'saaspik-addons' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    public function saaspik_shortcode_elements($widgets_manager){

        require_once __DIR__ . '/saaspik-hero.php';
        require_once __DIR__ . '/saaspik-heading.php';
        require_once __DIR__ . '/saaspik-button.php';
        require_once __DIR__ . '/saaspik-button-download.php';
        require_once __DIR__ . '/saaspik-iconbox.php';
        require_once __DIR__ . '/saaspik-blog.php';
        require_once __DIR__ . '/saaspik-testimonial.php';
        require_once __DIR__ . '/saaspik-advance-tab.php';
        require_once __DIR__ . '/saaspik-accordian-tab.php';
        require_once __DIR__ . '/saaspik-funfact.php';
        require_once __DIR__ . '/saaspik-testimonial.php';
        require_once __DIR__ . '/saaspik-logocarousel.php';
        require_once __DIR__ . '/saaspik-team.php';
        require_once __DIR__ . '/saaspik-imagetab.php';
        require_once __DIR__ . '/saaspik-pricing.php';
        require_once __DIR__ . '/saaspik-form.php';
        require_once __DIR__ . '/saaspik-image.php';
        require_once __DIR__ . '/saaspik-image-background.php';
        require_once __DIR__ . '/saaspik-portfolio.php';
        require_once __DIR__ . '/saaspik-paired-image.php';
        require_once __DIR__ . '/saaspik-paired-image-two.php';
        require_once __DIR__ . '/saaspik-accordian.php';
        require_once __DIR__ . '/saaspik-faqtwo.php';
        require_once __DIR__ . '/saaspik-call-to-action.php';
        require_once __DIR__ . '/saaspik-newsletter.php';
        require_once __DIR__ . '/saaspik-contact-info.php';
        require_once __DIR__ . '/saaspik-map.php';
        require_once __DIR__ . '/saaspik-image-feature.php';
        require_once __DIR__ . '/saaspik-about.php';        


        $widgets_manager->register_widget_type(new Elementor\Saaspik_Hero_Widget());   
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Heading_Widget());   
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Icon_Box());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Widget_Button());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Widget_Download_Button());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Post_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Testimonial_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Funfact_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Logo_Carousel_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Team());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Image_Tab());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Accordian_Tab_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Pricing_Table());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Contact_Form7());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Image());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Image_With_Background());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Portfolio());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Parallax_Images());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Parallax_Images_Two());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Accordion());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Faq_Tab());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Call_Action());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Newsletter());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Contact_Info_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Map_Widget());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_Image_Feature());
        $widgets_manager->register_widget_type(new Elementor\Saaspik_About_Widget());   
        

    }
    
	public static function saaspik_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Saaspik_Shortcode();
        }
        return self::$_instance;
    }

}
$saaspik_shortcode = Saaspik_Shortcode::saaspik_get_instance();



// Add Parallax Control (Switch) to Section Element in the Editor.
function add_elementor_section_background_controls( \Elementor\Element_Section $section ) {
    $section->add_control(
        'section_parallax',
        [
            'label' => __( 'Parallax', 'saaspik-addons' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_off' => __( 'Off', 'saaspik-addons' ),
            'label_on' => __( 'On', 'saaspik-addons' ),
            'default' => 'no',
        ]
    );
}
add_action( 'elementor/element/section/section_background/before_section_end', 'add_elementor_section_background_controls' );

// Render section backgrou]d parallax
function render_elementor_section_parallax_background( \Elementor\Element_Base $element ) {
    if('section' === $element->get_name()){
        if ( 'yes' === $element->get_settings( 'section_parallax' ) ) {
            $background = $element->get_settings( 'background_image' );
            $background_URL = $background['url'];
            $element->add_render_attribute( '_wrapper', [
                'class' => 'th-parallax',
                'data-parallax' => 'scroll',
                'data-image-src' => $background_URL,
            ] ) ;
        }
    }
}
add_action( 'elementor/frontend/section/before_render', 'render_elementor_section_parallax_background' );
