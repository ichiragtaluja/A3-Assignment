<?php session_start();

$username = $_GET["username"];
$articleId = $_GET["articleId"];

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

// prepare
$stmt = $pdo->prepare("SELECT * FROM `likes` WHERE `likes`.`username` ='$username'  AND `likes`.`articleId` = '$articleId';");

//execute
$stmt->execute();

if ($row = $stmt->fetch()) {
    if ($row["isLiked"]) {
        $likeId = $row["likeId"];

        //prepare
        $stmt = $pdo->prepare("UPDATE `likes` SET `isLiked` = '0' WHERE `likes`.`likeId` = $likeId;");

        //execute
        $stmt->execute();
        include("index.php");
    } else {
        $likeId = $row["likeId"];

        //prepare
        $stmt = $pdo->prepare("UPDATE `likes` SET `isLiked` = '1' WHERE `likes`.`likeId` = $likeId;");

        //execute
        $stmt->execute();
        include("index.php");
    }
} else {
    //prepare
    $stmt = $pdo->prepare("INSERT INTO `likes` (`likeId`, `username`, `articleId`, `isLiked`) VALUES (NULL, '$username', '$articleId', '1');");

    //execute
    $stmt->execute();
    include("index.php");
}
