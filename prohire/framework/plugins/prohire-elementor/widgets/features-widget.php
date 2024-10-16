<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsFeatures extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-Features';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Features', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Features widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Features widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'Features' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdevs-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
	        'center'        => esc_html__('Center', 'bdevs-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_heading',
			[
				'label' => esc_html__( 'Features', 'bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Select Style', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style_1'  => esc_html__( 'Style 1', 'bdevs-elementor' ),
					'style_2' => esc_html__( 'Style 2', 'bdevs-elementor' ),
				],
				'default'   => 'style_1',
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
			
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Heading', 'bdevs-elementor'),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Icon' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Title' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link',
						'label'       => esc_html__( 'Link', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_1111',
			[
				'label' => esc_html__( 'Shape Image', 'bdevs-elementor' ),
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);

		$this->add_control(
			'shape_img_1',
			[
				'label'   => esc_html__( 'Shape Image 1', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'shape_img_2',
			[
				'label'   => esc_html__( 'Shape Image 2', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
			]
		);

		$this->end_controls_section();

		/** 
		*	Layout section 
		**/
		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_shape',
			[
				'label'   => esc_html__( 'Show Shape Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings); ?>
		<?php if( $chose_style == 'style_1' ): ?>
		<!--====== Start Features ======-->
        <section class="services-area-two pt-120 pb-90">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-65">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="col-xl-3 col-lg-4 col-sm-6 item">
                        <div class="service-item-two">
                            <div class="icon">
                                <i class="fas <?php print wp_kses_post($item['icon']); ?>"></i>
                            </div>
                            <div class="content">
                                <h4><a href="<?php print wp_kses_post($item['link']); ?>"><?php print wp_kses_post($item['title']); ?></a></h4>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
            <?php if ( $settings['show_shape'] ) : ?>
            <div class="service-two-shapes">
                <img class="shape-one" src="<?php echo wp_kses_post($settings['shape_img_1']['url']); ?>">
                <img class="shape-two" src="<?php echo wp_kses_post($settings['shape_img_2']['url']); ?>">
            </div>
        	<?php endif; ?>
        </section>
        <!--====== End Features ======-->
	    <?php elseif( $chose_style == 'style_2' ): ?>
	    <!--====== Start Features ======-->
        <section class="features-area-v1 bg_cover pt-120 pb-90 bg-img" data-bg-img="<?php echo wp_kses_post($settings['background_bg']['url']); ?>">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-40">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="features-item mb-40">
                            <div class="icon">
                                <i class="<?php print wp_kses_post($item['icon']); ?>"></i>
                            </div>
                            <div class="info">
                                <h5><a href="<?php print wp_kses_post($item['link']); ?>"><?php print wp_kses_post($item['title']); ?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--====== End Features ======-->
	    <?php endif; ?>
	<?php
	}

}