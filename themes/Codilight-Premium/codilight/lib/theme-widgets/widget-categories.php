<?php
add_action('widgets_init','uxde_categories_load_widgets');

function uxde_categories_load_widgets(){
		register_widget("UXDE_Categories_Widget");
}

class UXDE_Categories_Widget extends WP_widget{
	
	function UXDE_Categories_Widget()
{
		$widget_ops = array('classname' => 'uxde_categories_widget', 'description' => __('A widget that displays your categories with post counts.', 'uxde') );

		$control_ops = array( 'id_base' => 'uxde_categories_widget' );

		$this->WP_Widget('uxde_categories_widget', __('UXDE: Categories Widget', 'uxde'), $widget_ops, $control_ops);
		
	}
	
	function widget($args,$instance) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$category = $instance['category'];


		/* Before widget (defined by themes). */
		echo $before_widget;

		if ( $title ) { echo $before_title . $title . $after_title; }

		?>
			
		<ul>
			<?php
				$args = array (
					'echo' => 0,
					'show_option_all'    => '',
					'orderby'            => 'name',
					'show_count' => 1,
					'title_li' => '',
					'exclude'  => '' . $category . '',
					'depth' => 1
				);
				$variable = wp_list_categories($args);
				$variable = str_replace ( "(" , "<span>", $variable );
				$variable = str_replace ( ")" , "</span>", $variable );
				echo $variable;
			?>
	</ul>

<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category'] = $new_instance['category'];
		
		return $instance;
	}
	
	function form($instance){
		$defaults = array('title' => 'Categories', 'category' => '100, 101');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e('Exclude Categories', 'uxde') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name('category'); ?>" value="<?php echo $instance['category']; ?>" />
		</p>
		

		<?php

	}
}
?>