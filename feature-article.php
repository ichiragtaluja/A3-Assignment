<?php

$articleId = $_POST["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);


//prepare
$stmt1 = $pdo->prepare("UPDATE `articles` SET `featured` = '0' WHERE `articles`.`featured` = 1;");
$stmt2 = $pdo->prepare("UPDATE `articles` SET `featured` = '1' WHERE `articles`.`article-id` = $articleId;");

//execute

if ($stmt1->execute() && $stmt2->execute()) {

?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>Article <?= $articleId ?> featured</p>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>Coul not feature the article</p>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php
}
?>
<a href="index.php">Go to home page</a>