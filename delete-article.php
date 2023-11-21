<?php

$articleId = $_POST["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("DELETE FROM articles WHERE `articles`.`article-id` = $articleId");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>

        <?php if ($stmt->execute()) {
        ?>
        <p>Article <?= $articleId ?> deleted</p>
        <a href="index.php">Go to home page</a>
        <?php
        } else {
        ?>
        <p>Could not delete article</p>
        <a href="index.php">Go to home page</a>
        <?php } ?>
    </main>

    <?php include("footer.php"); ?>
</body>

</html>