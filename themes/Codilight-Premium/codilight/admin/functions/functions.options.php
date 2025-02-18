<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" => "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = STYLESHEETPATH. '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_bloginfo('template_url').'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}

		// Background Repeat
		$background_repeat = array("repeat" => "repeat", "repeat-x" => "repeat-x", "repeat-y" => "repeat-y", "no-repeat" => "no-repeat");

		// Background Position
		$background_position = array("top left" => "top left", "top center" => "top center", "top right" => "top right", "middle left" => "middle left", "middle center" => "middle center", "middle right" => "middle right", "bottom left" => "bottom left", "bottom center" => "bottom center", "bottom right" => "bottom right");

		// Background Attachment
		$background_attachment = array("scroll" => "scroll", "fixed" => "fixed");
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( "name" => "General Settings",
					"type" => "heading");


$of_options[] = array( "name" => "Custom Logo",
					"desc" => "Upload an image that will represent your website's logo. You can also upload a retina logo here.",
					"id" => "uxde_logo",
					"std" => "",
					"type" => "media");

$of_options[] = array( "name" => "Custom Logo ( Width )",
					"desc" => "Enter the width of website's logo.",
					"id" => "uxde_logo_width",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Custom Logo ( Height )",
					"desc" => "Enter the height of website's logo.",
					"id" => "uxde_logo_height",
					"std" => "",
					"type" => "text");


$of_options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => "uxde_favicon",
					"std" => "",
					"type" => "upload");

$of_options[] = array( "name" => "Footer Text",
                    "desc" => "Enter your copyright text here. You can use HTML code for it.",
                    "id" => "uxde_footer_text",
                    "std" => "Copyright &copy; 2013 Codilight. All Rights Reserved.",
                    "type" => "textarea");   

                                                       
    



$of_options[] = array( "name" => "Styling Options",
					"type" => "heading");

$of_options[] = array( "name" => "Homepage Style",
					"desc" => "Select your homepage style.",
					"id" => "uxde_homepage_style",
					"std" => "Magazine",
					"type" => "select", 	
					"options" => array('Magazine' => 'Magazine', 'Blog' => 'Blog',));

$of_options[] = array( "name" => "Footer Style",
					"desc" => "Select your footer style.",
					"id" => "uxde_footer_style",
					"std" => "Footer 1",
					"type" => "select", 	
					"options" => array('Footer 1' => 'Footer 1', 'Footer 2' => 'Footer 2',));

$of_options[] = array( "name" => "Responsive Design",
					"desc" => "Turn ON/OFF the responsive design layout.",
					"id" => "uxde_responsive",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Color Schemes",
					"desc" => "",
					"id" => "uxde_color_scheme",
					"std" => "Green",
					"type" => "select",
					"options" => array('default' => 'default', 'orange' => 'orange', 'light-orange' => 'light-orange', 'red' => 'red', 'dark-red' => 'dark-red', 'blue' => 'blue', 'light-blue' => 'light-blue', 'dark-blue' => 'dark-blue', 'green' => 'green', 'dark-green' => 'dark-green', 'yellow' => 'yellow', 'pink' => 'pink', 'brown' => 'brown', 'black' => 'black', ));

$of_options[] = array( "name" =>  "Background Color for #1 Article",
					"desc" => "Pick a background color for #1 article.",
					"id" => "uxde_article_1",
					"std" => "#FA4B2A",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #1 Article",
					"desc" => "Pick a text color for #1 article.",
					"id" => "uxde_article_text_1",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #2 Article",
					"desc" => "Pick a background color for #2 article.",
					"id" => "uxde_article_2",
					"std" => "#46A28D",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #2 Article",
					"desc" => "Pick a text color for #2 article.",
					"id" => "uxde_article_text_2",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #3 Article",
					"desc" => "Pick a background color for #3 article.",
					"id" => "uxde_article_3",
					"std" => "#FFD800",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #3 Article",
					"desc" => "Pick a text color for #3 article.",
					"id" => "uxde_article_text_3",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #4 Article",
					"desc" => "Pick a background color for #4 article.",
					"id" => "uxde_article_4",
					"std" => "#00C8FF",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #4 Article",
					"desc" => "Pick a text color for #4 article.",
					"id" => "uxde_article_text_4",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #5 Article",
					"desc" => "Pick a background color for #5 article.",
					"id" => "uxde_article_5",
					"std" => "#77D100",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #5 Article",
					"desc" => "Pick a text color for #5 article.",
					"id" => "uxde_article_text_5",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #6 Article",
					"desc" => "Pick a background color for #6 article.",
					"id" => "uxde_article_6",
					"std" => "#FA4B2A",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #6 Article",
					"desc" => "Pick a text color for #6 article.",
					"id" => "uxde_article_text_6",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #7 Article",
					"desc" => "Pick a background color for #7 article.",
					"id" => "uxde_article_7",
					"std" => "#46A28D",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #7 Article",
					"desc" => "Pick a text color for #7 article.",
					"id" => "uxde_article_text_7",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #8 Article",
					"desc" => "Pick a background color for #8 article.",
					"id" => "uxde_article_8",
					"std" => "#FFD800",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #8 Article",
					"desc" => "Pick a text color for #8 article.",
					"id" => "uxde_article_text_8",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #9 Article",
					"desc" => "Pick a background color for #9 article.",
					"id" => "uxde_article_9",
					"std" => "#00C8FF",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #9 Article",
					"desc" => "Pick a text color for #9 article.",
					"id" => "uxde_article_text_9",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #10 Article",
					"desc" => "Pick a background color for #10 article.",
					"id" => "uxde_article_10",
					"std" => "#77D100",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #10 Article",
					"desc" => "Pick a text color for #10 article.",
					"id" => "uxde_article_text_10",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #11 Article",
					"desc" => "Pick a background color for #11 article.",
					"id" => "uxde_article_11",
					"std" => "#FA4B2A",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #11 Article",
					"desc" => "Pick a text color for #11 article.",
					"id" => "uxde_article_text_11",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #12 Article",
					"desc" => "Pick a background color for #12 article.",
					"id" => "uxde_article_12",
					"std" => "#46A28D",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #12 Article",
					"desc" => "Pick a text color for #12 article.",
					"id" => "uxde_article_text_12",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #13 Article",
					"desc" => "Pick a background color for #13 article.",
					"id" => "uxde_article_13",
					"std" => "#FFD800",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #13 Article",
					"desc" => "Pick a text color for #13 article.",
					"id" => "uxde_article_text_13",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #14 Article",
					"desc" => "Pick a color for #14 article.",
					"id" => "uxde_article_14",
					"std" => "#00C8FF",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #14 Article",
					"desc" => "Pick a text color for #14 article.",
					"id" => "uxde_article_text_14",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #15 Article",
					"desc" => "Pick a background color for #15 article.",
					"id" => "uxde_article_15",
					"std" => "#77D100",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #15 Article",
					"desc" => "Pick a text color for #15 article.",
					"id" => "uxde_article_text_15",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #16 Article",
					"desc" => "Pick a background color for #16 article.",
					"id" => "uxde_article_16",
					"std" => "#FA4B2A",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #16 Article",
					"desc" => "Pick a text color for #16 article.",
					"id" => "uxde_article_text_16",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #17 Article",
					"desc" => "Pick a background color for #17 article.",
					"id" => "uxde_article_17",
					"std" => "#46A28D",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #17 Article",
					"desc" => "Pick a text color for #17 article.",
					"id" => "uxde_article_text_17",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #18 Article",
					"desc" => "Pick a background color for #18 article.",
					"id" => "uxde_article_18",
					"std" => "#FFD800",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #18 Article",
					"desc" => "Pick a text color for #18 article.",
					"id" => "uxde_article_text_18",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #19 Article",
					"desc" => "Pick a background color for #19 article.",
					"id" => "uxde_article_19",
					"std" => "#00C8FF",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #19 Article",
					"desc" => "Pick a text color for #19 article.",
					"id" => "uxde_article_text_19",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" =>  "Background Color for #20 Article",
					"desc" => "Pick a background color for #20 article.",
					"id" => "uxde_article_20",
					"std" => "#77D100",
					"type" => "color");

$of_options[] = array( "name" =>  "Text Color for #20 Article",
					"desc" => "Pick a text color for #20 article.",
					"id" => "uxde_article_text_20",
					"std" => "#FFFFFF",
					"type" => "color");

$of_options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => "uxde_custom_css",
                    "std" => "",
                    "type" => "textarea");






//Social Share
$of_options[] = array( "name" => "Social Share",
					"type" => "heading");
          
$of_options[] = array( "name" => "Enable Social Share",
					"desc" => "Turn ON/OFF the social share buttons in the single post.",
					"id" => "uxde_share",
					"std" => 1,
					"type" => "checkbox");

$of_options[] = array( "name" => "RSS Feed",
					"desc" => "Enter your RSS Feed to display it on Menu Bar.",
					"id" => "uxde_rss_feed",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Email URL",
					"desc" => "Enter your Newsletters URL to display it on Menu Bar.",
					"id" => "uxde_email_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Twitter Username",
					"desc" => "Enter your Twitter Usename to display it on Menu Bar and for Social Share Buttons.",
					"id" => "uxde_twitter_username",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Facebook Fanpage URL",
					"desc" => "Enter your Facebook fanpage URL to display it on Menu Bar.",
					"id" => "uxde_facebook_fanpage",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Google Plus",
					"desc" => "Enter your Google Plus URL to display it on Menu Bar.",
					"id" => "uxde_google_plus_url",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Pinterest URL",
					"desc" => "Enter your Pinterest URL to display it on Menu Bar.",
					"id" => "uxde_pinterest",
					"std" => "",
					"type" => "text");






//Advertise Settings
$of_options[] = array( "name" => "Advertisement",
					"type" => "heading");

$of_options[] = array( "name" => "Header Ads",
					"desc" => "Enter your HTML code for the header ads.",
					"id" => "uxde_headerads",
					"std" => "",
					"type" => "textarea"); 
          
$of_options[] = array( "name" => "Front Ads",
					"desc" => "Enter your HTML code for the front ads.",
					"id" => "uxde_frontads",
					"std" => "",
					"type" => "textarea");    

$of_options[] = array( "name" => "Footer Ads",
					"desc" => "Enter your HTML code for the footer ads.",
					"id" => "uxde_footerads",
					"std" => "",
					"type" => "textarea"); 
					




// SEO Marketing
$of_options[] = array( "name" => "SEO Marketing",
					"type" => "heading");

$of_options[] = array( "name" => "Breadcrumbs",
					"desc" => "Turn ON/OFF the breadcrumbs.",
					"id" => "uxde_enable_breadcrumbs",
					"std" => 1,
					"type" => "checkbox"); 

$of_options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => "uxde_google_analytics",
					"std" => "",
					"type" => "textarea");

$of_options[] = array( "name" => "Yoast SEO Plugin",
					"desc" => "We highlight recommended you to use Yoast SEO plugin: http://yoast.com/wordpress/seo/ . It's the best SEO now and we're using it for our websites. It incorporates everything from a snippet preview and page analysis functionality that helps you optimize your robots, Google Authorship, pages content, images titles, meta descriptions and more to XML sitemaps, and loads of optimization options in between.",
					"id" => "uxde_seo_info",
					"std" => "",
					"type" => "info");






// Backup Options
$of_options[] = array( "name" => "Backup Options",
					"type" => "heading");
					
$of_options[] = array( "name" => "Backup and Restore Options",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
					);
					
$of_options[] = array( "name" => "Transfer Theme Options Data",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".
						',
					);
					
	}
}
?>
