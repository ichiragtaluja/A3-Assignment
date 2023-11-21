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
$articleId = $row["article-id"];
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <h1>Edit article</h1>
        <form action="update-article.php" method="POST">
            <h1><label>Heading: <input type="text" name="heading" value="<?= $heading ?>" /></label></h1>
            <input type="hidden" name="articleId" value="<?= $articleId ?>" />
            <label>Content: <textarea name="content"><?= $content ?></textarea></label>
            <label>Image:<input type=" text" name="image" value="<?= $imageLink ?>"></label>
            <label>Author:<input type="text" name="author" value="<?= $author ?>"></label>
            <label>Link to article:<input type="text" name="link" value="<?= $articleLink ?>"></label>
            <label>Image alt text:<input type="text" name="alt" value="<?= $imageAltText ?>"></label>
            <input type="submit" value="Update" />
        </form>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>