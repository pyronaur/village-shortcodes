<?php

/* ---------------------------------------------------------------*/
/* 	Not a real Class, Singleton, or anything really.
/*  This is just a very nice wrapper for everything, and in the end
/*  Nice is all that matters, right ?
/* ---------------------------------------------------------------*/
class Village_Shortcodes {

	// Available, Protected an Disabled Shortcodes
	private $available_shortcodes;
	private $protected_shortcodes;
	private $disabled_shortcodes;

	// Instance Getter
	static $self;

	// Shortcode Prefix
	public $prefix;


	function __construct() {
		self::$self = $this;
		// Defer on Filtering and Setting up until Wordpress is up and running.
		// We want themes to be able to tap in here after all.
		add_action( 'init', array( &$this, 'init' ) );

	}

	private function create_shortcode($source, $name, $protected = false) {
		// Skip this shortcode if it's in disabled shortcodes...
		if ( in_array( $this -> prefix . $name, $this -> disabled_shortcodes ) ) { return false; }
		else {
			add_shortcode( $this -> prefix . $name, array( $source, $name ) );
		}

		if ( $protected === true ) {
			$this -> protected_shortcodes[] = array( $source, $name );
		}


	}

	public function init() {

		$this -> prefix = apply_filters( 'village_shortcode_prefix', 'village_' );
		$this -> disabled_shortcodes = apply_filters( 'village_disabled_shortcodes', array() );
		
		$dynamic_shortcodes = get_class_methods( 'Village_Dynamic_Shortcodes' );
		$markup_shortcodes = get_class_methods( 'Village_Markup_Shortcodes' );

		foreach ( $dynamic_shortcodes as $shortcode ) {			
			$this -> create_shortcode( "Village_Dynamic_Shortcodes", $shortcode);
		}

		foreach ( $markup_shortcodes as $shortcode ) {			
			$this -> create_shortcode( "Village_Markup_Shortcodes", $shortcode, true);
		}


		add_filter ( 'the_content', array( &$this, 'run_shortcodes' ), 7 );
	}

	/**
	 * Run a shortcode in a clean way
	 *
	 * @param unknown $content Wordpress Post Content
	 * @return $content The Processed Content
	 */
	public function run_shortcodes( $content ) {
		global $shortcode_tags;

		$original_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();

		foreach ( $this -> protected_shortcodes as $shortcode ) {
			$name = $shortcode[1];
			add_shortcode( $this -> prefix . $name , $shortcode );
		}

		// Do only Village_Shortcodes!
		$content = do_shortcode( $content );



		$shortcode_tags = $original_shortcode_tags;

		return $content;
	}


	/**
	 * Get This Instance
	 *
	 * @return (object) Instance
	 */
	public static function get_instance() {
		return self::$self;
	}

}
