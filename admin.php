<!DOCTYPE html>
<html>
    <head>
        <title>j-photos | Admin dashboard</title>
        <meta charset="UTF-8" lang="en">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="css/settings.css"/>
    </head>

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