<?php
session_start();
require "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/create_style.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Edit Tasks</title>
</head>

<body>
    <?php

echo "<h2>", $_POST['edit'], "</h2>";
if (isset($_SESSION['userName'])) {
    try {
        if ( isset($_POST['edit']) ){
            $_SESSION['id'] = $_POST['edit'];
        }
        $querry = sprintf('SELECT * FROM %s WHERE taskID = %d', $_SESSION['userName'], $_SESSION['id']);
        $pdo_st = $pdo->query($querry);
        $pdo_st->setFetchMode(PDO::FETCH_ASSOC);
        $row = $pdo_st->fetch();
    } catch (PDOException $ex) {
        echo ($ex->getMessage() . " " . $ex->getLine());
    }
}
?>

    <form method="POST" action = "#">
    Date: <input type = 'text' name="date" placeholder="YYYY-MM-DD"
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"
title="Enter a date in this format YYYY-MM-DD"> <?php echo ($row['t_date']); ?>  <br> <br>
    Time: <input type = 'time' name = 'time' value = 'time'> <?php echo($row['t_time']) ?> <br> <br>
    Task: <textarea rows = "6" cols= "40" name = "todo" maxlength="300" > <?php echo ($row['task']); ?> </textarea> <br> <br>
    Task status: <input type='number' name='task_completion' value='set'>  <br> <br>
     <input type = 'submit' name = 'save' value = 'save'>
</form>

<?php
// echo("querry script started! <br>");
if (isset($_POST['save'])) {
    // echo("Save is not null, trying querry <br>");
    // echo($_SESSION['userName']. $_POST['date']. $_POST['time']. $_POST['todo'].$_POST['task_completion'] .$_SESSION['id']);
    try {
        $querry = sprintf("UPDATE %s SET t_date = '%s' , t_time = '%s' , task = '%s' , task_completion = %d WHERE taskID = %d;", $_SESSION['userName'], $_POST['date'], $_POST['time'], $_POST['todo'],$_POST['task_completion'], $_SESSION['id']);
        // echo ("<h2>".$querry."</h2>");
        $pdo->exec($querry);
        header("location: view.php");
    } catch (PDOException $e) {
        echo ($e->getMessage() . " " . $e->getLine());
    }
}

?>

</body>

</html>


