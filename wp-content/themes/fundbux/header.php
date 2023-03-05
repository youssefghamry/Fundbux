<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fundbux
 */
    $opt = get_option('fundbux_opt');

    $is_preloader = isset($opt['is_preloader']) ? $opt['is_preloader'] : '';

    $header_style = isset( $opt['header_style'] ) ? $opt['header_style'] : '1';
    $top_header_opt = isset( $opt['top_header_opt'] ) ? $opt['top_header_opt'] : true;

    $is_menu_btn = !empty($opt['is_menu_btn']) ? $opt['is_menu_btn'] : '0';
    $menu_btn_title = !empty($opt['menu_btn_label']) ? $opt['menu_btn_label'] : 'Donate Now';
    $menu_btn_url = !empty($opt['menu_btn_url']) ? $opt['menu_btn_url'] : '#';
    
    $phone_number = !empty($opt['phone_number']) ? $opt['phone_number'] : '987-098-098-09';
    $email_addres = !empty($opt['email_addres']) ? $opt['email_addres'] : 'info@example.com';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } 

    if ( !empty($is_preloader) && $is_preloader == '1' ) {
        if ( defined( 'ELEMENTOR_VERSION' ) ) {
            if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
                echo '';
            } else {
                get_template_part( 'template-parts/header/preloader' );
            }
        }
        else {
            get_template_part( 'template-parts/header/preloader' );
        }
    }
    ?>

    <?php 
    
        $select_header_style = function_exists('get_field') ? get_field('select_header_style') : '';

        if(!empty($select_header_style) && $select_header_style != 'default') {
            $header_style = $select_header_style;
        } else {
            $header_style = !empty($opt['header_style']) ? $opt['header_style'] : '1';
        }
    ?>

    <?php if( !empty ( $header_style ) && $header_style == '1' ) : ?>  
        <header class="header-wrap header-box-style header-1">
            <div class="container">
                <div class="header-container">
                    <div class="row align-items-center">
                        <div class="col-12 p-0 d-lg-none d-block d-none-mobile">
                            <div class="top-bar text-right">
                                <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>
                                <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                    <a href="<?php echo esc_url($menu_btn_url); ?>" class="d-btn">
                                        <?php echo esc_html($menu_btn_title); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-5 col-6 col-lg-3 pr-lg-0">
                            <div class="logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php fundbux_logo(); ?>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 pl-lg-0 col-lg-9 d-none d-lg-block">
                            <div class="box-wrap">
                                <div class="top-bar text-right">
                                    <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                    <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>
                                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="d-btn">
                                            <?php echo esc_html($menu_btn_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="menu-wrap d-flex align-items-center justify-content-around">
                                    <div class="main-menu">
                                        <?php
                                            if( has_nav_menu('main_menu') ) {
                                                wp_nav_menu( array (
                                                    'menu' => 'main_menu',
                                                    'theme_location'    => 'main_menu',
                                                    'depth'             => 3,
                                                    'container'         => 'ul',
                                                    'walker'            => new Fundbux_Nav_Walker(),
                                                ));
                                            }
                                        ?>
                                    </div>
                                    
                                    <?php if ( class_exists('ReduxFrameworkPlugin') ) : ?>
                                        <div class="social-link">
                                            <?php fundbux_social_links(); ?>
                                        </div>
                                    <?php  endif; ?>
                                </div> 

                            </div>                    
                        </div>                
                        <div class="col-6 col-sm-7 col-md-8 d-lg-none d-block pl-0">
                            <div class="mobile-nav-wrap">                    
                                <div id="hamburger">
                                    <i class="fal fa-bars"></i>
                                </div>
                                <!-- mobile menu - responsive menu  -->
                                <div class="mobile-nav">
                                    <button type="button" class="close-nav">
                                        <i class="fal fa-times-circle"></i>
                                    </button>
                                    <nav class="sidebar-nav">
                                        <?php
                                            wp_nav_menu( array (
                                                'theme_location'    => 'main_menu',
                                                'depth'             => 3,
                                                'container'         => 'ul',
                                                'menu_class'        => 'metismenu',
                                                'menu_id'           => 'mobile-menu',
                                                'walker'            => new Fundbux_Nav_Walker(),
                                            ));
                                        ?>
                                    </nav>

                                    <div class="action-bar">
                                        <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                        <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>                               
                                        <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                            <a href="<?php echo esc_url($menu_btn_url); ?>" class="d-btn theme-btn">
                                                <?php echo esc_html($menu_btn_title); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>                            
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php endif; ?>

        <?php if( !empty ( $header_style ) && $header_style == '2' ) : ?>
        <header class="transparent-header header-2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3 col-sm-5 col-md-4 col-6 pr-lg-5">
                        <div class="logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php fundbux_logo(); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-<?php echo esc_attr(($is_menu_btn == '1') ? '7' : '9'); ?> p-lg-0 d-none d-lg-block">
                        <div class="menu-wrap">
                            <div class="main-menu">
                                <?php
                                    if( has_nav_menu('main_menu') ) {
                                        wp_nav_menu( array (
                                            'menu' => 'main_menu',
                                            'theme_location'    => 'main_menu',
                                            'depth'             => 3,
                                            'container'         => 'ul',
                                            'walker'            => new Fundbux_Nav_Walker(),
                                        ));
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?> 
                    <div class="col-lg-2 col-sm-6 pl-lg-0 d-none d-sm-block text-right">
                        <div class="header-promo-btn">                      
                                <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn">
                                    <?php echo esc_html($menu_btn_title); ?>
                                </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="d-block d-lg-none col-sm-1 col-md-8 col-6">
                        <div class="mobile-nav-wrap">
                            <div id="hamburger"> <i class="fal fa-bars"></i> </div>
                            <!-- mobile menu - responsive menu  -->
                            <div class="mobile-nav">
                                <button type="button" class="close-nav"> <i class="fal fa-times-circle"></i> </button>
                                <nav class="sidebar-nav">
                                    <?php
                                        wp_nav_menu( array (
                                            'theme_location'    => 'main_menu',
                                            'depth'             => 3,
                                            'container'         => 'ul',
                                            'menu_class'        => 'metismenu',
                                            'menu_id'           => 'mobile-menu',
                                            'walker'            => new Fundbux_Nav_Walker(),
                                        ));
                                    ?>
                                </nav>
                                <div class="action-bar"> 
                                    <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                    <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>
                                    <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="d-btn theme-btn">
                                            <?php echo esc_html($menu_btn_title); ?>
                                        </a>
                                    <?php endif; ?> 
                                </div>
                            </div>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
        </header>
        <?php endif; ?>

        <?php if( !empty ( $header_style ) && $header_style == '3' ) : ?>
            <header class="wide-header header-3">
            <div class="container">
                <?php if( !empty ( $top_header_opt ) && $top_header_opt == true ) : ?>
                <div class="top-bar d-none d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-sm-8 pr-0">
                            <div class="top-left">
                                <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>
                            </div>
                        </div>
                        <?php if ( class_exists('ReduxFrameworkPlugin') ) : ?>           
                        <div class="col-lg-6 col-sm-4 pl-0">
                            <div class="top-right text-sm-right">
                                <?php fundbux_social_links(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>                            
                </div>
                <?php endif; ?>
                <div class="wide-wrap">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-3 col-sm-5 col-6">
                                <div class="logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <?php fundbux_logo(); ?>
                                    </a>
                                </div>
                            </div>                         
                            <div class="col-lg-<?php echo esc_attr(($is_menu_btn == '1') ? '7' : '9'); ?> p-lg-0 d-none d-lg-block">
                                <div class="menu-wrap">
                                    <div class="main-menu">
                                    <?php
                                        if( has_nav_menu('main_menu') ) {
                                            wp_nav_menu( array (
                                                'menu' => 'main_menu',
                                                'theme_location'    => 'main_menu',
                                                'depth'             => 3,
                                                'container'         => 'ul',
                                                'walker'            => new Fundbux_Nav_Walker(),
                                            ));
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                            <div class="col-lg-2 col-sm-6 pl-lg-0 d-none d-sm-block text-right">
                                <div class="header-promo-btn">
                                        <a href="<?php echo esc_url($menu_btn_url); ?>" class="theme-btn">
                                            <?php echo esc_html($menu_btn_title); ?>
                                        </a>
                                </div> 
                            </div>
                            <?php endif; ?> 
                            <div class="d-block d-lg-none col-sm-1 col-6">
                                <div class="mobile-nav-wrap">                    
                                    <div id="hamburger">
                                        <i class="fal fa-bars"></i>
                                    </div>
                                    <!-- mobile menu - responsive menu  -->
                                    <div class="mobile-nav">
                                        <button type="button" class="close-nav">
                                            <i class="fal fa-times-circle"></i>
                                        </button>
                                        <nav class="sidebar-nav">
                                        <?php
                                            wp_nav_menu( array (
                                                'theme_location'    => 'main_menu',
                                                'depth'             => 3,
                                                'container'         => 'ul',
                                                'menu_class'        => 'metismenu',
                                                'menu_id'           => 'mobile-menu',
                                                'walker'            => new Fundbux_Nav_Walker(),
                                            ));
                                        ?>
                                        </nav>
            
                                        <div class="action-bar">
                                            <a href="mailto:<?php echo esc_attr( $email_addres ); ?>"><i class="fal fa-envelope"></i><?php echo esc_html( $email_addres ); ?></a>
                                            <a href="tel:<?php echo esc_attr( $phone_number ); ?>"><i class="fal fa-phone"></i><?php echo esc_html( $phone_number ); ?></a>
                                            <?php if(!empty($menu_btn_title) & $is_menu_btn == '1') :  ?>
                                                <a href="<?php echo esc_url($menu_btn_url); ?>" class="d-btn theme-btn">
                                                    <?php echo esc_html($menu_btn_title); ?>
                                                </a>
                                            <?php endif; ?> 
                                        </div>
                                    </div>                            
                                </div>
                                <div class="overlay"></div> 
                            </div>
            
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php endif; ?>


    <?php
        $is_banner = '1';

        if ( is_page_template('elementor_canvas')) {
            $is_banner = '';
        }

        if ( is_home() ) {
            $is_banner = '1';
        }

        if ( is_page() ) {
            $is_banner = function_exists('get_field') ? get_field('is_banner') : '1';
            $is_banner = isset($is_banner) ? $is_banner : '1';
        }

        if( $is_banner == '1' ) {
            get_template_part('template-parts/header/banner');
        }
    ?>