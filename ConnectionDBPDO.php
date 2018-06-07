<?php
/**
 * Created by PhpStorm.
 * User: crosa
 * Date: 06/06/2018
 * Time: 16:04
 */

class ConnectionDBPDO
{
    private static $connection = null;

    public static function getConnection() {
        $servername = "localhost";
        $username = "fahrenheit";
        $password = "ciao";
        $database = "excalibur";

        if(self::$connection == null) {
            self::$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }

    public static function getFromSQL($sql, $parameters = []) { // getFromSQL("SELECT * FROM table WHERE table.a = :valore;", ['valore' => 0]) : array
        $stmt = self::getConnection()->prepare($sql);

        foreach ($parameters as $key => $parameter) {
            $stmt->bindParam(':'.$key, $parameter);
        }

        $stmt->execute();

        return $stmt->fetch();
    }
}