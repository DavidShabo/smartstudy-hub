<?php
// D.S: Logout page
session_start();

// Clear session
session_destroy();

// Redirect to home
header('Location: index.php');
exit;
?> 