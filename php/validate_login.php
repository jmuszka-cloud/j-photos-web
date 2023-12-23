<?php
    include 'json.php';

    //Get submitted information
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    //Retrieve database
    $database = getJsonData("../ref/data.json");

    //TODO: encrypted passwords

    //Check passwords
    foreach ($database as $user) {
        //If username and password match
        if ($enteredUsername===$user->username && $enteredPassword===$user->password) {
            //Send to main page
            header("Location: ../photos.php");
            exit;
        }
    }

    //If no match, return to login page
    header("Location: ../login.php");
    //TODO: put message on login page
    exit;
    

?>