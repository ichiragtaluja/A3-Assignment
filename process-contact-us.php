<?php



$name = $_POST["name"];
$email = $_POST["email"];
$interests = $_POST["interests"];
$role = $_POST["role"];



//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
foreach ($interests as $key => $interest) {
    $stmt = $pdo->prepare("INSERT INTO `contact-us-form` (`primary-key`, `name`, `email`, `category-interest`, `role`)
VALUES (NULL, '$name', '$email', '$interest', '$role');");

    //execute
    $stmt->execute();
}


?>

<p>Thank-you <?= $name ?> for reaching out. We will get back to you shortly.</p>

<a href="./index.php">Go to home</a>