<?php session_start();

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);


if ($_SESSION["loggedIn"] && $_SESSION["role"]  == "administrator") {

    //prepare
    $stmt = $pdo->prepare("SELECT * FROM `contact-us-form`;");

    //execute
    $stmt->execute();

    //process
?>
    <!DOCTYPE html>
    <html lang="en">

    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <h1>Contact us form list</h1>
            <ul>
                <?php while ($row = $stmt->fetch()) { ?>
                    <li>
                        <p><?= $row["name"] ?></p>
                        <p><?= $row["email"] ?></p>
                        <p><?= $row["category-interest"] ?></p>
                        <p><?= $row["role"] ?></p>
                    </li>
                <?php } ?>
            </ul>
            <a href="index.php">Go to home</a>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } else {
    include("login.php");
}
?>