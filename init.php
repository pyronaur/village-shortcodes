<?php
/*
Plugin Name: Village Shortcodes
Plugin URI: http://themevillage.net/shortcodes
Description: Simple Shortcodes for ThemeVillage Themes.
Author: Theme Village
Author URI: http://themevillage.net
Version: 1.0.0
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/



if ( ! function_exists( "sanitize_html_classes" ) && function_exists( "sanitize_html_class" ) ) {
	/**
	 * sanitize_html_class works just fine for a single class
	 * Some times le wild <span class="blue hedgehog"> appears, which is when you need this function,
	 * to validate both blue and hedgehog,
	 * Because sanitize_html_class doesn't allow spaces.
	 *
	 * @uses   sanitize_html_class
	 * @param  (mixed: string/array) $class   "blue hedgehog goes shopping" or array("blue", "hedgehog", "goes", "shopping")
	 * @param  (mixed) $fallback Anything you want returned in case of a failure
	 * @return (mixed: string / $fallback )
	 */
	function sanitize_html_classes( $class, $fallback = null ) {

		// Explode it, if it's a string
		if ( is_string( $class ) ) {
			$class = explode(" ", $class);
		} 


		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map("sanitize_html_class", $class);
			return implode(" ", $class);
		}
		else { 
			return sanitize_html_class( $class, $fallback );
		}
	}
}


require_once( dirname(__FILE__) . "/class/Village_Dynamic_Shortcodes.php" );
require_once( dirname(__FILE__) . "/class/Village_Markup_Shortcodes.php" );

require_once( dirname(__FILE__) . "/class/Village_Shortcodes.php" );
new Village_Shortcodes();