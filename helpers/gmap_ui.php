<?php
function shortcode_ui_dev_advanced_example() {
	$fields = array(
		array(
			'label'       => esc_html__( 'Attachment', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'        => 'attachment',
			'type'        => 'attachment',
			/*
			 * These arguments are passed to the instantiation of the media library:
			 * 'libraryType' - Type of media to make available.
			 * 'addButton'   - Text for the button to open media library.
			 * 'frameTitle'  - Title for the modal UI once the library is open.
			 */
			'libraryType' => array( 'image' ),
			'addButton'   => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
			'frameTitle'  => esc_html__( 'Select Image', 'shortcode-ui-example', 'shortcode-ui' ),
		),
		array(
			'label'       => 'Gallery',
			'attr'        => 'gallery',
			'description' => esc_html__( 'You can select multiple images.', 'shortcode-ui' ),
			'type'        => 'attachment',
			'libraryType' => array( 'image' ),
			'multiple'    => true,
			'addButton'   => 'Select Images',
			'frameTitle'  => 'Select Images',
		),
		array(
			'label'  => esc_html__( 'Citation Source', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'   => 'source',
			'type'   => 'text',
			'encode' => true,
			'meta'   => array(
				'placeholder' => esc_html__( 'Test placeholder', 'shortcode-ui-example', 'shortcode-ui' ),
				'data-test'   => 1,
			),
		),
		array(
			'label'    => esc_html__( 'Select Page', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'     => 'page',
			'type'     => 'post_select',
			'query'    => array( 'post_type' => 'page' ),
			'multiple' => true,
		),
		array(
			'label'    => __( 'Select Tag', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'     => 'tag',
			'type'     => 'term_select',
			'taxonomy' => 'post_tag',
			'multiple' => true,
		),
		array(
			'label'    => __( 'User Select', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'     => 'users',
			'type'     => 'user_select',
			'multiple' => true,
		),
		array(
			'label'  => esc_html__( 'Color', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'   => 'color',
			'type'   => 'color',
			'encode' => false,
			'meta'   => array(
				'placeholder' => esc_html__( 'Hex color code', 'shortcode-ui-example', 'shortcode-ui' ),
			),
		),
		array(
			'label'       => esc_html__( 'Alignment', 'shortcode-ui-example', 'shortcode-ui' ),
			'description' => esc_html__( 'Whether the quotation should be displayed as pull-left, pull-right, or neither.', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'        => 'alignment',
			'type'        => 'select',
			'options'     => array(
				array( 'value' => '', 'label' => esc_html__( 'None', 'shortcode-ui-example', 'shortcode-ui' ) ),
				array( 'value' => 'left', 'label' => esc_html__( 'Pull Left', 'shortcode-ui-example', 'shortcode-ui' ) ),
				array( 'value' => 'right', 'label' => esc_html__( 'Pull Right', 'shortcode-ui-example', 'shortcode-ui' ) ),
				array(
					'label' => 'Test Optgroup',
					'options' => array(
						array( 'value' => 'left-2', 'label' => esc_html__( 'Pull Left', 'shortcode-ui-example', 'shortcode-ui' ) ),
						array( 'value' => 'right-2', 'label' => esc_html__( 'Pull Right', 'shortcode-ui-example', 'shortcode-ui' ) ),
					)
				),
			),
		),
		array(
			'label'       => esc_html__( 'CSS Classes', 'shortcode-ui-example', 'shortcode-ui' ),
			'description' => esc_html__( 'Which classes the shortcode should get.', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'        => 'classes',
			'type'        => 'select',
			/**
			 * Use this to allow for multiple selections – similar to `'multiple' => true'`.
			 */
			'meta' => array( 'multiple' => true ),
			'options'     => array(
				array( 'value' => '', 'label' => esc_html__( 'Default', 'shortcode-ui-example', 'shortcode-ui' ) ),
				array( 'value' => 'bold', 'label' => esc_html__( 'Bold', 'shortcode-ui-example', 'shortcode-ui' ) ),
				array( 'value' => 'italic', 'label' => esc_html__( 'Italic', 'shortcode-ui-example', 'shortcode-ui' ) ),
			),
		),
		array(
			'label'       => esc_html__( 'Year', 'shortcode-ui-example', 'shortcode-ui' ),
			'description' => esc_html__( 'Optional. The year the quotation is from.', 'shortcode-ui-example', 'shortcode-ui' ),
			'attr'        => 'year',
			'type'        => 'number',
			'meta'        => array(
				'placeholder' => 'YYYY',
				'min'         => '1990',
				'max'         => date_i18n( 'Y' ),
				'step'        => '1',
			),
		),
	);
	/*
	 * Define the Shortcode UI arguments.
	 */
	$shortcode_ui_args = array(
		/*
		 * How the shortcode should be labeled in the UI. Required argument.
		 */
		'label' => esc_html__( 'Shortcake Dev', 'shortcode-ui-example', 'shortcode-ui' ),
		/*
		 * Include an icon with your shortcode. Optional.
		 * Use a dashicon, or full HTML (e.g. <img src="/path/to/your/icon" />).
		 */
		'listItemImage' => 'dashicons-editor-quote',
		/*
		 * Limit this shortcode UI to specific posts. Optional.
		 */
		'post_type' => array( 'post', 'page' ),
		/*
		 * Register UI for the "inner content" of the shortcode. Optional.
		 * If no UI is registered for the inner content, then any inner content
		 * data present will be backed-up during editing.
		 */
		'inner_content' => array(
			'label'        => esc_html__( 'Quote', 'shortcode-ui-example', 'shortcode-ui' ),
			'description'  => esc_html__( 'Include a statement from someone famous.', 'shortcode-ui-example', 'shortcode-ui' ),
		),
		/*
		 * Define the UI for attributes of the shortcode. Optional.
		 *
		 * See above, to where the the assignment to the $fields variable was made.
		 */
		'attrs' => $fields,
	);
	shortcode_ui_register_for_shortcode( 'map', $shortcode_ui_args );
}

add_action('register_shortcode_ui', 'shortcode_ui_dev_advanced_example');


