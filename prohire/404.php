<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
    $prohire_redux_demo = get_option('redux_demo');
    get_header('404'); 
?> 
<div class="main-wrapper">
    <div class="error-area pt-120 pb-120">
        <div class="container">
            <div class="error-content text-center">
                <?php if(isset($prohire_redux_demo['404_image']['url']) && $prohire_redux_demo['404_image']['url'] != ''){ ?>
                <img src="<?php echo esc_url($prohire_redux_demo['404_image']['url']); ?>">
                <?php }else{ ?>
                <img src="<?php echo get_template_directory_uri();?>/assets/images/404.svg">
                <?php } ?>
                <h3>
                  <?php if(isset($prohire_redux_demo['404_title']) && $prohire_redux_demo['404_title'] != ''){?>
                  <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['404_title']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Ooops! Page Not Found', 'prohire' );
                  }?>
                </h3>
                <p>
                  <?php if(isset($prohire_redux_demo['404_subtitle']) && $prohire_redux_demo['404_subtitle'] != ''){?>
                  <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['404_subtitle']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'The page you are looking for might have been removed had its name changed or is temporarily unavailable.', 'prohire' );
                  }?>
                </p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="main-btn" title="<?php echo esc_html__( 'Back To Home', 'prohire' );?>">
                  <?php if(isset($prohire_redux_demo['404_button'])){?>
                  <?php echo wp_specialchars_decode(esc_attr($prohire_redux_demo['404_button']));?>
                  <?php }else{?>
                  <?php echo esc_html__( 'Back To Home', 'prohire' );
                  }
                  ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
  get_footer('404');
?> 