<?php
/*
 * Takes task (user input) and inserts into the databse. The name of the data table is also the username.
*/
session_start();
require "db_conn.php";
$e = NULL;
// $dateTime = $_POST['date']. " ". $_POST['time']. ":00";

if( isset($_POST['submit']))
{
    try
    {
    /* This will insert Time and to do into a pre existing table called $_POST['user] */
    $querry_prep = sprintf("INSERT INTO %s (t_date ,t_time, task, task_completion) VALUES (:date , :time , :task , 0);",$_SESSION['userName'] );
    /* The sprintf part is necessary because there cannot be "quotes" before the table name.*/
    /* Be default execute statement adds quotes before and after the bound parameters, so userName couldn't be bound, rather added by sprintf*/
    $pdo_st = $pdo -> prepare($querry_prep);
    $param = [ ':date' => $_POST['date'] ,':time' => $_POST['time'], ':task' => $_POST['todo'] ];
    $pdo_st -> execute($param);
    header("location: ../view.php");
    }
    catch(PDOException $e)
    {
    // echo("querry error ". $e -> getMessage(). " ". $e -> getLine(). " ");
    }
}
?>