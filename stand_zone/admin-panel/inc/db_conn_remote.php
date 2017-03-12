<?php
    # Database Constants

    # Change the following "localhost" if your hosting service require that, otherwise leave it as it is
    define("DB_SERVER", "localhost");
    # Change the following database username "admin" to match the username that you will create on the web server that will host your website
    define("DB_USERNAME", "root");
    # Change the following database password "demo" to match the password that you will create on the web server that will host your website
    define("DB_PASSWORD", "admin");
    # Change the following database name "united_db" to match the database name that you will create on the web server that will host your website
    define("DB_NAME", "united4w_makateb_db");

    # Make a connection to the database
    $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Database connection failed..");

    # Set the connection encode to "utf8" in order to store (in the database) and display the non-latin languages (like Arabic) properly
    if (mysql_client_encoding($connection) != 'utf8') {
        $result_encoding = mysql_set_charset('utf8', $connection);
        # mysql_set_charset() returns (FALSE) on failure, so if it failed die()
        if (!$result_encoding) {
            die('Could not set the database encoding to "utf8"');
        }
    }

    # Select a database to use
    $selected_db = mysql_select_db(DB_NAME, $connection) or die("Could not select a database..");
?>
