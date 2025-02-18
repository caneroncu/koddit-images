<?php

/* ==  Post Editor  ======================================================
*
*	   Custom post editor styles buttons and quicktags.
*
* ============================================================================*/

/* ==  Styles Dropdown  ==============================*/

function uxde_tiny_mce_before_init($settings) {
	$style_formats = array(
		
		  
		array( 'title' => 'Columns' ),
		
		array( 'title' => __('One Third', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-third' ),
		array( 'title' => __('One Third Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-third uxde-column-last' ),
		
		array( 'title' => __('Two Third', 'uxde'), 'block' => 'div', 'classes' => 'uxde-two-third' ),
		array( 'title' => __('Two Third Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-two-third uxde-column-last' ),
		
		array( 'title' => __('One Half', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-half' ),
		array( 'title' => __('One Half Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-half uxde-column-last' ),
		
		array( 'title' => __('One Fourth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-fourth' ),
		array( 'title' => __('One Fourth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-fourth uxde-column-last' ),
		
		array( 'title' => __('Three Fourth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-three-fourth' ),
		array( 'title' => __('Three Fourth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-three-fourth uxde-column-last' ),
		
		array( 'title' => __('One Fifth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-fifth' ),
		array( 'title' => __('One Fifth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-fifth uxde-column-last' ),
		
		array( 'title' => __('Two Fifth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-two-fifth' ),
		array( 'title' => __('Two Fifth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-two-fifth uxde-column-last' ),
		
		array( 'title' => __('Three Fifth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-three-fifth' ),
		array( 'title' => __('Three Fifth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-three-fifth uxde-column-last' ),
		
		array( 'title' => __('Four Fifth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-four-fifth' ),
		array( 'title' => __('Four Fifth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-four-fifth uxde-column-last' ),
		
		array( 'title' => __('One Sixth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-sixth' ),
		array( 'title' => __('One Sixth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-one-sixth uxde-column-last' ),
		
		array( 'title' => __('Five Sixth', 'uxde'), 'block' => 'div', 'classes' => 'uxde-five-sixth' ),
		array( 'title' => __('Five Sixth Last', 'uxde'), 'block' => 'div', 'classes' => 'uxde-five-sixth uxde-column-last' )
		
		

	);
	$settings['style_formats'] = json_encode($style_formats);
	$settings['verify_html'] = false;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'uxde_tiny_mce_before_init' );


/* ==  Editor Buttons  ==============================*/

function uxde_editor_buttons() {
	if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {
		add_filter('mce_external_plugins', 'add_uxde_editor_buttons');
	}
}
add_action('init', 'uxde_editor_buttons');

function add_uxde_editor_buttons($button_array) {
	$button_array['uxde'] = get_template_directory_uri().'/lib/theme-editor/js/editor-buttons.js';
	return $button_array;
}


/* ==  Quicktags  ==============================*/

function uxde_quicktags() {
	if ( current_user_can('edit_posts') && current_user_can('edit_pages') ) {
		wp_enqueue_script('uxde_quicktags', get_template_directory_uri() .'/lib/theme-editor/js/quicktags.js', array('quicktags'));
	}
}
add_action('admin_print_scripts', 'uxde_quicktags');


/* ==  Add Custom Styles Buttons to tinyMCE 3rd Row  ==============================*/

function uxde_mce_buttons_3($buttons) {
  array_push( $buttons, 'styleselect', 'uxde_buttons_snippet', 'uxde_alerts_snippet', 'uxde_quote_snippet', 'uxde_dropcap_snippet', 'uxde_highlight_snippet', 'uxde_list_snippet', 'uxde_tabs_snippet', 'uxde_toggle_snippet', 'uxde_testimonial_snippet', 'uxde_youtube_snippet', 'uxde_vimeo_snippet', 'uxde_dailymotion_snippet', 'uxde_pricing_snippet' );
  return $buttons;
}
add_filter('mce_buttons_3', 'uxde_mce_buttons_3');
