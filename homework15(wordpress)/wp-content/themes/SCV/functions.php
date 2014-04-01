<?php
function geekhub_scripts() {
	wp_enqueue_style( 'geekhub-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'geekhub_scripts' );

register_nav_menus( array(
	'main_menu' => 'Main Menu'
) );

add_theme_support( 'post-thumbnails' );

// Register Custom Post Type
function create_sponsors() {

    $labels = array(
        'name'                => _x( 'Sponsors', 'Post Type General Name', 'scv' ),
        'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'scv' ),
        'menu_name'           => __( 'Sponsors', 'scv' ),
        'parent_item_colon'   => __( 'Parent Sponsor', 'scv' ),
        'all_items'           => __( 'All Sponsors', 'scv' ),
        'view_item'           => __( 'View Sponsor', 'scv' ),
        'add_new_item'        => __( 'Add new Sponsor', 'scv' ),
        'add_new'             => __( 'ADD Sponsor', 'scv' ),
        'edit_item'           => __( 'Edit sponsor', 'scv' ),
        'update_item'         => __( 'Update sponsor', 'scv' ),
        'search_items'        => __( 'Find sponsor', 'scv' ),
        'not_found'           => __( 'no sponsors found', 'scv' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'scv' ),
    );
    $args = array(
        'label'               => __( 'scv_sponsors', 'scv' ),
        'description'         => __( 'The sponsors of our project.', 'scv' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail','title' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => '',
        'can_export'          => false,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'scv_sponsors', $args );
}

// Hook into the 'init' action
add_action( 'init', 'create_sponsors', 0 );





// Register Custom Post Type
function create_courses() {

    $labels = array(
        'name'                => _x( 'Courses', 'Post Type General Name', 'scv' ),
        'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'scv' ),
        'menu_name'           => __( 'Courses', 'scv' ),
        'parent_item_colon'   => __( 'Parent Course', 'scv' ),
        'all_items'           => __( 'All Courses', 'scv' ),
        'view_item'           => __( 'View Course', 'scv' ),
        'add_new_item'        => __( 'Add new Course', 'scv' ),
        'add_new'             => __( 'ADD Course', 'scv' ),
        'edit_item'           => __( 'Edit Course', 'scv' ),
        'update_item'         => __( 'Update Course', 'scv' ),
        'search_items'        => __( 'Find Course', 'scv' ),
        'not_found'           => __( 'no Courses found', 'scv' ),
        'not_found_in_trash'  => __( 'No Courses found in Trash', 'scv' ),
    );
    $args = array(
        'label'               => __( 'scv_courses', 'scv' ),
        'description'         => __( 'The courses of our project.', 'scv' ),
        'labels'              => $labels,
        'supports'            => array( 'thumbnail','title','editor' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => '',
        'can_export'          => false,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'scv_courses', $args );
}

// Hook into the 'init' action
add_action( 'init', 'create_courses', 0 );

add_post_type_support( 'scv_sponsors', 'thumbnail','title' );


//Theme Logo customizer support
function geekhub_theme_customizer( $wp_customize ) {
    // Fun code will go here

    $wp_customize->add_section( 'geekhub_logo_section' , array(
        'title'       => __( 'Logo', 'Geekhub' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );
    $wp_customize->add_setting( 'geekhub_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'geekhub_logo', array(
        'label'    => __( 'Logo', 'geekhub' ),
        'section'  => 'geekhub_logo_section',
        'settings' => 'geekhub_logo',
    ) ) );
}
add_action('customize_register', 'geekhub_theme_customizer');

// Custom widget area.
register_sidebar( array(
    'name' => __( 'Custom Widget Area'),
    'id' => 'custom-widget-area',
    'description' => __( 'An optional custom widget area for your site', 'twentyten' ),
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => "</li>",
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

?>