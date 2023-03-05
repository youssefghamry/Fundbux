<?php

Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Blog Settings', 'fundbux'),
	'id'        => 'blog_page',
	'icon'      => 'dashicons dashicons-admin-post',
));


Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Title-Bar', 'fundbux'),
	'id'        => 'blog_titlebar_settings',
	'icon'      => 'dashicons dashicons-admin-post',
    'subsection' => true,
	'fields'    => array(
		array(
			'title'     => esc_html__('Blog Page Title', 'fundbux'),
			'subtitle'  => esc_html__('Give here the blog page title', 'fundbux'),
			'desc'      => esc_html__('This text will be show on blog page banner', 'fundbux'),
			'id'        => 'blog_title',
			'type'      => 'text',
			'default'   => 'News'
		),
	)
));


Redux::setSection('fundbux_opt', array(
    'title'     => esc_html__('Layout Style', 'fundbux'),
    'id'        => 'blog_layout_settings',
    'icon'      => 'dashicons dashicons-align-left',
    'subsection' => true,
    'fields'    => array(
        array(
            'title'     => esc_html__('Select Blog Layout Style', 'fundbux'),
            'id'        => 'blog_layout_style',
            'type'      => 'image_select',
            'default'   => '1',
            'options'   => array(
                '1' => array(
                    'alt' => esc_html__('Right Sidebar - Defualt', 'fundbux'),
                    'img' => esc_url(FUNDBUX_DIR_IMG.'/opt/right-sidebar.png')
                ),
                '2' => array(
                    'alt' => esc_html__('Left Sidebar', 'fundbux'),
                    'img' => esc_url(FUNDBUX_DIR_IMG.'/opt/left-sidebar.png')
                ),
            )
        ),

    )
));


Redux::setSection('fundbux_opt', array(
	'title'     => esc_html__('Blog Single', 'fundbux'),
	'id'        => 'blog_single_opt',
	'icon'      => 'dashicons dashicons-media-document',
	'subsection' => true,
	'fields'    => array(
        array(
			'title'     => esc_html__( 'Post Meta', 'fundbux' ),
			'subtitle'  => esc_html__( 'Show/hide post meta on blog archive page', 'fundbux' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'fundbux' ),
            'off'       => esc_html__( 'Hide', 'fundbux' ),
            'default'   => '1',
		),

        array(
			'title'     => esc_html__( 'Post Category', 'fundbux' ),
			'subtitle'  => esc_html__( 'Show/hide post Category on blog archive page', 'fundbux' ),
			'id'        => 'is_post_cat',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'fundbux' ),
            'off'       => esc_html__( 'Hide', 'fundbux' ),
            'default'   => '1',
		),

        array(
			'title'     => esc_html__( 'Post Author', 'fundbux' ),
			'subtitle'  => esc_html__( 'Show/hide post Author on blog archive page', 'fundbux' ),
			'id'        => 'is_post_author',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'fundbux' ),
            'off'       => esc_html__( 'Hide', 'fundbux' ),
            'default'   => '1',
		),

	)
));

// blog Share Options
Redux::setSection('fundbux_opt', array(
    'title'     => esc_html__('Blog Social Share', 'fundbux'),
    'id'        => 'blog_share_opt',
    'subsection'=> true,
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(

        array(
            'title'     => esc_html__( 'Social Share', 'fundbux' ),
            'id'        => 'is_social_share',
            'type'      => 'switch',
            'on'        => esc_html__( 'Enabled', 'fundbux' ),
            'off'       => esc_html__( 'Disabled', 'fundbux' ),
            'default'   => '0'
        ),

        array(
            'id' => 'blog_share_start',
            'type' => 'section',
            'title' => __('Share Options', 'fundbux'),
            'subtitle' => __('Enable/Disable social media share options as you want.', 'fundbux'),
            'required' => array('is_social_share','=','1'),
            'indent' => true,
        ),

        array(
            'title'    => esc_html__('Title', 'fundbux'),
            'id'       => 'share_heading',
            'type'     => 'text',
            'compiler' => true,
            'default'  => esc_html__('Share on', 'fundbux'),
        ),

        array(
            'id'       => 'is_post_fb',
            'type'     => 'switch',
            'title'    => esc_html__('Facebook', 'fundbux'),
            'default'  => true,
            'on'       => esc_html__('Show', 'fundbux'),
            'off'      => esc_html__('Hide', 'fundbux'),
        ),

        array(
            'id'       => 'is_post_twitter',
            'type'     => 'switch',
            'title'    => esc_html__('Twitter', 'fundbux'),
            'default'  => true,
            'on'       => esc_html__('Show', 'fundbux'),
            'off'      => esc_html__('Hide', 'fundbux'),
        ),

        array(
            'id'       => 'is_post_linkedin',
            'type'     => 'switch',
            'title'    => esc_html__('Linkedin', 'fundbux'),
            'on'       => esc_html__('Show', 'fundbux'),
            'off'      => esc_html__('Hide', 'fundbux'),
            'default'  => true,
        ),

        array(
            'id'       => 'is_post_pinterest',
            'type'     => 'switch',
            'title'    => esc_html__('Pinterest', 'fundbux'),
            'default'  => true,
            'on'       => esc_html__('Show', 'fundbux'),
            'off'      => esc_html__('Hide', 'fundbux'),
        ),

        array(
            'id'     => 'post_share_end',
            'type'   => 'section',
            'indent' => false,
        ),
    )
));
