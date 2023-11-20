<?php session_start();
//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

$username = $_SESSION["username"];


//prepare
$stmt1 = $pdo->prepare("SELECT * FROM `categories`");

//execute
$stmt1->execute();

//process


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="A news website" />
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
            <div id="logo-container">
                <a><img id="logo" src="./images/logo/apple-touch-icon.png" /></a>
            </div>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>

            <?php if ($_SESSION["loggedIn"]) { ?>

                <div><a href="process-logout.php">Logout</a></div>


            <?php } else { ?>

                <div><a href="login.php">Login</a></div>

            <?php } ?>


        </nav>
    </header>
    <main>
        <section id="welcome-section">
            <h1 id="welcome-title">Welcome to IMM News Network</h1>
            <p id="welcome-text">
                At IMM News Network, our mission is to provide a platform for
                insightful reporting, in-depth analysis, and diverse perspectives. We
                aim to foster a well-informed global community by delivering news that
                matters most to you.
            </p>
        </section>

        <?php

        //prepare
        $stmt5 = $pdo->prepare("SELECT * FROM `articles` WHERE  `articles`.`featured`= 1");

        //execute
        $stmt5->execute();

        $row5 = $stmt5->fetch();

        $articleId = $row5["article-id"];
        $heading = $row5["heading"];
        $imageLink = $row5["image-link"];
        $content = $row5["content"];
        $author = $row5["author"];
        $imageAltText = $row5["image-alt-text"];
        $articleLink = $row5["article-link"];


        ?>

        <section id="featured-secti on">
            <article id="featured-article">
                <img src="<?= $imageLink ?>" alt="<?= $imageAltText ?>" />
                <p class="author">By <?= $author ?></p>
                <h4 class=" title">
                    <?= $heading ?>
                </h4>
                <p class="preview-text">
                    <?= $content ?>

                </p>
                <a href="<?= $articleLink ?>">Article link</a>
            </article>
        </section>

        <section>
            <a href="insert-article-form.php">Insert New Article</a>
        </section>

        <section id="article-categories">
            <h2>Categories</h2>


            <ul>
                <?php
                while ($row = $stmt1->fetch()) {

                    $category = $row["category"];
                    // echo ($category);
                ?>

                    <li>
                        <h3><?= $category ?></h3>
                        <ul>
                            <?php
                            //prepare 
                            $stmt2 = $pdo->prepare("SELECT * FROM `articles` INNER JOIN `categories` ON
    `articles`.`category-id`=`categories`.`category-id` WHERE `categories`.`category`='$category';");

                            //execute
                            $stmt2->execute();


                            //process
                            while ($row2 = $stmt2->fetch()) {
                                $articleId = $row2["article-id"];
                                $heading = $row2["heading"];
                                $imageLink = $row2["image-link"];
                                $content = $row2["content"];
                                $author = $row2["author"];
                                $imageAltText = $row2["image-alt-text"];
                                $articleLink = $row2["article-link"];




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

                                <li>
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
                                </li>


                            <?php

                            }

                            ?>
                        </ul>
                    </li><?php

                        }

                            ?>

            </ul>

        </section>

        <section id="visitors-section">
            <table id="visitors-table">
                <tr>
                    <th>Month</th>
                    <th>Visitors</th>
                </tr>
                <tr>
                    <td>April</td>
                    <td>1221</td>
                </tr>
                <tr>
                    <td>May</td>
                    <td>2221</td>
                </tr>
                <tr>
                    <td>June</td>
                    <td>2376</td>
                </tr>
                <tr>
                    <td>July</td>
                    <td>6551</td>
                </tr>
                <tr>
                    <td>August</td>
                    <td>8776</td>
                </tr>
                <tr>
                    <td>September</td>
                    <td>9976</td>
                </tr>
            </table>
        </section>

        <section id="video-section">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/w_JEezynhrc?si=cXCgwfGzTB4g9z8y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </section>
    </main>
    <footer id="cookies"><a href="#">Accept cookies</a></footer>
</body>

</html>