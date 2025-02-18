<?php

add_action( 'widgets_init', 'uxde_ads125_widgets' );

function uxde_ads125_widgets() {
	register_widget( 'UXDE_Ad125_Widget' );
}

/* ==  Widget ==============================*/
class uxde_ad125_widget extends WP_Widget {

	/* -------------- WIDGET SETUP -------------- */
	
	function UXDE_Ad125_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'uxde_ad125_widget', 'description' => __('A widget that allows the display and configuration up to 6 125x125 ads blocks.', 'uxde') );

		/* Widget control settings */
		$control_ops = array('id_base' => 'uxde_ad125_widget');

		/* Create the widget */
		$this->WP_Widget( 'uxde_ad125_widget', __('UXDE - 125x125 Ads', 'uxde'), $widget_ops, $control_ops );
	}

	/* -------------- DISPLAY WIDGET ---------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$ad1 = $instance['ad1'];
		$ad2 = $instance['ad2'];
		$ad3 = $instance['ad3'];
		$ad4 = $instance['ad4'];
		$ad5 = $instance['ad5'];
		$ad6 = $instance['ad6'];
		$link1 = $instance['link1'];
		$link2 = $instance['link2'];
		$link3 = $instance['link3'];
		$link4 = $instance['link4'];
		$link5 = $instance['link5'];
		$link6 = $instance['link6'];
		$randomize = $instance['random'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		//Randomize ads order in a new array
		$ads = array();
			
		/* Display a containing div */
		echo '<div class="ads-125 clearfix">';
		echo '<ul>';

		/* DISPLAY AD 1. */
		if ( $ad1 )
			$ads[] = '<li><a href="' . $link1 . '"><img src="' . $ad1 . '" width="125" height="125" alt="" /></a></li>';
		/* DISPLAY AD 2. */
		if ( $ad2 )
			$ads[] = '<li><a href="' . $link2 . '"><img src="' . $ad2 . '" width="125" height="125" alt="" /></a></li>';
		/* DISPLAY AD 3. */
		if ( $ad3 )
			$ads[] = '<li><a href="' . $link3 . '"><img src="' . $ad3 . '" width="125" height="125" alt="" /></a></li>';
		/* DISPLAY AD 4. */
		if ( $ad4 )
			$ads[] = '<li><a href="' . $link4 . '"><img src="' . $ad4 . '" width="125" height="125" alt="" /></a></li>';
		/* DISPLAY AD 5. */
		if ( $ad5 )
			$ads[] = '<li><a href="' . $link5 . '"><img src="' . $ad5 . '" width="125" height="125" alt="" /></a></li>';
		/* DISPLAY AD 6. */
		if ( $ad6 )
			$ads[] = '<li><a href="' . $link6 . '"><img src="' . $ad6 . '" width="125" height="125" alt="" /></a></li>';
		
		//Randomize order if user want it
		if ($randomize){
			shuffle($ads);
		}
		
		//Display ads
		foreach($ads as $ad){
			echo $ad;
		}
		
		echo '</ul>';
		echo '</div>';

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* -------------- UPDATE WIDGET --------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['ad1'] = $new_instance['ad1'];
		$instance['ad2'] = $new_instance['ad2'];
		$instance['ad3'] = $new_instance['ad3'];
		$instance['ad4'] = $new_instance['ad4'];
		$instance['ad5'] = $new_instance['ad5'];
		$instance['ad6'] = $new_instance['ad6'];
		$instance['link1'] = $new_instance['link1'];
		$instance['link2'] = $new_instance['link2'];
		$instance['link3'] = $new_instance['link3'];
		$instance['link4'] = $new_instance['link4'];
		$instance['link5'] = $new_instance['link5'];
		$instance['link6'] = $new_instance['link6'];
		$instance['random'] = $new_instance['random'];
		
		return $instance;
	}
	
	/* -------------- WIDGET SETTINGS -------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
	/* Set up some default widget settings. */
	$defaults = array(
	'title' => '',
	'ad1' => '',
	'link1' => '',
	'ad2' => '',
	'link2' => '', 'ad3' => '', 'link3' => '', 'ad4' => '', 'link4' => '', 'ad5' => '', 'link5' => '', 'ad6' => '', 'link6' => '', 'random' => false
	);
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<!-- AD 1 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad1' ); ?>"><?php _e('Ad 1 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad1' ); ?>" name="<?php echo $this->get_field_name( 'ad1' ); ?>" value="<?php echo $instance['ad1']; ?>" />
		</p>
				<!-- AD 1 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('Ad 1 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo $instance['link1']; ?>" />
		</p>
		<!-- AD 2 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad2' ); ?>"><?php _e('Ad 2 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad2' ); ?>" name="<?php echo $this->get_field_name( 'ad2' ); ?>" value="<?php echo $instance['ad2']; ?>" />
		</p>
		<!-- AD 2 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('Ad 2 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>
		<!-- AD 3 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad3' ); ?>"><?php _e('Ad 3 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad3' ); ?>" name="<?php echo $this->get_field_name( 'ad3' ); ?>" value="<?php echo $instance['ad3']; ?>" />
		</p>
		<!-- AD 3 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e('Ad 3 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo $instance['link3']; ?>" />
		</p>
		<!-- AD 4 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad4' ); ?>"><?php _e('Ad 4 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad4' ); ?>" name="<?php echo $this->get_field_name( 'ad4' ); ?>" value="<?php echo $instance['ad4']; ?>" />
		</p>
		<!-- AD 4 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e('Ad 4 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" value="<?php echo $instance['link4']; ?>" />
		</p>
		<!-- AD 5 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad5' ); ?>"><?php _e('Ad 5 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad5' ); ?>" name="<?php echo $this->get_field_name( 'ad5' ); ?>" value="<?php echo $instance['ad5']; ?>" />
		</p>
		<!-- AD 5 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link5' ); ?>"><?php _e('Ad 5 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link5' ); ?>" name="<?php echo $this->get_field_name( 'link5' ); ?>" value="<?php echo $instance['link5']; ?>" />
		</p>
		<!-- AD 6 IMAGE URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad6' ); ?>"><?php _e('Ad 6 image url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'ad6' ); ?>" name="<?php echo $this->get_field_name( 'ad6' ); ?>" value="<?php echo $instance['ad6']; ?>" />
		</p>
		<!-- AD 6 LINK URL: TEXT INPUT -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link6' ); ?>"><?php _e('Ad 6 link url:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link6' ); ?>" name="<?php echo $this->get_field_name( 'link6' ); ?>" value="<?php echo $instance['link6']; ?>" />
		</p>
		<!-- RANDOMIZE? -->
		<p>
			<label for="<?php echo $this->get_field_id( 'random' ); ?>"><?php _e('Randomize ads order?', 'uxde') ?></label>
			<?php if ($instance['random']){ ?>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'random' ); ?>" name="<?php echo $this->get_field_name( 'random' ); ?>" checked="checked" />
			<?php } else { ?>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'random' ); ?>" name="<?php echo $this->get_field_name( 'random' ); ?>"  />
			<?php } ?>
		</p>
	<?php
	}
}
?>