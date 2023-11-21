<?php session_start();

$articleId = $_GET["articleId"];
$username = $_SESSION["username"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `articles` WHERE `articles`.`article-id`='$articleId';");

//execute
$stmt->execute();

$row = $stmt->fetch();

$heading = $row["heading"];
$imageLink = $row["image-link"];
$content = $row["content"];
$author = $row["author"];
$imageAltText = $row["image-alt-text"];
$articleLink = $row["article-link"];

//prepare 
$stmt3 = $pdo->prepare("SELECT * FROM `likes`
WHERE `likes`.`articleId`='$articleId' AND `likes`.`username`='$username';");

//execute
$stmt3->execute();

//process
$row3 = $stmt3->fetch();

$isLiked = $row3["isLiked"];

//prepare 
$stmt4 = $pdo->prepare("SELECT sum(`isLiked`) FROM `likes`
WHERE `likes`.`articleId`='$articleId' ;");

//execute
$stmt4->execute();

//process
$row4 = $stmt4->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <article>
            <p>Liked by: <?= ($row4[0] > 0) ? $row4[0] : '0' ?></p>
            <?php if ($_SESSION["loggedIn"] && $_SESSION["role"] == "member") { ?>
                <div>
                    <?php if ($isLiked) { ?>
                        <a href="process-like-unlike.php?username=<?= $username ?>&articleId=<?= $articleId ?>">Unlike</a>
                    <?php } else { ?>
                        <a href="process-like-unlike.php?username=<?= $username ?>&articleId=<?= $articleId ?>">Like</a>
                    <?php } ?>
                </div>
            <?php } ?>
            <img src="<?= $imageLink ?>" alt="<?= $imageAltText ?>" />
            <p class="author">By <?= $author ?></p>
            <h4 class=" title">
                <?= $heading ?>
            </h4>
            <p class="preview-text">
                <?= $content ?>
            </p>
            <a href="<?= $articleLink ?>">Article link</a>
            <?php if ($_SESSION["loggedIn"] && $_SESSION["role"] == "administrator") { ?>
                <div>
                    <a href="feature-article-confirmation.php?articleId=<?= $articleId ?>">Set as
                        featured</a>
                    <a href="edit-article-form.php?articleId=<?= $articleId ?>">Edit</a>
                    <a href="delete-article-confirmation.php?articleId=<?= $articleId ?>">Delete</a>
                </div>
            <?php } ?>
        </article>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>