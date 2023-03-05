<?php

function fundbux_ocdi_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi_custom-intro-text notice notice-info inline">';
    $default_text .= sprintf (
        '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        esc_html__( 'Install and activate all ', 'fundbux' ),
        get_admin_url(null, 'themes.php?page=tgmpa-install-plugins' ),
        esc_html__( 'required plugins', 'fundbux' ),
        esc_html__( 'before you click on the "Import" button.', 'fundbux' )
    );
    $default_text .= sprintf (
        ' %1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        esc_html__( 'You will find all the pages in ', 'fundbux' ),
        get_admin_url(null, 'edit.php?post_type=page' ),
        esc_html__( 'Pages.', 'fundbux' ),
        esc_html__( 'Other pages will be imported along with the main Homepage.', 'fundbux' )
    );
    $default_text .= '<br>';
    $default_text .= sprintf (
        '%1$s <a href="%2$s" target="_blank">%3$s</a>',
        esc_html__( 'If you fail to import the demo data, follow the alternative way', 'fundbux' ),
        'https://cutt.ly/URcNum5',
        esc_html__( 'here.', 'fundbux' )
    );
    $default_text .= '</div>';

    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'fundbux_ocdi_intro_text' );


// OneClick Demo Importer
add_filter( 'pt-ocdi/import_files', 'fundbux_import_files' );
function fundbux_import_files() {

    return array(

        array(
            'import_file_name'             => esc_html__('Homepage 1', 'fundbux'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo/home1.jpg',
            'import_notice'                => esc_html__( 'All other pages will be imported along with the main Homepage.', 'fundbux' ),
            'preview_url'                  => 'https://aruailexpress.com/fundbux-wp/',
            'categories'                   => array ( esc_html__( 'Charity', 'fundbux' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/settings.json',
                    'option_name' => 'fundbux_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__('Homepage 2', 'fundbux'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo/home2.jpg',
            'import_notice'                => esc_html__( 'All other pages will be imported along with the main Homepage.', 'fundbux' ),
            'preview_url'                  => 'https://aruailexpress.com/fundbux-wp/',
            'categories'                   => array ( esc_html__( 'Fundraiser', 'fundbux' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/settings.json',
                    'option_name' => 'fundbux_opt',
                ),
            ),
        ),

        array(
            'import_file_name'             => esc_html__('Homepage 3', 'fundbux'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'inc/demo/home3.jpg',
            'import_notice'                => esc_html__( 'All other pages will be imported along with the main Homepage.', 'fundbux' ),
            'preview_url'                  => 'https://aruailexpress.com/fundbux-wp/',
            'categories'                   => array ( esc_html__( 'Charity', 'fundbux' ) ),
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo/settings.json',
                    'option_name' => 'fundbux_opt',
                ),
            ),
        ),

    );

}


function fundbux_after_import_setup($selected_import) {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Site Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main_menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).

    if ( 'Homepage 1' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Homepage 1' );
    }

    if ( 'Homepage 2' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Homepage 2' );
    }
    
    if ( 'Homepage 3' == $selected_import['import_file_name'] ) {
        $front_page_id = get_page_by_title( 'Homepage 3' );
    }


    $blog_page_id  = get_page_by_title( 'News' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

   // Disable Elementor's Default Colors and Default Fonts
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );
    

}
add_action( 'pt-ocdi/after_import', 'fundbux_after_import_setup' );

