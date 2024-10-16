<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php $prohire_redux_demo = get_option('redux_demo'); ?>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <?php if(isset($acens_redux_demo['favicon']['url'])){?>
        <link rel="shortcut icon" href="<?php echo esc_url($prohire_redux_demo['favicon']['url']); ?>">
        <?php }?>
    <?php }?>
    <?php wp_head(); ?> 
    </head>
    <body id="post-<?php the_ID(); ?>" <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="main-wrapper p-0">
            <header class="header-area header-two">
                <div class="header-navigation">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-4 col-5">
                                <div class="brand-logo">
                                    <?php if(isset($prohire_redux_demo['logo']['url']) && $prohire_redux_demo['logo']['url'] != ''){?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($prohire_redux_demo['logo']['url']); ?>" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>"></a>
                                    <?php }else{ ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo-1.png" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>"></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-4 col-2">
                                <div class="nav-menu">
                                    <div class="navbar-close">
                                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                    </div>
                                    <div class="brand-logo text-center ml-2 mr-2 mb-4">
                                        <?php if(isset($prohire_redux_demo['logo']['url']) && $prohire_redux_demo['logo']['url'] != ''){?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($prohire_redux_demo['logo']['url']); ?>" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>"></a>
                                        <?php }else{ ?>
                                        <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo-1.png" class="img-fluid" alt="<?php bloginfo( 'name' ); ?>"></a>
                                        <?php } ?>
                                    </div>
                                    <?php if(isset($prohire_redux_demo['header_languages'])  && $prohire_redux_demo['header_languages'] == 1){ ?>
                                    <div class="nav-search ml-3 mr-3">
                                        <form>
                                            <div class="lang-dropdown">
                                                <select class="wide mb-40">
                                                    <option value="01"><?php echo esc_html__( 'En', 'prohire' );?></option>
                                                    <option value="02"><?php echo esc_html__( 'Ru', 'prohire' );?></option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } ?>
                                    <nav class="main-menu">
                                        <?php 
                                        wp_nav_menu( 
                                            array( 
                                                'theme_location' => 'primary',
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
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-5">
                                <div class="nav-tools">
                                    <ul>
                                        <li class="search-btn"><a href="#search-modal" class="icon" data-toggle="modal" data-target="#search-modal"><i class="far fa-search"></i></a></li>
                                        <?php if(isset($prohire_redux_demo['header_languages'])  && $prohire_redux_demo['header_languages'] == 1){ ?>
                                        <li class="lang-dropdown">
                                            <select class="wide">
                                                <option value="01"><?php echo esc_html__( 'En', 'prohire' );?></option>
                                                    <option value="02"><?php echo esc_html__( 'Ru', 'prohire' );?></option>
                                            </select>
                                        </li>
                                        <?php } ?>
                                        <li class="nav-toggle-btn">
                                            <div class="navbar-toggler">
                                                <span></span><span></span><span></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>