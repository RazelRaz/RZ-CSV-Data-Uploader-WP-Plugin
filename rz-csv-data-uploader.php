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
        global $wpdb;
        $table_prefix = $wpdb->prefix; // wp_
        $table_name = $table_prefix . "students_data"; // wp_students_data

        $table_collate = $wpdb->get_charset_collate();

        $sql_command = "
            CREATE TABLE `".$table_name."` (
            `id` int NOT NULL AUTO_INCREMENT,
            `name` varchar(50) DEFAULT NULL,
            `email` varchar(50) DEFAULT NULL,
            `age` int DEFAULT NULL,
            `phone` varchar(30) DEFAULT NULL,
            `photo` varchar(120) DEFAULT NULL,
            PRIMARY KEY (`id`)
            ) ".$table_collate."
        ";

        require_once(ABSPATH. "/wp-admin/includes/upgrade.php");
        dbDelta( $sql_command );
    }

    

}

// Register activation hook (uses static method) - DB table on Plugin Activation
register_activation_hook( __FILE__, [ "Rz_csv_data_uploader", "cdu_create_table" ] );

new Rz_csv_data_uploader();