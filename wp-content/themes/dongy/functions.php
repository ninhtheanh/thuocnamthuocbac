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
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'font-satisfy-regular', 'https://fonts.googleapis.com/css?family=Satisfy', array() );
	// Load our main stylesheet.
	wp_enqueue_style( 'dongy-style', get_stylesheet_uri() );
	//Javascript file
	wp_enqueue_script('jquery-script', get_stylesheet_directory_uri() . '/js/jquery-1.11.3.js', array(), '1.0.0' );
	wp_enqueue_script('menu-script', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '1.0.0.0' );
	wp_enqueue_script('dongy-script', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '1.0.0.0' );
}
add_action( 'wp_enqueue_scripts', 'dongy_scripts' );


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

if ( ! function_exists( 'dongy_sharing' ) ) :
function dongy_sharing($url) {
	$content .= '<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=841394139216651";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';	
	if(is_single()) {
		$content .= '<div class="fb-send" data-href="' . $url . '"></div>';
	}
	$content .= '<div class="fb-share-button" data-href="' . $url . '" data-layout="button"></div>';
	$content .= '<div class="fb-like" data-href="' . $url . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>';	
	echo '<div class="social"> ' . $content . ' </div>';	
}
endif;
function contact_information(){
	$str = "";
	if ( !is_sticky() && !is_page() )
	{
		$str .= '<blockquote><p>Thông tin chỉ mang tính chất tham khảo, không phải là các tư vấn y tế, vui lòng tham khảo ý kiến của bác sĩ trước khi sử dụng.</p></blockquote>';
	}
	$str .= '<div class="end-post-box-contact">
				<p><strong>Quý khách có nhu cầu mua thuốc hoặc cần được tư vấn vui lòng liên hệ:</strong></p>
				<p>
				<strong>- Tại Phú Yên - Tuy Hòa</strong><br>
				YS. Nguyễn Đình Tuân - YS. Phan Vũ Như Nguyện<br>
				ĐT: 01236910957<br><br>
				<strong>- Tại TP Hồ Chí Minh</strong><br>
				Tư vấn: Ninh Thế Anh<br>
				ĐC: 59/33 Mã Lò, P. Binh Trị Đông A, Q. Bình Tân<br>
				ĐT: 098.368.7979
				</p>
				<div style="text-align: center;">
					<div class="separator_wrapper wow bounceIn animated" data-wow-duration="0.7s" data-wow-delay="0.7s" style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.7s; animation-name: bounceIn;">
			            <div class="separator_first_circle">
			            <img src="' . get_template_directory_uri() . '/images/green-flower.png" alt="green flower">
			            </div>
			        </div>
		        </div>
				<p><em>Người bệnh hoặc người nhà bệnh nhân có thể điện thoại nói về bệnh tình và được Đông Y Đình Tuân tư vấn, sau đó Nhà thuốc gửi thuốc qua chuyển phát nhanh ( hoặc ô tô) đến cho khách hàng.</em></p>
			</div>';
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
function catch_first_image_in_content($post_content) {				
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);
	$first_img = $matches[1][0];
	if(empty($first_img)) {
		$first_img = get_template_directory_uri() . "/images/no-image-found.jpg";
	}
	else
	{
		$first_img = get_template_directory_uri() . '/timthumb.php?src=' . urlencode($first_img) . '&h=150&w=150&zc=1';
	}				
	return $first_img;
}