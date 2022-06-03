<?php
/*
Plugin Name: Dialer Widget Plugin
Description: Version 2.0.0 of the Telnyx API
*/

// Register and load the widget
function dialer_load_widget() {
    register_widget( 'dialer_widget' );
}
add_action( 'widgets_init', 'dialer_load_widget' );

// The widget Class
class dialer_widget extends WP_Widget {

  function __construct() {
    parent::__construct(

      // Base ID of your widget
      'dialer_widget',

      // Widget name will appear in UI
      __('dialer Widget', 'dialer_widget_domain'),

      // Widget description
      array( 'description' => __( 'Show dialer Details in a Widget', 'dialer_widget_domain' ), )
    );
  }

  // Creating widget front-end view
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );

    //Only show to me during testing - replace the Xs with your IP address if you want to use this
    //if ($_SERVER['REMOTE_ADDR']==="xxx.xxx.xxx.xxx") {

      // before and after widget arguments are defined by themes
      echo $args['before_widget'];
      if ( ! empty( $title ) ) echo $args['before_title'] . $title . $args['after_title'];