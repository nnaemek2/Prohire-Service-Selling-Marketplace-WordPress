<?php
   $prohire_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true); ?>
<?php 
    while (have_posts()): the_post();
?>
<?php if(isset($prohire_redux_demo['blog_details_banner']['url']) && $prohire_redux_demo['blog_details_banner']['url'] != ''){?>
<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo esc_url($prohire_redux_demo['blog_details_banner']['url']); ?>">
<?php }else{?>
<section class="breadcrumbs-area bg_cover bg-img">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-title">
                    <h1 class="title"><?php the_title(); ?>
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
                            <?php if(isset($prohire_redux_demo['blog_details_title']) && $prohire_redux_demo['blog_details_title'] != ''){?>
                            <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['blog_details_title']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Blog Details', 'prohire' );
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-xl-8">
            <?php }else{?>
            <div class="col-lg-12">
            <?php } ?>
                <div class="blog-details-wrapper mb-30">
                    <div class="blog-post-item">
                        <?php if (wp_get_attachment_url($featured_image_3) !='')  { ?>
                        <div class="post-thumbnail">
                            <img class="img-auto" src="<?php echo wp_get_attachment_url($featured_image_3);?>" alt="<?php the_title_attribute(); ?>">
                        </div>
                        <?php } ?>
                        <div class="entry-content">
                            <div class="post-content">
                                <div class="post-meta">
                                    <ul>
                                        <li><span><i class="far fa-calendar-alt"></i><a href="<?php the_permalink(); ?>"><?php the_time(get_option('date_format')); ?></a></span></li>
                                        <li><span><i class="far fa-comment"></i><a href="<?php the_permalink(); ?>"><?php comments_number( esc_html__('0 Comments', 'prohire'), esc_html__('1 Comment', 'prohire'), esc_html__('% Comments', 'prohire') ); ?></a></span></li>
                                        <?php if ( is_sticky() ) echo '<span class="sticky">' . esc_html__( 'Sticky', 'prohire' ) . '</span>';?>
                                    </ul>
                                </div>
                                <?php the_content(); ?>
                                <?php wp_link_pages( array(
                                    'before'      => '<div class="pagination page">' . esc_html__( 'Pages:', 'prohire' ),
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',) ); 
                                ?>
                            </div>
                            <div class="comment-form mt-40">
                                <?php comments_template();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-lg-4">
                <div class="sidebar-widget-area">
                    <?php get_sidebar(); ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
get_footer();
?>