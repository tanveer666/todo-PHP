<?php
require "db_conn.php";

if (isset($_REQUEST['name'])) {
    try {
        $pdo_st = $pdo->prepare("SELECT * FROM login WHERE userName = ? ;");
        $pdo_st->execute(array($_REQUEST['name']));
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
        $row = $pdo_st -> fetch();
        
        if( $row['userName'] == null ) {
            echo "True";
        }
        else {
            echo "False";
        }

    } catch (PDOException $e) {
        echo ($e->getMessage());
    }
}
