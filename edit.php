<?php
session_start();
require "php/db_conn.php";
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href= "css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Edit Tasks</title>
    <script src="js/libraries/node_modules/moment/moment.js"> </script>
    <script src="js/edit.js"> </script>
</head>

<body style='background-image:url("img/back.jpg"); background-repeat: no-repeat;'>
    <?php require "php/getData.php" ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"> Index </a> &nbsp; &nbsp;
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php"> Register </a>&nbsp; &nbsp;
            </li>
            <li class="nav-item">
                <a class="nav-link" href="create.php"> Create List </a>&nbsp; &nbsp;
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view.php"> View List</a>&nbsp; &nbsp;
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php"> FAQ </a>&nbsp; &nbsp;
            </li>
        </ul>
    </nav>

    <h2 style="text-align: center; margin-top:80px; margin-bottom:30px;"> Edit Task </h2>

    <form class = 'form-group' style='text-align:center' method="POST" onsubmit="return (dateValid() && timeValid());" action="php/updateData.php">
        <label class="form-control-label"> Date : </label>
        <textarea name="date" rows="1" cols="10" id="date" onfocusout="dateValid()"><?php echo($row['t_date']); ?></textarea><br> <br>
        <span id = "dateText"> </span>

        <label class="form-control-label" > Time : </label>
        <textarea name='time' rows="1" cols="10" id="time" onfocusout="timeValid()"><?php echo ($row['t_time']);?></textarea> <br> <br>

        <label class="form-control-label"> Task (upto 300 characters) :  </label>
        <textarea rows="6" cols="40" name="todo" maxlength="300"><?php echo($row['task']);?></textarea> <br> <br>

        <label class="form-control-label"> Task status:  </label>
        <select name='task_completion'>
                        <option value="0"> Incomplete </option>
                        <option value="1"> Complete </option>
                    </select>
                    <br> <br>
        <input class="btn btn-success" type='submit' id='submit' name='save' value='save'>
    </form>

   
</body>

</html>