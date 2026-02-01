<?php
session_start();
include 'backend/db.php';

if(isset($_GET['status']) && $_GET['status'] === 'loggedOut') {
    echo "<script>
        alert('You have been successfully logged out.');
    </script>";
}

if(isset($_GET['status']) && $_GET['status'] === '10SecondsOfInactivity') {
    echo "<script>
        alert('You have been automatically logged out due to 10 seconds of inactivity.');
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack</title>
    <link href = "styles.css" rel = "stylesheet">
</head>
<body>
    
<form action = "backend/login-handler.php" method = "POST">
    <div class = "loginBox">
        <h1>Login</h1>
        <div class = "fields">
            <label id="username">Username: </label>
            <input type = "text" name = "username" placeholder = "Username">
        </div>
        <div class = "fields">
            <label id="password">Password: </label>
            <input type = "password" name = "password" placeholder = "Password">
        </div>
        <div class = "fields">
            <button name = "login" id="login">Login</button>
        </div>
    </div>
</form>

</body>
</html>
