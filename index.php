<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 */

get_header(); ?>

<div id="primary test" class="content-area">
	<main id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php 
			$day_check = '';
			while ( have_posts() ) : the_post(); 
			$day = get_the_date('j');
			if ($day != $day_check) {
				echo '<div class="dtd-date">' . get_the_date() . '</div>';
			}				
			?>

				<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
				?>

			<?php 	
			$day_check = $day;
			endwhile; ?>

			<?php independent_publisher_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main>
	<!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
