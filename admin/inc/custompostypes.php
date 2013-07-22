<?php
// Portfolio Custom Post Type
$labels = array(
	'name' => _x('My Works', 'post type general name', 'site5framework'),
    'singular_name' => _x('Wy Work', 'post type singular name', 'site5framework'),
    'add_new' => _x('Add New', 'work', 'site5framework'),
    'add_new_item' => __('Add New Work', 'site5framework'),
    'edit_item' => __('Edit Work', 'site5framework'),
    'new_item' => __('New Work', 'site5framework'),
    'view_item' => __('View Work', 'site5framework'),
    'search_items' => __('Search Work', 'site5framework'),
    'not_found' =>  __('No work found', 'site5framework'),
    'not_found_in_trash' => __('No work found in Trash', 'site5framework'),
    'parent_item_colon' => ''
  );
register_post_type('work', array(
     'labels' => $labels,
     'singular_label' => __('work'),
     'public' => true,
     'show_ui' => true, // UI in admin panel
     '_builtin' => false, // It's a custom post type, not built in!
     '_edit_link' => 'post.php?post=%d',
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => array("slug" => "work"), // Permalinks format
     'supports' => array('title','editor','thumbnail')
));

register_taxonomy("workcat", array("work"), array("hierarchical" => true, "label" => "Work Category", "singular_label" => "Work Category", "rewrite" => true));


/*******************************************************************************************

Registers Slider Post Type

********************************************************************************************/
$labels = array(
	'name' => _x('Slider', 'post type general name', 'site5framework'),
    'singular_name' => _x('Slider', 'post type singular name', 'site5framework'),
    'add_new' => _x('Add New', 'slider', 'site5framework'),
    'add_new_item' => __('Add New Slide', 'site5framework'),
    'edit_item' => __('Edit Slide', 'site5framework'),
    'new_item' => __('New Slide', 'site5framework'),
    'view_item' => __('View Slide', 'site5framework'),
    'search_items' => __('Search Slide', 'site5framework'),
    'not_found' =>  __('No slide found', 'site5framework'),
    'not_found_in_trash' => __('No slide found in Trash', 'site5framework'),
    'parent_item_colon' => ''
  );

register_post_type('slider', array(
     'labels' => $labels,
     'singular_label' => __('slider'),
     'public' => true,
     'show_ui' => true, // UI in admin panel
     '_builtin' => false, // It's a custom post type, not built in!
     '_edit_link' => 'post.php?post=%d',
     'capability_type' => 'post',
     'hierarchical' => false,
     'rewrite' => array("slug" => "slider"), // Permalinks format
     'supports' => array('title','thumbnail')
));


//  Add Columns to Portfolio Edit Screen
function portfolio_edit_columns($portfolio_columns){
	$portfolio_columns = array(
		"cb" 				=> "<input type=\"checkbox\" />",
		"title" 			=> __('Title', 'site5framework'),
		"portfolio-tags" 	=> __('Tags', 'site5framework'),
		"author" 			=> __('Author', 'site5framework'),
		"comments" 			=> __('Comments', 'site5framework'),
		"date" 				=> __('Date', 'site5framework'),
	);
	$portfolio_columns['comments'] = '<div class="vers"><img alt="Comments" src="' . esc_url( admin_url( 'images/comment-grey-bubble.png' ) ) . '" /></div>';
	return $portfolio_columns;
}



// Styling for the custom post type icon
add_action( 'admin_head', 'wpt_work_icons' );

function wpt_work_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-work .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-work:hover .wp-menu-image, #menu-posts-work.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-work {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/portfolio-32x32.png) no-repeat;}
    </style>

<?php
}

// Styling for the custom post type icon
add_action( 'admin_head', 'wpt_slider_icons' );

function wpt_slider_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-slider .wp-menu-image {
            background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-icon.png) no-repeat 6px 6px !important;
        }
		#menu-posts-slider:hover .wp-menu-image, #menu-posts-slider.wp-has-current-submenu .wp-menu-image {
            background-position:6px -16px !important;
        }
		#icon-edit.icon32-posts-slider {background: url(<?php echo get_template_directory_uri(); ?>/admin/images/slider-32x32.png) no-repeat;}
    </style>
<?php }
?>