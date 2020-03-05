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
<?php get_sidebar('estate-bar'); ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" class="d-flex" tabindex="-1">

		<div class="row">
            <?php $homepageObjects = new WP_Query(array("posts_per_page" => 4,
"post_type" => "sales-objects"));

while($homepageObjects->have_posts()) {
    $homepageObjects->the_post();?>
    <li><?php the_title(); ?></li>
<?php
}
?>

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
			

			<main class="site-main" id="main">
            <?php $homepageObjects = new WP_Query(array("posts_per_page" => 4,
"post_type" => "sales_object"));

    while ($homepageObjects->have_posts()) {
    $homepageObjects->the_post();?>
    <div class="object-summary">
    <a class="objects-summary__date t-center" href="#">
        <span class="objects-summary__day"><span>
        </a>
        <div class="objects-summary__content shadow p-5 m-2 rounded">
            <div class="objects-summary__thumbnail border border-dark rounded"><?php the_post_thumbnail(); ?></div><br>
            <h5 class="event-summary__title headline headline--tiny"><a href="#">
                <?php the_title() ?></a></h5>
                <div class="row">
                <button class="ml-3 btn btn-dark m-1"><?php echo get_post_meta($post->ID, 'antal_rum', true); ?></button>
                
                </div>
                <div class="row">
                <button class="ml-3 btn btn-dark m-1"><?php echo get_post_meta($post->ID, 'boarea', true); ?></button>
                <button class="ml-1 btn btn-dark m-1">Utgångspris: <?php echo get_post_meta($post->ID, 'Utgångsbud', true); ?></button>
                </div><br>
                <p><?php echo wp_trim_words(get_the_content(), 18);?> <a href="#" class="nu gray"
        >Läs mer</a></p></div>
        </div>
        <?php
        }
        ?>
			</main><!-- #main -->
			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
		</div><!-- .row -->

	</div><!-- #content -->
	


</div><!-- #index-wrapper -->


<?php get_footer();

