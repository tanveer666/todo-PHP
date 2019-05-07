<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <meta charset="UTF-8">
        <meta name="description" content="ICD0007 Project, Todo List">
        <title> FAQ</title>
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
                <a class="nav-link" href="faq.php"> About us </a>&nbsp; &nbsp;
            </li>

        </ul>

        <ul style=' text-align:end;' class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="GET" action="php/logout.php">
                    <input class='btn btn-info' type = 'submit' name =' logout' value = 'logout'>
                </form>
            </li>    
          </ul>
    </nav>

    <h2 style="text-align: center; margin-top:80px"> About us</h2>
    <p style="text-align: center;"> A relatively simple website containing your daily todo list! To use, first register, then log in and create, edit delete and most importantly view your to do's for the day! </p>

    <p style="text-align: center;"> The website was created by Tanveer Hasan and Ahmed Joyon, both first year cyber security engineering students as part of the ICD0007 Web technologies course </p>

    <p style="text-align: center;"> This modest website is built using mainly PHP for the backend, running on a apache server and connected to a MySQL database. A bit of javascript is used for the front end user
        interactivity </p>
     
 
 </body>
</html>
