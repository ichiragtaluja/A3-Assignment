<?php

$heading = $_POST["heading"];
$content = $_POST["content"];
$image = $_POST["image"];
$author = $_POST["author"];
$link = $_POST["link"];
$alt = $_POST["alt"];
$categoryId = $_POST["category-id"];
$featured = ($_POST["featured"] == 1) ? 1 : 0;
$featuredVal = $_POST["featured"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("INSERT INTO `articles` (`article-id`, `heading`, `image-link`, `content`, `author`, `image-alt-text`, `article-link`, `category-id`, `featured`) VALUES (NULL, '$heading', '$image', '$content', '$author', '$alt', '$link', '$categoryId', '$featured');");

//execute
if ($stmt->execute()) {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>Article inserted</p>
            <a href="index.php">Go to home page</a>
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
            <p>Could not insert article</p>
            <a href="index.php">Go to home page</a>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } ?>