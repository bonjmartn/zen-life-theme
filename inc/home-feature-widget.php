<?php 

// register homefeature widget
function register_homefeature_widget() {
    register_widget( 'homefeature_widget' );
}
add_action( 'widgets_init', 'register_homefeature_widget' );


/**
 * Adds homefeature_Widget widget.
 */
class homefeature_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'homefeature_widget', // Base ID
      __( 'Homepage Feature', 'zen-life' ), // Name
      array( 'description' => __( 'Featured content with a button and space for an image on the homepage', 'zen-life' ), ) // Args
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
    echo ( '<div class="homepage-3-boxes">');

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    // if the button text field is set
    $text = sanitize_text_field( $instance['text'] );
    $link = esc_url( $instance['link'] );
    $imgurl = esc_url( $instance['imgurl'] );    

    if ( ! empty( $instance['imgurl'] ) ) {
      echo sprintf( '<a href="' . $link . '"><img src="' . $imgurl . '"></a>');
      echo sprintf( '<a href="' . $link . '"><button>' . $text . '</button></a>');
    }

    echo ( '</div>');

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Feature Title', 'zen-life' );
    $text = ! empty( $instance['text'] ) ? $instance['text'] : __( 'Button Text', 'zen-life' );
    $link = ! empty( $instance['link'] ) ? $instance['link'] : __( 'Button Link', 'zen-life' );
    $imgurl = ! empty( $instance['imgurl'] ) ? $instance['imgurl'] : __( 'Image URL from Media Library', 'zen-life' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'zen-life' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('img_field'); ?>"><?php _e('Paste the URL of an image', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('img_field'); ?>" name="<?php echo $this->get_field_name('img_field'); ?>" type="text" 
    value="<?php echo esc_attr( $imgurl ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('text_field'); ?>"><?php _e('Enter the text for the button', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('text_field'); ?>" name="<?php echo $this->get_field_name('text_field'); ?>" type="text" 
    value="<?php echo esc_attr( $text ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('link_field'); ?>"><?php _e('Enter the URL for the button', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('link_field'); ?>" name="<?php echo $this->get_field_name('link_field'); ?>" type="text" 
    value="<?php echo esc_attr( $link ); ?>" />
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
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['text'] = strip_tags( $new_instance['text_field'] );
    $instance['link'] = strip_tags( $new_instance['link_field'] );
    $instance['imgurl'] = strip_tags( $new_instance['img_field'] );
    return $instance;
  }

} // class homefeature_Widget
