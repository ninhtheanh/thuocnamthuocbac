<?php
/**
 * Dong Y functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage DongY
 * @since DongY 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Dong Y 1.0
 */

//update_option('siteurl','http://dongydinhtuan.com');
//update_option('home','http://dongydinhtuan.com');

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Dong Y only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'dongy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Dong Y 1.0
 */
function dongy_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on dongy, use a find and replace
	 * to change 'dongy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dongy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'dongy' ),
		'footer-menu'  => __( 'Footer Menu', 'dongy' ),
		'social'  => __( 'Social Links Menu', 'dongy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	//$color_scheme  = dongy_get_color_scheme();
	//$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dongy_custom_background_args', array(
		'default-color' => '#d3d3d3',
		'default-image' => get_template_directory_uri() . '/images/background.png',
	) ) );
}
endif; // dongy_setup
add_action( 'after_setup_theme', 'dongy_setup' );

/**
 * Register widget area.
 *
 * @since Dong Y 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dongy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'dongy' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'dongy' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dongy_widgets_init' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Dong Y 1.1
 */
function dongy_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
//add_action( 'wp_head', 'dongy_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Dong Y 1.0
 */
function dongy_scripts() {
	
	//Css
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0' );
	//wp_enqueue_style( 'font-satisfy-regular', 'https://fonts.googleapis.com/css?family=Satisfy', array() );
	// Load our main stylesheet.
	wp_enqueue_style( 'dongy-style', get_stylesheet_uri() );
	//Javascript file
	wp_enqueue_script('jquery-script', get_stylesheet_directory_uri() . '/js/jquery-1.11.3.js', array(), '1.0.0' );
	wp_enqueue_script('jquery-lazyload', get_stylesheet_directory_uri() . '/js/jquery.lazyload.js', array(), '1.0.0' );
	//wp_enqueue_script('menu-script', get_stylesheet_directory_uri() . '/js/navigation.js', array('jquery'), '1.0.0.0' );
	//wp_enqueue_script('dongy-script', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0.0' );
	wp_enqueue_script('jquery-cycle-script', get_stylesheet_directory_uri() . '/js/jquery.cycle.all.min.js', array(), '1.0.0' );
	wp_enqueue_script('jquery-wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), '1.0.0' );	
}
add_action( 'wp_enqueue_scripts', 'dongy_scripts' );

require get_template_directory() . '/inc/widget_recent_post_thumb.php';
require get_template_directory() . '/inc/widget_bai_thuoc_gia_truyen.php';

/*Security Start*/
function remove_version_number() {
     return '';
}
add_filter('the_generator', 'remove_version_number');
/*Security End*/

if ( ! function_exists( 'dongy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dongy_posted_on($categories) {
	echo '<div class="posted-on-title">';
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$byline = sprintf(
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	//echo '<span class="byline"> ' . $byline . '</span>';
	echo '<span class="posted-on">' . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>' . '</span>';	
	
	if ( ! empty( $categories ) ) {
		echo '<span class="category">';
		$separator = ", ";
	    foreach( $categories as $category ) {
	        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
	    }
	    echo trim( $output, $separator );
	    echo '</span>';
	}

	echo '</div>';
}
endif;
//
/****************************************************************************************/

if ( ! function_exists( 'dongy_breadcrumb' ) ) :
/**
 * Display breadcrumb on header.
 *
 * If the page is home or front page, slider is displayed.
 * In other pages, breadcrumb will display if breadcrumb NavXT plugin exists.
 */
function dongy_breadcrumb() {
	if( function_exists( 'bcn_display_list' ) ) {
		echo '<div class="breadcrumb">
		<ul>';
		bcn_display_list();
		echo '</ul>
		</div> <!-- .breadcrumb -->';
	}

}
endif;

/****************************************************************************************/

if ( ! function_exists( 'dongy_header_title' ) ) :
/**
 * Show the title in header
 */
function dongy_header_title() {
	if( is_category() ) {
		$dongy_header_title = single_cat_title( '', FALSE );
	}
	elseif( is_archive() ) {
		$dongy_header_title = get_the_archive_title();
	}	
	elseif( is_search() ) {
		$dongy_header_title = __( 'Kết quả tìm kiếm: ' . get_search_query(), 'dongy' );
	}
	elseif( is_page_template()  ) {
		$dongy_header_title = get_the_title();
	}
	else {
		$dongy_header_title = '';
	}

	return $dongy_header_title;

}
endif;

//Show excerpt on page
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
add_action( 'wp_footer', 'wp_admin_bar_render', 1000 );

if ( ! function_exists( 'dongy_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * @since Dong Y 1.0
 */
function dongy_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;

function dongy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dongy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dongy_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dongy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dongy_categorized_blog should return false.
		return false;
	}
}
function dongy_sharing_button_code($url, $css_name){
	$content = "";
	if(is_single()) {
		$content .= '<div class="fb-send" data-href="' . $url . '"></div>';
	}
	$content .= '<div class="fb-share-button" data-href="' . $url . '" data-layout="button"></div>';
	$content .= '<div class="fb-like" data-href="' . $url . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>';	
	return '<div class="' . $css_name . '"> ' . $content . ' </div>';	
}
function dongy_facebook_sdk() {
	$facebookSDK .= '<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=1619383618315607";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';
	return $facebookSDK;
}
if ( ! function_exists( 'dongy_sharing' ) ) :
function dongy_sharing($url, $css_name = "social-right") {	
	echo dongy_sharing_button_code($url, $css_name);
}
endif;
function contact_information(){
	$str = dongy_sharing_button_code(get_permalink(), "social-right");
	if ( !is_sticky() && !is_page() )
	{
		$str .= do_shortcode('[contentblock id=2]');
	}
	else
	{
		$str .= do_shortcode('[contentblock id=1]');
	}
	return $str;
}
function facebook_comments(){
	return '<div class="fb-comments" data-href="' . get_permalink() . '" data-numposts="5"></div>';
}
function end_post_contact( $content ){
	$str = contact_information();
	$str .= facebook_comments();
	if ( is_singular('post') ) {
		$content .= $str;	
	}
	$content .= get_related_posts_by_category();
	return $content;
}
function end_post_shortcode($attr) {
   extract(shortcode_atts(array(
       'contact_info' => 0,
       'fb_comments' => 0
   ), $attr));
	$str = "";
	if($contact_info == 1){
		$str .= contact_information();	
	}
	if($fb_comments == 1){
		$str .= facebook_comments();
	}
	return $str;
}
add_shortcode('thongtinlienhe', 'end_post_shortcode');
add_filter( 'the_content', 'end_post_contact' );

function get_related_posts_by_category() {
	$str = "";
	if (is_single()) {
		global $post;
		$current_post = $post->ID;		
		//var_dump(get_the_category( $current_post )); //only one cat by post id
		$post_categories = wp_get_post_categories( $current_post );
		$cats = array();	
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$cats[] = array( 'term_id' => $cat->term_id, 'name' => $cat->name, 'slug' => $cat->slug );
		}
		$str = "";		
		//var_dump($cats);
		foreach ($cats as $category) :			
			$posts = get_posts('numberposts=10&category='. $category['term_id'] . '&exclude=' . $current_post);
			if(count($posts) > 0 && $str == ""){
								
			}
			foreach($posts as $post) :
				$str .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';	
			endforeach;
		endforeach;
		if($str != "")
		{
			$str = '<div class="related-posts"><header class="entry-header">							
					<div class="heading_title">		 
						<h3>' . __('Bài liên quan') . '</h3>		
					</div>
				</header><ul>' . $str . '</ul></div>';
		}
	}	
	return $str;
	wp_reset_query();
}
function catch_first_image_in_content($post_content, $w = 150, $h = 150, $zc = 1) {				
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
	$first_img = $matches[1][0];
	if(empty($first_img)) {
		$first_img = get_template_directory_uri() . "/images/no-image-found.jpg";
	}
	else
	{
		$first_img = get_template_directory_uri() . '/timthumb.php?src=' . urlencode($first_img) . '&h=' . $h . '&w=' . $w . '&zc=' . $zc . ''; //&h=150&w=150&zc=1
	}				
	return $first_img;
}
if ( ! function_exists( 'get_current_page_url' ) ) {
	function get_current_page_url() {
	  global $wp;
	  return add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
	}
}
if ( ! function_exists( 'the_current_page_url' ) ) {
	function the_current_page_url() {
	  echo get_current_page_url();
}
}

function yst_wpseo_change_og_locale( $locale ) {
	return 'vi_VN';
}
add_filter( 'wpseo_locale', 'yst_wpseo_change_og_locale' );
//Adding async to js
/*add_filter( 'script_loader_tag', function ( $tag, $handle ) {    
    if( is_admin() ) {
        return $tag;
    }
    return str_replace( ' src', ' async src', $tag );
}, 10, 2 );*/

//Customizing the Login Form
function ta_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
    		background-size: auto;			
		    height: 100px;
		    width: 324px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ta_login_logo' );

function ta_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'ta_login_logo_url' );

function ta_login_logo_url_title() {
    return 'Đông Y Gia Truyền Đình Tuân';
}
add_filter( 'login_headertitle', 'ta_login_logo_url_title' );