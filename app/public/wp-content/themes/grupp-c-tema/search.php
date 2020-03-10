<?php
/**
 * The template for displaying search results pages
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">
	<?php get_sidebar( 'estate-bar' ); ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" class="d-flex" tabindex="-1">
		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

							<h1 class="page-title">
								<?php
								echo 'Sökresultat:';
								?>
							</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */
					?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php
						if ( isset( $_GET['minRoom'] ) || isset( $_GET['maxRoom'] ) || isset( $_GET['minCost'] ) || isset( $_GET['maxCost'] ) ) {
							$post_rooms = get_post_meta( $post->ID, 'antal_rum', true );
							$min_rooms  = sanitize_text_field( wp_unslash( $_GET['minRoom'] ) );
							$max_rooms  = sanitize_text_field( wp_unslash( $_GET['maxRoom'] ) );

							$post_cost = get_post_meta( $post->ID, 'Utgångsbud', true );
							$min_cost  = sanitize_text_field( wp_unslash( $_GET['minCost'] ) );
							$max_cost  = sanitize_text_field( wp_unslash( $_GET['maxCost'] ) );

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							if ( $max_rooms == '' && $post_rooms >= $min_rooms ) {
								if ( $max_cost == '' && $post_cost >= $min_cost ) {
									get_template_part( 'loop-templates/content', 'search' );
								} elseif ( $post_cost >= $min_cost && $post_cost <= $max_cost ) {
									get_template_part( 'loop-templates/content', 'search' );
								}
							} elseif ( $post_rooms >= $min_rooms && $post_rooms <= $max_rooms ) {
								if ( $max_cost == '' && $post_cost >= $min_cost ) {
									get_template_part( 'loop-templates/content', 'search' );
								} elseif ( $post_cost >= $min_cost && $post_cost <= $max_cost ) {
									get_template_part( 'loop-templates/content', 'search' );
								}
							}
						} else {
							get_template_part( 'loop-templates/content', 'search' );
						}
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->

			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #search-wrapper -->

<?php get_footer();
