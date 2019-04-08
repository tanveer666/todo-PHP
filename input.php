

<html>
    <head>
    <meta charset="utf-8">
        <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
        <meta name="keywords" content="ICD0007, LAB5, CSS">
        <title>Form Validation</title>
        
        <?php
    //$form_values = $_POST['salutation'] + '.' + $_POST['f_name'] + ',' + $_POST['mid_name'] + ',' + $_POST['l_name'] + ','  + $_POST['age'] + ',' + $_POST['email'] + ',' + $_POST['tel'] + ',' + $_POST['date'] + ';' ;
    //file_put_contents("form.txt", $form_values, FILE_APPEND);


    if(is_writable("form.txt"))
    {
        echo "writeable";
    }
    else
    {
        echo "unwriteable";
    }
   
    
    
    
    
    $fptr = fopen('form.txt', 'a+') or die("failure");
        $form_values = 'salutations \n';
        fwrite($fptr, $form_values);
        fclose($fptr);
        die("done!");
    ?>

    </head>

    <body>

    <h2> HTML FORM VALIDATION </h2>

    <form method="POST" action=" ">
        <select name = "salutation">
            <option value = "Mr"> Mr </option>
            <option value = "Mrs"> Mrs </option>
            <option value = "Dr"> Dr </option>
            <option value = "Prof"> Prof </option>
            <option value = "Sir"> Sir </option>
        </select>
        <label for = "first"> First Name </label>
        <input type="text" name = "f_name" id = "first" required> <br>

        <label for = "middle"> Middle Name </label>
        <input type="text" name = "mid_name" id = "middle"> <br>

        <label for = "last"> Last Name </label>
        <input type="text" name = "l_name" id = "lirst" required> <br>

        <label for = "age"> Age </label>
        <input type="number" name = "age" label = "age" min = "17" max = "200" required> <br>

        <label for = "e"> Email </label>
        <input type="email" name = "email" label = "e" required> <br>

        <label for = "phone"> Phone </label>
        <input type = "tel" name = "tel" label = "phone"> <br>

        <label for = "Date"> Date of Arrival </label>
        <input type="date" name = "date" label = "Date" required> <br>

     
        <input type="submit" name = "submit"> <br>
    </form>

    

    </body>

</html>




