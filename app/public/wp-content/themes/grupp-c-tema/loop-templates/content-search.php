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


					<div class="object-summary d-flex row">
						<a class="objects-summary__date t-center" href="<?php the_permalink(); ?>">
							<span class="objects-summary__day"><span>
						</a>
						<div class="objects-summary__content shadow m-2" style="background-image:url('<?php get_the_post_thumbnail_url( $wp_query ); ?>')">
							<div class="objects-summary__thumbnail pl-2 pr-2 pt-2"><?php the_post_thumbnail(); ?></div><br>
							<div class="row pl-4">
								<button class="ml-3 btn btn-dark  m-1"><?php echo get_post_meta( $post->ID, 'antal_rum', true ); ?> Rum & kök</button>
								<button class="ml-1 btn btn-dark  m-1"><?php echo get_post_meta( $post->ID, 'boarea', true ); ?> Kvm</button>
								<button class="ml-1 btn btn-dark  m-1"><?php echo number_format( $utg_bud, 0, null, ' ' ); ?> kr</button>
							</div>
							<h5 class="event-summary__title headline headline--tiny pl-4 mt-4"><a href="<?php the_permalink(); ?>">
									<?php the_title(); ?></a></h5>
							<p class=" pl-4 pb-4 pr-4"><?php echo wp_trim_words( get_the_content(), 35 ); ?> <a class="text-primary" href="<?php the_permalink(); ?>" class="text-light">Läs mer</a></p>
						</div>
					</div>




