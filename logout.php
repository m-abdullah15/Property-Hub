<?php
session_start();
session_destroy();
session_unset(); // Clear session variables
header("Location: index.php");
exit();
?>