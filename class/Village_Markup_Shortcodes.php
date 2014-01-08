<?php
/**
 * Village Markup Language
 * It's basically a wrapper for Village Shortcodes that are directly related to HTML
 */

/*
> one-whole
> one-half
> one-third
> two-thirds
> one-fourth
> two-fourths
> three-fourths
> one-fifth
> two-fifths
> three-fifths
> four-fifths
> one-sixth
> two-sixths
> three-sixths
> four-sixths
> five-sixths
> one-eighth
> two-eighths
> three-eighths
> four-eighths
> five-eighths
> six-eighths
> seven-eighths
> one-tenth
> two-tenths
> three-tenths
> four-tenths
> five-tenths
> six-tenths
> seven-tenths
> eight-tenths
> nine-tenths
> one-twelfth
> two-twelfths
> three-twelfths
> four-twelfths
> five-twelfths
> six-twelfths
> seven-twelfths
> eight-twelfths
> nine-twelfths
> ten-twelfths
> eleven-twelfths
*/
class Village_Markup_Shortcodes {

/* -----------------------------------*/
/* 		Class Variables
/* -----------------------------------*/
	static $available_iconfonts = array(
		"000" => "speech-bubble-left",
		"001" => "speech-bubble-center",
		"002" => "speech-bubble-right",
		"003" => "speech-bubble-left-2",
		"004" => "speech-bubble-center-2",
		"005" => "speech-bubble-right-2",
		"006" => "speech-bubble-left-3",
		"007" => "speech-bubble-center-3",
		"008" => "speech-bubble-right-3",
		"009" => "spech-bubble-left-4",
		"00A" => "speech-bubble-right-4",
		"00B" => "browser",
		"00C" => "browser-new-window",
		"00D" => "browser-minimise",
		"00E" => "browser-close",
		"010" => "browser-upload",
		"011" => "browser-download",
		"012" => "terminal",
		"013" => "browser-windows",
		"014" => "browser-2",
		"015" => "browser-new-window-2",
		"016" => "browser-minimise-2",
		"017" => "browser-close-2",
		"018" => "browser-upload-2",
		"019" => "browser-download-2",
		"01A" => "terminal-2",
		"01B" => "browser-windows-2",
		"01C" => "windows",
		"01D" => "plus",
		"01E" => "minus",
		"020" => "marquee",
		"021" => "marquee-plus",
		"022" => "marquee-minus",
		"023" => "marquee-pull-up",
		"024" => "marquee-pull-down",
		"025" => "crate",
		"026" => "grid",
		"027" => "grid-2",
		"028" => "list",
		"029" => "list-2",
		"02A" => "in",
		"02B" => "out",
		"02C" => "inbox",
		"02D" => "outbox",
		"02E" => "outgoing",
		"030" => "paragraph-justify",
		"031" => "paragraph-left",
		"032" => "paragraph-center",
		"033" => "paragraph-right",
		"034" => "paragraph-justify-2",
		"035" => "paragraph-left-2",
		"036" => "paragraph-center-2",
		"037" => "paragraph-right-2",
		"038" => "audio-mute",
		"039" => "audio-low",
		"03A" => "audio-mid",
		"03B" => "audio-high",
		"03C" => "brightness-high",
		"03D" => "brightness-low",
		"03E" => "contrast",
		"040" => "image",
		"041" => "video",
		"042" => "video-2",
		"043" => "user",
		"044" => "user-2",
		"045" => "users",
		"046" => "user-3",
		"047" => "polaroid",
		"048" => "polaroid-2",
		"049" => "heart-full",
		"04A" => "heart-half",
		"04B" => "heart-empty",
		"04C" => "settings",
		"04D" => "settings-2",
		"04E" => "settings-3",
		"050" => "flask-full",
		"051" => "flask-empty",
		"052" => "switch-on",
		"053" => "switch-off",
		"054" => "toggle-on",
		"055" => "toggle-off",
		"056" => "bin",
		"057" => "bin-2",
		"058" => "stiffy",
		"059" => "floppy",
		"05A" => "notes",
		"05B" => "calendar",
		"05C" => "reminder",
		"05D" => "clipboard",
		"05E" => "clipboard-2",
		"060" => "terminal-3",
		"061" => "code",
		"062" => "curlybrace",
		"063" => "curlybrace-2",
		"064" => "square-brackets",
		"065" => "cmd",
		"066" => "section",
		"067" => "infinity",
		"068" => "tilde",
		"069" => "power",
		"06A" => "keys",
		"06B" => "mixer",
		"06C" => "wave",
		"06D" => "wave-2",
		"06E" => "vinyl",
		"070" => "spool",
		"071" => "cassette",
		"072" => "voicemail",
		"073" => "microphone",
		"074" => "microphone-2",
		"075" => "bullhorn",
		"076" => "bullhorn-2",
		"077" => "headphones",
		"078" => "camera-1",
		"079" => "camera-2",
		"07A" => "camera-3",
		"07B" => "pin",
		"07C" => "pin-2",
		"07D" => "map",
		"07E" => "map-2",
		"080" => "user-card",
		"081" => "battery-100",
		"082" => "battery-80",
		"083" => "battery-60",
		"084" => "battery-40",
		"085" => "battery-20",
		"086" => "battery-empty",
		"087" => "battery-charge",
		"088" => "battery-100-2",
		"089" => "battery-80-2",
		"08A" => "battery-60-2",
		"08B" => "battery-40-2",
		"08C" => "battery-20-2",
		"08D" => "battery-empty-2",
		"08E" => "battery-charge-2",
		"090" => "clock",
		"091" => "flux",
		"092" => "sleep",
		"093" => "nope",
		"094" => "search",
		"095" => "zoom-in",
		"096" => "zoom-out",
		"097" => "search-2",
		"098" => "zoom-in-2",
		"099" => "zoom-out-2",
		"09A" => "eye",
		"09B" => "eye-2",
		"09C" => "wifi-low",
		"09D" => "wifi-mid",
		"09E" => "wifi-full",
		"0A0" => "expand",
		"0A1" => "contract",
		"0A2" => "expand-2",
		"0A3" => "contract-2",
		"0A4" => "expand-3",
		"0A5" => "maximise",
		"0A6" => "contract-3",
		"0A7" => "menu-pull-down",
		"0A8" => "menu-pull-up",
		"0A9" => "menu",
		"0AA" => "menu-2",
		"0AB" => "tag",
		"0AC" => "tag-2",
		"0AD" => "tag-3",
		"0AE" => "tag-4",
		"0B0" => "refresh",
		"0B1" => "repeat",
		"0B2" => "repeat-2",
		"0B3" => "shuffle",
		"0B4" => "return",
		"0B5" => "wiggle",
		"0B6" => "split",
		"0B7" => "split-2",
		"0B8" => "converge",
		"0B9" => "swap",
		"0BA" => "swap-2",
		"0BB" => "transfer",
		"0BC" => "tray",
		"0BD" => "inbox-2",
		"0BE" => "outbox-2",
		"0C0" => "key",
		"0C1" => "key-2",
		"0C2" => "lock",
		"0C3" => "unlock",
		"0C4" => "safe",
		"0C5" => "spinner",
		"0C6" => "circle",
		"0C7" => "circle-2",
		"0C8" => "stamp",
		"0C9" => "stamp-2",
		"0CA" => "mail",
		"0CB" => "mail-2",
		"0CC" => "mail-3",
		"0CD" => "address-book",
		"0CE" => "address-book-2",
		"0D0" => "book",
		"0D1" => "book-lines",
		"0D2" => "book-2",
		"0D3" => "book-lines-2",
		"0D4" => "paper-roll",
		"0D5" => "paper-roll-ripped",
		"0D6" => "paper-ripped",
		"0D7" => "database",
		"0D8" => "database-add",
		"0D9" => "database-remove",
		"0DA" => "support",
		"0DB" => "support-2",
		"0DC" => "support-3",
		"0DD" => "podcast",
		"0DE" => "podcast-2",
		"0E0" => "folder",
		"0E1" => "folder-add",
		"0E2" => "folder-remove",
		"0E3" => "folder-dublicate",
		"0E4" => "folder-2",
		"0E5" => "folder-add-2",
		"0E6" => "folder-remove-2",
		"0E7" => "folder-dublicate-2",
		"0E8" => "cloud",
		"0E9" => "cloud-upload",
		"0EA" => "cloud-download",
		"0EB" => "cloud-add",
		"0EC" => "cloud-remove",
		"0ED" => "cloud-add-2",
		"0EE" => "cloud-remove-2",
		"100" => "shop",
		"101" => "shop-2",
		"102" => "credit-card",
		"103" => "credit-card-2",
		"104" => "credit-card-3",
		"105" => "credit-card-4",
		"106" => "wallet",
		"107" => "wallet-2",
		"108" => "newspaper",
		"109" => "newspaper-2",
		"10A" => "document",
		"10B" => "document-add",
		"10C" => "document-remove",
		"10D" => "attachment",
		"10E" => "attachment-2",
		"110" => "align-top-edges",
		"111" => "align-vertical-centers",
		"112" => "align-bottom-edges",
		"113" => "align-left-edges",
		"114" => "align-horizontal-centers",
		"115" => "align-right-edges",
		"116" => "distribute-top-edges",
		"117" => "distribute-verical-centers",
		"118" => "distribute-bottom-edges",
		"119" => "distribute-left-edges",
		"11A" => "distribute-right-edges",
		"11B" => "distribute-horizontal-centers",
		"11C" => "unite",
		"11D" => "subtract",
		"11E" => "intersect",
		"120" => "exclude",
		"121" => "layout-sidebar-left",
		"122" => "layout-column-center",
		"123" => "layout-sidebar-right",
		"124" => "layout-content-left",
		"125" => "layout-content-right",
		"126" => "layout-content-left-2",
		"127" => "layout-content-right-2",
		"128" => "rulers",
		"129" => "swatch",
		"12A" => "swatches",
		"12B" => "crop",
		"12C" => "bulb",
		"12D" => "bulb-2",
		"12E" => "droplet",
		"130" => "print",
		"131" => "shred",
		"132" => "bell",
		"133" => "bell-2",
		"134" => "bell-mute",
		"135" => "bell-mute-2",
		"136" => "nib",
		"137" => "quill",
		"138" => "quill-2",
		"139" => "pencil",
		"13A" => "pen",
		"13B" => "compose",
		"13C" => "compose-2",
		"13D" => "compose-3",
		"13E" => "compose-4",
		"140" => "bullet",
		"141" => "ellipsis",
		"142" => "timeline",
		"143" => "link-1",
		"144" => "link-2",
		"145" => "anchor",
		"146" => "asterisk",
		"147" => "compass",
		"148" => "arrow-up",
		"149" => "arrow-down",
		"14A" => "arrow-left",
		"14B" => "arrow-right",
		"14C" => "add",
		"14D" => "remove",
		"14E" => "delete",
		"150" => "mail-4",
		"151" => "at",
		"152" => "envelope",
		"153" => "mail-outgoing",
		"154" => "mail-incoming",
		"155" => "bin-3",
		"156" => "outgoing-2",
		"157" => "reply-all",
		"158" => "reply",
		"159" => "options",
		"15A" => "spam",
		"15B" => "spam-2",
		"15C" => "star",
		"15D" => "star-2",
		"15E" => "flag",
		"160" => "flag-2",
		"161" => "home",
		"162" => "home-2",
		"163" => "home-3",
		"164" => "tick",
		"165" => "cross",
		"166" => "alarm-clock",
		"167" => "stopwatch",
		"168" => "previous",
		"169" => "rewind",
		"16A" => "stop",
		"16B" => "play",
		"16C" => "pause",
		"16D" => "fast-forward",
		"16E" => "next",
		"170" => "user-4",
		"171" => "user-4-add",
		"172" => "user-4-remove",
		"173" => "user-2-add",
		"174" => "user-2-remove",
		"175" => "fork",
		"176" => "pull",
		"177" => "commit",
		"178" => "watch",
		"179" => "watch-2",
		"17A" => "unwatch",
		"17B" => "settings-4",
		"17C" => "revert"

	);


/* -----------------------------------*/
/* 		Columns
/* -----------------------------------*/
	public static function wrapper( $atts, $content = null ) {
		return '<div class="grid-wrapper">' . do_shortcode( $content ) . '</div>';
	}

	public static function column( $atts, $content = null ) {

		$args = shortcode_atts( array(
				'tag' => 'div',
				'size' => '1/1',
				'style' => '',
			), $atts );

		$tag = sanitize_html_classes( $args['tag'] );
		$style = sanitize_html_classes( $args['style'] );



		if ( is_numeric( $args['size'] ) ) {
			$size = "column-" . (int) $args['size'];
		} else {
			# Get the fraction values
			$fraction = explode("/", $args['size']);

			# Make sure it was a fraction
			if ( count ( $fraction ) !== 2 ) {
				trigger_error( "Expected either a fraction like '1/2' or a numeric number like '1', instead received '$args[size]'", E_USER_WARNING );
				$size = sanitize_html_classes( $args['size'] );
			} else {

				$nume = $fraction[0];
				$deno = $fraction[1];

				$columns = round( 12 / $deno * $nume );

				$size = "column-" . $columns;
			}
		}



		$out = '';
		$out .=  "<{$tag} class=\"g $size $style\">";
		$out .= do_shortcode( $content );
		$out .= "</{$tag}>";

		return $out;
	}

	public static function column_link( $atts, $content = null ) {
		$args = shortcode_atts( array(
				'link' => '#'
			), $atts );
		$link = sanitize_url( $args["link"] );

		$out = '';
		$out .=  "<a href=\"$link\" class=\"column-link \">";
		$out .= do_shortcode( $content );
		$out .= "</a>";

		return $out;
	}


/* -----------------------------------*/
/* 		Buttons
/* -----------------------------------*/
	public static function button( $atts, $content = null ) {
		extract( shortcode_atts( array(
					'link' => '#',
					'size' => 'normal',
					'target' => '_self',
				), $atts ) );

		$link = esc_url ( $link );
		$target = esc_attr( $target );
		$size = sanitize_html_classes( $size );

		return '<a href="'.$link.'" target="'.$target.'"class="village-button '.$size.'" >' . do_shortcode( $content ) . '</a>';
	}

	public static function call_action( $args, $content = null ) {
		$attributes = shortcode_atts( array(
				'title' => '',
				'action' => "Get It!",
				'action_link' => "#",
			), $args );
		extract( $attributes );

		$action_link = esc_url( $action_link );
		$action = esc_html( $action );

		return '
		<div class="village-call-to-action cf">

			<div class="g two-thirds village-call-to-action__item">
				<h1 class="uppercase-title">'.$title.'</h1>
				<p>'.strip_tags( $content ).'</p>
			</div>

			<div class="g one-third village-call-to-action__item">
				<a class="village-button normal" href="'.$action_link.'">'.$action.'</a>
			</div>

		</div>
		';
	}



/* -----------------------------------*/
/* 		Design Elements
/* -----------------------------------*/
	public static function icon( $atts, $content = null ) {
		$args = shortcode_atts( array(
				'size' => 'normal',
			), $atts );
		$args = apply_filters ( 'village_iconfont_args', $args );

		extract( $args );
		$content = esc_attr( $content );
		$size = sanitize_html_class( $size, "normal" );


		$prefix = "&#xF";

		if ( $content !== null ) {
			$content = strip_tags( trim( $content ) );

			if ( $icon_code = array_search( $content, self::$available_iconfonts ) ) {
				$return = $prefix . $icon_code;
			}
			else {
				$return = $prefix . substr( $content, -3 );
			}

			$before = apply_filters( "village_display_icon_before", '<span class="batch iconfont-'.$size.'">' );
			$after = apply_filters( "village_display_icon_after", "</span>" );

			return $before . $return . ";" . $after;


		}
		return false;
	}

	// A very special function. This is going to be our little secret :)
	public static function display_all_icons() {

		$prefix = "&#xF";

		$out = "<ul class=\"gw icon-list\">";
		asort( self::$available_iconfonts );
		foreach ( self::$available_iconfonts as $code => $icon_name ) {
			$out .= '<li class="g one-sixth">';
			$out .= "<div>";
			$out .= "<span class=\"batch iconfont-normal\">{$prefix}{$code}</span>";
			$out .= "<span class=\"icon-shortcode-value\">".$icon_name."</span>";
			$out .= "</div>";
			$out .= "</li>";
		}
		$out .= "</ul>";
		return $out;
	}

	public static function message( $atts, $content = null ) {
		$args = shortcode_atts( array(
				'icon' => false,
				'style' => 'modern accent',
			), $atts );
		$args = apply_filters ( 'village_iconfont_args', $args );

		extract( $args );
		$style = sanitize_html_classes( $style );

		if ( $content !== null ) {
			$content = strip_tags( trim( $content ) );

			$before = apply_filters( "village_display_message_before", '<div class="village-message  '.$style.'">' );
			$after = apply_filters( "village_display_message_after", "</div>" );

			if ( $icon !== false ) {
				$before = $before . "<div class=\"batch-container\">" . self::icon( null, $icon );
				$before = $before . "</div><div class=\"inner\">";
				$after = $after . "</div>";
			}

			return $before.$content.$after;


		}
		return false;
	}

	public static function marker( $atts, $content = null ) {
		$args = shortcode_atts( array(
				'preset' => false,
				'text' => 'white',
				'bg' => "black",
			), $atts );

		$preset = sanitize_html_classes( $args['preset'] );
		$text = sanitize_html_class( $args['text'], "white" );
		$background = sanitize_html_class( $args['bg'], 'black' );

		if ( false !== $args['preset'] ) {
			$out =  "<span class=\"village-marker {$preset}-colored-bg\">";
		} else {
			$out =  "<span class=\"village-marker {$text} bg-{$background}\">";
		}

		$out .= $content;
		$out .= "</span>";

		return $out;
	}

	public static function spacer( $atts, $content = null ) {
		$args = shortcode_atts( array(
				'type' => 'blank',
			), $atts );
		$type = sanitize_html_classes( $args['type'], "blank" );
		return "<hr class=\"village-spacer $type\" />";

	}

	public static function skill( $atts, $content = null ) {

		$args = shortcode_atts( array(
				'skill' => '100',
			), $atts );

		$skill_value = filter_var( $args['skill'], FILTER_SANITIZE_NUMBER_INT );

		$out = '';
		$out .=  '<div class="village-skill__bar">';
		$out .= '<div class="village-skill__value" style="width:' . $skill_value . '%;">';
		$out .= '</div>';

		$out .= '<div class="village-skill__text">';
		$out .= do_shortcode( esc_html( $content ) );
		$out .= '</div>';

		$out .=  '</div>';
		$out .= "";

		return $out;
	}


	//-----------------------------------*/
	// Pricing Table Shortcodes
	//-----------------------------------*/
	public static function pricing( $atts, $content = null) {

		$before = apply_filters( "village_pricing_before", '<div class="village-pricing">' );
		$after = apply_filters( "village_pricing_after", '</div>' );


		return $before . do_shortcode( $content ) . $after;
	}

	public static function pricing_title( $atts, $content = null) {

		$before = apply_filters( "village_pricing_title_before", '<h2 class="village-pricing__title">' );
		$after = apply_filters( "village_pricing_title_after", '</h2>' );


		return $before . do_shortcode( $content ) . $after;
	}

	public static function pricing_price( $atts, $content = null) {

		$before = apply_filters( "village_pricing_price_before", '<h3 class="village-pricing__price">' );
		$after = apply_filters( "village_pricing_price_after", '</h3>' );


		return $before . do_shortcode( $content ) . $after;
	}

	public static function pricing_content( $atts, $content = null) {
		$args = shortcode_atts( array(
				'separator' => apply_filters( 'village_pricing_separator', '///' )
			), $atts );

		# Before and after content && items
		$before = apply_filters( "village_pricing_content_before", '<div class="village-pricing__content"><ul>' );
		$after = apply_filters( "village_pricing_content_after", '</ul></div>' );

		$before_item = apply_filters( "village_pricing_item_before", '<li class="village-pricing__item">' );
		$after_item = apply_filters( "village_pricing_item_after", '</li>' );


		# Loop over the content and wrap it
		$items = explode( $args['separator'], $content);
		$item_output = array();
		
		foreach ( $items as $item ) {
			# Trim empty whitespace
			$item = trim($item);

			# If item isnt empty, wrap it and add it
			if ( ! empty( $item ) ) {
				$item_output[] = $before_item . $item . $after_item;
			}
		}


		# OUtput
		return $before . do_shortcode( implode( "" , $item_output) ) . $after;
	}

} // End Class Village_ML
