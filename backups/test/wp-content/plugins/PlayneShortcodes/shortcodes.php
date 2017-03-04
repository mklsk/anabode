<?php
/*
Plugin Name: Playne Shortcodes
Plugin URI: http://themeforest.net/user/playnethemes
Description: Free shortcodes for use with Playne themes or any other themes you might like. You can enter the shortcodes from your text editor after installing this plugin with a simple dropdown menu (Dark blue square with P). Font Awesome version 4.3.0 included.
Author: Playne Themes
Author URI: http://themeforest.net/user/playnethemes
Version: 1.3
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/*
Special thanks to AJ Clarke over @ WP Explorer for providing this great code and allowing us to add to it
visit his website: wpexplorer.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

require_once( dirname(__FILE__) . '/includes/scripts.php' ); 
require_once( dirname(__FILE__) . '/includes/functions.php' ); 
require_once( dirname(__FILE__) . '/includes/mce/tinymce.php' ); 
