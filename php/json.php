<?php

    function getJsonData($pathToFile) {
        $file = fopen($pathToFile, "r") or die("Error retrieving database");
        $data = fread($file, filesize($pathToFile));
        fclose($file);

        return json_decode($data);
    }

?>