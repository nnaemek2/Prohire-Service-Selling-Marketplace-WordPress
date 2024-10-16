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
class BdevsTestimonial extends \Elementor\Widget_Base {

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
		return 'bdevs-testimonial';
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
		return __( 'Testimonial', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Testimonial widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Testimonial widget belongs to.
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
		return [ 'testimonial' ];
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
				'label' => esc_html__( 'Testimonial', 'Bdevs-elementor' ),
			]	
		);

		$this->add_control(
			'chose_style',
			[
				'label'     => esc_html__( 'Select Style', 'Bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'style_1'  => esc_html__( 'Style 1', 'Bdevs-elementor' ),
					'style_2' => esc_html__( 'Style 2', 'Bdevs-elementor' ),
					'style_3' => esc_html__( 'Style 3', 'Bdevs-elementor' ),
					'style_4' => esc_html__( 'Style 4', 'Bdevs-elementor' ),
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
				'label'       => __( 'Heading', 'Bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'		=> __('Heading', 'Bdevs-elementor'),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_team',
			[
				'label' => esc_html__( 'Testimonial Items', 'Bdevs-elementor' ),
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Items', 'Bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'    => 'tab_image',
						'label'   => esc_html__( 'Image', 'Bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'Bdevs-elementor' ),
					],
					[
						'name'        => 'name',
						'label'       => esc_html__( 'Name', 'Bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Name' , 'Bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'info',
						'label'       => esc_html__( 'Info', 'Bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Info' , 'Bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content',
						'label'       => esc_html__( 'Content', 'Bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Content' , 'Bdevs-elementor' ),
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
				'label' => esc_html__( 'Layout', 'Bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'Bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'Bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'Bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'Bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'Bdevs-elementor' ),
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
				'label'   => esc_html__( 'Show Heading', 'Bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_shape',
			[
				'label'   => esc_html__( 'Show Shape', 'Bdevs-elementor' ),
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
		<!--====== Start Testimonial ======-->
        <section class="testimonial-area-two pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="testimonial-img-two mb-40">
                            <img src="<?php print wp_kses_post($settings['background_bg']['url']); ?>" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="testimonial-two-content">
                        	<?php if ( $settings['show_heading'] ) : ?>
                            <div class="section-title mb-25">
                                <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                            </div>
                            <?php endif; ?>
                            <div class="testimonial-two-active mt-35">
                            	<?php 
				                    foreach ( $settings['tabs'] as $item ) :
								?>
                                <div class="testimonial-two-item">
                                    <div class="author">
                                        <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="client">
                                        <div class="description">
                                            <h6><?php print wp_kses_post($item['name']); ?></h6>
                                            <span><?php print wp_kses_post($item['info']); ?></span>
                                        </div>
                                    </div>
                                    <p><?php print wp_kses_post($item['content']); ?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ( $settings['show_shape'] ) : ?>
            <div class="testimonial-shapes">
                <img class="shape-one" src="<?php echo wp_kses_post($settings['shape_img_1']['url']); ?>">
                <img class="shape-two" src="<?php echo wp_kses_post($settings['shape_img_2']['url']); ?>">
            </div>
        	<?php endif; ?>
        	<?php if (is_admin())
			  { ?>
			<script type="text/javascript">
				$('.testimonial-two-active').slick({
					dots: true,
					arrows: false,
					infinite: true,
					autoplay: true,
					autoplaySpeed: 1500,
					slidesToShow: 1,
					slidesToScroll: 1,
				});
			</script>
			<?php }  ?>
        </section>
        <!--====== End Testimonial ======-->
		<?php elseif( $chose_style == 'style_2' ): ?>
		<!--====== Start Testimonial ======-->
        <section class="testimonial-area-three pt-120 pb-90">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5">
                        <div class="testimonial-img-two mb-30">
                        	<?php if ( $settings['show_heading'] ) : ?>
                            <div class="section-title mb-55">
                                <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                            </div>
                        	<?php endif; ?>
                            <img src="<?php print wp_kses_post($settings['background_bg']['url']); ?>" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="testimonial-three-content">
                            <div class="testimonial-three-active">
                            	<?php 
				                    foreach ( $settings['tabs'] as $item ) :
								?>
                                <div class="testimonial-three-item">
                                    <p><?php print wp_kses_post($item['content']); ?></p>
                                    <div class="author">
                                        <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="client">
                                        <div class="description">
                                            <h6><?php print wp_kses_post($item['name']); ?></h6>
                                            <span><?php print wp_kses_post($item['info']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            	<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ( $settings['show_shape'] ) : ?>
            <div class="testimonial-three-shapes">
                <img class="shape-one" src="<?php echo wp_kses_post($settings['shape_img_1']['url']); ?>">
                <img class="shape-two" src="<?php echo wp_kses_post($settings['shape_img_2']['url']); ?>">
            </div>
        	<?php endif; ?>
        </section>
        <?php if (is_admin())
		  { ?>
		<script type="text/javascript">
			$('.testimonial-three-active').slick({
				dots: true,
				arrows: false,
				infinite: false,
				autoplay: true,
				autoplaySpeed: 1500,
				slidesToShow: 1,
				rows: 2,
				slidesToScroll: 1,
			});
		</script>
		<?php }  ?>
        <!--====== End Testimonial ======-->
        <?php elseif( $chose_style == 'style_3' ): ?>
        <!--====== Start Testimonial ======-->
        <section class="testimonial-area-v1 bg_cover pt-120 pb-120 bg-img" data-bg-img="<?php print wp_kses_post($settings['background_bg']['url']); ?>">
        	<?php if ( $settings['show_shape'] ) : ?>
            <div class="shape-box">
                <img src="<?php echo wp_kses_post($settings['shape_img_1']['url']); ?>" class="shape-one" alt="Image">
                <img src="<?php echo wp_kses_post($settings['shape_img_2']['url']); ?>" class="shape-two" alt="Image">
            </div>
            <?php endif; ?>
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-40">
                            <h2><?php print wp_kses_post($settings['heading']); ?> </h2>
                        </div>
                    </div>
                </div>
            	<?php endif; ?>
                <div class="row testimonial-slider-one">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) :
					?>
                    <div class="col-lg-6">
                        <div class="tm-item">
                            <div class="tm-thumb-info">
                            	<?php if ( '' !== $item['tab_image']['url']) : ?>
                                <div class="thumb">
                                    <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                                    <i class="flaticon-quote-left"></i>
                                </div>
                            	<?php endif; ?>
                                <div class="info">
                                    <h6 class="title"><?php print wp_kses_post($item['name']); ?></h6>
                                    <p class="position"><?php print wp_kses_post($item['info']); ?></p>
                                </div>
                            </div>
                            <div class="tm-content">
                                <p><?php print wp_kses_post($item['content']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--====== End Testimonial ======-->
        <?php if (is_admin())
		  { ?>
		<script type="text/javascript">
			$('.testimonial-slider-one').slick({
				dots: false,
				arrows: false,
				infinite: true,
				autoplay: false,
				Speed: 1500,
				slidesToShow: 2,
				slidesToScroll: 1,
				responsive: [{
					breakpoint: 768,
					settings: {
						slidesToShow: 1
					}
				}]
			});
		</script>
		<?php }  ?>
        <?php elseif( $chose_style == 'style_4' ): ?>
        <!--====== Start Testimonial ======-->
        <section class="testimonial-area-v1 pt-120 pb-90">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-40">
                            <h2><?php print wp_kses_post($settings['heading']); ?> </h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) :
					?>
                    <div class="col-lg-6">
                        <div class="tm-item mb-30">
                            <div class="tm-thumb-info">
                            	<?php if ( '' !== $item['tab_image']['url']) : ?>
                                <div class="thumb">
                                    <img src="<?php echo wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                                    <i class="flaticon-quote-left"></i>
                                </div>
                            	<?php endif; ?>
                                <div class="info">
                                    <h6 class="title"><?php print wp_kses_post($item['name']); ?></h6>
                                    <p class="position"><?php print wp_kses_post($item['info']); ?></p>
                                </div>
                            </div>
                            <div class="tm-content">
                                <p><?php print wp_kses_post($item['content']); ?></p>
                            </div>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </section>
        <!--====== End Testimonial ======-->
		<?php endif; ?>
	<?php
	}

}