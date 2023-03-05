<?php
Redux::setSection('fundbux_opt', array(
    'title'     => esc_html__('Social Links', 'fundbux'),
    'id'        => 'opt_social_links',
    'icon'      => 'dashicons dashicons-share',
    'fields'    => array(
        array(
            'id'    => 'facebook',
            'type'  => 'text',
            'title' => esc_html__('Facebook', 'fundbux'),
            'default'	 => '#'
        ),
        array(
            'id'    => 'twitter',
            'type'  => 'text',
            'title' => esc_html__('Twitter', 'fundbux'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'googleplus',
            'type'  => 'text',
            'title' => esc_html__('Google Plus', 'fundbux'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'linkedin',
            'type'  => 'text',
            'title' => esc_html__('LinkedIn', 'fundbux'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'dribbble',
            'type'  => 'text',
            'title' => esc_html__('Dribbble', 'fundbux'),
            'default'	  => '#'
        ),
        array(
            'id'    => 'youtube',
            'type'  => 'text',
            'title' => esc_html__('Youtube', 'fundbux'),
        ),
        array(
            'id'    => 'instagram',
            'type'  => 'text',
            'title' => esc_html__('Instagram', 'fundbux'),
        ),
    ),
));