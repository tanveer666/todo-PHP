<?php
/*
 * This file contains the "common" instructions for connecting to a database.
 * Meaning, by including this file a connection to the database has already been made (or a PDO exception, in the event of failiure)
 */

$dsn = "mysql:host=localhost;dbname=project";
$database_user = 'root';
$database_pass = "root";

try
{
    $pdo = new PDO($dsn, "root", "root");
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Sets exception parameters

}
catch( PDOException $e)
{
    echo(" Connection failed. " . $e -> getMessage() . " ". $e -> getLine() );
}
