<?php
    include 'json.php';
    include 'password.php';

    //Get submitted information
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    //Retrieve database
    $database = getJsonData("../ref/data.json");

    //Check if it's admin login
    if ($enteredUsername==="admin" && $enteredPassword==="admin") {
        //TODO: allow custom admin passwords
        header("Location: ../admin.php");
        exit;
    }

    //TODO: encrypted passwords

    //Check passwords
    foreach ($database as $user) {
        //If username and password match
        //if ($enteredUsername===$user->username && $enteredPassword===$user->password) {
        if ($enteredUsername===$user->username && checkPassword($enteredPassword, $user->password)) {
            //Send to main page
            session_start();
            $_SESSION['userInfo'] = $user; //to save user info
            header("Location: ../photos.php");
            exit;
        }
    }

    //If no match, return to login page
    header("Location: ../login.php");
    //TODO: put message on login page
    exit;
    

?>