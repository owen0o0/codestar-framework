<?php
/**
 * 
 * Child theme functions and definitions
 * 
 */
function zihadsweb_landing_enqueue_styles_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri(). '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'zihadsweb_landing_enqueue_styles_scripts' );


function google_map_shortcode($atts){
	$default = array(
		'place' => 'Dhaka',
		'height' => 450,
		'width' => 800,
		'zoom' => 13,
	);

	$params = shortcode_atts( $default, $atts );

$maps = <<<EOD
<div>
    <div>
        <iframe width="{$params['width']}" height="{$params['height']}"
                src="https://maps.google.com/maps?q={$params['place']}&t=&z={$params['zoom']}&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        </iframe>
    </div>
</div>
EOD;
	return $maps;
}
add_shortcode( 'map', 'google_map_shortcode' );


add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'landingpro' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'landingpro' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'landingpro' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'landingpro' ),
		'add_new'            => _x( 'Add New', 'book', 'landingpro' ),
		'add_new_item'       => __( 'Add New Book', 'landingpro' ),
		'new_item'           => __( 'New Book', 'landingpro' ),
		'edit_item'          => __( 'Edit Book', 'landingpro' ),
		'view_item'          => __( 'View Book', 'landingpro' ),
		'all_items'          => __( 'All Books', 'landingpro' ),
		'search_items'       => __( 'Search Books', 'landingpro' ),
		'parent_item_colon'  => __( 'Parent Books:', 'landingpro' ),
		'not_found'          => __( 'No books found.', 'landingpro' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'landingpro' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'landingpro' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'book', $args );
}

require_once (get_theme_file_path('helpers/gmap_ui.php'));
require_once (get_theme_file_path('cs-framework/cs-framework.php'));
require_once (get_theme_file_path('inc/cs-config.php'));