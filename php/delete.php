<?php
    session_start();
    include 'json.php';

    $photoId = $_POST["id"];
    $userId = $_SESSION['userInfo']->password;
    $USERNAME = $_SESSION['userInfo']->username;

    //Physically delete file from server
    $jsonData = getJsonData("../ref/userdirs/$userId/photoData.json");
    $jsonData = json_decode(json_encode($jsonData), true);
    $size = 0; //to get size of photo

    foreach ($jsonData as $key => $photo) {
        if ($photo["id"] == $photoId) {
            if (file_exists("../ref/userdirs/$userId/photos/" . $photo["filename"])) {
                $size = intval($photo["size"]);
                unlink("../ref/userdirs/$userId/photos/" . $photo["filename"]);
                unset($jsonData[$key]);
            } else exit;
        }
    }

    //Update JSON file
    writeJson(json_encode($jsonData), "../ref/userdirs/$userId/photoData.json");


    //Subtract former photo's filesize from user's current total storage
    $userdata = getJsonData("../ref/data.json"); //obj
    $newTotalStorage = "" . (intval($userdata->$USERNAME->currentStorage) - $size);
    $userdata->$USERNAME->currentStorage = $newTotalStorage;

    writeJson(json_encode($userdata), "../ref/data.json");
?>