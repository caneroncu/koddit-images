<?php global $data; ?>
<?php 
    query_posts('showposts=1&orderby=rand&ignore_sticky_posts=1'); 
    the_post();
?>

<div id="random-section">

	<div class="random-title">
		<h3><?php _e('The Random Article', 'uxde'); ?></h3>
	</div>
	
	<div class="random-article">

		<h4 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php if (strlen($post->post_title) > 90) { echo substr(the_title($before = '', $after = '', FALSE), 0, 90) . '...'; } else { the_title(); } ?></a></h4>

	</div>

</div>

<?php wp_reset_query(); ?> 