<?php
/**
 * Plugin Name: SWH Like Dislike BTN
 * Plugin URI:https://muhammadtouseef.netlify.app
 * Author: Muhammad Touseef
 * Author URI:https://muhammadtouseef.netlify.app
 * Version: 1.0.0
 * Description: Add Like & Dislike Button to the Posts
 * License: GPL v2
 * License URI:https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: swh-like-dislike-btn
 */

 if (! defined('WPINC')){   die;}
 if(!defined('SWH_LIKE_DISLIKE_BTN_VERSION')) {    define('SWH_LIKE_DISLIKE_BTN_VERSION','1.0.0'); }
 if(!defined('SWH_LIKE_DISLIKE_BTN_DIR')) {    define('SWH_LIKE_DISLIKE_BTN_DIR',plugin_dir_url(__FILE__)); }
 if(!defined('SWH_LIKE_DISLIKE_BTN_DIR_PATH')) {    define('SWH_LIKE_DISLIKE_BTN_DIR_PATH',plugin_dir_path(__FILE__)); }
//Enqueuing Assets
require SWH_LIKE_DISLIKE_BTN_DIR_PATH.'inc/enqueue-scripts.php';
//Settings Menu & Page
require SWH_LIKE_DISLIKE_BTN_DIR_PATH.'inc/settings.php';
//Creates Table for Plugin
register_activation_hook(__FILE__,'swhldb_table');
require SWH_LIKE_DISLIKE_BTN_DIR_PATH.'inc/db.php';
//Create Like Dislike Button
require SWH_LIKE_DISLIKE_BTN_DIR_PATH.'inc/buttons.php';
//Ajax Handling
require SWH_LIKE_DISLIKE_BTN_DIR_PATH.'inc/ajax-handler.php';

