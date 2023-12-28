<!DOCTYPE html>
<html>
    <head>
        <title>j-photos | Settings</title>
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/settings.css"/>
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

        <!-- Settings button -->
        <div id="backButton" onclick="history.back()">
            <div>←</div>
        </div>

        <!-- Greeting panel -->
        <div id="greetingPanel">

            <h1 class="heading">Settings</h1>
            <br>
            <hr>

            <h3 class="subheading">Account information:</h3><br>
            <p>Name: <?php echo "<b>$NAME</b>"; ?></p>
            <p>Username: <?php echo "<b>$USERNAME</b>"; ?></p>
            <p>Account created: <?php echo "<b>" .  epochToGregorian($ACCOUNT_CREATED) . "</b>"; ?></p>
            <p>Max upload size: <b>10 MB</b></p>
            <p>Storage: <b>0.5 GB out of 10 GB used</b></p>
            <br>
            <hr/>

            <h3 class="subheading">Preferences</h3><br>
            <p>Theme: <b>Dark</b></p>
            <p>Font size: <b>Medium</b></p>
            <p>Accent color: <b>#09b598 <span style="color: #09b598; display: inline;">■</span></b></p>
            <p>Background (photo panel): <b>fuji.webp</b></p>
            <p>Background (login page): <b>schwarzwald.jpg</b></p>

        </div>

        <div id="footer">
            <hr style="margin: 0;">
            <p>v1.0.0 • Dec 2023 • <a href="login.php">Sign out</a><p>
        </div>

    </body>
</html>