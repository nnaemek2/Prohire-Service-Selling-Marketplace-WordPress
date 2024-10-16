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
class BdevsBrand extends \Elementor\Widget_Base {

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
		return 'bdevs-brand';
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
		return __( 'Brand', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Brand widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-nested-carousel';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Brand widget belongs to.
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
		return [ 'brand' ];
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
				'label' => esc_html__( 'Brand', 'bdevs-elementor' ),
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
		<!--====== Start Client Logo ======-->
        <div class="client-logo-two">
            <div class="container">
                <div class="client-logo-two-active">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="logo-two-item text-center">
                    	<?php if ( '' !== $item['link']) : ?>
                        <a href="<?php print wp_kses_post($item['link']); ?>" target="_blank">
                            <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="img">
                        </a>
                        <?php else: ?>
                        <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="img">
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--====== End Client Logo ======-->
        <?php if (is_admin())
		  { ?>
		<script type="text/javascript">
			$('.client-logo-two-active').slick({
				dots: false,
				arrows: false,
				infinite: true,
				autoplay: true,
				autoplaySpeed: 1500,
				slidesToShow: 4,
				slidesToScroll: 1,
				responsive: [{
					breakpoint: 991,
					settings: {
						slidesToShow: 3
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2
					}
				}, {
					breakpoint: 575,
					settings: {
						slidesToShow: 1
					}
				}]
			});
		</script>
		<?php }  ?>
		<?php elseif( $chose_style == 'style_2' ): ?>
		<!--====== Start Sponsor ======-->
        <div class="sponsor-area-v1 pt-10 pb-40">
            <div class="container">
                <div class="sponsor-slider-one">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="single-item">
                    	<?php if ( '' !== $item['link']) : ?>
                        <a href="<?php print wp_kses_post($item['link']); ?>">
                            <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                        </a>
                        <?php else: ?>
                        <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" class="img-brand" alt="Image">
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--====== End Sponsor ======-->
        <?php if (is_admin())
		  { ?>
		<script type="text/javascript">
			$('.sponsor-slider-one').slick({
				dots: false,
				arrows: false,
				infinite: true,
				autoplay: true,
				Speed: 1500,
				slidesToShow: 5,
				slidesToScroll: 1,
				responsive: [{
					breakpoint: 1200,
					settings: {
						slidesToShow: 4
					}
				}, {
					breakpoint: 1024,
					settings: {
						slidesToShow: 3
					}
				}, {
					breakpoint: 768,
					settings: {
						slidesToShow: 2
					}
				}, {
					breakpoint: 480,
					settings: {
						slidesToShow: 1
					}
				}]
			});
		</script>
		<?php }  ?>
		<?php endif; ?>
	<?php
	}

}