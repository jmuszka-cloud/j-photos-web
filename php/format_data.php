<?php
    function epochToGregorian($unixMillis) {
        $timestamp = $unixMillis / 1000;
        return $today = date("F j, Y, g:i a", $timestamp);
    }

    function convertBytes($bytes) {

        $SCALING = 1000.0; //1000 or 1024?

        if (0 < $bytes && $bytes < $SCALING) return round($bytes*100)/100.0 ." B";
        
        $kilobytes = $bytes / $SCALING;
        if (0 < $kilobytes && $kilobytes < $SCALING) return round($kilobytes*100)/100.0 ." KB";

        $megabytes = $kilobytes / $SCALING;
        if (0 < $megabytes && $megabytes < $SCALING) return round($megabytes*100)/100.0 ." MB";

        $gigabytes = $megabytes / $SCALING;
        if (0 < $gigabytes && $gigabytes < $SCALING) return round($gigabytes*100)/100.0 ." GB";

        return round($bytes*100)/100.0 ." B";
    }

    function convertDimensions($width, $height) {
        return $width."x".$height." px";
    }

?>