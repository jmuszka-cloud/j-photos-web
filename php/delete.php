<?php
    session_start();
    include 'json.php';

    $photoId = $_POST["id"];
    $userId = $_SESSION['userInfo']->password;

    //Physically delete file from server
    $jsonData = getJsonData("../ref/userdirs/$userId/photoData.json");
    $jsonData = json_decode(json_encode($jsonData), true);

    foreach ($jsonData as $key => $photo) {
        if ($photo["id"] == $photoId) {
            if (file_exists("../ref/userdirs/$userId/photos/" . $photo["filename"])) {
                unlink("../ref/userdirs/$userId/photos/" . $photo["filename"]);
                unset($jsonData[$key]);
            } else exit;
        }
    }

    //Update JSON file
    writeJson(json_encode($jsonData), "../ref/userdirs/$userId/photoData.json");
?>