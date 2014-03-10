<?php
// -- include/functions/utilities.php
// ---------------------------------------------------------------------------------------------

/**
 * string get_permalink_by_slug( string $slug [, string $post_type = 'post'] )
 * Retrieves the permalink of the post with the given slug and post type.
 *
 * @param   string  $slug       The post slug.
 * @param   string  $post_type  The post type (shocking, I know).
 *
 * @return  string              The generated permalink.
 * ------------------------------------------------------------------------------------------ */
function get_permalink_by_slug( $slug, $post_type = 'post' )
{
  if ( empty( $slug ) )
    return;

  global $wpdb;
  $sql = $wpdb->prepare(
    'SELECT `ID` FROM `%1$s` WHERE `post_type`="%2$s" AND `post_name`="%3$s" AND `post_status`="publish";',
    $wpdb->posts,
    $post_type,
    $slug
  );

  $ID = $wpdb->get_var( $sql );
  if ( !empty( $ID ) )
    return get_permalink( $ID );
}
