<?php $prohire_redux_demo = get_option('redux_demo');?> 
        <footer class="footer-area-v1">
            <?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' )  || is_active_sidebar( 'footer-widget-3' )) : ?>
            <div class="footer-widget main-bg pt-80 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="widget about-widget mb-40">
                                <?php if(isset($prohire_redux_demo['logo_footer']['url']) && $prohire_redux_demo['logo_footer']['url'] != ''){?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($prohire_redux_demo['logo_footer']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                                <?php }else{ ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo-2.png" alt="<?php bloginfo( 'name' ); ?>"></a>
                                <?php } ?>
                                <?php if(isset($prohire_redux_demo['footer_description']) && $prohire_redux_demo['footer_description'] != ''){?>
                                <p><?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['footer_description']));?></p>
                                <?php } ?>
                                <ul class="social-link">
                                    <?php if(isset($prohire_redux_demo['facebook']) && $prohire_redux_demo['facebook'] != ''){?>
                                    <li><a href="<?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['facebook']));?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                    <?php } ?>
                                    <?php if(isset($prohire_redux_demo['twitter']) && $prohire_redux_demo['twitter'] != ''){?>
                                    <li><a href="<?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['twitter']));?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <?php } ?>
                                    <?php if(isset($prohire_redux_demo['instagram']) && $prohire_redux_demo['instagram'] != ''){?>
                                    <li><a href="<?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['instagram']));?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <?php } ?>
                                    <?php if(isset($prohire_redux_demo['linkedin']) && $prohire_redux_demo['linkedin'] != ''){?>
                                    <li><a href="<?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['linkedin']));?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="widget useful-link-widget mb-40">
                                <?php if ( is_active_sidebar( 'footer-widget-1' )  ) : ?>
                                <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget contact-widget mb-40">
                                <?php if ( is_active_sidebar( 'footer-widget-2' )  ) : ?>
                                <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget instagram-widget mb-40">
                                <?php if ( is_active_sidebar( 'footer-widget-3' )  ) : ?>
                                <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <?php if(isset($prohire_redux_demo['footer_menu'])  && $prohire_redux_demo['footer_menu'] == 1){ ?>
                        <?php if(isset($prohire_redux_demo['footer_copyright']) && $prohire_redux_demo['footer_copyright'] != ''){?>
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p><?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['footer_copyright']));?></p>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p><?php echo esc_html__( '&copy; Shtheme 2024 | All Rights Reserved', 'prohire' )?></p>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="col-lg-6">
                            <div class="copyright-link">
                                <?php 
                                wp_nav_menu( 
                                    array( 
                                        'theme_location' => 'footer',
                                        'container' => '',
                                        'menu_class' => '', 
                                        'menu_id' => '',
                                        'menu'            => '',
                                        'container_class' => '',
                                        'container_id'    => '',
                                        'echo'            => true,
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new Prohire_Wp_Bootstrap_Navwalker(),
                                        'before'          => '',
                                        'after'           => '',
                                        'link_before'     => '',
                                        'link_after'      => '',
                                        'items_wrap'      => '<ul class=" %2$s">%3$s</ul>',
                                        'depth'           => 0,        
                                    )
                                ); ?>
                            </div>
                        </div>
                        
                        <?php }else{ ?>
                        <?php if(isset($prohire_redux_demo['footer_copyright']) && $prohire_redux_demo['footer_copyright'] != ''){?>
                        <div class="col-lg-12 text-center">
                            <div class="copyright-text">
                                <p><?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['footer_copyright']));?></p>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="col-lg-12 text-center">
                            <div class="copyright-text">
                                <p><?php echo esc_html__( '&copy; Shtheme 2024 | All Rights Reserved', 'prohire' )?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade show" id="search-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="form_group">
                        <input type="search" name="s" class="form_control" placeholder="<?php echo esc_html__( 'Search here...', 'prohire' );?>">
                        <button class="search_btn"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <span class="back-to-top"><i class="far fa-chevron-up"></i></span>
    <?php wp_footer(); ?>
</body>
</html>