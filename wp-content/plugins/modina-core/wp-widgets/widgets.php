<?php

// Require widget files
require plugin_dir_path(__FILE__) . 'Modina_Popular_Posts.php';
require plugin_dir_path(__FILE__) . 'Modina_About_Me.php';
require plugin_dir_path(__FILE__) . 'Modina_Social_Icons.php';
require plugin_dir_path(__FILE__) . 'Modina_Get_In_Touch.php';
require plugin_dir_path(__FILE__) . 'Modina_Recent_Posts.php';

// Register Modina_Popular_Posts Widgets
add_action('widgets_init', function() {
    register_widget('Modina_Popular_Posts');
});

// Register Modina_About_Me Widgets
add_action('widgets_init', function() {
    register_widget('Modina_About_Me');
});

// Register Modina_Social_Icons Widgets
add_action('widgets_init', function() {
    register_widget('Modina_Social_Icons');
});

// Register Modina_Get_In_Touch Widgets
add_action('widgets_init', function() {
    register_widget('Modina_Get_In_Touch');
});

// Register Modina_Recent_Posts Widgets
add_action('widgets_init', function() {
    register_widget('Modina_Recent_Posts');
});
