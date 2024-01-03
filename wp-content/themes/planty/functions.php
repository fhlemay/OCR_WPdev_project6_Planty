<?php

/*
 * Cache, via une astuce CSS, aux utilisateurs non loggués les éléments choisis
 * (classe .planty-admin-visibility).
 *
 * Cette fonctionnalité devrait être implémentée côté serveur. L'astuce du
 * CSS ne fait que masquer l'item : il reste tout de même présent côté utilisa-
 * teur.
 *
 * Le filtre wp_nav_menu_items permet de filtrer le contenu d'un menu avant qu'
 * il soit transmis au client.
 *
 * Or il n'est pas possible d'utiliser directement ce hook avec un "block theme".
 * Pour y arriver il faudrait enregistrer le menu (register_menu), ce qui
 * transformerait de facto le "block theme" en "hybrid theme". En effet, cet
 * enregistrement active le menu "Customizer" dans le dashboard, qui est une
 * fonction propre aux thèmes classiques.
 *
 * Un nouveau hook a été créé dans la m-à-j 6.1 (octobre 2022) pour offrir
 * aux développeurs de "block themes" la même flexibilité que le filtre
 * wp_nav_menu_items offre pour les "classical themes".
 *
 * Ce filtre est utilisé par le plugin déveleppé pour le site Planty.
 * (ref. plugin admin-link)
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
