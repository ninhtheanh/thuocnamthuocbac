<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage dongy
 * @since dongy 1.0
 */
get_header(); ?>

<div id="main" class="container clearfix">
	<div id="container">
		<div id="primary" class="no-margin-left">
			<div id="content">
			
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php
				$page_load = "page"; //default page is content-page.php
				$pagename = get_query_var('pagename');				
				if($pagename == "sitemap")
					$page_load = "sitemap";
				// Start the loop.				
				while ( have_posts() ) : the_post();					
					get_template_part( 'templates/content', $page_load );					
				// End the loop.
				endwhile;

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'templates/content', 'none' );

			endif;
			?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_sidebar( 'content' ); ?>
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>
