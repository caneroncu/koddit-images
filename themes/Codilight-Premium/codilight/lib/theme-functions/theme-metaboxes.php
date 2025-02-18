<?php

add_filter( 'uxde_metaboxes', 'uxde_metaboxes' );
	
function uxde_metaboxes( array $metaboxes ) {
		
		$prefix = 'uxde';

		$metaboxes[] = array(
			'id'		 => $prefix . 'custom_post_formats',
			'title'      => __('Custom For Post Formats', 'uxde'),
			'pages'      => array('post'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				array(
					'label' => __('Gallery IDs', 'uxde'),
					'desc'	=> __('Enter the gallery ids that you created. Example: 13, 25', 'uxde'),
					'id'	=> $prefix . 'custom_gallery_id',
					'type' => 'text',
					'std' => ''
				),
				array(
					'label' => __('Gallery Columns', 'uxde'),
					'desc'	=> __('Number of gallery columns.', 'uxde'),
					'id'	=> $prefix . 'custom_gallery_columns',
					'type'	=> 'select',
					'options' => array(
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'std'	=> '5'
				),
				array(
					'label' => __('Video Embed Code', 'uxde'),
					'desc'	=> __('Enter the video embed code if you use the video post formats. Size: 798 x 449.', 'uxde'),
					'id'	=> $prefix . 'custom_video_code',
					'type'	=> 'textarea',
					'std' => ''
				),
			)
		);

		$metaboxes[] = array(
			'id'		 => $prefix . 'custom_seo',
			'title'      => __('Built-In SEO', 'uxde'),
			'pages'      => array('post', 'page'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				array(
					'label' => __('Custom Title', 'uxde'),
					'desc'	=> __('Enter the custom title for your post. The title will be limited to 140 chars.', 'uxde'),
					'id'	=> $prefix . 'custom_title',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'label' => __('Meta Description', 'uxde'),
					'desc'	=> __('Enter the meta description for your post. The meta description will be limited to 140 chars.', 'uxde'),
					'id'	=> $prefix . 'meta_description',
					'type' => 'textarea',
					'std' => ''
				),
				array(
					'label' => __('Meta Keywords', 'uxde'),
					'desc'	=> __('Enter the meta keywords for your post.', 'uxde'),
					'id'	=> $prefix . 'meta_keywords',
					'type'	=> 'textarea',
					'std' => ''
				),
			)
		);

		$metaboxes[] = array(
			'id'		 => 'review_control',
			'title'      => __('Review Control', 'uxde'),
			'pages'      => array('post'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				array(
					'label' => __('Enable Review', 'uxde'),
					'desc'	=> __('Check this to enable review system for this post.', 'uxde'),
					'id'	=> $prefix . 'enable_review',
					'type'	=> 'checkbox'
				),
				array(
					'label' => __('Review Box Position', 'uxde'),
					'desc'	=> __('Position of review box in the single post.', 'uxde'),
					'id'	=> $prefix . 'review_box_pos',
					'type'	=> 'select',
					'options' => array(
						'top' => 'Top',
						'bottom' => 'Bottom'
					),
					'std'	=> 'bottom'
				),
				array(
					'label' => __('Rating Criteria', 'uxde'),
					'desc'	=> __('<strong>Label</strong> : A name of criteria - <strong>Score</strong> : A number value between 0 - 10, incerement 0.1.', 'uxde'),
					'id'	=> $prefix . 'rating_criteria',
					'type'	=> 'rating_criteria'
				),
				array(
					'label' => __('Rating Type', 'uxde'),
					'desc'	=> __('Select the rating type', 'uxde'),
					'id'	=> $prefix . 'rating_type',
					'type'	=> 'select',
					'options' => array ( 'number' => 'Number', 'star' => 'Star', 'letter' => 'Letter Grade', 'percent' => 'Percentage')
				),
				array(
					'label' => __('Review Box Title', 'uxde'),
					'desc'	=> __('Title of review box in the single post.', 'uxde'),
					'id'	=> $prefix . 'review_box_title',
					'type'	=> 'text',
					'std'	=> 'Review Overview'
				),
				array(
					'label' => __('Total Score Label', 'uxde'),
					'desc'	=> __('Total score label of review box in the single post.', 'uxde'),
					'id'	=> $prefix . 'review_box_total_score_label',
					'type'	=> 'text',
					'std'	=> 'Total Score'
				),
				array(
					'label' => __('Summary', 'uxde'),
					'desc'	=> __('Summary for of review box in single post.', 'uxde'),
					'id'	=> $prefix . 'review_summary',
					'type'	=> 'textarea',
					'std'	=> 'Description...'
				),
				array(
					'label' => __('Enable User Review', 'uxde'),
					'desc'	=> __('Check this to enable the user rating.', 'uxde'),
					'id'	=> $prefix . 'enable_user_review',
					'type'	=> 'checkbox'
				),
			)
		);
		
	return $metaboxes;
}

