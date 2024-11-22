<?php
session_start();
session_destroy();
header("Location: administration.php"); // Redirect to the login page
exit();
?>
