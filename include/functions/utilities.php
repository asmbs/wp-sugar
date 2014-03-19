<?php
// -- include/functions/utilities.php
// ---------------------------------------------------------------------------------------------


/**
 * void predump( mixed $var )
 * Dumps the contents of a variable wrapped in <pre> tags for easier debugging.
 *
 * @param   mixed  $var  The variable being dumped.
 * ------------------------------------------------------------------------------------------ */
function predump( $var )
{
  echo '<pre>'. print_r( $var, true ) .'</pre>'."\n";
}


/**
 * void quickdump( mixed $var )
 * Alias of predump(), included since that's what we're used to calling it.
 *
 * @deprecated  0.1.0
 * ------------------------------------------------------------------------------------------ */
function quickdump( $var )
{
  predump( $var );
}


/**
 * mixed get_version_hash( string $filepath [, int $length = 7 [, string $alg = 'sha1']] )
 * Generates a unique hash using hash_file() that can be used for file versioning/caching.
 *
 * @param   string  $filepath  Absolute server path to the file.
 * @param   int     $length    Trim the hash to the specified length.
 * @param   string  $alg       The hash algorithm to use.
 *
 * @return  string|bool        The trimmed string, or FALSE if $filepath doesn't exist.
 * ------------------------------------------------------------------------------------------ */
function get_version_hash( $filepath, $length = 7, $alg = 'sha1' )
{
  if ( !file_exists( $filepath ) )
    return false;

  $hash = hash_file( $alg, $filepath );

  if ( strlen( $hash ) > $length )
    $hash = substr( $hash, 0, $length );

  return $hash;
}


/**
 * string minify( string $html )
 * Strips extraneous whitespace from a chunk of HTML.
 *
 * @param   string  $html  The HTML to minify.
 *
 * @return  string         The minified HTML.
 * ------------------------------------------------------------------------------------------ */
function minify( $html )
{
  // Remove whitespace between tags
  $html = preg_replace( '/(?<=\>)[\r\n\t]+(?=\<)/', '', $html );

  // Restrict whitespace between the beginning/end of a tag and text
  $html = preg_replace( '/(?<=\>)[\r\n\t\s]+(?=[^\<])/', ' ', $html );
  $html = preg_replace( '/(?<=[^\>])[\r\n\t\s]+(?=\<)/', ' ', $html );

  // Remove linebreaks in blocks of text
  $html = preg_replace( '/(?<=[^\-\<\>])[\r\n\t\s]+(?=[^\-\<\>])/', ' ', $html );
  
  return $html;
}
