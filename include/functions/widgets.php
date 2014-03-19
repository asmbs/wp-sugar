<?php
// -- include/functions/widgets.php
// ---------------------------------------------------------------------------------------------


/**
 * void unregister_bloggy_widgets()
 * Hooks into widgets_init to get rid of all those bloggy widgets that people only use when
 * they're actually using WordPress as a blog platform.
 * ------------------------------------------------------------------------------------------ */
function unregister_bloggy_widgets()
{
  unregister_widget( 'WP_Widget_Archives' );
  unregister_widget( 'WP_Widget_Calendar' );
  unregister_widget( 'WP_Widget_Categories' );
  unregister_widget( 'WP_Widget_Meta' );
  unregister_widget( 'WP_Widget_Pages' );
  unregister_widget( 'WP_Widget_Recent_Comments' );
  unregister_widget( 'WP_Widget_Recent_Posts' );
  unregister_widget( 'WP_Widget_RSS' );
  unregister_widget( 'WP_Widget_Search' );
  unregister_widget( 'WP_Widget_Tag_Cloud' );

  unregister_widget( 'WP_Nav_Menu_Widget' );
}
add_action( 'widgets_init', 'unregister_bloggy_widgets' );
