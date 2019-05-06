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
    <!-- On submit, the script register.php is called, which adds a new entry for the user in the database and creates a table (with his userName) for his tasks.-->
    <div class='form'>
    <form class = 'form-group' style='text-align:center; margin-top: 35px'  action="./php/register.php" method="post"> <!--On every key press call the matchPass function from the passwordMatch script -->
        
        <label class="form-control-label"> User Name :</label> <span id="suggest"> </span>
        <input type="text" name="userName" id = "userName" onkeyup= "searchUser()"> &nbsp;&nbsp;&nbsp;  <br> <!-- on every key press, it uses the search user function in the script to see if username is availble. -->

        <label class="form-control-label"> Email :</label>
        <input type="email" name="email" required> <br>

        <label class="form-control-label"> Password :</label>
        <input type="password" name="pass1" id="pass1" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match1"> </span> <br> <!-- On every key press it checks the 2 password fields for matches. -->
        <label class="form-control-label"> Confirm Password :</label>
        <input type="password" name="pass2" id="pass2" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match2"> </span> <br>
        
        <br><br><span id="match"> </span>
        
         <br> <input class="btn btn-success" type="submit" name="submit" value="submit" id = "submit" disabled> <!-- If username is available and both passwords match, the submit button is enabled. -->
    </form>
    </div>

    
</body>


</html> 