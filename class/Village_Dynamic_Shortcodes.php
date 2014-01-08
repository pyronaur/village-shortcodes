<?php


class Village_Dynamic_Shortcodes {
	
	/* -----------------------------------*/
	/* 		Advanced Functionality
	/* -----------------------------------*/

	// This guy is WILD and doesn't need any protection
	// See Village_Shortcodes.php : Line ~ 27 && function run_shortcodes()
	// p.s. - The WILD_ gets stripped obviously...

	/**
	 * A shortcode wrapper for WP_Query, displays posts.
	 * Surely there are a lot of updates to be made here, this is just an initial version
	 * @param (array) $atts   WP_Query Attributes
	 * @param (string) $content Content displayed by the shortcode
	 */
	function items ( $atts, $content = null ) {
			// Extract Arguments
			$args = shortcode_atts( array(
		                       	
		                       	// Stock WP_Query args
	   		                      "post_type" => "post",
			                      "posts_per_page" => get_option( "posts_per_page" ),
			                      "ignore_sticky_posts" => 1,

			                      "category_name" => null,
			                      "category_in" => null,
			                      "tag" => null,
			                      "tag_id" => null,
			                      "tag__in" => null,

			                    // Modified WP_Query args
			                      "taxonomy" => false,

			                    // Custom Stuff that I have to unset later
			                      'only_with_thumbnails' => false,
			                      'column_width' => 'one-third',
			                      'item_style' => 'box'

		                       ), $atts);

			// Get what we need first
			
			// Column Width
			$column_width = sanitize_html_classes($args['column_width']);
			$item_style = sanitize_html_classes($args['item_style']);
			$post_type = sanitize_html_classes($args['post_type']);
			
			$post_type_style = $post_type . '-' . $item_style;

			// Only posts with Thumbnails ?
			if( $args['only_with_thumbnails'] == "true" ) {
				$args['meta_query'] = array(array('key' => '_thumbnail_id'));
			}


			// Parse Taxonomy
			if ( $args['taxonomy'] !== false ) {
				$taxonomy = explode("=", $args['taxonomy']);

				if ( is_array( $taxonomy ) && count( $taxonomy ) === 2) {
					# taxonomy = $t[0]
					# value = $t[1]
					$args['tax_query'][] = array(
					                           'taxonomy' => sanitize_title( $taxonomy[0] ),
					                           'field' => 'slug',
					                           'terms' => sanitize_title( $taxonomy[1] ),
					                           );
				}



			}

			// Then remove what we took
			unset( 
			      $args['only_with_thumbnails'],
			      $args['column_width'],
			      $args['item_style'],
			      $args['taxonomy']
			      );
			// Then query the post for the rest
			$query = new WP_Query($args);

		// Fetch for errors (die if you have to)
			if ( is_wp_error( $query ) ) {
				return __("There was an error retrieving the data. This most probably due to a incorrect usage of '[village_items]' shortcode usage. ");
			}

		$out = ""; // Set the output to something


		// Check if the theme has a display for the items setup
		if ( has_filter( 'village_print_items' ) ) {
			$out = apply_filters('village_print_items', $query, $atts );
		}
		// Otherwise print our own idea of how items are supposed to look like
		else {

			if( $query -> have_posts() ):
				 ob_start();  // Ye. We'll capture a Template part like this. 
				?>
				<div class="<?php echo $item_style?>-container cf">
				<?php
				 while ( $query -> have_posts() ):
				 	// Setup Post
				 	$query -> the_post();
					
				 	// Add to the display:
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( $post_type_style. ' ' . $item_style . '-item left ' . $column_width ); ?>>
						<?php get_template_part( 'shortcode-templates/' . $item_style, $post_type ); ?>
					</article>
					<?php
				endwhile;
				$out .= ob_get_contents();
				ob_end_clean();

				$out .= "</div>";
				wp_reset_postdata();
			endif;

		}
		
		wp_reset_query();
		return $out;
	}

}
?>