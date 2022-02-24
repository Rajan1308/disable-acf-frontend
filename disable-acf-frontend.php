<?php
/**
 * Plugin Name: Disable ACF on Frontend
 * Description: Provides a performance boost if ACF frontend functions aren't being used
 * Version:     1.0
 * Author:      Rajan Gupta
 * Author URI:  https://www.wpcustom.in
 * License:     MIT
 * License URI: http://www.opensource.org/licenses/mit-license.php
 */
 
/**
 * Disable ACF on Frontend
 *
 */
function wpcustom_disable_acf_on_frontend( $plugins ) {
	if( is_admin() ) :
		return $plugins;
  endif;

	foreach( $plugins as $i => $plugin ):
		if( 'advanced-custom-fields-pro/acf.php' == $plugin ) :
			unset( $plugins[$i] );
    endif; 
  endforeach;

	return $plugins;
}
add_filter( 'option_active_plugins', 'wpcustom_disable_acf_on_frontend' );
