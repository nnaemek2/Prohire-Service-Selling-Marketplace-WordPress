<?php
     $prohire_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<?php if(isset($prohire_redux_demo['blog_banner']['url']) && $prohire_redux_demo['blog_banner']['url'] != ''){?>
<section class="breadcrumbs-area bg_cover bg-img" data-bg-img="<?php echo esc_url($prohire_redux_demo['blog_banner']['url']); ?>">
<?php }else{?>
<section class="breadcrumbs-area bg_cover bg-img">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-title">
                    <h1>
                        <?php
                          if ( is_day() ) :
                              printf( esc_html__( 'Daily Archives : %s', 'prohire' ), get_the_date() );
                          elseif ( is_month() ) :
                              printf( esc_html__( 'Monthly Archives: %s', 'prohire' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'prohire' ) ) );
                          elseif ( is_year() ) :
                              printf( esc_html__( 'Yearly Archives: %s', 'prohire' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'prohire' ) ) );
                          else :
                              echo esc_html__( 'Archives', 'prohire' );
                          endif;
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
                            <?php echo esc_html__( 'Archives', 'prohire' );?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-area-v1 pt-120 pb-80">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-xl-8">
            <?php }else{?>
            <div class="col-lg-12">
            <?php } ?>
                <div class="blog-post-wrapper">
                    <div class="row">
                        <?php
                            while (have_posts()): the_post();
                        ?>
                        <div class="col-md-12">
                            <div class="blog-post-item mb-35">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"></a>
                                    <a href="<?php the_permalink(); ?>" class="date"><?php the_time(get_option('date_format')); ?></a>
                                </div>
                                <?php } ?>
                                <div class="entry-content">
                                    <div class="post-meta">
                                        <ul>
                                            <li><span><i class="far fa-user"></i><?php the_author_posts_link(); ?></span></li>
                                            <?php if ( get_the_category_list() ) { ?>
                                            <li><span><i class="far fa-folder-open"></i><?php echo get_the_category_list(); ?></span></li>
                                            <?php } ?>
                                            <?php if ( is_sticky() ) echo '<span class="sticky">' . esc_html__( 'Sticky', 'prohire' ) . '</span>';?>
                                        </ul>
                                    </div>
                                    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php if(isset($prohire_redux_demo['blog_excerpt'])){?>
                                        <?php echo esc_attr(prohire_excerpt($prohire_redux_demo['blog_excerpt'])); ?>
                                        <?php }else{?>
                                        <?php echo esc_attr(prohire_excerpt(40)); ?>
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
                    <nav class="pagination-area mt-20 mb-40">
                        <?php 
                            $pagination = array(
                                'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                                'format'    => '',
                                'prev_text' => wp_specialchars_decode('Previous',ENT_QUOTES),
                                'next_text' => wp_specialchars_decode('Next',ENT_QUOTES),
                                'type'      => 'list',
                                'end_size'    => 3,
                                'mid_size'    => 3
                            );
                            if(paginate_links( $pagination ) != ''){
                                $return =  paginate_links( $pagination );
                                echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
                            }
                        ?>
                    </nav>
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
<?php
    get_footer();
?>