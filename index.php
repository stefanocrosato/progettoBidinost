<?php
/**
 * Created by PhpStorm.
 * User: crosa
 * Date: 17/05/2018
 * Time: 09:32
 */


    // Make a MySQL Connection
/*
    mysql_connect("localhost", "root", "EscxiPass_123") or die(mysql_error());
    mysql_select_db("prova") or die(mysql_error());
*/
    //echo "ci sei riuscito";

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql username ***/
$username = 'fahrenheit';

/*** mysql password ***/
$password = 'ciao';

try {
    $dbh = new PDO("mysql:host=$hostname; dbname=excalibur", $username, $password);
    /*** echo a message saying we have connected ***/
    echo 'Connected to database';
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
