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