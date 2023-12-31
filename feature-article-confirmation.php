<?php

$articleId = $_GET["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE `article-id` = $articleId");

//execute
$stmt->execute();

//process results
$row = $stmt->fetch();

$heading = $row["heading"];
$imageLink = $row["image-link"];
$content = $row["content"];
$author = $row["author"];
$imageAltText = $row["image-alt-text"];
$articleLink = $row["article-link"];
?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <h1>Feature article confirmation page</h1>
        <p>Are you sure you want to feature this article?</p>
        <article>
            <img src="<?= $imageLink ?>" alt="<?= $imageAltText ?>" />
            <p class="author">By <?= $author ?></p>
            <h4 class=" title">
                <?= $heading ?>
            </h4>
            <p class="preview-text">
                <?= $content ?>

            </p>
            <a href="<?= $articleLink ?>">Article link</a>
        </article>
        <a href="index.php">No</a>
        <form action="feature-article.php" method="POST">
            <input type="hidden" name="articleId" value="<?= $row["article-id"] ?>" />
            <input type="submit" value="yes" />
        </form>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>