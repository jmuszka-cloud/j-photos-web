<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include 'json.php';
    
    //Get user info
    session_start();
    $userId = $_SESSION['userInfo']->password;
    //unset($_SESSION['userInfo']); //TODO: move this?
    if (!$USERNAME || !$USER_ID) header("Location: ../login.php"); //Return to login if no info provided

    //Check if file transfer was successful
    if (!$_FILES["file"]) die("Error processing file");

    //File information
    $FNAME = $_FILES["file"]["name"];
    $TARGET_DIR = "../ref/userdirs/$userId/photos/$FNAME";
    $SIZE = $_FILES["file"]["size"];
    $TMP_NAME = $_FILES["file"]["tmp_name"];

    //Check if file already exists
    if (file_exists($TARGET_DIR)) die("File already exists");

    //TODO: Check file size
    //TODO: limit file type

    //Upload file
    move_uploaded_file($TMP_NAME, $TARGET_DIR);

    //Put new photo data into a json string
    $filename = $FNAME;
    $directory = $TARGET_DIR;
    //TODO: id
    $uploadTime = floor(microtime(true) * 1000);
    //TODO: type
    $size = $SIZE;
    //TODO: width
    //TODO: height
    //TODO: length
    $photoInfo = [
        "filename" => $filename,
        "directory" => $directory,
        "id" => "null",
        "uploadTime" => $uploadTime,
        "type" => "null",
        "size" => $size,
        "width" => "null",
        "height" => "null",
        "length" => "null"
    ];
    $photoInfo = json_encode($photoInfo);

    //Add new photo to json file
    appendJson($photoInfo, "../ref/userdirs/$userId/photoData.json");

?>