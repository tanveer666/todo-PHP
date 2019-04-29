 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <link rel="stylesheet" href= "css/create_style.css">
        <meta charset="UTF-8">
        <meta name="description" content="ICD0007 Project, Todo List">
        <script src="js/libraries/node_modules/moment/moment.js"> </script>
        <script src="js/edit.js"> </script>
        <title> Create List</title>
    </head>

    <body>

            
    <nav class="nav">
        <a href="index.php"> Index </a> &nbsp; &nbsp;
        <a href="register.php"> Register </a>&nbsp; &nbsp;
        <a href="create.php"> Create List </a>&nbsp; &nbsp;
        <a href="view.php"> View List</a>&nbsp; &nbsp;
        <a href="faq.php"> FAQ </a>&nbsp; &nbsp;
    </nav>

        <h2> Create List</h2>
        
        <form action = "./php/createTask.php" method="POST"> 
            Date : <input type="text" name="date" id = 'date' onchange='dateValid();' required> <span id = 'dateText'> </span> <br> <br>
            Time : <input type = "time" name ="time" required> <br> <br>
            Task (upto 300 characters) : <textarea rows = "6" cols= "40" name = "todo" maxlength="300" required></textarea> <br> <br>
            
            <input type="submit" name = "submit" value="submit" id='submit' disabled> <br>
        </form>


    </body>
</html>


