 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="stylesheet" href= "css/bootstrap.css">
        <meta charset="UTF-8">
        <meta name="description" content="ICD0007 Project, Todo List">
        <script src="js/libraries/node_modules/moment/moment.js"> </script>
        <script src="js/edit.js"> </script>
        <title> Create List</title>
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

        <h2 style="text-align: center; margin-top:80px"> Create List</h2>
        <div class='form'>
        <form class = 'form-group' style='text-align:center' action = "./php/createTask.php" method="POST" onsubmit="return dateValid()"> 
            <label class="form-control-label"> Date : </label>
            <input type="text" name="date" id = 'date' onchange='dateValid();' required> <!-- <span id = 'dateText'> </span>  -->
            
            <br><br><br>
            <label class="form-control-label" > Time : </label> 
            <input type = "time" name ="time" required> <br> <br>

            <label class="form-control-label"> Task (upto 300 characters) :  </label>
            <textarea rows = "6" cols= "40" name = "todo" maxlength="300" required></textarea> <br> <br>
            
            <input class="btn btn-outline-success" type="submit" name = "submit" value="submit" id='submit'> <br>
        </form>
        </div>

    </body>
</html>


