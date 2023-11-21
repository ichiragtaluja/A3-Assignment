<?php
//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `about-page` ");

//execute
$stmt->execute();

//process results
$row = $stmt->fetch();

$content = $row["content"];
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <h1>Edit About Page</h1>

        <form action="update-about.php" method="POST">
            <label>Content: <textarea name="content"><?= $content ?></textarea></label>
            <input type="submit" value="Update" />
        </form>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>