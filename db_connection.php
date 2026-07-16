<?php

function getDatabaseConfig($useServerConfig) {
    if ($useServerConfig) {
        // Use server database configuration
        return array(
            'servername' => "localhost",
            'username' => "ejense_uname",
            'password' => "hdCaZ{ZIloAM",
            'dbname' => "db_ejence_technology"
        );
    } else {
        // Use local database configuration
        return array(
            'servername' => "localhost",
            'username' => "root",
            'password' => "root",
            'dbname' => "db_ejence_technology"
        );
    }
}

?>