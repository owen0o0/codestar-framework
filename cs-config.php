<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

define( 'CS_ACTIVE_FRAMEWORK',   true  ); // default true
define( 'CS_ACTIVE_METABOX',     true ); // default true
define( 'CS_ACTIVE_TAXONOMY',    true ); // default true
define( 'CS_ACTIVE_SHORTCODE',   true ); // default true
define( 'CS_ACTIVE_CUSTOMIZE',   true ); // default true
define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

function landingpro_metabox_options( $options ) {

	$options      = array();

    $options[]      = array(
      'id'            => '_custom_meta_options',
      'title'         => 'Custom Options',
	  'post_type'     => 'page', // or post or CPT or array( 'page', 'post' )
      'context'       => 'normal',
      'priority'      => 'default',
      'sections'      => array(

        // begin section
        array(
          'name'      => 'section_1',
          'title'     => 'Section 1',
          'icon'      => 'fa fa-wifi',
          'fields'    => array(

            // a field
            array(
              'id'    => 'metabox_option_id',
              'type'  => 'text',
              'title' => 'A Text Option',
            ),
          )
        )
      )
    );

    return $options;

}
add_filter( 'cs_metabox_options', 'landingpro_metabox_options' );

// function extra_cs_framework_options( $options ) {

//   $options      = array(); // remove old options

//   $options[]    = array(
//     'name'      => 'section_unique_id',
//     'title'     => 'First Section',
//     'icon'      => 'fa fa-heart',
//     'fields'    => array(
//       array(
//         'id'    => 'option_id',
//         'type'  => 'text',
//         'title' => 'First Option',
//       ),
//       array(
//         'id'    => 'another_option_id',
//         'type'  => 'textarea',
//         'title' => 'Secondary Option',
//       ),
//     )
//   );

//   return $options;

// }
// add_filter( 'cs_framework_options', 'extra_cs_framework_options' );