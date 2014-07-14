<?php
/**
 * Plugin Name: Sugar
 * Description: Sweeten the WordPress core with functions you always wish you had.
 * Author:      ASMBS
 * Author URI:  https://github.com/asmbs
 * License:     MIT License
 * License URI: http://opensource.org/licenses/MIT
 * Version:     0.4.0
 */

// Don't forget, plugin_dir_path adds a trailing slash.
define( 'SUGAR_PATH', plugin_dir_path( __FILE__ ) );

// Include stuff
include_once SUGAR_PATH .'include/functions/shortcode.php';
include_once SUGAR_PATH .'include/functions/template.php';
include_once SUGAR_PATH .'include/functions/utilities.php';
include_once SUGAR_PATH .'include/functions/widgets.php';

// Wait...that's it?!
