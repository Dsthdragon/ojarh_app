<?php
    session_start();
    /* DATABASE CONFIGURATION */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'ojarh');
    define("BASE_URL", "http://localhost:8080/ojarh_app/");
    define("SELLER_URL", "http://localhost:8080/ojarh_app/seller/");
    define("BUYER_URL", "http://localhost:8080/ojarh_app/buyer/");
    define("ADMIN_URL", "http://localhost:8080/ojarh_app/admin/");
    define("INTERNATIONAL_URL", "http://localhost:8080/ojarh_app/international/");



    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    function getDB(){
        $dbhost=DB_SERVER;
        $dbuser=DB_USERNAME;
        $dbpass=DB_PASSWORD;
        $dbname=DB_DATABASE;
        try {
            $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
        catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }
?>
