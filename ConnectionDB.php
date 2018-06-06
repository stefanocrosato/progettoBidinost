<?php
/**
 * Created by PhpStorm.
 * User: crosa
 * Date: 06/06/2018
 * Time: 16:04
 */

class ConnectionDB
{
    private static $connection = null;

    public static function getConnection() {
        $servername = "localhost";
        $username = "fahrenheit";
        $password = "ciao";
        $database = "excalibur";

        // Create connection
        if(self::$connection==null) {
            self::$connection = mysqli_connect($servername, $username, $password, $database);
            if (!self::$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }

        return self::$connection;
    }

    public static function getFromSQL($sql) {
        $result = self::getConnection()->query($sql);

        return $result->fetch_assoc();
    }
}