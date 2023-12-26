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
<div id="settingsButton">
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
    $photos = getPhotosByUserId($USER_ID);

    //Print photo information
    foreach($photos as $photo) {
        
        echo "<div ";
        echo "id=\"$photo->id\" ";
        echo "class=\"thumbnail\" ";
        //echo "onclick=\"printId(event)\"";
        echo "onclick=\"deletePhoto(event);\" ";
        echo "style=\"background-image: url('../$photo->directory');
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
        \"";
        echo ">";

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

        //echo "<img src=\"$photo->directory\" width=\"50px\"/>";

        echo "</div>";
    }
?>
</div>

<div id="screen-cover"></div>

<!-- Setting menu -->
<div id="settingsMenu">
</div>

<!-- Upload menu -->
<div id="uploadMenu">
    <div class="closeButton" onclick="closeUploadMenu();">
        x
    </div>

    Upload a photo

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