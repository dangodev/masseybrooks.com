<?php
/*
 * 1. Cleans up unnecessary items from the WordPress header, while leaving all the SEO-helping ones.
 */
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link' );
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator' );


/*
 * 2. Register menus here. Add/remove from array as necessary.
 */
register_nav_menus(array(
	'primary' => 'Top Navigation',
	'secondary' => 'Footer Navigation'
));
register_sidebar();

/*
 * 3. Add Custom Post Types Here. Simply copypasta lines 29 – 53 and change where necessary.
 */
function custom_post_types() {
	register_post_type('project', array(
		'labels' => array(
			'name' => _x('Projects', 'post type general name'),
			'singular_name' => _x('Project', 'post type singular name'),
			'add_new' => _x('Add New', 'project'),
			'add_new_item' => __('Add New Project'),
			'edit_item' => __('Edit Project'),
			'new_item' => __('New Project'),
			'all_items' => __('All Projects'),
			'view_item' => __('View Project'),
			'search_items' => __('Search Projects'),
			'not_found' =>  __('No projects found'),
			'not_found_in_trash' => __('No projects found in Trash')
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail')
	));
}
add_action( 'init', 'custom_post_types' );

/* 
 * 4. Adds Custom Post Types to the WordPress search. Just add to the array, or delete if no CPT.
 */
function add_to_search($query) {
	if ($query->is_search) {
		$query->set('post_type', array('post', 'portfolio'));
	}
	return $query;
}

add_filter('pre_get_posts','add_to_search');

/*
 * 5. Add thumbnail support
 */
add_theme_support('post-thumbnails');

/*
 * 6. Swap out jQuery with Google CDN. Helps caching (reducing page load speed) and prevents redundancies. Delete if you wanna
 */
function script_check() {
	wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js', false, null);
    wp_enqueue_script('jquery');
}

//add_action('wp_enqueue_scripts', 'script_check');

function get_thumb_src($postID, $size='full') {
	if(empty($postID)) {
		global $post;
		$postID = $post->ID;
	}
	$src_array = wp_get_attachment_image_src(get_post_thumbnail_id($postID), $size);
	return $src_array[0];
}