<?php

// enable link
add_filter('pre_option_link_manager_enabled', '__return_true');

// require plugin YIKES Simple Taxonomy Ordering
add_filter( 'yikes_simple_taxonomy_ordering_excluded_taxonomies', 'change_yikes_excluded_taxonomies', 10, 1 );

function change_yikes_excluded_taxonomies( $excluded_taxonomies ) {
	if (($key = array_search('link_category', $excluded_taxonomies)) !== false) {
		unset($excluded_taxonomies[$key]);
	}
	return $excluded_taxonomies;
}

function typeflow_load() {
    // Load theme languages
    load_theme_textdomain( 'typeflow', get_template_directory().'/languages' );
    
    // Load theme options and meta boxes
    include( get_stylesheet_directory() . '/functions/theme-options.php' );

    // Load dynamic styles
    include( get_template_directory() . '/functions/dynamic-styles.php' );
    
    // Load TGM plugin activation
    include( get_template_directory() . '/functions/class-tgm-plugin-activation.php' );
}

function typeflow_scripts() {
    wp_enqueue_script( 'typeflow-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ),'', false );
    if ( get_theme_mod( 'theme-toggle','on' ) == 'on' ) { wp_enqueue_script( 'typeflow-theme-toggle', get_template_directory_uri() . '/js/theme-toggle.js', array( 'jquery' ),'', true ); }
    wp_enqueue_script( 'typeflow-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
    if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
} 


function typeflow_enqueue_google_fonts () {
    $font_api = "fonts.font.im";
    if ( get_theme_mod("dynamic-styles", "on") == "on" ) {
        if ( get_theme_mod( "font" ) == "titillium-web-ext" ) { wp_enqueue_style( "titillium-web-ext", "//{$font_api}/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext" ); }		
        if ( get_theme_mod( "font" ) == "droid-serif" )	{ wp_enqueue_style( "droid-serif", "//{$font_api}/css?family=Droid+Serif:400,400italic,700" ); }				
        if ( get_theme_mod( "font" ) == "source-sans-pro" )	{ wp_enqueue_style( "source-sans-pro", "//{$font_api}/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "lato" ) { wp_enqueue_style( "lato", "//{$font_api}/css?family=Lato:400,300,300italic,400italic,700" ); }
        if ( get_theme_mod( "font" ) == "raleway" )	{ wp_enqueue_style( "raleway", "//{$font_api}/css?family=Raleway:400,300,600" ); }
        /*default*/ if ( ( get_theme_mod( "font" ) == "" ) || ( get_theme_mod( "font" ) == "inter" ) ) { wp_enqueue_style( "inter", "//{$font_api}/css?family=Inter:400,300,600,800" ); }
        if ( get_theme_mod( "font" ) == "ubuntu" ) { wp_enqueue_style( "ubuntu", "//{$font_api}/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "ubuntu-cyr" ) { wp_enqueue_style( "ubuntu-cyr", "//{$font_api}/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto" ) { wp_enqueue_style( "roboto", "//{$font_api}/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto-cyr" ) { wp_enqueue_style( "roboto-cyr", "//{$font_api}/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,cyrillic-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto-condensed" ) { wp_enqueue_style( "roboto-condensed", "//{$font_api}/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto-condensed-cyr" ) { wp_enqueue_style( "roboto-condensed-cyr", "//{$font_api}/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto-slab" ) { wp_enqueue_style( "roboto-slab", "//{$font_api}/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "roboto-slab-cyr" ) { wp_enqueue_style( "roboto-slab-cyr", "//{$font_api}/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext" ); }
        if ( get_theme_mod( "font" ) == "playfair-display" ) { wp_enqueue_style( "playfair-display", "//{$font_api}/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "playfair-display-cyr" ) { wp_enqueue_style( "playfair-display-cyr", "//{$font_api}/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic" ); }
        if ( get_theme_mod( "font" ) == "open-sans" ) { wp_enqueue_style( "open-sans", "//{$font_api}/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "open-sans-cyr" ) { wp_enqueue_style( "open-sans-cyr", "//{$font_api}/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext" ); }
        if ( get_theme_mod( "font" ) == "pt-serif" ) { wp_enqueue_style( "pt-serif", "//{$font_api}/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext" ); }
        if ( get_theme_mod( "font" ) == "pt-serif-cyr" ) { wp_enqueue_style( "pt-serif-cyr", "//{$font_api}/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext" ); }
    }
}

// 替换 WordPress Gravatar 为国内头像源
function theme_get_ssl_avatar($avatar) {
    $avatar = str_replace(
        array(
            "www.gravatar.com",
            "cn.gravatar.com", 
            "0.gravatar.com", 
            "1.gravatar.com", 
            "2.gravatar.com", 
            "secure.gravatar.com"
        ), 
        "gravatar.loli.net",
         $avatar);
    return $avatar;
}
add_filter('get_avatar', 'theme_get_ssl_avatar');


?>