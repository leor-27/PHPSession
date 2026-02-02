<?php
session_start();
include 'backend/db.php';

session_unset();
session_destroy();

header("Location: index.php?status=loggedOut"); 
/* references the loggedOut status declared in index.php which alerts a message to the user */
exit();
?>
