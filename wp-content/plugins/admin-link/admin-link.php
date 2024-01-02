<?php

/*
 * Plugin Name: Hide admin link
 * Description : Hide the link to the dashboard if the user is not loggued in.
 * Author : Frédéric Le May
 * Author URI : http://flemay.com 
 */

function hide_admin_link($inner_blocks)
{

  if (!is_user_logged_in()) {

    foreach ($inner_blocks as $key => $inner_block) {

      // echo var_dump($inner_block->parsed_block);
      
      // foreach($inner_block as $key => $block_content) {
      //     echo '<b>' . $key . ' (' . gettype($block_content) . ')'. ' : </b>';
      //     echo var_dump($block_content) . '<br><br>';
      // }

      $admin_url = $inner_block->parsed_block['attrs']['url'];

      if ($admin_url == admin_url()) {
        unset ($inner_blocks[$key]);
      }
    }
  }
    return $inner_blocks;
}

add_filter('block_core_navigation_render_inner_blocks', 'hide_admin_link');
