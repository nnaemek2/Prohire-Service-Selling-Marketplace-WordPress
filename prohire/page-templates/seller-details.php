<?php
/*
 * Template Name: Seller Details
 * Description: A Page Template with a Page Builder design.
 */
$prohire_redux_demo = get_option('redux_demo');
    get_header(); ?>
	<?php if(isset($prohire_redux_demo['seller_banner']['url']) && $prohire_redux_demo['seller_banner']['url'] != ''){?>
	<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo esc_url($prohire_redux_demo['seller_banner']['url']); ?>">
	<?php }else{?>
	<section class="breadcrumbs-area bg_cover bg-img">
	<?php } ?>
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6">
	                <div class="breadcrumbs-title">
	                    <h1><?php if(isset($prohire_redux_demo['seller_title']) && $prohire_redux_demo['seller_title'] != ''){?>
	                        <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['seller_title']));?>
	                        <?php }else{?>
	                        <?php echo esc_html__( 'Seller Details', 'prohire' );
	                        }
	                        ?>
	                    </h1>
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
	                        	<?php if(isset($prohire_redux_demo['seller_title']) && $prohire_redux_demo['seller_title'] != ''){?>
		                        <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['seller_title']));?>
		                        <?php }else{?>
		                        <?php echo esc_html__( 'Seller Details', 'prohire' );
		                        }
		                        ?></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
    <div class="seller-area pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <aside class="sidebar-widget-area">
                        <?php get_sidebar('seller');?>
                    </aside>
                </div>
                <div class="col-lg-8 order-lg-first">
                	<?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>