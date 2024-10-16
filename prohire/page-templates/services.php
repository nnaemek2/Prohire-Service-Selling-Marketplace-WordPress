<?php
/*
 * Template Name: Services
 * Description: A Page Template with a Page Builder design.
 */
$prohire_redux_demo = get_option('redux_demo');
    get_header(); ?>
    <?php if(isset($prohire_redux_demo['services_banner']['url']) && $prohire_redux_demo['services_banner']['url'] != ''){?>
	<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo esc_url($prohire_redux_demo['services_banner']['url']); ?>">
	<?php }else{?>
	<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo get_template_directory_uri();?>/assets/images/breadcrumbs-bg.jpg">
	<?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumbs-title">
                        <h1><?php if(isset($prohire_redux_demo['services_title']) && $prohire_redux_demo['services_title'] != ''){?>
	                        <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['services_title']));?>
	                        <?php }else{?>
	                        <?php echo esc_html__( 'Amazing Services', 'prohire' );
	                        }
	                        ?></h1>
                        <ul class="breadcumb-link">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">
	                            <?php if(isset($prohire_redux_demo['home_text']) && $prohire_redux_demo['home_text'] != ''){?>
	                            <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['home_text']));?>
	                            <?php }else{?>
	                            <?php echo esc_html__( 'Home', 'prohire' );
	                            }
	                            ?></a>
	                        </li>
                            <li class="active">
                            	<?php if(isset($prohire_redux_demo['services_title']) && $prohire_redux_demo['services_title'] != ''){?>
		                        <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['services_title']));?>
		                        <?php }else{?>
		                        <?php echo esc_html__( 'Amazing Services', 'prohire' );
		                        }
		                        ?>
		                    </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="service-gig-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="gigs-sidebar">
						<div class="gig-search mb-30">
                        	<form class="form_group" method="POST" action="<?php echo site_url('/'); ?>?page_id=512">
                            	<input type="text" placeholder="<?php echo esc_html__( 'Search Keywords', 'prohire' );?>" class="form_control rounded" name="search_key">
                            	<button type="submit"><i class="far fa-search"></i></button>
                        	</form>
                    	</div>
                    	<?php get_sidebar('services');?>
                    </div>
                </div>
                <div class="col-lg-9">
                        <div class="row">
                            <?php
                                $args = array(    
                                              'paged' => $paged,
                                              'post_type' => 'service', 
                                              'posts_per_page' => 9, 
                                              'orderby' =>'ID',
                                              'order' => 'ASC',
                                          );
                                $wp_query = new WP_Query($args);
                                while (have_posts()): the_post();
                                $price = get_post_meta(get_the_ID(),'_cmb_price', true); 
                                $price_text = get_post_meta(get_the_ID(),'_cmb_price_text', true); 
                            ?>
                            <div class="col-xl-4 col-md-6">
                                <div class="gig-item mb-30">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <div class="gig-img">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"></a>
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
                    </div>
                </div>
            </div>
        </div>
<?php
    get_footer();
?>