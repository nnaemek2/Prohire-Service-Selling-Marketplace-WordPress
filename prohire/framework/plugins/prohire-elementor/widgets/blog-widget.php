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
class BdevsBlog extends \Elementor\Widget_Base {

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
		return 'bdevs-blog';
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
		return __( 'Blog', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Blog widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-content';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Blog widget belongs to.
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
		return [ 'Blog' ];
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
				'label' => esc_html__( 'Blog', 'bdevs-elementor' ),
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
				'default'		=> __('Button', 'bdevs-elementor'),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'link_button',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'default'		=> __('#', 'bdevs-elementor'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your count', 'bdevs-elementor' ),
				'default'   => '3',
				'label_block' => true,
			]
		);

		$this->add_control(
			'orderpost',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
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
		$wp_query = new \WP_Query(array('post_type' => 'post', 'posts_per_page' => $settings['post_number'],'orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings);
		?> 
	   	<?php if( $chose_style == 'style_1' ): ?>
		<!--====== Start Blog ======-->
        <section class="blog-area-two pb-120">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-60">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                	<?php 
			            $args = new \WP_Query(array(   
			                        'post_type' => 'post', 
			                    ));  
			            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
			        ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item-two">
                        	<?php if ( has_post_thumbnail() ) { ?>
                            <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="image">
                                </a>
                            </div>
                            <?php }else{?>
                            <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="https://shthemes.net/demosd/prohire/wp-content/uploads/2024/03/blog-2.jpg" alt="image">
                                </a>
                            </div>
                        	<?php } ?>
                            <div class="content">
                                <ul class="post-meta">
                                    <li><i class="far fa-user"></i><?php the_author_posts_link(); ?></li>
                                    <li><i class="far fa-calendar-alt"></i><?php the_time('M j'); ?></li>
                                    <li><i class="far fa-th-large"></i>
	                                    
										<?php 
										    // Show all category for post
										    $i = 1; foreach((get_the_category()) as $category) { 
										    if ($i == 1){echo ''; }else {echo ' / ';}
										        echo ''.$category->name . ' '.''; 
										            $i++;
									    } ?>
	                                </li>
                                </ul>
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p>
                                    <?php if(isset($prohire_redux_demo['blog_excerpt_2'])){?>
					                <?php echo esc_attr(prohire2_excerpt($prohire_redux_demo['blog_excerpt_2'])); ?>
					                <?php }else{?>
					                <?php echo esc_attr(prohire2_excerpt(40)); 
					                ?> 
					            	<?php } ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn-link">
	                                <?php if(isset($prohire_redux_demo['read_more'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['read_more']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Read More ', 'prohire' );?> 
                                	<?php } ?>
	                            </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if ( '' !== $settings['button'] and $settings['show_button'] ) : ?>
                <div class="all-btn text-center mt-30">
                    <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="main-btn"><?php print wp_kses_post($settings['button']); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <!--====== End Blog ======-->
        <?php elseif( $chose_style == 'style_2' ): ?>
        <!--====== Start Blog ======-->
        <section class="blog-area-three pt-120 pb-120">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-60">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
            	<?php endif; ?>
                <div class="row">
                	<?php 
			            $args = new \WP_Query(array(   
			                        'post_type' => 'post', 
			                    ));  
			            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
			        ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="blog-item-three">
                            <?php if ( has_post_thumbnail() ) { ?>
                            <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="image">
                                </a>
                            </div>
                            <?php }else{?>
                            <div class="image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="https://shthemes.net/demosd/prohire/wp-content/uploads/2024/03/blog-2.jpg" alt="image">
                                </a>
                            </div>
                        	<?php } ?>

                            <div class="content">
                                <ul class="post-meta">
                                    <li><i class="far fa-user"></i><?php the_author_posts_link(); ?></li>
                                    <li><i class="far fa-calendar-alt"></i><?php the_time('M j'); ?></li>
                                    <li><i class="far fa-th-large"></i>
	                                    
										<?php 
										    // Show all category for post
										    $i = 1; foreach((get_the_category()) as $category) { 
										    if ($i == 1){echo ''; }else {echo ' / ';}
										        echo ''.$category->name . ' '.''; 
										            $i++;
									    } ?>
	                                </li>
                                </ul>
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p>
                                    <?php if(isset($prohire_redux_demo['blog_excerpt_2'])){?>
					                <?php echo esc_attr(prohire2_excerpt($prohire_redux_demo['blog_excerpt_2'])); ?>
					                <?php }else{?>
					                <?php echo esc_attr(prohire2_excerpt(40)); 
					                ?> 
					            	<?php } ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn-link">
	                                <?php if(isset($prohire_redux_demo['read_more'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['read_more']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Read More ', 'prohire' );?> 
                                	<?php } ?>
	                            </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php if ( '' !== $settings['button'] and $settings['show_button'] ) : ?>
                <div class="all-btn text-center mt-30">
                    <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="main-btn"><?php print wp_kses_post($settings['button']); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <!--====== End Blog ======-->
        <?php elseif( $chose_style == 'style_3' ): ?>
        <!--====== Start Blog ======-->
        <section class="blog-area-v1 pt-120">
            <div class="container">
            	<?php if ( $settings['show_heading'] ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-40">
                            <h2><?php print wp_kses_post($settings['heading']); ?></h2>
                        </div>
                    </div>
                </div>
            	<?php endif; ?>
                <div class="row">
                	<?php 
			            $args = new \WP_Query(array(   
			                        'post_type' => 'post', 
			                    ));  
			            while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
			        ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-post-item mb-40">
                        	<?php if ( has_post_thumbnail() ) { ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="Image"></a>
                                <a href="<?php the_permalink(); ?>" class="date"><?php the_time(get_option('date_format')); ?></a>
                            </div>
                        	<?php }else{ ?>
                        	<div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><img src="https://shthemes.net/demosd/prohire/wp-content/uploads/2024/03/blog-2.jpg" alt="Image"></a>
                                <a href="<?php the_permalink(); ?>" class="date"><?php the_time(get_option('date_format')); ?></a>
                            </div>
                        	<?php } ?>
                            <div class="entry-content">
                                <div class="post-meta">
                                    <ul>
                                        <li><span><i class="far fa-user"></i><?php the_author_posts_link(); ?></span></li>
                                        <li><span><i class="far fa-folder-open"></i><?php echo  get_the_category_list();?></span></li>
                                    </ul>
                                </div>
                                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <a href="<?php the_permalink(); ?>" class="btn-link">
	                                <?php if(isset($prohire_redux_demo['read_more'])){?>
                                    <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['read_more']));?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Read More ', 'prohire' );?> 
                                	<?php } ?>
	                            </a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!--====== End Blog ======-->
        <?php endif; ?>
	<?php
	}

}