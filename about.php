<?php session_start();
//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `about-page`");

//execute
$stmt->execute();

//process
$row = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">

<?php include("head.php") ?>

<body>
    <?php include("header.php") ?>
    <main>
        <section>
            <p>
                <?= $row["content"] ?>
            </p>
            <?php if ($_SESSION["loggedIn"] && $_SESSION["role"]  == "administrator") { ?>
                <a href="edit-about-form.php">Edit text</a>
            <?php } ?>
        </section>
    </main>
    <footer id="cookies"><a href="#">Accept cookies</a></footer>
</body>

</html>