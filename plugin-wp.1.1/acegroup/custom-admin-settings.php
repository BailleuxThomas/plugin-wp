<?php
/**
 * Fichier de démarrage
 *
 * Ceci est le fichier principal qui sera lu par WordPress.
 *
 * @link https://blogpascher.com
 * @since 1.0.0
 * @package Custom_Admin_Settings
 *
 * @wordpress-plugin
 * Plugin Name: Administration Personnalisé
 * Plugin URI: https://blogpascher.com
 * Description: Apprendre à créer un plugin WordPress.
 * Version: 1.0.0
 * Author: Votre Nom
 * Author URI: https://exemple.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
   }
    
   // Inclusions de toute les dépendance.
   foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {
    include_once $file;
   }
    
   add_action( 'plugins_loaded', 'tutsplus_custom_admin_settings' );
   /**
    * Starts the plugin.
    *
    * @since 1.0.0
    */
   function tutsplus_custom_admin_settings() {
    
    $plugin = new Submenu( new Submenu_Page() );
    $plugin->init();
   }

   