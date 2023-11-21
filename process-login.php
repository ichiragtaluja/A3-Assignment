<?php session_start();
$username = $_POST["username"];
$password = $_POST["password"];
//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `users`.`username` ='$username'  AND `users`.`password` = '$password';");

//execute
$stmt->execute();

//execute
if ($row = $stmt->fetch()) {
    $_SESSION["userId"] = $row['userId'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["role"] = $row['role'];
    $_SESSION["loggedIn"] = true;
    include("index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include("head.php"); ?>

    <body>
        <?php include("header.php"); ?>
        <main>
            <p>Sorry! You are not registered.. <a href="sign-up.php">Sign-up yourself.</a></p>
        </main>
        <?php include("footer.php"); ?>
    </body>

    </html>
<?php } ?>