<?php
function swhldb_table()
{
    global $wpdb;    
    $table_name = $wpdb->prefix . 'swhldb_system';
    
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
        user_id mediumint(9) NOT NULL,
        post_id mediumint(9) NOT NULL,
        like_count mediumint(9) NOT NULL,
        dislike_count mediumint(9) NOT NULL,
        PRIMARY KEY  (id)
    );";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

register_activation_hook(__FILE__,'swhldb_table');