<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/index_style.css">
    <meta charset="utf-8">
    <title>Personal Assistence</title>
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
    <h2> WELCOME TO YOUR VERY OWN PERSONAL ASSISTENT</h2>
    <p> In modern lifestyle we have to do lot of things, be at different places and communicate with lot of people.
        It gets complicated to manage all this. You have to plan your day, week even a month at a time.
        <br><b> So join us , manage your day with ease.</b></p>

    <form method="POST" action = "php/index.php">
        <label id="user"> Username:</label>

        <input type="text" name="userName" id="user">
        <br><br>
        <label id="pass"> Password: </label>
        <input type="password" name="pass" id="pass">
        <br><br>
        <input type="submit" name="submit" value="submit">
    </form>


</body>

</html> 