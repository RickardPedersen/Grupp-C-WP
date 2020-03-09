<?php
/**
 * Search results partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<?php
$utg_bud = get_post_meta( $post->ID, 'Utgångsbud', true );
?>

<div class="card mb-3">
	<div class="row no-gutters">
		<div class="col-md-4">
			<img src="<?php echo esc_html( get_the_post_thumbnail_url() ); ?>" class="card-img" alt="picture of sales object">
		</div>
		<div class="col-md-8">
			<div class="card-body">
				<a href="<?php the_permalink(); ?>">
					<h5 class="card-title"><?php the_title(); ?></h5>
				</a>
				<button class="btn btn-dark"><?php echo esc_html( get_post_meta( $post->ID, 'antal_rum', true ) ); ?> Rum & kök</button>
				<button class="btn btn-dark"><?php echo esc_html( get_post_meta( $post->ID, 'boarea', true ) ); ?> m²</button>
				<button class="btn btn-dark"><?php echo number_format( $utg_bud, 0, null, ' ' ); ?> kr</button>
				<p class="card-text"><?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?> <a class="text-primary" href="<?php the_permalink(); ?>" class="text-light">Läs mer</a></p>
			</div>
		</div>
	</div>
</div>
