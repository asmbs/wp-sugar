<?php
// -- include/functions/shortcode.php
// ---------------------------------------------------------------------------------------------

/**
 * string shortcode_link_by_slug( array $attrs [, string $content = ''] )
 * Generates a link using the given slug and, optionally, post type.
 *
 * @param   array   $attrs    The attributes provided in the shortcode.
 * @param   string  $content  The content of the shortcode.
 *
 * @return  string            The parsed, post-shortcode content.
 * ------------------------------------------------------------------------------------------ */
function shortcode_link_by_slug( $attrs, $content = '' )
{
  // If the slug attribute isn't provided, just send back the text inside the shortcode
  // because a link can't be generated.
  if ( empty( $attrs['slug'] ) )
    return $content;

  // Get post type if it was provided, or default to page.
  $post_type = isset( $attrs['type'] ) ? $attrs['type'] : 'page';

  // Get the permalink.
  $permalink = get_permalink_by_slug( $attrs['slug'], $post_type );

  // Return the link.
  return sprintf( '<a href="%1$s">%2$s</a>', $permalink, $content );
}
add_shortcode( 'link', 'shortcode_link_by_slug' );
