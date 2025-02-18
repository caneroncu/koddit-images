<?php

function ux_breadcrumbs() {
  global $data;
  if($data['uxde_enable_breadcrumbs']) {
  $delimiter = '<span class="sep">&raquo;</span>';
  $before = '<span typeof="v:Breadcrumb"><span property="v:title" class="current">';
  $after = '</span></span>';
  $span = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">';
 
    global $post;
    $homeLink = home_url();
    echo ' <span typeof="v:Breadcrumb"><a property="v:title" rel="v:url" href="' . $homeLink . '">' . __( 'Homepage' , 'uxde' ) . '</a></span> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0){
		$cat_code = get_category_parents($parentCat, TRUE, ' ' . $span . ' ' . $delimiter . ' ');
		echo $cat_code = str_replace ('<a','<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"', $cat_code );
	  }
      echo $before . '' . single_cat_title('', false) . '' . $after;
 
    } elseif ( is_day() ) {
      echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
      echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"  href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></span> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></span> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></span> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cat_code = get_category_parents($cat, TRUE, ' ' . $span . ' ' . $delimiter . ' ');
		echo $cat_code = str_replace ('<a','<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title"', $cat_code );

        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></span> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></span>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before ;
	  printf( __( 'Search Results for: %s', 'uxde' ),  get_search_query() );
	  echo  $after;
 
    } elseif ( is_tag() ) {
	  echo $before ;
	  printf( __( 'Tag Archives: %s', 'uxde' ), single_tag_title( '', false ) );
	  echo  $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before ;
	  printf( __( 'Author Archives: %s', 'uxde' ),  $userdata->display_name );
	  echo  $after;
 
    } elseif ( is_404() ) {
      echo $before;
	  _e( 'Not Found', 'uxde');
	  echo  $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('page ', 'uxde') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
 }
}
?>