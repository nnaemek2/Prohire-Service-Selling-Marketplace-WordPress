<?php
/**
 * The Template for displaying all single posts
 */
 $prohire_redux_demo = get_option('redux_demo');
get_header(); ?>
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
            <div class="col-lg-8">
                <div class="breadcrumbs-title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-details-section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-lg-8" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php }else{?>
            <div class="col-lg-12" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php } ?>
              <div class="blog-details-wrapper">
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="blog-thumb">
                  <a href="<?php the_permalink();?>">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>" />
                  </a>
                </div>
                <?php } ?>
                <div class="blog-content blog-post-item">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                    'before'      => '<div class="pagination">' . esc_html__( 'Pages:', 'prohire' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    ) ); ?>
                    <?php if(get_the_tag_list() != '') { ?>
                    <ul class="list-inline-pills mt-5">
                        <?php echo get_the_tag_list(); ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php           
                  if ( comments_open() || get_comments_number() ) {
                    comments_template();
                  }
                ?>
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
<?php get_footer();?>