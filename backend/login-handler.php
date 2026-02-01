<?php
session_start();
include 'db.php';
date_default_timezone_set('Asia/Manila');

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (!$username || !$password) {
    echo "<script>
         alert('Missing credentials.');
         window.history.back();
    </script>";
    exit();
}

$userRow = $conn->prepare("SELECT USERNAME, PASSWORD, ROLE FROM USER WHERE USERNAME = ? LIMIT 1");
$userRow->bind_param("s", $username);
$userRow->execute();
$userResult=$userRow->get_result();

if ($user = $userResult->fetch_assoc()) {
    if($password === $user['PASSWORD']) {

        $_SESSION['user'] = $user['USERNAME'];
        $_SESSION['role'] = $user['ROLE'];
        $_SESSION['latestActivity'] = time();
        $_SESSION['latestLoginTime'] = date("Y-m-d H:i:s");
        $_SESSION['expiredSession'] = 10;

        header("Location: ../workout.php");
        exit();
    }
}

echo "<script>
     alert('Invalid credentials.');
     window.history.back();
</script>";
exit();
