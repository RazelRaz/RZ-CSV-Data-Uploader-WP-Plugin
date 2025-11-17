<?php
/*
 * Plugin Name:       RZ CSV Data Uploader
 * Plugin URI:        https://example.com
 * Description:       This plugin will upload CSV data to DataBase Table
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Razel Ahmed
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 */

defined('ABSPATH') || exit;

// Include files
//require_once( plugin_dir_path(__FILE__) . "include/cdu_form.php" );

class Rz_csv_data_uploader {
    function __construct(){
        add_shortcode( "csv-data-uploader", [ $this, "rz_display_uploader_form"] );
    }

    function rz_display_uploader_form() {
        ob_start(); // Start buffer
        include( plugin_dir_path(__FILE__) . "include/cdu_form.php" );
        return ob_get_clean(); // Get buffer + clean
    }

    public static function cdu_create_table() {
        
    }

    

}

// Register activation hook (uses static method)
register_activation_hook( __FILE__, [ "Rz_csv_data_uploader", "cdu_create_table" ] );

new Rz_csv_data_uploader();