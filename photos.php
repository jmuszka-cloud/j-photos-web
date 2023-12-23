<?php
    include 'php/get_photos.php';
    include 'php/format_data.php';

    //Get user info
    session_start();
    $USERNAME = $_SESSION['userInfo']->username;
    $USER_ID = $_SESSION['userInfo']->password;
    $NAME = $_SESSION['userInfo']->name;
    //unset($_SESSION['userInfo']); //TODO: move this?
    if (!$USERNAME || !$NAME) header("Location: login.php"); //Return to login if no info provided


    $photos = getPhotosByUserId($USER_ID);

    //Print photo information
    foreach($photos as $photo) {
        echo "$photo->filename<br>";
        echo " --- Filename: $photo->filename<br>";
        echo " --- Directory: $photo->directory<br>";
        echo " --- ID: $photo->id<br>";
        echo " --- Date: ". epochToGregorian($photo->uploadTime) ."<br>";
        echo " --- Type: $photo->type<br>";
        echo " --- Size: ". convertBytes($photo->size) ."<br>";
        echo " --- Dimensions: ". convertDimensions($photo->width, $photo->height) ."<br>";
        //if ($photo->length >= 0) echo " --- Length: ". convertLength($photo->length) ."<br>"; //TODO: fix formatting

        echo "<br>";
    }


?>