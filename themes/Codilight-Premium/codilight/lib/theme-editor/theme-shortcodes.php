<?php

/*------------------------------------------------------------------------------------

	Theme Shortcodes

/*-----------------------------------------------------------------------------------*/


/* BUTTONS SHORTCODES
/*-----------------------------------------------------------------------------------*/

function uxde_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'red',
			'size' => 'small'
	    ), $atts));
		
	   return '<a target="'.$target.'" class="uxde-button '.$size.' '.$style.'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
add_shortcode('button', 'uxde_button');


/* COLUMN SHORTCODES
/*-----------------------------------------------------------------------------------*/

function uxde_one_third( $atts, $content = null ) {
	   return '<div class="uxde-one-third">' . do_shortcode($content) . '</div>';
	}
add_shortcode('one_third', 'uxde_one_third');

function uxde_one_third_last( $atts, $content = null ) {
	   return '<div class="uxde-one-third uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('one_third_last', 'uxde_one_third_last');

function uxde_two_third( $atts, $content = null ) {
	   return '<div class="uxde-two-third">' . do_shortcode($content) . '</div>';
	}
add_shortcode('two_third', 'uxde_two_third');

function uxde_two_third_last( $atts, $content = null ) {
	   return '<div class="uxde-two-third uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('two_third_last', 'uxde_two_third_last');

function uxde_one_half( $atts, $content = null ) {
	   return '<div class="uxde-one-half">' . do_shortcode($content) . '</div>';
	}
add_shortcode('one_half', 'uxde_one_half');

function uxde_one_half_last( $atts, $content = null ) {
	   return '<div class="uxde-one-half uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('one_half_last', 'uxde_one_half_last');

function uxde_one_fourth( $atts, $content = null ) {
	   return '<div class="uxde-one-fourth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('one_fourth', 'uxde_one_fourth');

function uxde_one_fourth_last( $atts, $content = null ) {
	   return '<div class="uxde-one-fourth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('one_fourth_last', 'uxde_one_fourth_last');

function uxde_three_fourth( $atts, $content = null ) {
	   return '<div class="uxde-three-fourth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('three_fourth', 'uxde_three_fourth');

function uxde_three_fourth_last( $atts, $content = null ) {
	   return '<div class="uxde-three-fourth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('three_fourth_last', 'uxde_three_fourth_last');

function uxde_one_fifth( $atts, $content = null ) {
	   return '<div class="uxde-one-fifth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('one_fifth', 'uxde_one_fifth');

function uxde_one_fifth_last( $atts, $content = null ) {
	   return '<div class="uxde-one-fifth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('one_fifth_last', 'uxde_one_fifth_last');

function uxde_two_fifth( $atts, $content = null ) {
	   return '<div class="uxde-two-fifth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('two_fifth', 'uxde_two_fifth');

function uxde_two_fifth_last( $atts, $content = null ) {
	   return '<div class="uxde-two-fifth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('two_fifth_last', 'uxde_two_fifth_last');

function uxde_three_fifth( $atts, $content = null ) {
	   return '<div class="uxde-three-fifth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('three_fifth', 'uxde_three_fifth');

function uxde_three_fifth_last( $atts, $content = null ) {
	   return '<div class="uxde-three-fifth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('three_fifth_last', 'uxde_three_fifth_last');

function uxde_four_fifth( $atts, $content = null ) {
	   return '<div class="uxde-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('four_fifth', 'uxde_four_fifth');

function uxde_four_fifth_last( $atts, $content = null ) {
	   return '<div class="uxde-four-fifth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('four_fifth_last', 'uxde_four_fifth_last');

function uxde_one_sixth( $atts, $content = null ) {
	   return '<div class="uxde-one-sixth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('one_sixth', 'uxde_one_sixth');

function uxde_one_sixth_last( $atts, $content = null ) {
	   return '<div class="uxde-one-sixth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('one_sixth_last', 'uxde_one_sixth_last');

function uxde_five_sixth( $atts, $content = null ) {
	   return '<div class="uxde-five-sixth">' . do_shortcode($content) . '</div>';
	}
add_shortcode('five_sixth', 'uxde_five_sixth');

function uxde_five_sixth_last( $atts, $content = null ) {
	   return '<div class="uxde-five-sixth uxde-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
add_shortcode('five_sixth_last', 'uxde_five_sixth_last');


/* DROPCAP SHORTCODE
/*-----------------------------------------------------------------------------------*/

function dropcap( $atts, $content = null ){
		
		extract( shortcode_atts(array("type" => '', "color" => '', "background"=> ''), $atts) );	
		
		return '<div class="dropcap ' . $type . '" style="color:'. $color .'; background-color:' . $background . ';">' . $content . '</div>';
	
	}
add_shortcode('dropcap', 'dropcap');


/* HIGHTLIGHT SHORTCODE
/*-----------------------------------------------------------------------------------*/

function highlight($atts, $content = null ) {

	extract( shortcode_atts(array('type' => 'yellow',), $atts) );
	
		return '<span class="highlight '.$type.'">'.strip_tags($content).'</span>';
	
	}
add_shortcode('highlight', 'highlight');


/* QUOTE SHORTCODES
/*-----------------------------------------------------------------------------------*/

function block_quote( $atts, $content = null ) {
		
	extract(shortcode_atts(array("align" => 'center', 'color'=>'#999999'), $atts));	
		
		return '<div class="block-quote-' . $align . '" style="color:' . $color . '">' . $content . '</div>';
	}
add_shortcode('quote', 'block_quote');	


/* PRE SHORTCODES
-----------------------------------------------------------*/

function pre( $atts, $content = null ) {
	
	$return_html = '<pre>'.strip_tags($content).'</pre>';
	
	return $return_html;
}
add_shortcode('pre', 'pre');


/* ALERT SHORTCODES
/*-----------------------------------------------------------------------------------*/

function uxde_alert( $atts, $content = null ) {

	extract(shortcode_atts(array(
			'style'   => 'white'
	    ), $atts));
		
	   return '<div class="uxde-alert '.$style.'">' . do_shortcode($content) . '</div>';
	}
add_shortcode('alert', 'uxde_alert');


/* TOOGLE SHORTCODES
/*-----------------------------------------------------------------------------------*/

function uxde_toggle( $atts, $content = null ) {

	extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open'
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"uxde-toggle\"><span class=\"uxde-toggle-title\">". $title ."</span><div class=\"uxde-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
add_shortcode('toggle', 'uxde_toggle');


/*	TABS SHORTCODES
/*-----------------------------------------------------------------------------------*/

function uxde_tabs( $atts, $content = null ) {

	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
		
		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="uxde-tabs-'. rand(1, 100) .'" class="uxde-tabs"><div class="uxde-tab-inner">';
			$output .= '<ul class="uxde-nav uxde-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#uxde-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
add_shortcode( 'tabs', 'uxde_tabs' );

function uxde_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="uxde-tab-'. sanitize_title( $title ) .'" class="uxde-tab">'. do_shortcode( $content ) .'</div>';
	}
add_shortcode( 'tab', 'uxde_tab' );


/* VIDEO SHORTCODE
/*-----------------------------------------------------------------------------------*/

function youtube($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 602,
		'height' => 350,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<div class="video-container"><iframe title="YouTube video player" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_id.'?theme=dark&rel=0&wmode=transparent" frameborder="0" allowfullscreen></iframe></div>';
	
	return $return_html;
}
add_shortcode('youtube', 'youtube');

function vimeo($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 602,
		'height' => 350,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<div class="video-container"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe></div>';
	
	return $return_html;
}
add_shortcode('vimeo', 'vimeo');

function dailymotion($atts) {

	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 602,
		'height' => 350,
		'video_id' => '',
	), $atts));
	
	$custom_id = time().rand();
	
	$return_html = '<div class="video-container"><iframe frameborder="0" width="'.$width.'" height="'.$height.'" src="http://www.dailymotion.com/embed/video/'.$video_id.'?theme=default&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0"></iframe></div>';
	
	return $return_html;
}
add_shortcode('dailymotion', 'dailymotion');


/* TESTIMONIAL SHORTCODE
----------------------------------------------------------------------------------- */


function uxde_testimonial( $atts, $content = null ) {

	   return '';
		
	}
add_shortcode('testimonial', 'uxde_testimonial');


/* LIST STYLE
----------------------------------------------------------------------------------- */


function uxde_list_style( $atts, $content = null ) {

	extract(shortcode_atts(array(
			'type' => 'check',
	    ), $atts));

	   return '<ul class="'.$type.'"><li>' . do_shortcode($content) . '</li></ul>';

	}
add_shortcode('ul', 'uxde_list_style');


/* LIGHTBOX 
----------------------------------------------------------------------------------- */


function uxde_lightbox($atts, $content = null ) {

	extract(shortcode_atts(array(
		'title' => '',
		'url' => '',
		'type' => 'image',
		'youtube_id' => '',
		'vimeo_id' => '',
		'dailymotion_id' => '',
	), $atts));
	
	$class = 'lightbox';
	
	if($type != 'image')
	{
		$class.= '_'.$type;
	}
	
	if($type == 'youtube')
	{
		$url = '#video_'.$youtube_id;
	}
	
	if($type == 'vimeo')
	{
		$url = '#video_'.$vimeo_id;
	}

	if($type == 'dailymotion')
	{
		$url = '#video_'.$dailymotion_id;
	}
	
	$data_iframe = '';
	if($type=='iframe')
	{
		$data_iframe = 'data-fancybox-type="iframe"';
	}
	
	$return_html = '<strong><a href="'.$url.'" class="'.$class.'" '.$data_iframe.'>'.do_shortcode($content).'</a></strong>';
	
	if(!empty($youtube_id))
	{
		$return_html.= '<div style="display:none;"><div id="video_'.$youtube_id.'" style="width:900px;height:488px"><iframe width="900" height="488" src="http://www.youtube.com/embed/'.$youtube_id.'?theme=dark&amp;rel=0&amp;wmode=opaque" frameborder="0"></iframe></div></div>';
	}
	
	if(!empty($vimeo_id))
	{
		$return_html.= '<div style="display:none;"><div id="video_'.$vimeo_id.'" style="width:900px;height:506px"><iframe src="http://player.vimeo.com/video/'.$vimeo_id.'?title=0&amp;byline=0&amp;portrait=0" width="900" height="506" frameborder="0"></iframe></div></div>';
	}

	if(!empty($dailymotion_id))
	{
		$return_html.= '<div style="display:none;"><div id="video_'.$dailymotion_id.'" style="width:900px;height:506px"><iframe src="http://www.dailymotion.com/embed/video/'.$dailymotion_id.'?theme=default&foreground=%23F7FFFD&highlight=%23FFC300&background=%23171D1B&start=&animatedTitle=&iframe=1&additionalInfos=0&autoPlay=0&hideInfos=0" width="900" height="506" frameborder="0"></iframe></div></div>';
	}
	
	return $return_html;
}
add_shortcode('lightbox', 'uxde_lightbox');


/* IMAGE FRAME
----------------------------------------------------------------------------------- */


function uxde_frame_left($atts, $content = null ) {

	extract(shortcode_atts(array(
		'title' => '',
		'src' => '',
		'url' => '',
	), $atts));
	
	$return_html = '<div class="frame_left">';
	
	if(!empty($url))
	{
		$return_html.= '<a href="'.$url.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt="'.$title.'"/>';
	
	if(!empty($url))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_left', 'uxde_frame_left');

function uxde_frame_right($atts, $content = null ) {

	extract(shortcode_atts(array(
		'title' => '',
		'src' => '',
		'url' => '',
	), $atts));
	
	$return_html = '<div class="frame_right">';
	
	if(!empty($url))
	{
		$return_html.= '<a href="'.$url.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt="'.$title.'"/>';
	
	if(!empty($url))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_right', 'uxde_frame_right');

function uxde_frame_center($atts, $content = null ) {

	extract(shortcode_atts(array(
		'title' => '',
		'src' => '',
		'url' => '',
	), $atts));
	
	$return_html = '<div class="frame_center">';
	
	if(!empty($url))
	{
		$return_html.= '<a href="'.$url.'" class="img_frame">';
	}
	
	$return_html.= '<img src="'.$src.'" alt="'.$title.'"/>';
	
	if(!empty($url))
	{
		$return_html.= '</a>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<span class="caption">'.$content.'</span>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}
add_shortcode('frame_center', 'uxde_frame_center');


/* PRICING TABLES
----------------------------------------------------------------------------------- */


function uxde_pricing($atts, $content = null ) {
	
	//extract short code attr
	extract(shortcode_atts(array(
		'size' => '',
		'title' => '',
		'column' => 3,
		'last' => 0,
		'type' => 'last',
	), $atts));
	
	$width_class = 'three';
	switch($column)
	{
		case 3:
			$width_class = 'three';
		break;
		case 4:
			$width_class = 'four';
		break;
	}

	if(!empty($last))
	{
		$width_class.= '_'.$type;
	}
	
	$return_html = '<div class="pricing_box '.$size.' '.$width_class.'">';
	
	if(!empty($title))
	{
		$return_html.= '<div class="header">';
		$return_html.= '<span>'.$title.'</span>';
		$return_html.= '</div>';
	}
	$return_html.= do_shortcode($content);
	$return_html.= '</div>';
	
	if(!empty($last))
	{
		$return_html.= '<br class="clear"/>';
	}
	
	return $return_html;
}
add_shortcode('pricing', 'uxde_pricing');


/* SLIDER SHORTCODE
----------------------------------------------------------------------------------- */


function uxde_slider($atts, $content = null) {
	
	$atts = shortcode_atts(array(), $atts);

	$content = do_shortcode( $content );
	
	return ' 
	<!-- .slider-gallery-->
	<div class="slider-gallery"> 
		
		<!-- .slides -->
		<ul class="slides">' . $content . '</ul>
		<!-- /.slides -->
					  		
	</div>
	<!-- /.slider-gallery-->
	';
	
}

add_shortcode('slider', 'uxde_slider');


function uxde_slide($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'src' => '',
	), $atts));
		
	return '<li><img src="'.$src.'" title="' . do_shortcode($content) . '" alt="' . do_shortcode($content) . '" /></li>';
	
}

add_shortcode('slide', 'uxde_slide');


?>