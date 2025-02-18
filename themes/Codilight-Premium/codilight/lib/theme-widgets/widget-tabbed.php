<?php
/*
 */

/**
 * tabd function to widgets_init that'll lotab our widget.
 */
add_action( 'widgets_init', 'uxde_Tab_Widget' );

/**
 * Register widget.
 */
function uxde_Tab_Widget() {
	register_widget( 'uxde_Tab_Widget' );
}

/*
 * Widget class.
 */
class uxde_Tab_Widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function uxde_Tab_Widget() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'tab_widget', 'description' => __('A tabbed widget that display popular posts, recent posts and comments.', 'uxde') );

		/* Widget control settings */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tab_widget' );

		/* Create the widget */
		$this->WP_Widget( 'tab_widget', __('UXDE - Tabbed Widget', 'uxde'), $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		global $wpdb;
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$tab1 = $instance['tab1'];
		$tab2 = $instance['tab2'];
		$posts = $instance['posts'];
	

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		//Randomize tab order in a new array
		$tab = array();
		
		?>
        
        <div class="widget-tabs">
                        	
            <div class="tab_wrap">
            
                <ul class="drop">

                    <li class="first tab_nav_1"><a href="#tabs-1"><?php echo $tab1; ?></a></li>

                    <li class="tab_nav_2"><a href="#tabs-2"><?php echo $tab2; ?></a></li>

                </ul>
                
                <div class="widget-tab" id="tabs-1">
                  
                    <ul>
            			<?php 
						$popPosts = new WP_Query();
						$popPosts->query('ignore_sticky_posts=1&posts_per_page='.$posts.'&orderby=comment_count'); ?>

						<?php if ($popPosts->have_posts()) : ?>

						<?php $count = 0; ?>

						<?php while ($popPosts->have_posts()) : $popPosts->the_post(); global $post; ?>

						<?php $count++; ?>
                        
                        <li>
	
						<article id="post-<?php the_ID(); ?>-recent" class="widget-post">
                        	
							<?php if ( has_post_thumbnail() ) : ?>

                            <div class="featured-image">

                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sidebar-thumb'); ?></a>

                            </div>
                           
							<?php endif; ?>
                            
                            <header>

                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				
								<span class="meta-category color-<?php echo $count; ?>"><?php $category = get_the_category(); if ($category) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "uxde" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> '; } ?></span>

                                <span class="date-review"><?php if(get_post_meta( $post->ID, 'uxde' . 'enable_review', true )) uxde_print_review_badge($post->ID); ?><time class="updated meta-button" datetime="<?php the_time('F, jS Y'); ?>" pubdate> <?php the_time('F, jS Y'); ?></time></span>

							
                            </header>

						</article>

                        </li>
                        
                        <?php endwhile; ?>

						<?php endif; ?>
                        
                        <?php wp_reset_query(); ?>

                    </ul>
                  
                </div><!--tab-->
                
                <div class="widget-tab" id="tabs-2">
                   
                   <ul>

            			<?php
						
						$recentPosts = new WP_Query();
						$recentPosts->query('ignore_sticky_posts=1&posts_per_page='.$posts.''); ?>

						<?php if ($recentPosts->have_posts()) : ?>

						<?php $count = 0; ?>

					    <?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); global $post; ?>

						<?php $count++; ?>
                       
                        <li>

						<article id="post-<?php the_ID(); ?>-recent" class="widget-post">

							<?php if ( has_post_thumbnail() ) : ?>
                        	
                            <div class="featured-image">

                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sidebar-thumb'); ?></a>

                            </div>

							<?php endif; ?>
                        
                            <header>

                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

								<span class="meta-category color-<?php echo $count; ?>"><?php $category = get_the_category(); if ($category) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "uxde" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> '; } ?></span>

                                <span class="date-review"><?php if(get_post_meta( $post->ID, 'uxde' . 'enable_review', true )) uxde_print_review_badge($post->ID); ?><time class="updated meta-button" datetime="<?php the_time('F, jS Y'); ?>" pubdate> <?php the_time('F, jS Y'); ?></time></span>

                            </header>

						</article>

                        </li>
                        
                        <?php endwhile; ?>

						<?php endif; ?>
						
                        <?php wp_reset_query(); ?>
                        
                    </ul>
                   
                </div>
                
            </div>
            
        </div>
        
		<?php

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['tab1'] = $new_instance['tab1'];
		$instance['tab2'] = $new_instance['tab2'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'tab1' => 'Popular Posts',
		'tab2' => 'Recent Posts',
		'posts' => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- tab 1 title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab1' ); ?>"><?php _e('Tab 1 Title:', 'uxde') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab1' ); ?>" name="<?php echo $this->get_field_name( 'tab1' ); ?>" value="<?php echo $instance['tab1']; ?>" />
		</p>
		
		<!-- tab 2 title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'tab2' ); ?>"><?php _e('Tab 2 Title:', 'uxde') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'tab2' ); ?>" name="<?php echo $this->get_field_name( 'tab2' ); ?>" value="<?php echo $instance['tab2']; ?>" />
		</p>

		<!-- Posts: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'posts' ); ?>"><?php _e('Number of Posts:', 'uxde') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'posts' ); ?>" name="<?php echo $this->get_field_name( 'posts' ); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		
	
	<?php
	}
}
?>