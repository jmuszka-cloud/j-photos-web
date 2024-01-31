<!DOCTYPE html>
<head>
    <title>j-photos | Login</title>
    <meta charset="UTF-8" lang="en">
    <link rel="stylesheet" href="css/desktop-login.css" media="(min-width: 1600px)"/>
    <link rel="stylesheet" href="css/mobile-login.css" media="(max-width: 1600px)"/>
</head>

<?php 
    unset($_SESSION['userInfo']);
?>

<html>
<body style="text-align: center;">
    <div id="bg-image"></div>
    <div id="bg-tint"></div>

    <div id="login-panel">
        <br>
        <h1>j-photos</h1>
        <p>Cloud storage to store photos and videos.</p>
        <p>Secure. Cross-platform. Free.</p><br><br>

        <form action="php/validate_login.php" method="POST">
            Username: <input type="text" name="username" id="username"><br><br>
            Password: <input type="password" name="password" id="password"><br><br><br>
            <input type="submit" id="submit" value="Log in">
        </form>
    </div>
</body>
</html>