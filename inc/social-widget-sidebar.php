<?php 

// register social widget
function register_social_widget_sidebar() {
    register_widget( 'social_widget_sidebar' );
}
add_action( 'widgets_init', 'register_social_widget_sidebar' );


/**
 * Adds social_widget_sidebar widget.
 */
class social_widget_sidebar extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'social_widget_sidebar', // Base ID
      __( 'Social Icons Sidebar', 'zen-life' ), // Name
      array( 'description' => __( 'Social Icons for the sidebar', 'zen-life' ), ) // Args
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
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
 
    $facebook = esc_url( $instance['facebook'] );
    $twitter = esc_url( $instance['twitter'] );
    $pinterest = esc_url( $instance['pinterest'] );
    $instagram = esc_url( $instance['instagram'] );
    $googleplus = esc_url( $instance['googleplus'] );
    $yelp = esc_url( $instance['yelp'] );
    $youtube = esc_url( $instance['youtube'] );
    $linkedin = esc_url( $instance['linkedin'] );

    echo sprintf( '<div class="social-sidebar-widget">');

    if ( ! empty( $instance['facebook'] ) ) {
      echo sprintf( '<a href="' . $facebook . '"><i class="fa fa-facebook-square"></i></a> <a href="' . $facebook . '">Facebook</a><br />');
    }

    if ( ! empty( $instance['twitter'] ) ) {
      echo sprintf( '<a href="' . $twitter . '"><i class="fa fa-twitter-square"></i></a> <a href="' . $twitter . '">Twitter</a><br />');
    }

    if ( ! empty( $instance['pinterest'] ) ) {
      echo sprintf( '<a href="' . $pinterest . '"><i class="fa fa-pinterest-square"></i></a> <a href="' . $pinterest . '">Pinterest</a><br />');
    }

    if ( ! empty( $instance['instagram'] ) ) {
      echo sprintf( '<a href="' . $instagram . '"><i class="fa fa-instagram"></i></a> <a href="' . $instagram . '">Instagram</a><br />');
    }

    if ( ! empty( $instance['googleplus'] ) ) {
      echo sprintf( '<a href="' . $googleplus . '"><i class="fa fa-google-plus-square"></i></a> <a href="' . $googleplus . '">Google+</a><br />');
    }

    if ( ! empty( $instance['yelp'] ) ) {
      echo sprintf( '<a href="' . $yelp . '"><i class="fa fa-yelp"></i></a> <a href="' . $yelp . '">Yelp</a><br />');
    }

    if ( ! empty( $instance['youtube'] ) ) {
      echo sprintf( '<a href="' . $youtube . '"><i class="fa fa-youtube-square"></i></a> <a href="' . $youtube . '">YouTube</a><br />');
    }

    if ( ! empty( $instance['linkedin'] ) ) {
      echo sprintf( '<a href="' . $linkedin . '"><i class="fa fa-linkedin-square"></i></a> <a href="' . $linkedin . '">LinkedIn</a>');
    }

    echo sprintf( '</div>');

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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Follow Us', 'zen-life' );
    $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : __( '', 'zen-life' );
    $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : __( '', 'zen-life' );
    $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : __( '', 'zen-life' );
    $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : __( '', 'zen-life' );
    $googleplus = ! empty( $instance['googleplus'] ) ? $instance['googleplus'] : __( '', 'zen-life' );
    $yelp = ! empty( $instance['yelp'] ) ? $instance['yelp'] : __( '', 'zen-life' );
    $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : __( '', 'zen-life' );
    $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : __( '', 'zen-life' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Follow Us', 'zen-life' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" 
    value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('facebook_field'); ?>"><?php _e('Enter the URL for your Facebook page', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('facebook_field'); ?>" name="<?php echo $this->get_field_name('facebook_field'); ?>" type="text" 
    value="<?php echo esc_attr( $facebook ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('twitter_field'); ?>"><?php _e('Enter the URL for your Twitter profile', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('twitter_field'); ?>" name="<?php echo $this->get_field_name('twitter_field'); ?>" type="text" 
    value="<?php echo esc_attr( $twitter ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('pinterest_field'); ?>"><?php _e('Enter the URL for your Pinterest page', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('pinterest_field'); ?>" name="<?php echo $this->get_field_name('pinterest_field'); ?>" type="text" 
    value="<?php echo esc_attr( $pinterest ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('instagram_field'); ?>"><?php _e('Enter the URL for your Instagram profile', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('instagram_field'); ?>" name="<?php echo $this->get_field_name('instagram_field'); ?>" type="text" 
    value="<?php echo esc_attr( $instagram ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('googleplus_field'); ?>"><?php _e('Enter the URL for your Google Plus profile', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('googleplus_field'); ?>" name="<?php echo $this->get_field_name('googleplus_field'); ?>" type="text" 
    value="<?php echo esc_attr( $googleplus ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('yelp_field'); ?>"><?php _e('Enter the URL for your Yelp page', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('yelp_field'); ?>" name="<?php echo $this->get_field_name('yelp_field'); ?>" type="text" 
    value="<?php echo esc_attr( $yelp ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('youtube_field'); ?>"><?php _e('Enter the URL for your YouTube page', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('youtube_field'); ?>" name="<?php echo $this->get_field_name('youtube_field'); ?>" type="text" 
    value="<?php echo esc_attr( $youtube ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linkedin_field'); ?>"><?php _e('Enter the URL for your LinkedIn profile', 'zen-life'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linkedin_field'); ?>" name="<?php echo $this->get_field_name('linkedin_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linkedin ); ?>" />
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
    $instance['facebook'] = strip_tags( $new_instance['facebook_field'] );
    $instance['twitter'] = strip_tags( $new_instance['twitter_field'] );
    $instance['pinterest'] = strip_tags( $new_instance['pinterest_field'] );
    $instance['instagram'] = strip_tags( $new_instance['instagram_field'] );
    $instance['googleplus'] = strip_tags( $new_instance['googleplus_field'] );
    $instance['yelp'] = strip_tags( $new_instance['yelp_field'] );
    $instance['youtube'] = strip_tags( $new_instance['youtube_field'] );
    $instance['linkedin'] = strip_tags( $new_instance['linkedin_field'] );
    return $instance;
  }

} // class social_widget_sidebar

?>