<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="css/register_css.css">
    <meta charset="UTF-8">
    <meta name="description" content="ICD0007 Project, Todo List">
    <title> Registration</title>
    <script src="./js/register.js"> </script>
</head>

<body>

    <nav class="nav">
        <a href="index.php"> Index </a> &nbsp; &nbsp;
        <a href="register.php"> Register </a>&nbsp; &nbsp;
        <a href="create.php"> Create List </a>&nbsp; &nbsp;
        <a href="view.php"> View List</a>&nbsp; &nbsp;
        <a href="delete.php"> DELETE Tasks </a>&nbsp; &nbsp;
        <a href="faq.php"> FAQ </a>&nbsp; &nbsp;
    </nav>

    <h2> Registration</h2>

    <form action="./php/register.php" method="post"> <!--On submit call the matchPass function from the passwordMatch script -->
        User Name &emsp;: <input type="text" name="userName" id = "userName" onkeyup= "searchUser()"> &nbsp;&nbsp;&nbsp; <span id="suggest"> </span> <br>
        Email &emsp;&emsp; &nbsp;&nbsp;&nbsp; : <input type="email" name="email" required> <br>
        Password &emsp; &nbsp;&nbsp;: <input type="password" name="pass1" id="pass1" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match1"> </span> <br>
        Confirm Password : <input type="password" name="pass2" id="pass2" onkeyup="matchPass()" required> &nbsp;&nbsp;<span id="match2"> </span> <br>
        <span id="match"> </span>
        <input type="submit" name="submit" value="submit" id = "submit" disabled>
    </form>



</body>


</html> 