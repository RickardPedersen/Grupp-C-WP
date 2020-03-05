<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">
	<?php get_sidebar( 'estate-bar' ); ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" class="d-flex" tabindex="-1">

		<div class="row">
			<?php
			/*
			$wp_query = new WP_Query(
				array(
					'posts_per_page' => 5,
					'post_type'      => 'sales-objects',
				)
			);

			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				?>
				<li><?php the_title(); ?></li>
				<?php
			}
			*/
			?>

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>


			<main class="site-main" id="main">

				<?php
				$wp_query = new WP_Query(
					array(
						'posts_per_page' => 5,
						'post_type'      => 'sales_object',
						'cat' => get_query_var( 'cat' ),
						'paged' => $paged,
					)
				);

				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					?>


					<div class="object-summary d-flex row">
						<a class="objects-summary__date t-center" href="<?php the_permalink(); ?>">
							<span class="objects-summary__day"><span>
						</a>
						<div class="objects-summary__content shadow m-2" style="background-image:url('<?php get_the_post_thumbnail_url( $wp_query ); ?>')">
							<div class="objects-summary__thumbnail pl-2 pr-2 pt-2"><?php the_post_thumbnail(); ?></div><br>
							<div class="row pl-4">
								<button class="ml-3 btn btn-dark  m-1"><?php echo get_post_meta( $post->ID, 'antal_rum', true ); ?></button>
								<button class="ml-1 btn btn-dark  m-1"><?php echo get_post_meta( $post->ID, 'boarea', true ); ?></button>
								<button class="ml-1 btn btn-dark  m-1">Utgångspris: <?php echo get_post_meta( $post->ID, 'Utgångsbud', true ); ?></button>
							</div>
							<h5 class="event-summary__title headline headline--tiny pl-4 mt-4"><a href="<?php the_permalink(); ?>">
									<?php the_title(); ?></a></h5>
							<p class=" pl-4 pb-4 pr-4"><?php echo wp_trim_words( get_the_content(), 35 ); ?> <a class="text-primary" href="<?php the_permalink(); ?>" class="text-light">Läs mer</a></p>
						</div>
					</div>

					<?php
				}
				?>
			</main><!-- #main -->
			<!-- The pagination component -->

			<?php
			understrap_pagination();
			?>


			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->


<?php
get_footer();
