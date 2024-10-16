<?php
/*
 * Template Name: Coming Soon
 * Description: A Page Template with a Page Builder design.
 */
$prohire_redux_demo = get_option('redux_demo');
    get_header('404'); ?>
    <div class="main-wrapper">
        <div class="coming-soon-area">
            <div class="container">
                <div class="wrapper">
                    <div class="main-form">
                        <div class="title mb-30">
                            <h3 class="mb-15">
                              <?php if(isset($prohire_redux_demo['coming_title']) && $prohire_redux_demo['coming_title'] != ''){?>
                              <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['coming_title']));?>
                              <?php }else{?>
                              <?php echo esc_html__( 'Coming Soon', 'prohire' );
                              }?>
                            </h3>
                            <p class="text">
                              <?php if(isset($prohire_redux_demo['coming_subtitle']) && $prohire_redux_demo['coming_subtitle'] != ''){?>
                              <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['coming_subtitle']));?>
                              <?php }else{?>
                              <?php echo esc_html__( 'Get Ready! Something Really Cool Is Coming', 'prohire' );
                              }?>
                            </p>
                        </div>
                        <div id="timer" class="timer mb-30">
                            <div id="days" class="count">
                                <span class="h4 time mb-1"></span>
                                <span><?php echo esc_html__( 'Days', 'prohire' ); ?></span>
                            </div>
                            <div id="hours" class="count">
                                <span class="h4 time mb-1"></span>
                                <span><?php echo esc_html__( 'Hours', 'prohire' ); ?></span>
                            </div>
                            <div id="minutes" class="count">
                                <span class="h4 time mb-1"></span>
                                <span><?php echo esc_html__( 'Minutes', 'prohire' ); ?></span>
                            </div>
                            <div id="seconds" class="count">
                                <span class="h4 time mb-1"></span>
                                <span><?php echo esc_html__( 'Seconds', 'prohire' ); ?></span>
                            </div>
                        </div>
                        <div class="newsletter-form">
                            <?php echo do_shortcode('[contact-form-7 id="301407b" title="Subscribe Form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    get_footer();
?>