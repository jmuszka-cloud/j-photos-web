<!DOCTYPE html>
<html>

<head>
    <title>j-photos | Gallery</title>
    <meta charset="UTF-8" lang="en">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/ajax_form.js" type="text/javascript"></script>
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


<!-- Header -->
<div>Welcome, <?php echo $NAME?></div><br>
<div>Upload, view, and add photos to your gallery</div><br><br><br>

<!-- Main -->
<?php
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

<!-- Upload -->
<div>
    <form id ="photoUploadForm" method="POST" enctype="multipart/form-data">
        <input type="file" id="file" name="fileUpload">
        <input type="button" name="submit" onclick="uploadToServer('file');">
    </form>
</div>


<body>





</html>