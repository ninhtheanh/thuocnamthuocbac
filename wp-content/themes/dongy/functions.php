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
		$dongy_header_title = __( 'Search Results for: ' . get_search_query(), 'dongy' );
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

if ( ! function_exists( 'dongy_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * @since Dong Y 1.0
 */
function dongy_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'dongy' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'dongy' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			_x( 'Posted on', 'Used before publish date.', 'dongy' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( 'Author', 'Used before post author name.', 'dongy' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'dongy' ) );
		if ( $categories_list && dongy_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Categories', 'Used before category names.', 'dongy' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'dongy' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags', 'Used before tag names.', 'dongy' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			_x( 'Full size', 'Used before full size attachment link.', 'dongy' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'dongy' ), get_the_title() ) );
		echo '</span>';
	}
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
	$content .= '<div class="fb-share-button" data-href="' . $url . '"></div>';
	$content .= '<div class="fb-like" data-href="' . $url . '" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>';	
	echo '<div class="social"> ' . $content . ' </div>';	
}
endif;
function contact_information(){
	$str = '<div class="end-post-box-contact">
				<p><strong>Mọi chi tiết xin liên hệ:</strong></p>
				<p>ĐC:&nbsp;59/33 Mã Lò, P. Binh Trị Đông A, Q. Bình Tân<br>
				ĐT:&nbsp;098.368.7979</p>
				<p>Người bệnh hoặc người nhà bệnh nhân có thể điện thoại nói về bệnh tình và được ThuocNamThuocBac&nbsp;tư vấn, sau đó Nhà thuốc gửi thuốc qua chuyển phát nhanh ( hoặc ô tô) đến cho khách hàng.</p>
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

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('Previous'),
    'next_text'       => __('Next'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . ": </span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}