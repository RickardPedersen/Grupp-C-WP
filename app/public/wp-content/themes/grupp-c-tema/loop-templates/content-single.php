<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		

		<div class="entry-meta">

			<?php // understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

	<!-- Våra custom fields START -->
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<div id="estate-facts">
	<div class="d-flex flex-column border border-solid p-2">
	<div><h5>Fakta om bostaden</h5></div>
	<div class="row">
	<div class="m-2 ml-3">Adress: <?php echo get_post_meta( $post->ID, 'Adress', true ); ?></div>
	<div class="m-2 ml-3">Visningsdatum: <?php echo get_post_meta( $post->ID, 'Visningsdatum', true ); ?></div>
	</div>
	<div class="row">
	<div class="m-2 ml-3">Boarea: <?php echo get_post_meta( $post->ID, 'boarea', true ); ?></div>
	<div class="m-2 ml-3">Utgångspris: <?php echo get_post_meta( $post->ID, 'Utgångsbud', true ); ?></div>
	</div>
	</div>
	</div>
	<p><?php echo get_post_meta( $post->ID, 'Adress', true ); ?> </p>
	<p><?php echo get_post_meta( $post->ID, 'fritext1', true ); ?> </p>
	<?php include "gallery.php"; ?><br>
	<p><?php echo get_post_meta( $post->ID, 'fritext2', true ); ?> </p>
	<br>
	<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo get_post_meta( $post->ID, 'Adress', true ); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/elementor-review/">go to elementor pro</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
	<br>
	<h2>Föreningsinformation</h2>
	<p><?php echo get_post_meta( $post->ID, 'fritext3', true ); ?> </p>


		
	<!-- Våra custom fields SLUT -->
		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
