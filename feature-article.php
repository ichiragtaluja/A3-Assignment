<?php

$articleId = $_POST["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
//prepare
$stmt1 = $pdo->prepare("UPDATE `articles` SET `featured` = '0' WHERE `articles`.`featured` = 1;");
$stmt2 = $pdo->prepare("UPDATE `articles` SET `featured` = '1' WHERE `articles`.`article-id` = $articleId;");

//execute

if ($stmt1->execute() && $stmt2->execute()) {

?><p>Article <?= $articleId ?> featured</p> <?php
                                        } else {

                                            ?> <p>Coul not feature the article</p><?php
                                                                                }

                                                                                    ?>
<a href="index.php">Go to home page</a>