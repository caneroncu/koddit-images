<?php
add_action('widgets_init', 'uxde_posts_load_widgets');

function uxde_posts_load_widgets()
{
	register_widget('UXDE_Posts_Widget');
}

add_action( 'widgets_init', 'dt_unregister_posts' );
function dt_unregister_posts() 
{
	unregister_widget( 'WP_Widget_Recent_Posts' );
}

/* ==  Widget ==============================*/

class UXDE_Posts_Widget extends WP_Widget {
	

/* ==  Widget Setup ==============================*/

	function UXDE_Posts_Widget()
	{
		$widget_ops = array('classname' => 'uxde_posts_widget', 'description' => __('A widget that displays your most recent posts.', 'uxde') );

		$control_ops = array('id_base' => 'uxde_posts_widget');

		$this->WP_Widget('uxde_posts_widget', __('UXDE - Recent Posts', 'uxde'), $widget_ops, $control_ops);
	}
	

/* ==  Display Widget ==============================*/

	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>

		<?php
		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
		
		<?php $recent_posts = new WP_Query(array('showposts' => $posts,'cat' => $categories,)); ?>

		<?php if ($recent_posts->have_posts()) : ?>

		<?php $count = 0; ?>
					
		<?php while($recent_posts->have_posts()): $recent_posts->the_post(); global $post; ?>

		<?php $count++; ?>

		<article id="post-<?php the_ID(); ?>-recent" class="widget-post">

			<?php if ( has_post_thumbnail() ) : ?>

			<div class="featured-image">

				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sidebar-thumb'); ?></a>

			</div>

			<?php endif; ?>
	
			<header>
			
				<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

				<span class="meta-category color-<?php echo $count; ?>"><?php $category = get_the_category(); if ($category) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s", "uxde" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> '; } ?></span>

				<span class="date-review"><?php if(get_post_meta( $post->ID, 'uxde' . 'enable_review', true )) uxde_print_review_badge($post->ID); ?><time class="updated meta-button" datetime="<?php the_time('F, jS Y'); ?>" pubdate> <?php the_time('F, jS Y'); ?></time></span>
							
			</header>
			
		</article>	

		<?php endwhile; ?>

		<?php endif; ?>

		<!-- END WIDGET -->
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'categories' => 'all', 'posts' => 4);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e('Filter by Category:', 'uxde') ?></label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Number of posts:', 'uxde') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		
	<?php 
	}
}
?>