<?php

/* ==  Widget ==============================*/
add_action( 'widgets_init', 'uxde_tweets_widgets' );

function uxde_tweets_widgets() {
	register_widget( 'UXDE_Tweet_Widget' );
}


/* ==  Widget Class ==============================*/	
class uxde_tweet_widget extends WP_Widget {

    /* ==  Widget Setup ==============================*/	
	function UXDE_Tweet_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'uxde_tweet_widget', 'description' => __('A widget that displays your latest tweets.', 'uxde') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'uxde_tweet_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'uxde_tweet_widget', __('UXDE - Latest Tweets', 'uxde'), $widget_ops, $control_ops );
	}

    /* ==  Display Widget ==============================*/
	function widget( $args, $instance ) {
		extract( $args );

    	/* Our variables from the widget settings ---------------------------------------*/
		$title = apply_filters('widget_title', $instance['title'] );
		
		$uxde_twitter_username = $instance['username'];
		$uxde_twitter_postcount = $instance['postcount'];
		$tweettext = $instance['tweettext'];

    	/* Display widget ---------------------------------------------------------------*/
		echo $before_widget;

		if ( $title ) { echo $before_title . $title . $after_title; }
			
		$id = rand(0,999);

		/* Display Latest Tweets */
		?>
			<script type="text/javascript">
    			jQuery(document).ready(function($){
    				$.getJSON('http://api.twitter.com/1/statuses/user_timeline/<?php echo $uxde_twitter_username; ?>.json?count=<?php echo $uxde_twitter_postcount; ?>&callback=?', function(tweets){
    					$("#twitter_update_list_<?php echo $id; ?>").html(uxde_format_twitter(tweets));
    				});
    			});
			</script>
            <ul id="twitter_update_list_<?php echo $id; ?>" class="twitter">
                <li><p></p></li>
            </ul>
            
            <?php if( !empty($tweettext) ) { ?>
                <a href="http://twitter.com/<?php echo $uxde_twitter_username; ?>" class="twitter-link"><?php echo $tweettext; ?></a>
            <?php } ?>
		
		<?php 

		echo $after_widget;
	}

    /* ==  Update Widget ==============================*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). -------------------*/
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
		$instance['tweettext'] = strip_tags( $new_instance['tweettext'] );

		return $instance;
	}
	
    /* ==  Widget Settings ==============================*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => 'Latest Tweets',
		'username' => 'uxdedotnet',
		'postcount' => '3',
		'tweettext' => 'Follow on Twitter',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		/* Build our form -----------------------------------------------------------*/
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e('Twitter Username e.g. uxdedotnet', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" value="<?php echo $instance['username']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tweettext' ); ?>"><?php _e('Follow Text e.g. Follow me on Twitter', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tweettext' ); ?>" name="<?php echo $this->get_field_name( 'tweettext' ); ?>" value="<?php echo $instance['tweettext']; ?>" />
		</p>
		
	<?php
	}
}

?>