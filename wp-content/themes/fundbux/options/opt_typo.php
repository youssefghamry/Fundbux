<?php

Redux::setSection( 'fundbux_opt', array(
    'title'            => esc_html__( 'Typography', 'fundbux' ),
    'id'               => 'fundbux_typo_opt',
    'icon'             => 'dashicons dashicons-editor-textcolor',
    'fields'           => array(
        array(
            'id'        => 'body_font',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'Body Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for the body text globally.', 'fundbux' ),
        ),
    )
));


Redux::setSection( 'fundbux_opt', array(
    'title'            => esc_html__( 'Headers Typography', 'fundbux' ),
    'id'               => 'headers_font_opt',
    'icon'             => 'dashicons dashicons-editor-spellcheck',
    'subsection'       => true,
    'fields'           => array(

        array(
            'id'        => 'h1_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H1 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H1 Headers.', 'fundbux' ),
            'output'    => 'h1'
        ),

        array(
            'id'        => 'h2_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H2 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H2 Headers. The h2 title tag used in the most section title.', 'fundbux' ),
            'output'    => 'h2'
        ),
        array(
            'id'        => 'h3_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H3 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H3 Headers.', 'fundbux' ),
            'output'    => 'h3'
        ),

        array(
            'id'        => 'h4_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H4 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H4 Headers.', 'fundbux' ),
            'output'    => 'h4'
        ),

        array(
            'id'        => 'h5_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H5 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H5 Headers.', 'fundbux' ),
            'output'    => 'h5'
        ),

        array(
            'id'        => 'h6_typo',
            'type'      => 'typography',
            'google'      => true, 
            'title'     => esc_html__( 'H6 Headers Typography', 'fundbux' ),
            'subtitle'  => esc_html__( 'These settings control the typography for all H6 Headers.', 'fundbux' ),
            'output'    => 'h6'
        ),
    )
));