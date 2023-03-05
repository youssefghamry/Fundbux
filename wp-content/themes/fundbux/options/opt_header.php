<?php
// Header Section
Redux::setSection('fundbux_opt', array(
    'title'            => esc_html__( 'Header Settings', 'fundbux' ),
    'id'               => 'header_sec',
    'customizer_width' => '400px',
    'icon'             => 'el el-home',
    'fields'           => array(

        array (
            'title'     => esc_html__( 'Header Style', 'fundbux' ),
            'subtitle'  => esc_html__( 'Select your header style from this three design.', 'fundbux' ),
            'id'        => 'header_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array (
                '1' => array (
                    'alt' => esc_html__( 'Header One', 'fundbux' ),
                    'img' => esc_url( FUNDBUX_DIR_IMG.'/opt/header1.jpg' ),
                ),
                '2' => array (
                    'alt' => esc_html__( 'Header Two', 'fundbux' ),
                    'img' => esc_url( FUNDBUX_DIR_IMG.'/opt/header2.jpg' ),
                ),
                '3' => array (
                    'alt' => esc_html__( 'Header Three', 'fundbux' ),
                    'img' => esc_url( FUNDBUX_DIR_IMG.'/opt/header3.jpg' ),
                ),
            )
        ),
        array(
            'title'     => esc_html__('Top Header Bar', 'fundbux'),
            'subtitle'  => esc_html__( 'are you want show top bar ?', 'fundbux' ),
            'id'        => 'top_header_opt',
            'type'      => 'switch',
            'required'    => array('header_style', '!=', '2' ),
            'default'  => true,
            'on'       => esc_html__('Show', 'fundbux'),
            'off'      => esc_html__('Hide', 'fundbux'),
        ),
        array(
            'id'      => 'top_divider_1',
            'type'    => 'divide',
            'required'    => array('header_style', '!=', '2' ),
        ),
        array(
            'title'     => esc_html__('Phone Number', 'fundbux'),
            'subtitle'  => esc_html__( 'Type phone number.', 'fundbux' ),
            'id'        => 'phone_number',
            'type'      => 'text',
            'required'    => array('header_style', '!=', '2' ),
            'default'   => '987-098-098-09',
        ),
        array(
            'title'     => esc_html__('Email Addres', 'fundbux'),
            'subtitle'  => esc_html__( 'Type email addres.', 'fundbux' ),
            'id'        => 'email_addres',
            'type'      => 'text',
            'required'    => array('header_style', '!=', '2' ),
            'default'   => 'info@example.com',
        ),

        array(
            'id'      => 'top_divider_3',
            'type'    => 'divide',
        ),

    )
) );

// Logo
Redux::setSection('fundbux_opt', array(
    'title'            => esc_html__( 'Logo', 'fundbux' ),
    'id'               => 'logo_setting',
    'subsection'       => true,
    'icon'             => 'el el-upload',
    'fields'           => array(

        array(
            'title'     => esc_html__('Select Your Logo Type', 'fundbux'),
            'subtitle'  => esc_html__( 'which type logo you want for your site ?', 'fundbux' ),
            'id'        => 'logo_select',
            'type'      => 'select',
            'options'  => array(
                '1' => 'Text',
                '2' => 'Image',
            ),
            'default'  => '2',
        ),

        array(
            'title'     => esc_html__('Text Logo', 'fundbux'),
            'subtitle'  => esc_html__( 'Type your logo text , it is a text logo.', 'fundbux' ),
            'id'        => 'main_text_logo',
            'type'      => 'text',
            'default'   => 'fundbux',
            'required'  => array( 
                array('logo_select','equals','1')
            ),
        ),

        array(
            'title'     => esc_html__('Logo Text Color', 'fundbux'),
            'subtitle'  => esc_html__('Select Logo color', 'fundbux'),
            'id'        => 'logo_text_color',
            'type'      => 'color',
            'default'   => '#000',
            'required'  => array( 
                array('logo_select','equals','1')
            ),
        ),

        array(
            'title'     => esc_html__('Main Logo Upload', 'fundbux'),
            'subtitle'  => esc_html__( 'Upload here a image file for your logo', 'fundbux' ),
            'id'        => 'main_logo',
            'type'      => 'media',
            'compiler'  => true,
            'required'  => array( 
                array('logo_select','equals','2')
            ),
            'default'   => array(
                'url'   => FUNDBUX_DIR_IMG.'/logo.png'
            ),
        ),

        array(
            'title'     => esc_html__( 'Main Retina Logo', 'fundbux' ),
            'subtitle'  => esc_html__( 'The retina logo should be double (2x) of your original logo', 'fundbux' ),
            'id'        => 'retina_logo',
            'type'      => 'media',
            'required'  => array( 
                array('logo_select','equals','2')
            ),            
            'compiler'  => true,
            'default'   => array(
                'url'   => FUNDBUX_DIR_IMG.'/retina_logo.png'
            )
        ),

        array(
            'title'     => esc_html__( 'Logo dimensions', 'fundbux' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo.', 'fundbux' ),
            'id'        => 'logo_dimensions',
            'required'  => array( 
                array('logo_select','equals','2')
            ),            
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.logo > img'
        ),

    )
) );

// banner Section
Redux::setSection('fundbux_opt', array(
    'title'            => esc_html__( 'Banner', 'fundbux' ),
    'id'               => 'banner_sec',
    'subsection'       => true,
    'icon'             => 'el el-picture',
    'fields'           => array(

        array(
            'id'      => 'is_breadcrumb',
            'type'    => 'switch',
            'title'   => esc_html__( 'Breadcrumb Option', 'fundbux' ),
            'on'      => esc_html__('Show', 'fundbux'),
            'off'     => esc_html__('Hide', 'fundbux'),
            'default' => true,
        ),

        array(
            'title'     => esc_html__( 'Banner Image Type', 'fundbux' ),
            'id'        => 'is_banner_img',
            'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'fundbux' ),
            'off'       => esc_html__( 'Hide', 'fundbux' ),
            'default'   => '1'
        ),

        array(
            'id' => 'banner_opt_start',
            'type' => 'section',
            'title' => __('Banner Options', 'fundbux'),
            'subtitle' => __('Enable/Disable Header Banner Options as you want.', 'fundbux'),
            'required' => array('is_banner_img','=','1'),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__('Header Banner Image Upload', 'fundbux'),
            'subtitle'  => esc_html__( 'Upload here a jpg/png file for header background image.', 'fundbux' ),
            'id'        => 'header_banner_img',
            'type'      => 'media',
            'compiler'  => true,
            'default'   => array(
                'url'   => FUNDBUX_DIR_IMG.'/page-banner.jpg'
            ),
        ),

        array(
            'title'     => esc_html__('Banner Overlay Color', 'fundbux'),
            'id'        => 'banner_overlay_color',
            'type'      => 'color',
            'default'   => '#002b26'
        ),

        array(
            'id' => 'banner_overlay_color_opacity',
            'type' => 'slider',
            'title' => esc_html__('Banner Overlay Color Opacity', 'fundbux'),
            "default" => .4,
            "min" => 0,
            "step" => .1,
            "max" => 1,
            'resolution' => 0.1,
            'display_value' => 'label'
        ),

        array(
            'id'     => 'banner_opt_end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'id' => 'banner_opt_color_start',
            'type' => 'section',
            'title' => __('Banner Color', 'fundbux'),
            'required' => array('is_banner_img','=','0'),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__('Banner Color', 'fundbux'),
            'subtitle'  => esc_html__( 'Choice your solid banner color', 'fundbux' ),
            'id'        => 'banner_color',
            'type'      => 'color',
            'default'   => '#002b26'
        ),

        array(
            'id'     => 'banner_opt_color_end',
            'type'   => 'section',
            'indent' => false,
        ),

    )
) );


// Navbar styling
Redux::setSection('fundbux_opt', array(
    'title'            => esc_html__( 'Navbar', 'fundbux' ),
    'id'               => 'navbar_styling',
    'subsection'       => true,
    'icon'             => 'el el-lines',
    'fields'           => array(

        array(
            'title'     => esc_html__('Menu Item Color', 'fundbux'),
            'subtitle'  => esc_html__('Menu item Text color', 'fundbux'),
            'id'        => 'menu_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Item Hover Color', 'fundbux'),
            'subtitle'  => esc_html__('Menu item Text color', 'fundbux'),
            'id'        => 'menu_hover_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Active Color', 'fundbux'),
            'subtitle'  => esc_html__('Menu item active and hover text color', 'fundbux'),
            'id'        => 'menu_active_text_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Sub Menu Background Color', 'fundbux'),
            'id'        => 'sub_menu_bg_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Menu Item Margin', 'fundbux'),
            'subtitle'  => esc_html__('Margin around menu item (li).', 'fundbux'),
            'id'        => 'menu_item_margin',
            'type'      => 'spacing',
            'mode'      => 'margin',
            'units'     => array( 'em', 'px' ),
        ),

    )
));


// Menu action button
Redux::setSection('fundbux_opt', array(
    'title'            => esc_html__( 'Donate Button', 'fundbux' ),
    'id'               => 'donate_btn_opt',
    'subsection'       => true,
    'icon'             => 'el el-link',
    'fields'           => array(
        
        array(
            'title'     => esc_html__('Button Visibility', 'fundbux'),
            'id'        => 'is_menu_btn',
            'type'      => 'switch',
            'on'        => esc_html__('Show', 'fundbux'),
            'off'       => esc_html__('Hide', 'fundbux'),
        ),

        array(
            'title'     => esc_html__('Button Label', 'fundbux'),
            'subtitle'  => esc_html__('Leave the button label field empty to hide the button.', 'fundbux'),
            'id'        => 'menu_btn_label',
            'type'      => 'text',
            'default'   => esc_html__('Donate Now', 'fundbux'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button URL', 'fundbux'),
            'id'        => 'menu_btn_url',
            'type'      => 'text',
            'default'   => '#',
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Font Size', 'fundbux'),
            'id'        => 'menu_btn_size',
            'type'      => 'spinner',
            'default'   => '14',
            'min'       => '12',
            'step'      => '1',
            'max'       => '50',
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Button Colors', 'fundbux'),
            'subtitle'  => esc_html__('Button style attributes on normal', 'fundbux'),
            'id'        => 'button_colors',
            'type'      => 'section',
            'indent'    => true,
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Text color', 'fundbux'),
            'id'        => 'menu_btn_font_color',
            'type'      => 'color',
            'output'    => array('header .header-promo-btn a, header.header-1 .top-bar .d-btn'),
            'required'  => array('is_menu_btn', '=', '1')
        ),
            
        array(
            'title'     => esc_html__('Background Color', 'fundbux'),
            'id'        => 'menu_btn_bg_color',
            'type'      => 'color',
            'mode'      => 'background',
            'output'    => array('header .header-promo-btn a, header.header-1 .top-bar .d-btn'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        // Button color on hover stats
        array(
            'title'     => esc_html__('Hover Text Color', 'fundbux'),
            'subtitle'  => esc_html__('Text color on hover stats.', 'fundbux'),
            'id'        => 'menu_btn_hover_font_color',
            'type'      => 'color',
            'output'    => array('header .header-promo-btn a:hover, header.header-1 .top-bar .d-btn:hover'),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'title'     => esc_html__('Hover Background Color', 'fundbux'),
            'subtitle'  => esc_html__('Background color on hover stats.', 'fundbux'),
            'id'        => 'menu_btn_hover_bg_color',
            'type'      => 'color',
            'output'    => array(
                'background' => 'header.header-1 .top-bar .d-btn:hover, header .header-promo-btn a:hover',
            ),
            'required'  => array('is_menu_btn', '=', '1')
        ),

        array(
            'id'     => 'button_colors-end',
            'type'   => 'section',
            'indent' => false,
        ),

        array(
            'title'     => esc_html__('Button Padding', 'fundbux'),
            'subtitle'  => esc_html__('Padding around the menu donate button.', 'fundbux'),
            'id'        => 'menu_btn_padding',
            'type'      => 'spacing',
            'output'    => array( 'header .header-promo-btn a, header.header-1 .top-bar .d-btn' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ), 
            'units_extended' => 'true',
            'required'  => array('is_menu_btn', '=', '1')
        ),
    )
));