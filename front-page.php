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
 * @package sparkling
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) {
				$i = 0;
				while ( have_posts() ) {
					the_post();

					if ($i == 0) {
						//First post
						echo '<div class="row">';
						echo '<div class="col-sm-12">';

						get_template_part( 'content', get_post_format() );

						echo '</div>';
						echo '</div>';
					} elseif ($i % 2 == 1) {
						echo '<div class="row">';
						echo '<div class="col-sm-6">';

						get_template_part( 'content', get_post_format() );

						echo '</div>';
					} else {
						echo '<div class="col-sm-6">';

						get_template_part( 'content', get_post_format() );

						echo '</div>';
						echo '</div>';
					}
					$i++;
				}
				sparkling_paging_nav();
			} else {
			 	get_template_part( 'content', 'none' );
			}
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>