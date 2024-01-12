<?php

/*
 * Cache, via une astuce CSS, aux utilisateurs non loggués les éléments choisis
 * (classe .planty-admin-visibility).
 *
 * Désactivé : fonctionnalité remplacée par le plugin Hide admin link.
 */

// function hide_admin_elements()
// {
//     // $is_not_logged_in = ! curent_user_can('administrator');
//
//     if (! is_user_logged_in()) {
//         echo '<style>';
//         echo '.planty-admin-visibilty {
//                   display: none !important;
//                 }';
//         echo '</style>';
//     }
// }
//
// add_filter('wp_head', 'hide_admin_elements');

/*
* Don't show WP standard patterns.
*/
add_action( 'after_setup_theme', 'themeslug_remove_core_patterns' );

function themeslug_remove_core_patterns() {
	remove_theme_support( 'core-block-patterns' );
}

/*
* Disable remote patterns
*/
add_filter( 'should_load_remote_block_patterns', '__return_false' );
