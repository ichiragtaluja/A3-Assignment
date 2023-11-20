<?php session_start();
session_destroy();

$role = $_SESSION["role"];
?>

<p>You have logged out.</p>
<a href="login.php">Login here </a>

<p>Go to home.</p>
<a href="index.php">Home</a>