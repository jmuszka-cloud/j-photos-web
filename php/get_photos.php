<?php
    include 'json.php';

    function getPhotosByUserId($userId) {
        return getJsonData("ref/userdirs/".$userId."/photoData.json");
    }

    function getFilenameById() {}
    function getDateById() {}
    function getFiletypeById() {}
    function getFileSizeById() {}
    function getWidthById() {}
    function getHeightById() {}
    function getLengthById() {}
?>