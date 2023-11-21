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

    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>About page text is updated to: </p>
            <p><?= $content ?></p><a href="index.php">Back to home page</a>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php
} else { ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>Could not update About Us page</p><a href="index.php">Back to home page</a>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php
}
?>