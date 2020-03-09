<?php
/**
 * Plugin Name: Grupp C Search
 * Plugin URI: https://www.google.com/
 * Description: Search widget and category list widget for real estate page.
 * Version: 1.0.0
 * Author: Grupp C
 * Author URI: https://google.com/
 *
 * @package understrap
 */

/**
 * Adds Search widget.
 */
class Grupp_C_Search extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'grupp_c_search', /* Base ID */
			'Grupp_C_Search', /* Name */
			array( 'description' => __( 'A Search Widget', 'text_domain' ) )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( !empty($title) ) {
			echo $before_title . $title . $after_title;
		}
		?>

		<hr>
		<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'understrap' ); ?></label>
			<div>
			<input class="field form-control" id="s" name="s" type="text" placeholder="Sök efter ort, nyckelord, mm ..." value="<?php the_search_query(); ?>">
				<h5>Antal rum</h5>
				<label>
					Min: 
					<select name="minRoom" id="minRoom">
						<option value="0">Alla</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10+</option>
					</select>
				</label>
				<label>
					Max:
					<select name="maxRoom" id="maxRoom">
						<option value="10">Alla</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10+</option>
					</select>
				</label>
			</div>
			<div>
				<h5>Pris</h5>
				<label>
					Min: 
					<select name="minCost" id="minCost">
						<option value="0">Inget</option>
						<option value="100000">100 000 kr</option>
						<option value="200000">200 000 kr</option>
						<option value="300000">300 000 kr</option>
						<option value="400000">400 000 kr</option>
						<option value="500000">500 000 kr</option>
						<option value="750000">750 000 kr</option>
						<option value="1000000">1 000 000 kr</option>
						<option value="1250000">1 250 000 kr</option>
						<option value="1500000">1 500 000 kr</option>
						<option value="1750000">1 750 000 kr</option>
						<option value="2000000">2 000 000 kr</option>
						<option value="2250000">2 250 000 kr</option>
						<option value="2500000">2 500 000 kr</option>
						<option value="3000000">3 000 000 kr</option>
						<option value="3500000">3 500 000 kr</option>
						<option value="4000000">4 000 000 kr</option>
						<option value="4500000">4 500 000 kr</option>
						<option value="5000000">5 000 000 kr</option>
						<option value="6000000">6 000 000 kr</option>
						<option value="7000000">7 000 000 kr</option>
						<option value="8000000">8 000 000 kr</option>
						<option value="9000000">9 000 000 kr</option>
						<option value="10000000">10 000 000 kr</option>
					</select>
				</label>
				<label>
					Max:
					<select name="maxCost" id="maxCost">
						<option value="none">Inget</option>
						<option value="100000">100 000 kr</option>
						<option value="200000">200 000 kr</option>
						<option value="300000">300 000 kr</option>
						<option value="400000">400 000 kr</option>
						<option value="500000">500 000 kr</option>
						<option value="750000">750 000 kr</option>
						<option value="1000000">1 000 000 kr</option>
						<option value="1250000">1 250 000 kr</option>
						<option value="1500000">1 500 000 kr</option>
						<option value="1750000">1 750 000 kr</option>
						<option value="2000000">2 000 000 kr</option>
						<option value="2250000">2 250 000 kr</option>
						<option value="2500000">2 500 000 kr</option>
						<option value="3000000">3 000 000 kr</option>
						<option value="3500000">3 500 000 kr</option>
						<option value="4000000">4 000 000 kr</option>
						<option value="4500000">4 500 000 kr</option>
						<option value="5000000">5 000 000 kr</option>
						<option value="6000000">6 000 000 kr</option>
						<option value="7000000">7 000 000 kr</option>
						<option value="8000000">8 000 000 kr</option>
						<option value="9000000">9 000 000 kr</option>
						<option value="10000000">10 000 000 kr</option>
					</select>
				</label>
			</div>
			<div class="input-group">
				<span class="input-group-append">
					</span>
				</div>
				<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Sök', 'understrap' ); ?>">
		</form>
		<hr>
		<?php
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
} // class Foo_Widget

add_action( 'widgets_init', 'register_search' );

/**
 * Register Search_Widget widget
 */
function register_search() {
	register_widget( 'Grupp_C_Search' );
}

/**
 * Adds Category widget.
 */
class Category_List extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'category_list', /* Base ID */
			'Category_List', /* Name */
			array( 'description' => __( 'Category list', 'text_domain' ) )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>

		<hr>
		<div class="list-group">
			<?php
			$cat_arr     = get_categories();
			$page_object = get_queried_object();
			foreach ( $cat_arr as $cat_item ) {
				?>
				<a href="<?php echo esc_html( get_category_link( $cat_item ) ); ?>" class="list-group-item list-group-item-action <?php if ($page_object->cat_ID === $cat_item->cat_ID) echo 'active'; ?>"><?php echo esc_html( $cat_item->name ); ?></a>
			<?php } ?>
		</div>
		<?php
		echo $after_widget;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
} // class Foo_Widget

add_action( 'widgets_init', 'register_category_list' );

/**
 * Register Category_List widget
 */
function register_category_list() {
	register_widget( 'Category_List' );
}
