<?php

namespace AmirSasani\RealtynaTest\PostTypes;

use WP_Widget;

class MoviesCountWidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'realtyna_test_movies_count',
            __('Movies Count Widget', 'realtyna-test'),
            ['description' => __('Display Movies widget', 'realtyna-test')]
        );


    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];

        //if title is present
        if (!empty ($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $moviesCount = 0;

        //output
        echo sprintf(__('There are %d Movies!', 'realtyna-test'), $moviesCount);

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Movies Count', 'realtyna-test' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}