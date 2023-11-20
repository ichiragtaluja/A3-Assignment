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

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content=" Welcome to IMM News Network, your gateway to a world of curated and
    personalized information. Since we've been dedicated to delivering
    relevant, reliable, and engaging content right to your fingertips." />
    <meta name="keywords" content="News, IMM, Career, Technical, Industry" />
    <meta name="author" name="Chirag Taluja" />

    <link rel="apple-touch-icon" sizes="180x180" href="icons/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon/favicon-16x16.png" />
    <link rel="manifest" href="icons/favicon/site.webmanifest" />
    <title>IMM News Network</title>
</head>

<body>
    <header>
        <nav>
            <div>
                <a><img src="./images/logo/apple-touch-icon.png" /></a>
            </div>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
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