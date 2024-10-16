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
class BdevsServices extends \Elementor\Widget_Base {

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
		return 'bdevs-services';
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
		return __( 'Services', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Services widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-image-rollover';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Services widget belongs to.
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
		return [ 'Services' ];
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
				'label' => esc_html__( 'Services', 'bdevs-elementor' ),
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
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Heading', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Button', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'link_button',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Service Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '6',
			]
		);
		$this->add_control(
			'orderpost',
			[
				'label'     => esc_html__( 'Service Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'date'  => esc_html__( 'Date', 'bdevs-elementor' ),
					'title' => esc_html__( 'Title', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random', 'bdevs-elementor' ),
				],
				'default'   => '',
			]
		);

		$this->add_control(
			'shape_image',
			[
				'label'   => esc_html__( 'Shape Image', 'bdevs-elementor' ),
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
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		$wp_query = new \WP_Query(array('post_type' => 'service', 'posts_per_page' => $settings['post_number'],'orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings);
		?> 
		<?php if( $chose_style == 'style_1' ): ?>
		<!--====== Start Featured Services ======-->
        <section class="popular-services-area pb-120">
            <div class="container">
            	<?php if ( '' !== $settings['heading'] and $settings['show_heading'] ) : ?>
                <div class="row justify-content-center mb-40">
                    <div class="col-xl-5 col-lg-6">
                        <div class="section-title text-center">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
            	<?php endif; ?>
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="popular-service-nav mb-40">
                            <ul class="nav nav-tabs gallery-filter">
                                <li class="nav-link active" data-filter="*"><?php echo esc_html__( 'All', 'prohire' );?>
                                </li>
                                <?php 

				                    $categories = get_terms('Type2');   

				                     foreach( (array)$categories as $categorie){

				                        $cat2_name = $categorie->name;

				                        $cat2_slug = $categorie->slug;

				                ?>
				                <li class="nav-item nav-link" data-filter=".<?php echo esc_attr($cat2_slug);?>">
				                    <?php echo esc_attr($cat2_name);?>
				                </li>
				            	<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row gallery-items">
                	<?php 
		                $args = new \WP_Query(array(   
		                            'post_type' => 'service', 
		                        ));  
		                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
		                $price = get_post_meta(get_the_ID(),'_cmb_price', true); 
		                $price_text = get_post_meta(get_the_ID(),'_cmb_price_text', true);
		                $cates = get_the_terms(get_the_ID(),'Type2');

		                    $cate2_name ='';

		                    $cate2_slug = '';

		                    foreach((array)$cates as $cate){

		                        $cate2_name .= $cate->name.'  ' ;

		                        $cate2_slug .= $cate->slug .' '; 

		                } 
		            ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 single-item gallery-masonry-wrapper <?php echo esc_attr($cate2_slug);?>">
                        <div class="gig-item mb-30">
                        	<?php if ( has_post_thumbnail() ) { ?>
                            <div class="gig-img">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Image"></a>
                            </div>
                            <?php } ?>
                            <div class="gig-info">
                                <div class="gig-top">
                                    <div class="user-title-thumb">
                                        <div class="user-thumb">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                                        </div>
                                        <div class="user-info">
                                            <h5 class="name"><?php the_author(); ?></h5>
                                            <p class="status"><?php the_author_meta( 'description' ); ?></p>
                                        </div>
                                    </div>
                                    <div class="heart">
                                        <a href="<?php the_permalink(); ?>" class="icon"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h4 class="title"><a href="<?php the_permalink(); ?>">
                                    	<?php the_title();?></a></h4>
                                    <div class="rating-info">
                                        <div class="rat">
                                            <?php echo do_shortcode('[stars_rating_avg]'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-bottom">
                                    <span class="text"><?php echo wp_specialchars_decode(esc_attr($price_text));?></span>
                                    <span class="nubmer"><?php echo wp_specialchars_decode(esc_attr($price));?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if ( '' !== $settings['button'] and $settings['show_button'] ) : ?>
                <div class="all-btn text-center mt-30">
                    <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="main-btn">
                        <?php print wp_kses_post($settings['button']); ?>
                    </a>
                </div>
            	<?php endif; ?>
            </div>
            <?php if ( '' !== $settings['shape_image']['url']) : ?>
            <img src="<?php echo wp_kses_post($settings['shape_image']['url']); ?>" alt="shape" class="pp-service-shape">
            <?php endif; ?>
        </section>
        <!--====== End Featured Services ======-->
	    <?php elseif( $chose_style == 'style_2' ): ?>
	    <?php if ( '' !== $settings['heading'] and $settings['show_heading'] ) : ?>
	    <h3 class="mb-20"><?php echo wp_kses_post($settings['heading']); ?></h3>
		<?php endif; ?>
        <div class="seller-tabs mb-30">
            <ul class="nav nav-tabs gallery-filter">
                <li class="nav-link active" data-filter="*"><?php echo esc_html__( 'All', 'prohire' );?></li>
                <?php 

                    $categories = get_terms('Type');   

                     foreach( (array)$categories as $categorie){

                        $cat_name = $categorie->name;

                        $cat_slug = $categorie->slug;

                ?>
                <li class="nav-link" data-filter=".<?php echo esc_attr($cat_slug);?>">
                    <?php echo esc_attr($cat_name);?>
                </li>
            	<?php } ?>
            </ul>
        </div>
        <div class="row gallery-items">
        	<?php 
                $args = new \WP_Query(array(   
                            'post_type' => 'service', 
                        ));  
                while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
                $price = get_post_meta(get_the_ID(),'_cmb_price', true); 
                $price_text = get_post_meta(get_the_ID(),'_cmb_price_text', true);
                $cates = get_the_terms(get_the_ID(),'Type');

                    $cate_name ='';

                    $cate_slug = '';

                    foreach((array)$cates as $cate){

                        $cate_name .= $cate->name.'  ' ;

                        $cate_slug .= $cate->slug .' '; 

                } 
            ?>
            <div class="col-md-6 gallery-masonry-wrapper single-item <?php echo esc_attr($cate_slug);?>">
                <div class="gig-item mb-30">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <div class="gig-img">
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Image"></a>
                    </div>
                    <?php } ?>
                    <div class="gig-info">
                        <div class="service-content mt-10">
                            <h4 class="title"><a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                        	</a></h4>
                            <div class="rating-info">
                                <div class="rat">
                                    <?php echo do_shortcode('[stars_rating_avg]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="service-bottom">
                            <span class="text"><?php echo wp_specialchars_decode(esc_attr($price_text));?></span>
                            <span class="nubmer"><?php echo wp_specialchars_decode(esc_attr($price));?></span>
                        </div>
                    </div>
                </div>
            </div>
        	<?php endwhile; ?>
        </div>
	    <?php endif; ?>
	<?php
	}

}