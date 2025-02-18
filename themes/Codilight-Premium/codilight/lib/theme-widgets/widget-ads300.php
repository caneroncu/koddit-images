<?php
add_action('widgets_init','uxde_300x250_load_widgets');

function uxde_300x250_load_widgets(){
		register_widget("UXDE_300x250_Widget");
}

class UXDE_300x250_Widget extends WP_widget{
	
	function UXDE_300x250_Widget()
{
		$widget_ops = array('classname' => 'uxde_300x250_widget', 'description' => __('A widget that displays your 300x250 ads block.', 'uxde') );

		$control_ops = array( 'id_base' => 'uxde_300x250_widget' );

		$this->WP_Widget('uxde_300x250_widget', __('UXDE - 300x250 Ads', 'uxde'), $widget_ops, $control_ops);
		
	}
	
	function widget($args,$instance){
		extract($args);

		$link = $instance['link'];
		$image = $instance['image'];

		echo $before_widget;
		?>
			
			<div class="adds300x250"><a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" alt="" width="300" height="250" /></a></div>

<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		
		return $instance;
	}
	
	function form($instance){
		$defaults = array('link' => '', 'image' => '',);
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e('Image URL:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Link URL:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $instance['link']; ?>" />
		</p>

		<?php

	}
}
?>