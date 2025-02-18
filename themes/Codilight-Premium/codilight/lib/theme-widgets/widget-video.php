<?php
/*
 * VIDEO WIDGET
 */
add_action('widgets_init','video_load_widgets');


function video_load_widgets(){
		register_widget("UX_Video_Widget");
}

/* ==  Widget ==============================*/

class UX_Video_Widget extends WP_widget{
	
/* ==  Widget Setup ==============================*/

	function UX_Video_Widget(){
		$widget_ops = array('classname' => 'uxde_video_widget', 'description' => 'A widget that display your video based on Youtube, Video and Dailymotion.', 'uxde');

		$control_ops = array('id_base' => 'uxde_video_widget');

		$this->WP_Widget('uxde_video_widget', 'UXDE - Video Widget', 'uxde', $widget_ops, $control_ops);
		
	}

/* ==  Display Widget ==============================*/
	
	function widget($args,$instance){
		extract($args);
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$type = $instance['type'];
		$id = $instance['id'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		?>
		<?php if($type == 'Youtube') { ?>
			<div class="video-container">
			<iframe width="300" height="176" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0" frameborder="0" 	allowfullscreen></iframe>
			</div>
		<?php } elseif($type == 'Vimeo') { ?>
		<div class="video-container vimeo">
		<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=f9ba00" width="300" height="176" frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" ></iframe>
		</div>
		<?php } elseif($type == 'Dailymotion') { ?>
		<div class="video-container">
		<iframe frameborder="0" width="300" height="176" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
		</div>
		<?php } ?>
		<?php 
		/* After widget (defined by themes). */
		echo $after_widget;
	}

/* ==  Update Widget ==============================*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = $new_instance['type'];
		$instance['id'] = $new_instance['id'];
		return $instance;
	}
	

/* ==  Widget Settings ==============================*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */

	function form($instance){
		$defaults = array( 
		'title' => 'Video Widget',
		'type' => '',
		'id' => '',
		 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'uxde') ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('Type', 'uxde') ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
				<option <?php if ( 'Youtube' == $instance['type'] ) echo 'selected="selected"'; ?>>Youtube</option>
				<option <?php if ( 'Vimeo' == $instance['type'] ) echo 'selected="selected"'; ?>>Vimeo</option>
				<option <?php if ( 'Dialymotion' == $instance['type'] ) echo 'selected="selected"'; ?>>Dailymotion</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Video ID:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" />
		</p>
		<?php

	}
}
?>