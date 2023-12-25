<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    include 'json.php';

    echo getLastJsonData("../ref/userdirs/tset/photoData.json")->uploadTime;

?>