<?php

// Footer settings
Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Footer', 'fundbux'),
	'id'        => 'fundbux_footer',
	'icon'      => 'dashicons dashicons-table-row-before',
));


// ScrollUp settings
Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Scroll Up', 'fundbux'),
	'id'        => 'fundbux_scrollup',
	'icon'      => 'el el-arrow-up',
	'subsection'=> true,
	'fields'    => array(

        array(
            'id'      => 'scrollup',
            'type'    => 'switch',
            'title'   => esc_html__( 'Scoll To Top', 'fundbux' ),
            'on'      => esc_html__('Enable', 'fundbux'),
            'off'     => esc_html__('Disable', 'fundbux'),
            'default' => '1',
        ),       

        array(
            'id' => 'scroll_start',
            'type' => 'section',
            'title' => __('Scroll Up - Style', 'fundbux'),
            'required' => array('scrollup','=','1'),
            'indent' => true,
        ),

        array(
            'title'     => esc_html__('Scroll Up Icon Color', 'fundbux'),
            'id'        => 'scroll_icon_color',
            'type'      => 'color',
            'output'    => '.scroll-up',
        ),

        array(
            'title'     => esc_html__('Scroll Up Background Color', 'fundbux'),
            'id'        => 'scroll_bg_color',
            'type'      => 'color',
        ),
        
        array(
            'title'     => esc_html__('Scroll Up Hover Icon Color', 'fundbux'),
            'id'        => 'scroll_hover_icon_color',
            'type'      => 'color',
            'output'    => '.scroll-up:hover',
        ),


        array(
            'title'     => esc_html__('Scroll Up Hover Background Color', 'fundbux'),
            'id'        => 'scroll_hover_bg_color',
            'type'      => 'color',
        ),

        array(
            'id'     => 'scroll_end',
            'type'   => 'section',
            'indent' => false,
        ),

	)
));

// Footer settings
Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Footer Settings', 'fundbux'),
	'id'        => 'fundbux_footer_style_opt',
	'icon'      => 'dashicons dashicons-editor-kitchensink',
	'subsection'=> true,
	'fields'    => array(

        array(
            'title'     => esc_html__( 'Footer Column', 'fundbux' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '4',
            'options'   => array(
                '6' => esc_html__( 'Two Column', 'fundbux' ),
                '4' => esc_html__( 'Three Column', 'fundbux' ),
                '3' => esc_html__( 'Four Column', 'fundbux' ),
            )
        ),

        array(
            'id'     => 'divider_three',
            'type'   => 'divide',
        ),

        array(
            'title'     => esc_html__('Widget Title Color', 'fundbux'),
            'id'        => 'widget_title_color',
            'type'      => 'color',
        ),

        array(
            'title'     => esc_html__('Footer Text Color', 'fundbux'),
            'id'        => 'footer_text_color',
            'type'      => 'color',
            'output'    => 'footer .single-footer-wid ul li a, .widget_about .about-text, .widget .textwidget p, footer span, footer p',
        ),

        array(
            'id'     => 'divider_six',
            'type'   => 'divide',
        ),

        array(
            'title'     => esc_html__('Footer Background Color', 'fundbux'),
            'id'        => 'footer_bg_color',
            'type'      => 'color',
        ),
        
        array(
            'title'    => esc_html__('Footer Background Image', 'fundbux'),
            'id'       => 'footer_bg_img',
            'type'     => 'media',
            'compiler' => true,
        ),

        array(
            'title'     => esc_html__('Footer Bottom Bar Background Color', 'fundbux'),
            'id'        => 'footer_bottom_bg_color',
            'type'      => 'color',
        ),

	)
));

// Footer background
Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Footer Content', 'fundbux'),
	'id'        => 'fundbux_footer_contents',
	'icon'      => 'dashicons dashicons-admin-appearance',
	'subsection'=> true,
	'fields'    => array(
        
        array(
			'title'     => esc_html__('Footer Copyright', 'fundbux'),
			'desc'      => esc_html__('write down your own copyright info.', 'fundbux'),
			'id'        => 'footer_copyright_content',
			'type'      => 'editor',
			'default'   => '<p>&copy; <b>FundBux</b> Charity Trust - 2021. All rights reserved.</p>'
		),

	)
));
