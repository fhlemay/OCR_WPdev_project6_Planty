<?php

/*
 * Cache aux utilisateurs normaux les éléments liés au prévilège d'administrateur.
 * Le block theme ne permet pas par défaut d'effectuer cette modification via
 * le backend (en utilisant par exemple le filtre wp_nav_menu_items  ou _objects).
 * Pour se faire il faut utiliser l'approche du thème classique, c-à-d enregistrer
 * un nouveau menu, puis dans l'éditeur de site (FSE), sélectionner un menu classique.
 */
function hide_admin_elements()
{
    // $is_not_logged_in = ! curent_user_can('administrator');

    if (! is_user_logged_in()) {
        echo '<style>';
        echo '.planty-admin-visibilty {
                display: none !important;
              }';
        echo '</style>';
    }
}

add_filter('wp_head', 'hide_admin_elements');
