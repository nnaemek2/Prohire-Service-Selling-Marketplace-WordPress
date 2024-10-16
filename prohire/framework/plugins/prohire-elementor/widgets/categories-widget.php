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
class BdevsCategories extends \Elementor\Widget_Base {

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
		return 'bdevs-categories';
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
		return __( 'Categories', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Categories widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-bold';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Categories widget belongs to.
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
		return [ 'Categories' ];
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
				'label' => esc_html__( 'Services Categories', 'bdevs-elementor' ),
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
						'name'        => 'category',
						'label'       => esc_html__( 'Category', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Category' , 'bdevs-elementor' ),
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
		<div class="categories-area-v1 pt-120 pb-90 mt-0">
            <div class="container">
                <div class="row">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="categories-item mb-30">
                            <a href="<?php print wp_kses_post($item['link']); ?>" class="categories-img">
                                <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                                <div class="categories-overlay">
                                    <div class="categories-content">
                                        <h5><?php print wp_kses_post($item['category']); ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php elseif( $chose_style == 'style_2' ): ?>
        <section class="categories-area-v1 pb-120">
            <div class="container">
                <div class="categories-slider-one">
                	<?php 
	                    foreach ( $settings['tabs'] as $item ) : 
					?>
                    <div class="categories-item">
                        <a href="<?php print wp_kses_post($item['link']); ?>" class="categories-img">
                            <img src="<?php print wp_kses_post($item['tab_image']['url']); ?>" alt="Image">
                            <div class="categories-overlay">
                                <div class="categories-content">
                                    <h5><?php print wp_kses_post($item['category']); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                	<?php endforeach; ?>
                </div>
            </div>
        </section>
<?php if (is_admin())
		  { ?>
		<script type="text/javascript">
			$('.categories-slider-one').slick({
			dots: false,
			arrows: true,
			infinite: true,
			autoplay: false,
			prevArrow: '<div class="prev"><i class="far fa-chevron-left"></i></div>',
			nextArrow: '<div class="next"><i class="far fa-chevron-right"></i></div>',
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
				breakpoint: 991,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					arrows: false,
					slidesToShow: 2
				}
			},
			{
				breakpoint: 575,
				settings: {
					arrows: false,
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