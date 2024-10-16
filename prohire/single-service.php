<?php
   $prohire_redux_demo = get_option('redux_demo');
   get_header(); 
?>

<?php 
    while (have_posts()): the_post();
?>
<?php $featured_image_1 = get_post_meta(get_the_ID(),'_cmb_featured_image_1', true); ?>
<?php $featured_image_2 = get_post_meta(get_the_ID(),'_cmb_featured_image_2', true); ?>
<?php $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true); ?>
<?php $featured_image_4 = get_post_meta(get_the_ID(),'_cmb_featured_image_4', true); ?>
<?php $description_1 = get_post_meta(get_the_ID(),'_cmb_description_1', true); ?>
<?php $description_2 = get_post_meta(get_the_ID(),'_cmb_description_2', true); ?>
<?php $description_3 = get_post_meta(get_the_ID(),'_cmb_description_3', true); ?>
<?php $description_4 = get_post_meta(get_the_ID(),'_cmb_description_4', true); ?>
<?php $tab_1_title = get_post_meta(get_the_ID(),'_cmb_tab_1_title', true); ?>
<?php $tab_2_title = get_post_meta(get_the_ID(),'_cmb_tab_2_title', true); ?>
<?php $tab_3_title = get_post_meta(get_the_ID(),'_cmb_tab_3_title', true); ?>
<?php $content_tab_3 = get_post_meta(get_the_ID(),'_cmb_content_tab_3', true); ?>
<?php if(isset($prohire_redux_demo['service_details_banner']['url']) && $prohire_redux_demo['service_details_banner']['url'] != ''){?>
<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo esc_url($prohire_redux_demo['service_details_banner']['url']); ?>">
<?php }else{?>
<section class="breadcrumbs-area bg_cover bg-img">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="breadcrumbs-title">
                    <h1><?php if(isset($prohire_redux_demo['service_details_title']) && $prohire_redux_demo['service_details_title'] != ''){?>
                        <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['service_details_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Service Details', 'prohire' );
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
                            <?php if(isset($prohire_redux_demo['service_details_title']) && $prohire_redux_demo['service_details_title'] != ''){?>
                            <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['service_details_title']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Service Details', 'prohire' );
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="gig-details-section pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="gig-details-wrapper">
                    <div class="gig-slider-wrap mb-50">
                        <div class="gigs-big-slider">
                            <?php if ($featured_image_1 !='')  { ?>
                            <div class="single-item">
                                <a href="<?php echo wp_get_attachment_url($featured_image_1);?>" class="gallery-single"><img src="<?php echo wp_get_attachment_url($featured_image_1);?>" alt="<?php the_title_attribute(); ?>"></a>
                                <?php if ($description_1 !='')  { ?>
                                <div class="item-content">
                                    <?php echo wp_specialchars_decode(esc_attr($description_1));?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php if ($featured_image_2 !='')  { ?>
                            <div class="single-item">
                                <a href="<?php echo wp_get_attachment_url($featured_image_2);?>" class="gallery-single"><img src="<?php echo wp_get_attachment_url($featured_image_2);?>" alt="<?php the_title_attribute(); ?>"></a>
                                <?php if ($description_2 !='')  { ?>
                                <div class="item-content">
                                    <?php echo wp_specialchars_decode(esc_attr($description_2));?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php if ($featured_image_3 !='')  { ?>
                            <div class="single-item">
                                <a href="<?php echo wp_get_attachment_url($featured_image_3);?>" class="gallery-single"><img src="<?php echo wp_get_attachment_url($featured_image_3);?>" alt="<?php the_title_attribute(); ?>"></a>
                                <?php if ($description_3 !='')  { ?>
                                <div class="item-content">
                                    <?php echo wp_specialchars_decode(esc_attr($description_3));?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php if ($featured_image_4 !='')  { ?>
                            <div class="single-item">
                                <a href="<?php echo wp_get_attachment_url($featured_image_4);?>" class="gallery-single"><img src="<?php echo wp_get_attachment_url($featured_image_4);?>" alt="<?php the_title_attribute(); ?>"></a>
                                <?php if ($description_4 !='')  { ?>
                                <div class="item-content">
                                    <?php echo wp_specialchars_decode(esc_attr($description_4));?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="gigs-thumbs-slider">
                            <?php $gallery = get_post_gallery( get_the_ID(), false );

                            if(isset($gallery['ids'])){    
                                $gallery_ids = $gallery['ids'];
                                $img_ids = explode(",",$gallery_ids);
                                $i=0; $j=0;?>
                                <?php   
                                foreach( $img_ids AS $img_id ){ 
                                $image_src = wp_get_attachment_image_src($img_id,''); 
                                ?>
                                <div class="single-item">
                                    <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                    <div class="discription-wrap">
                        <div class="discription-tabs">
                            <ul class="nav nav-tabs">
                                <?php if ($tab_1_title !='')  { ?>
                                <li>
                                    <a class="nav-link active" data-toggle="tab" href="#discription"><?php echo wp_specialchars_decode(esc_attr($tab_1_title));?></a>
                                </li>
                                <?php } ?>
                                <?php if ($tab_2_title !='')  { ?>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="#reviews"><?php echo wp_specialchars_decode(esc_attr($tab_2_title));?></a>
                                </li>
                                <?php } ?>
                                <?php if ($tab_3_title !='')  { ?>
                                <li>
                                    <a class="nav-link" data-toggle="tab" href="#faqs"><?php echo wp_specialchars_decode(esc_attr($tab_3_title));?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="discription">
                                <div class="content-box pb-30">
									<h3 class="title"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews">
                                <?php comments_template();?>
                            </div>
                            <?php if ($content_tab_3 !='')  { ?>
                            <div class="tab-pane fade" id="faqs">
                                <div class="faq-wrapper pb-30">
                                    <div class="accordion" id="accordionone">
                                        <?php echo html_entity_decode(esc_attr($content_tab_3));?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="gigs-sidebar pb-10">
                    <?php get_sidebar('service');?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
get_footer();
?>