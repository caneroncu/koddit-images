<?php

function facebook_like_load_widgets()
{
	register_widget('Facebook_Like_Widget');
}

add_action('widgets_init', 'facebook_like_load_widgets');


/* ==  Widget ==============================*/

class Facebook_Like_Widget extends WP_Widget {


/* ==  Widget Setup ==============================*/	
	
	function Facebook_Like_Widget() {

		/* Widget settings. */
		$widget_ops = array('classname' => 'Facebook_like', 'description' => 'A widget that displays your Facebook Like Box.', 'uxde');

		/* Widget control settings. */
		$control_ops = array('id_base' => 'facebook-like-widget');

		/* Create the widget. */
		$this->WP_Widget('facebook-like-widget', __('UXDE - Facebook Widget', 'uxde'), $widget_ops, $control_ops);
	}


/* ==  Display Widget ==============================*/
	
	function widget($args, $instance) {
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url = $instance['page_url'];
		$width = $instance['width'];
		$color_scheme = $instance['color_scheme'];
		$show_faces = isset($instance['show_faces']) ? 'true' : 'false';
		$show_stream = isset($instance['show_stream']) ? 'true' : 'false';
		$show_header = isset($instance['show_header']) ? 'true' : 'false';
		$height = $instance['height'];
		$border_color = $instance['border_color'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		if($page_url): ?>
		<div class="facebook-like-wrap">

			<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($page_url); ?>&amp;width=<?php echo $width; ?>&amp;height=<?php echo $height; ?>&amp;border_color=%23<?php echo $border_color; ?>&amp;show_faces=<?php echo $show_faces; ?>&amp;stream=<?php echo $show_stream; ?>&amp;header=<?php echo $show_header; ?>&amp;height=<?php echo $height; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width; ?>px; height: <?php echo $height; ?>px; " allowTransparency="true"></iframe>

		</div>

		<?php endif;
			  echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = $new_instance['page_url'];
		$instance['width'] = $new_instance['width'];
		$instance['color_scheme'] = $new_instance['color_scheme'];
		$instance['height'] = $new_instance['height'];
		$instance['border_color'] = $new_instance['border_color'];
		$instance['show_faces'] = $new_instance['show_faces'];
		$instance['show_stream'] = $new_instance['show_stream'];
		$instance['show_header'] = $new_instance['show_header'];
		
		return $instance;

	}


/* ==  Widget Settings ==============================*/

	function form($instance) {
		$defaults = array( 'page_url' => '', 'title' => 'Facebook', 'width' => '300', 'height' => '400', 'border_color' => 'DFDFDF', 'color_scheme' => 'light', 'show_faces' => 'on', 'show_stream' => false, 'show_header' => false);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Facebook Fanpage URL:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo $instance['page_url']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $instance['width']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo $instance['height']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('border_color'); ?>"><?php _e('Border Color:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('border_color'); ?>" name="<?php echo $this->get_field_name('border_color'); ?>" value="<?php echo $instance['border_color']; ?>" />
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], 'on'); ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php _e('Show faces:', 'uxde') ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_stream'], 'on'); ?> id="<?php echo $this->get_field_id('show_stream'); ?>" name="<?php echo $this->get_field_name('show_stream'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_stream'); ?>"><?php _e('Show stream:', 'uxde') ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_header'], 'on'); ?> id="<?php echo $this->get_field_id('show_header'); ?>" name="<?php echo $this->get_field_name('show_header'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_header'); ?>"><?php _e('Show Facebook header:', 'uxde') ?></label>
		</p>
	<?php
	}
}