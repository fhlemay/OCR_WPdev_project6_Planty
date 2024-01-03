<?php

/*
 * Plugin Name: Hide admin link
 * Description: Hide admin link if the user is not loggued in.
 * Author: Frédéric Le May
 * Author URI: http://flemay.com 
 */

/* Version 6.1 (oct 2022) 
 * "This update added a filter to navigation.php to provide the ability to 
 *  modify navigation block menu items with code. Developers now can 
 *  programmatically access the navigation block menu items of a block theme 
 *  similar to the existing wp_nav_menu_items filter does for traditional 
 *  themes.
 *
 *  A new filter, block_core_navigation_render_inner_blocks, passes 
 *  WP_Block_List::$inner_blocks to the developer.
 *  https://make.wordpress.org/core/2022/10/10/miscellaneous-editor-changes-for-wordpress-6-1/#navigation-block-menu-items-filter
 */

function hide_admin_link($inner_blocks)
{

  if (!is_user_logged_in()) {

    // WP_Block_List ($inner_blocks) is a itirable class. 
    // Should use built-in methods? 
    // Didn't play yet with PHP's OOP. 

    foreach ($inner_blocks as $key => $inner_block) {

      // *** Trying to figure out what is going on here ***
      // echo var_dump($inner_block->parsed_block);
      
      // foreach($inner_block as $key => $block_content) {
      //     echo '<b>' . $key . ' (' . gettype($block_content) . ')'. ' : </b>';
      //     echo var_dump($block_content) . '<br><br>';
      // }
      //

      $url = $inner_block->parsed_block['attrs']['url'];

      if(isset($url) && $url == admin_url()) {
        unset ($inner_blocks[$key]);
      }
    }
  }
    return $inner_blocks;
}

add_filter('block_core_navigation_render_inner_blocks', 'hide_admin_link');
