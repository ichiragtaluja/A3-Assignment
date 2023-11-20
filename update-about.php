<?php


$content = $_POST["content"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);


//prepare
$stmt = $pdo->prepare("UPDATE `about-page` SET 
`content` = '$content';");

//execute
if ($stmt->execute()) { ?>

    <p>About page text is updated to: </p>
    <p><?= $content ?></p><?php
                        } else { ?>

    <p>Could not update About Us page</p><?php
                                        }

                                            ?>





<a href="index.php">Back to home page</a>