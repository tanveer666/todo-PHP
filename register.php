<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Registration</title>
    <script src="./js/register.js"> </script>
</head>

<body style='background-image:url("img/back.jpg"); background-repeat: no-repeat;'>

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

    <h2 style="text-align: center; margin-top:80px"> Registration</h2>

    <div class='form'>
    <form class = 'form-group' style='text-align:center; margin-top: 35px'  action="./php/register.php" method="post"> <!--On every key press call the matchPass function from the passwordMatch script -->
        
        <label class="form-control-label"> User Name :</label> <span id="suggest"> </span>
        <input type="text" name="userName" id = "userName" onkeyup= "searchUser()"> &nbsp;&nbsp;&nbsp;  <br>

        <label class="form-control-label"> Email :</label>
        <input type="email" name="email" required> <br>

        <label class="form-control-label"> Password :</label>
        <input type="password" name="pass1" id="pass1" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match1"> </span> <br>
        <label class="form-control-label"> Confirm Password :</label>
        <input type="password" name="pass2" id="pass2" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match2"> </span> <br>
        
        <br><br><span id="match"> </span>
        
         <br> <input class="btn btn-success" type="submit" name="submit" value="submit" id = "submit" disabled>
    </form>
    </div>

    
</body>


</html> 