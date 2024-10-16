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
class BdevsAbout extends \Elementor\Widget_Base {

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
		return 'bdevs-about';
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
		return __( 'About', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs About widget icon.
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
	 * Retrieve the list of categories the Bdevs About widget belongs to.
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
		return [ 'about' ];
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
				'label' => esc_html__( 'About', 'bdevs-elementor' ),
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
					'style_3' => esc_html__( 'Style 3', 'bdevs-elementor' ),
				],
				'default'   => 'style_1',
			]
		);

		$this->add_control(
			'background_bg',
			[
				'label'   => esc_html__( 'Featured Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
			]
			
		);

		$this->add_control(
			'background_bg_2',
			[
				'label'   => esc_html__( 'Video Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
				'condition' => [
                    'chose_style' => ['style_3']
                ],
			]
			
		);

		$this->add_control(
			'shape_image',
			[
				'label'   => esc_html__( 'Shape Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add image from here', 'bdevs-elementor' ),
				'condition' => [
                    'chose_style' => ['style_3']
                ],
			]
			
		);

		$this->add_control(
			'video',
			[
				'label'       => __( 'Link Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('#', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_3']
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
			'content',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'		=> __('Content', 'bdevs-elementor'),
				'label_block' => true,
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

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		extract($settings); ?>
		<?php if( $chose_style == 'style_1' ): ?>
		<!--====== Start About ======-->
        <section class="about-area-two pb-80">
            <div class="container">
                <div class="row align-items-center">
                	
                    <div class="col-lg-7">
                        <div class="about-img-two">
                        	<?php if ( '' !== $settings['background_bg']['url']) : ?>
                            <img src="<?php echo wp_kses_post($settings['background_bg']['url']); ?>" alt="img">
                        	<?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="about-two-content">
                        	<?php if ( '' !== $settings['heading']) : ?>
                            <div class="section-title mb-25">
                                <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                            </div>
                        	<?php endif; ?>
                            <?php print wp_kses_post($settings['content']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End About ======-->
	    <?php elseif( $chose_style == 'style_2' ): ?>
	    <!--====== Start About ======-->
        <section class="about-area-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="about-three-content">
                        	<?php if ( '' !== $settings['heading']) : ?>
                            <div class="section-title mb-25">
                                <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                            </div>
                            <?php endif; ?>
                            <?php print wp_kses_post($settings['content']); ?>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="about-img-three">
                        	<?php if ( '' !== $settings['background_bg']['url']) : ?>
                            <img src="<?php echo wp_kses_post($settings['background_bg']['url']); ?>" alt="img">
                        	<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End About ======-->
        <?php elseif( $chose_style == 'style_3' ): ?>
        <!--====== Start About ======-->
        <section class="about-area-v1 pt-120 pb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img-box mb-40">
                        	<?php if ( '' !== $settings['background_bg']['url']) : ?>
                            <div class="about-img about-img-one">
                                <img src="<?php echo wp_kses_post($settings['background_bg']['url']); ?>" alt="Image">
                                <?php if ( '' !== $settings['shape_image']['url']) : ?>
                                <div class="shape-box">
                                    <img src="<?php echo wp_kses_post($settings['shape_image']['url']); ?>" class="shape" alt="Image">
                                </div>
                                <?php endif; ?>
                            </div>
                        	<?php endif; ?>
                            <?php if ( $settings['video'] ) : ?>
                            <div class="about-img about-img-two">
                                <img src="<?php echo wp_kses_post($settings['background_bg_2']['url']); ?>" alt="Image">
                                <div class="play-content text-center">
                                    <a href="<?php print wp_kses_post($settings['video']); ?>" class="video-popup"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content-box mb-40">
                        	<?php if ( '' !== $settings['heading']) : ?>
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                            <?php endif; ?>
                            <?php print wp_kses_post($settings['content']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End About ======-->
	    <?php endif; ?>
	<?php
	}

}