<?php
session_start();
include 'backend/db.php';

session_unset();
session_destroy();

header("Location: index.php?status=loggedOut");
exit();
?>
