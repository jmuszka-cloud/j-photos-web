<?php

    function getJsonData($pathToFile) {
        $file = fopen($pathToFile, "r") or die("Error retrieving database");
        $data = fread($file, filesize($pathToFile));
        fclose($file);

        return json_decode($data);
    }

    function getLastJsonData($pathToFile) {
        $jsonData = getJsonData($pathToFile);

        foreach($jsonData as $entry) {
            $lastElement = $entry;
        }
        
        return $lastElement;
    }

    function appendJson($jsonStr, $jsonFilePath) {
        $file = fopen($jsonFilePath, "r") or die("Error retrieving database");
        $oldData = fread($file, filesize($jsonFilePath));
        fclose($file);

        $newData = json_encode(
                    array_merge(json_decode($oldData, true),
                                json_decode($jsonStr, true))
                    );

        $file = fopen($jsonFilePath, "w") or die("Error retrieving database");
        fwrite($file, $newData);
        fclose($file);
    }

    function writeJson($jsonStr, $jsonFilePath) {
        $file = fopen($jsonFilePath, "w") or die("Error retrieving database");
        fwrite($file, $jsonStr);
        fclose($file);
    }

?>