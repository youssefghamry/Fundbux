<?php

Redux::setSection('fundbux_opt', array(
    'title'     => esc_html__('404 Page Settings', 'fundbux'),
    'id'        => '404_0pt',
    'icon'      => 'dashicons dashicons-megaphone',
    'fields'    => array(

        array(
            'title'    => esc_html__('404 Banner Image', 'fundbux'),
            'id'       => 'error_img_banner',
            'type'     => 'media',
            'compiler' => true,
            'default'  => array(
                'url'  => FUNDBUX_DIR_IMG.'/opt/404.png'
            ),
        ),

        array(
            'title'     => esc_html__('Heading', 'fundbux'),
            'id'        => 'error_title',
            'type'      => 'text',
            'default'   => esc_html__("Page Not Found", 'fundbux'),
        ),

        array(
            'title'     => esc_html__('Sub Heading', 'fundbux'),
            'id'        => 'error_subtitle',
            'type'      => 'textarea',
            'default'   => esc_html__('Sorry! The page you are looking doesn’t exist or broken. Go to Homepage from the below button', 'fundbux'),
        ),

        array(
            'title'     => esc_html__('Button Text', 'fundbux'),
            'id'        => 'error_btn_label',
            'type'      => 'text',
            'default'   => esc_html__('Back To Home', 'fundbux'),
        ),

        array(
            'id'          => 'btn_font_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Color', 'fundbux' ),
            'output'      => array(
                'color' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_bg_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Color', 'fundbux' ),
            'output'      => array(
                'background' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_border_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Border Color', 'fundbux' ),
            'output'      => array(
                'border-color' => '.content-not-found .theme-btn',
            ),
        ),

        array(
            'id'          => 'btn_font_color_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Text Hover Color', 'fundbux' ),
            'output'      => array(
                'color' => '.content-not-found .theme-btn:hover',
            ),
        ),

        array(
            'id'          => 'btn_bg_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Background Hover Color', 'fundbux' ),
            'output'      => array(
                'background' => '.content-not-found .theme-btn:hover',
            ),
        ),

        array(
            'id'          => 'btn_border_hover',
            'type'        => 'color',
            'title'       => esc_html__( 'Button Border Hover Color', 'fundbux' ),
            'output'      => array(
                'border-color' => '.content-not-found .theme-btn:hover',
            ),
        ),
    )
));
