<?php
session_start();
require "php/db_conn.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/create_style.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Edit Tasks</title>
    <script src="js/libraries/node_modules/moment/moment.js"> </script>
    <script src="js/edit.js"> </script>
</head>

<body>
    <?php require "php/getData.php" ?>

    <form method="POST" onsubmit="return (dateValid() && timeValid());" action="php/updateData.php">
        Date: <textarea name="date" rows="1" cols="10" id="date" onfocusout="dateValid()"><?php echo($row['t_date']); ?></textarea><br> <br>
        <span id = "dateText"> </span>
        Time: <textarea name='time' rows="1" cols="10" id="time" onfocusout="timeValid()"><?php echo ($row['t_time']);?></textarea> <br> <br>
        Task: <textarea rows="6" cols="40" name="todo" maxlength="300"><?php echo($row['task']);?></textarea> <br> <br>
        Task status: <select name='task_completion'>
                        <option value="0"> Incomplete </option>
                        <option value="1"> Complete </option>
                    </select>
        <input type='submit' id='submit' name='save' value='save' disabled>
    </form>

   
</body>

</html>