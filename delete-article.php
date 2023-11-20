<?php

$articleId = $_POST["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("DELETE FROM articles WHERE `articles`.`article-id` = $articleId");

//execute

if ($stmt->execute()) {

?><p>Article <?= $articleId ?> deleted</p> <?php
                                        } else {

                                            ?> <p>Coul not delete article</p><?php
                                                                            }

                                                                                ?>
<a href="index.php">Go to home page</a>