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
    $directory = substr($TARGET_DIR, 3);
    $id = getLastJsonData("../ref/userdirs/$userId/photoData.json")->id + 1;
    $uploadTime = floor(microtime(true) * 1000);
    $type = strtoupper(explode(".", $filename)[count(explode(".", $filename))-1]);
    $size = $SIZE;
    //TODO: width
    //TODO: height
    //TODO: length
    $photoInfo = ["69" => [
        "filename" => $filename,
        "directory" => $directory,
        "id" => $id,
        "uploadTime" => $uploadTime,
        "type" => $type,
        "size" => $size,
        "width" => "".getimagesize("../$directory")[0],
        "height" => "".getimagesize("../$directory")[1],
        "length" => "null"
    ]];
    $photoInfo = json_encode($photoInfo);

    //Add new photo to json file
    appendJson($photoInfo, "../ref/userdirs/$userId/photoData.json");

?>