 <?php

   $heading = $_POST["heading"];
   $articleId = $_POST["articleId"];
   $content = $_POST["content"];
   $image = $_POST["image"];
   $author = $_POST["author"];
   $link = $_POST["link"];
   $alt = $_POST["alt"];

   //connect
   $dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

   $dbusername = "root";
   $dbpassword = "";
   $pdo = new PDO($dsn, $dbusername, $dbpassword);

   //prepare
   $stmt = $pdo->prepare("UPDATE `articles` SET 
   `content` = '$content', 
   `article-link`='$link',
   `author`='$author',
   `image-link`='$image',
   `heading`='$heading', 
   `image-alt-text`='$alt' WHERE `article-id` = $articleId;");

   //execute
   $stmt->execute();
   ?>

 <!DOCTYPE html>
 <html lang="en">
 <?php include("head.php"); ?>

 <body>
     <?php include("header.php"); ?>
     <main>
         <p>article updated</p>
         <p><?= $heading ?></p>
         <p><?= $articleId ?></p>
         <p><?= $content ?></p>
         <p><?= $image ?></p>
         <p><?= $author ?></p>
         <p><?= $link ?></p>
         <p><?= $alt ?></p>
         <a href="index.php">Back to home page</a>
     </main>
     <?php include("footer.php"); ?>
 </body>

 </html>