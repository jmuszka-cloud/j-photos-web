<!DOCTYPE html>
<html>

<head>
    <title>j-photos | Gallery</title>
    <meta charset="UTF-8" lang="en">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/ajax_form.js" type="text/javascript"></script>
    <script src="js/events.js" type="text/javascript"></script>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

<!-- Init -->
<?php
    include 'php/get_photos.php';
    include 'php/format_data.php';

    //Get user info
    session_start();
    $USERNAME = $_SESSION['userInfo']->username;
    $USER_ID = $_SESSION['userInfo']->password;
    $NAME = $_SESSION['userInfo']->name;
    //unset($_SESSION['userInfo']); //TODO: move this?
    if (!$USERNAME || !$USER_ID || !$NAME) header("Location: login.php"); //Return to login if no info provided
?>


<!-- Settings button -->
<div id="settingsButton" onclick="goToSettings();">
            <div>☰</div>
</div>

<!-- Upload button -->
<div id="uploadButton" onclick="openUploadMenu();">
            <div>+</div>
</div>

<!-- Greeting panel -->
<div id="greetingPanel">
            <h1 class="heading">j-photos</h1>
            <h3 class="subheading">Welcome, <?php echo $NAME?></h3>
</div>

<br>
<hr/>

<!-- Photo panel -->
<div id="photoPanel">
<?php

    //Get list of photos and reverse them
    $photos = getPhotosByUserId($USER_ID);
    $photos = json_encode($photos);
    $photos = json_decode($photos, true);
    $photos = array_reverse($photos);
    $photos = json_encode($photos);
    $photos = json_decode($photos);

    //Print photo information
    foreach($photos as $photo) {

        //thumbnail div
        echo "<div ";
        echo "id=\"$photo->id\" ";
        echo "class=\"thumbnail\" ";
        //echo "onclick=\"printId(event)\"";
        //echo "onclick=\"deletePhoto(event);\" ";
        echo "onclick=\"openInfoMenu($photo->id);\"";
        echo "style=\"background-image: url('../$photo->directory');
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
        \"";
        echo ">";
        echo "</div>";

        //This is for the info menu for each photo
        /*
        echo "$photo->filename<br>";
        echo " --- Filename: $photo->filename<br>";
        echo " --- Directory: $photo->directory<br>";
        echo " --- ID: $photo->id<br>";
        echo " --- Date: ". epochToGregorian($photo->uploadTime) ."<br>";
        echo " --- Type: $photo->type<br>";
        echo " --- Size: ". convertBytes($photo->size) ."<br>";
        echo " --- Dimensions: ". convertDimensions($photo->width, $photo->height) ."<br>";
        //if ($photo->length >= 0) echo " --- Length: ". convertLength($photo->length) ."<br>"; //TODO: fix formatting
        */

        //Associated info menu
        echo "<div ";
        echo "id=\"info-$photo->id\"";
        echo "class=\"infoMenu\"";
        echo "style=\"z-index: 2;\"";
        echo ">";
        //Close button
        echo "<div class=\"closeButton\" onclick=\"closeInfoMenu($photo->id);\">x</div>";
        //Delete button
        echo "<div class=\"deleteButton\" onclick=\"deletePhoto($photo->id); closeInfoMenu($photo->id);\">🗑</div>";
        //Image
        echo "<img src=\"../$photo->directory\" class=\"fullImage\"/>";
        //Info
        echo "<div class=\"metadata\">";
            echo "<p>$photo->filename</p>";
            echo "<p>" . epochToGregorian($photo->uploadTime) . "</p>";
            echo "<p>$photo->type</p>";
            echo "<p>" .  convertBytes($photo->size) . "</p>";
            echo "<p>" .  convertDimensions($photo->width, $photo->height) . "</p>";
            //TODO: length
        echo "</div>";
        echo "</div>";
    }
?>
</div>

<!-- Footer -->
<div id="footer">
    <hr style="margin: 0;">
    <p>v1.0.0 • Dec 2023 • <a href="login.php">Sign out</a><p>
</div>

<div id="screen-cover"></div>


<!-- Info menu
<div id="infoMenu">


    <div class="closeButton" onclick="closeInfoMenu();">
                x
            </div>

    [Photo info]
</div>
-->

<!-- Setting menu -->
<div id="settingsMenu">
</div>

<!-- Upload menu -->
<div id="uploadMenu">
    <div class="closeButton" onclick="closeUploadMenu();">
        x
    </div>

    <p>Upload a photo</p>

    <!-- Upload -->
    <div>
        <form id ="photoUploadForm" method="POST" enctype="multipart/form-data">
            <input type="file" id="file" name="fileUpload">
            <input type="button" name="submit" onclick="uploadToServer('file');">
        </form>
    </div>
</div>


<body>





</html>