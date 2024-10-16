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
class BdevsStart extends \Elementor\Widget_Base {

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
		return 'bdevs-start';
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
		return __( 'Start', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Start widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slider-album';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Start widget belongs to.
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
		return [ 'start', 'carousel' ];
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
				'label' => esc_html__( 'Start', 'bdevs-elementor' ),
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
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Heading', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);	

		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Content', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);	

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Description', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);	

		$this->add_control(
			'heading_2',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Heading', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
		);	

		$this->add_control(
			'content_2',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Content', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
		);	

		$this->add_control(
			'description_2',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Description', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
		);	

		$this->add_control(
			'placeholder',
			[
				'label'       => __( 'Placeholder Form Search', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'		=> __('Placeholder', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);	

		$this->add_control(
			'button_search',
			[
				'label'       => __( 'Button Search', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'		=> __('Search', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_1']
                ],
			]
		);	

		$this->add_control(
			'placeholder_2',
			[
				'label'       => __( 'Placeholder Form Search', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'		=> __('Placeholder', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
		);	

		$this->add_control(
			'button_search_2',
			[
				'label'       => __( 'Button Search', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'		=> __('Search', 'bdevs-elementor'),
				'label_block' => true,
				'condition' => [
                    'chose_style' => ['style_2']
                ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_heading2',
			[
				'label' => esc_html__( 'Style 3', 'bdevs-elementor' ),
				'condition' => [
                    'chose_style' => ['style_3']
                ],
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'heading',
						'label'       => esc_html__( 'Heading', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Heading' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content',
						'label'       => esc_html__( 'Content', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Content' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'description',
						'label'       => esc_html__( 'Description', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Description' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'placeholder',
						'label'       => esc_html__( 'Placeholder Form Search', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Placeholder' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'button_search',
						'label'       => esc_html__( 'Button Search', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Search' , 'bdevs-elementor' ),
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
                    'chose_style' => ['style_2']
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
			'show_form',
			[
				'label'   => esc_html__( 'Show Search Form', 'bdevs-elementor' ),
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
		extract($settings);
		?>
		<?php if( $chose_style == 'style_1' ): ?>
		<!--====== Start Hero ======-->
        <section class="hero-area-two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h1><?php print wp_kses_post($settings['heading']); ?></h1>

                            <?php if ( '' !== $settings['content']) : ?>
                            <p><?php print wp_kses_post($settings['content']); ?></p>
                            <?php endif; ?>

                            <?php if ( $settings['show_form'] ) : ?>
                            <div class="hero-search-form mt-40">
                                <div class="form-wrapper">
                                    <form method="POST" action="<?php echo site_url('/'); ?>?page_id=512">
                                        <div class="form-inline">
                                            <input type="text" name="search_key" class="form_control" placeholder="<?php print wp_kses_post($settings['placeholder']); ?>">
                                            <button class="main-btn" type="submit"><?php print wp_kses_post($settings['button_search']); ?><i class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="banner-tags mt-15">
                                    <span class="color-dark"><?php print wp_kses_post($settings['description']); ?></span>
                                </div>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </div>
                    <?php if ( '' !== $settings['background_bg']['url']) : ?>
                    <div class="col-lg-6">
                        <div class="hero-img-two">
                            <img src="<?php print wp_kses_post($settings['background_bg']['url']); ?>" alt="hero">
                        </div>
                    </div>
                	<?php endif; ?>
                </div>
            </div>
        </section>
        <!--====== End Hero ======-->
        <?php elseif( $chose_style == 'style_2' ): ?>
        <!--====== Start Hero ======-->
        <section class="hero-area-three text-center pt-40 pb-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="hero-content-three">
                            <h1><?php print wp_kses_post($settings['heading_2']); ?></h1>
                            <?php if ( '' !== $settings['content_2']) : ?>
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <p><?php print wp_kses_post($settings['content_2']); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if ( $settings['show_form'] ) : ?>
                            <div class="hero-search-form mt-40">
                                <div class="form-wrapper">
                                    <form method="POST" action="<?php echo site_url('/'); ?>?page_id=512">
                                        <div class="form-inline">
                                            <input type="text" name="search_key" class="form_control" placeholder="<?php print wp_kses_post($settings['placeholder_2']); ?>">
                                            <button class="main-btn" type="submit"><?php print wp_kses_post($settings['button_search_2']); ?><i class="fal fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="banner-tags mt-15">
                                    <span class="color-dark"><?php print wp_kses_post($settings['description_2']); ?></span>
                                </div>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if ( '' !== $settings['background_bg']['url']) : ?>
                <div class="hero-img-three mt-25">
                    <img src="<?php print wp_kses_post($settings['background_bg']['url']); ?>" alt="hero">
                </div>
                <?php endif; ?>
            </div>
            <?php if ( $settings['show_shape'] ) : ?>
            <div class="hero-three-shapes">
                <img class="shape-one" src="<?php echo wp_kses_post($settings['shape_img_1']['url']); ?>">
                <img class="shape-two" src="<?php echo wp_kses_post($settings['shape_img_2']['url']); ?>">
            </div>
        	<?php endif; ?>
        </section>
        <!--====== End Hero ======-->
        <?php elseif( $chose_style == 'style_3' ): ?>
        <!--====== Start Banner ======-->
        <section class="banner-area-v1 bg_cover bg-img" data-bg-img="<?php print wp_kses_post($settings['background_bg']['url']); ?>">
            <div class="container">
                <div class="hero-content-slider">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="single-slider">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="banner-content">
                                    <h1 data-animation="fadeInDown" data-delay=".1s">
                                        <?php print wp_kses_post($item['heading']); ?>
                                    </h1>
                                    <?php if ( '' !== $item['content']) : ?>
		                            <p data-animation="fadeInDown" data-delay=".2s"><?php print wp_kses_post($item['content']); ?></p>
		                            <?php endif; ?>
		                            <?php if ( $settings['show_form'] ) : ?>
                                    <div class="hero-search-form mt-40" data-animation="fadeInDown" data-delay=".2s">
                                        <div class="form-wrapper">
                                            <form method="POST" action="<?php echo site_url('/'); ?>?page_id=512">
                                                <div class="form-inline">
                                                    <input type="text" name="search_key" class="form_control" placeholder="<?php print wp_kses_post($item['placeholder']); ?>">
                                                    <button class="main-btn" type="submit"><?php print wp_kses_post($item['button_search']); ?><i class="fal fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="banner-tags mt-15">
                                            <span class="color-dark"><?php print wp_kses_post($item['description']); ?></span>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ( '' !== $item['tab_image']['url']) : ?>
                            <div class="col-lg-5">
                                <div class="hero-img">
                                    <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                                </div>
                            </div>
                        	<?php endif; ?>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--====== End Banner ======-->
        <?php endif; ?>
	<?php
	}

}