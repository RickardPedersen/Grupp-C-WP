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

	<div class="entry-content">

	<!-- Våra custom fields START -->
	<?php the_title( '<div class="mb-5"><h1 class="entry-title">', '</h1></div>' ); ?>
	<?php include "gallery.php"; ?><br>
	<div id="estate-facts">
	<div class="d-flex flex-column border border-solid p-2 m-3 mb-5 rounded">
	<div><h5 class="pt-2 pb-2">Fakta om bostaden</h5></div>
	<div class="row">
	<div class="m-1 ml-3"><?php echo get_post_meta( $post->ID, 'Adress', true ); ?></div>
	<div class="m-1 ml-3"><?php echo the_category();?></div>
	</div>
	<div class="row">
	<div class="m-1 ml-3">Boarea: <?php echo get_post_meta( $post->ID, 'boarea', true ); ?> m²</div>
	<div class="m-1 ml-3">Utgångspris: <?php echo get_post_meta( $post->ID, 'Utgångsbud', true );?> kr</div>
	<div class="m-1 ml-3">Visningsdatum: <?php echo get_post_meta( $post->ID, 'Visningsdatum', true ); ?></div>

	</div>

	</div>
	<div class="mapouter mb-5"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo get_post_meta( $post->ID, 'Adress', true ); ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.net/blog/elementor-review/">go to elementor pro</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:725px;}</style></div>
	</div>
	<h2 class="mb-5">Beskrivning</h2>
	<p><?php echo get_post_meta( $post->ID, 'fritext1', true ); ?> </p>
	<p><?php echo get_post_meta( $post->ID, 'fritext2', true ); ?> </p>
	<br>
	<br>
	<h2 class="mb-5">Föreningsinformation</h2>
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
