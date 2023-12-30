<!DOCTYPE html>
<html>
    <head>
        <title>j-photos | Admin dashboard</title>
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        
        <link rel="stylesheet" href="./css/desktop-settings.css" media="(min-width: 1600px)">
        <link rel="stylesheet" href="./css/mobile-settings.css" media="(max-width: 1600px)">
    </head>

    <?php
        include 'php/format_data.php';

        //Get session info
        session_start();
        $USERNAME = $_SESSION['userInfo']->username;
        $NAME = $_SESSION['userInfo']->name;
        $ACCOUNT_CREATED = $_SESSION['userInfo']->accountCreated;
        if (!$USERNAME || !$NAME || !$ACCOUNT_CREATED) header("Location: login.php"); //Return to login if no info provided
    ?>

    <body>
        <!-- Use max-width instead of width -->
        <!-- Use picture element instead of image element-->
        <!-- Use vw for text -->
        <!-- media queries -->

        <!-- Settings button -->
        <div id="backButton" onclick="history.back()">
            <div>←</div>
        </div>

        <!-- Greeting panel -->
        <div id="greetingPanel">
            <h1 class="heading">Settings</h1>
            <br>
            <hr>

            <h3 class="subheading">Admin dashboard:</h3><br>
            <p>Create new user</p>
            <p>Manage users</p>
            <p>Change defaults</p>

        </div>

        <div id="footer">
            <hr style="margin: 0;">
            <p>v1.0.0 • Dec 2023 • <a href="login.php">Sign out</a><p>
        </div>

    </body>
</html>