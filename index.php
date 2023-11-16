<?php
//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);



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

        <section id="featured-secti on">
            <article id="featured-article">
                <img id="featured-image" src="./images/article-images/industry/industry2.webp"
                    alt="ford motor employees with united auto workers" />
                <p class="author">By Michael Wayland</p>
                <h4 class="title">
                    Ford CEO says UAW is ‘holding the deal hostage’ over EV battery
                    plants
                </h4>
                <p class="preview-text">
                    The United Auto Workers union is holding up negotiations with Ford
                    Motor over future electric vehicle battery plants, Ford CEO Jim
                    Farley said during a press briefing Friday.
                </p>
                <a href="./articles/industry/article1.php">Article link</a>
            </article>
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
    `articles`.`category-id`=`categories`.`primary-key` WHERE `categories`.`category`='$category';");

              //execute
              $stmt2->execute();


              //process
              while ($row2 = $stmt2->fetch()) {
                $heading = $row2["heading"];
                $imageLink = $row2["image-link"];
                $content = $row2["content"];
                $author = $row2["author"];
                $imageAltText = $row2["image-alt-text"];
                $articleLink = $row2["article-link"];
                // echo ($heading);

              ?>

                        <li>
                            <article>
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
                        </li>


                        <?php

              }

              ?>
                    </ul>
                </li><?php

              }

                ?>

            </ul>
            <!-- <ul>

        <li>
          <h3>Industry</h3>
          <ul>
            <li>
              <article>
                <img src="./images/article-images/industry/industry1.webp" alt="labour union strike in Chicago" />
                <p class="author">By Michael Wayland</p>
                <h4 class="title">
                  UAW Mack Trucks union members to join striking Detroit
                  autoworkers on picket lines after voting down tentative deal
                </h4>
                <p class="preview-text">
                  A year after the Biden administration took its first major
                  step toward restricting the sale of semiconductors to China,
                  it has begun drafting additional limits aimed at denying
                  Beijing the technology critical to modern-day weapons.

                </p>
                <a href="./articles/industry/article1.php">Article link</a>
              </article>
            </li>
            <li>
              <article>
                <img src="./images/article-images/industry/industry2.webp" alt="ford motor employees with united auto workers" />
                <p class="author">By Michael Wayland</p>
                <h4 class="title">
                  Ford CEO says UAW is ‘holding the deal hostage’ over EV
                  battery plants
                </h4>
                <p class="preview-text">
                  The United Auto Workers union is holding up negotiations
                  with Ford Motor over future electric vehicle battery plants,
                  Ford CEO Jim Farley said during a press briefing Friday.
                </p>
                <a href="./articles/industry/article2.php">Article link</a>
              </article>
            </li>
          </ul>
        </li>
        <li>
          <h3>Technical</h3>
          <ul>
            <li>
              <article>
                <img src="./images/article-images/technical/technical1.webp" alt="an image of Mr. Beast" />
                <p class="author">By Tripp Mickle</p>
                <h4 class="title">
                  How the Big Chip Makers Are Pushing Back on Biden’s China
                  Agenda
                </h4>
                <p class="preview-text">
                  A year after the Biden administration took its first major
                  step toward restricting the sale of semiconductors to China,
                  it has begun drafting additional limits aimed at denying
                  Beijing the technology critical to modern-day weapons.
                </p>
                <a href="./articles/technical/article1.php">Article link</a>
              </article>
            </li>
            <li>
              <article>
                <img src="./images/article-images/technical/technical2.webp" alt="an image of Mr. Beast" />
                <p class="author">By Tom Gerken</p>
                <h4 class="title">
                  MrBeast and BBC stars used in deepfake scam videos
                </h4>
                <p class="preview-text">
                  Deepfakes use artificial intelligence (AI) to make a video
                  of someone by manipulating their face or body. One such
                  video appeared on TikTok this week, claiming to be MrBeast
                  offering people new iPhones for $2 (£1.65).
                </p>
                <a href="./articles/technical/article2.php">Article link</a>
              </article>
            </li>
          </ul>
        </li>
        <li>
          <h3>Career</h3>
          <ul>
            <li>
              <article>
                <img src="./images/article-images/career/career1.jpeg" alt="An old women walking her dog" />
                <p class="author">By Maryalene LaPonsie</p>
                <h4 class="title">10 Fun Part-Time Jobs for Retirement</h4>
                <p class="preview-text">
                  Retirement is often portrayed as lazy days at home broken up
                  by afternoons spent on the golf course. However, not
                  everyone wants to spend their golden years unemployed.
                </p>
                <a href="./articles/career/article1.php">Article link</a>
              </article>
            </li>
            <li>
              <article>
                <img src="./images/article-images/career/career2.webp" alt="Group of factory workers standing" />
                <p class="author">By Megan Carnegie</p>
                <h4 class="title">
                  Why the 'back-up career' is moving further out of reach
                </h4>
                <p class="preview-text">
                  Chris has been in the animation industry for more than a
                  decade, and still gets excited about each week’s
                  assignments.
                </p>
                ? <a href="./articles/career/article2.php">Article link</a>
              </article>
            </li>
          </ul>
        </li>
      </ul> -->
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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/w_JEezynhrc?si=cXCgwfGzTB4g9z8y"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </section>
    </main>
    <footer id="cookies"><a href="#">Accept cookies</a></footer>
</body>

</html>