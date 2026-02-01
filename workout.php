<?php
session_start();

include 'backend/db.php';
date_default_timezone_set('Asia/Manila');

if(!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['latestActivity']) && (time() - $_SESSION['latestActivity'] > $_SESSION['expiredSession'])) {
    session_unset();
    session_destroy();
    header("Location: index.php?status=10SecondsOfInactivity");
    exit();
}

$_SESSION['latestActivity'] = time();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout</title>
    <link href = "styles.css" rel = "stylesheet">
    <script>
        window.addEventListener("pageshow", function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</head>
<body>
    <h1 class = "header">Welcome, <?php echo $_SESSION['user']; ?>!</h1>
    <p class = "loginTime">Last logged in at: <?php echo $_SESSION['latestLoginTime']; ?></p> <br>
    <p class = "basicWorkout"><i class = "today">Today's Basic Workout:</i> 50 Pushups & 5km Run. </p>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'VIP'): ?>
        <div class = "vipBox">
            <h2>VIP Content</h2>
        </div>
        <div class = "videos">
            <p class = "videosHeader"><u>Personal Trainer Videos</u></p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/TN9i9Ni0Xr4?si=WZJCXQsDgPbnjACI" 
                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/M0uO8X3_tEA?si=Ko2O49GukdXWihcG" title="YouTube video player" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    <?php endif; ?>

    <a class = "logout" href = "logout.php">Logout</a>
</body>
</html>
