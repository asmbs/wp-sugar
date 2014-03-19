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
  unregister_widget( 'WP_Widget_Calendar' );
  unregister_widget( 'WP_Widget_Archives' );
}
add_action( 'widgets_init', 'unregister_bloggy_widgets' );
