<?php

$username = $_POST["username"];
$password = $_POST["password"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];



//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("INSERT INTO `users` (`userId`, `fName`, `lName`, `email`, `username`, `password`, `role`) VALUES (NULL, '$fName', '$lName', '$email', '$username', '$password', 'member');");




//execute
if ($stmt->execute()) {

    include("login.php");
} else {

?><p>Sorry! You are not registered.. <a href="sign-up.php">try again.</p><?php
                                                                        }
                                                                            ?>