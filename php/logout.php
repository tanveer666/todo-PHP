<?php
session_start();

if( $_GET['logout'] == 'logout')
{
    session_unset();
    session_destroy();
    header("location: ../index.php");
}
?>