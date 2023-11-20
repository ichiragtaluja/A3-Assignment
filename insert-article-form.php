<?php

//connect
$dsn = "mysql:host=localhost;dbname=A3Assignment;charset=utf8mb4";

$dbusername = "root";
$dbpassword = "";
$pdo = new PDO($dsn, $dbusername, $dbpassword);

//prepare
$stmt = $pdo->prepare("SELECT * FROM `categories`");

//execute
$stmt->execute();

?>

<h1>Insert article</h1>

<form action="insert-article.php" method="POST">
    <h1><label>Heading: <input required type="text" name="heading" " /></label></h1>
    <!-- <input type=" hidden" name="articleId" value="<?= $articleId ?>" /> -->
            <label>Content: <textarea required name="content"></textarea></label>
            <label>Image:<input required type=" text" name="image"></label>
            <label>Author:<input required type="text" name="author"></label>
            <label>Link to article:<input required type="text" name="link"></label>
            <label>Image alt text:<input required type="text" name="alt"></label>
            <label>Category:<input required type="text" name="category"></label>

            <fieldset required>
                <legend>Featured</legend>
                <label>True<input type="radio" value="1" name="featured"></label>
                <label>False
                    <input type="radio" value="0" name="featured"></label>

            </fieldset>
            <fieldset>
                <legend>Category</legend>
                <select name="category-id">

                    <?php while ($row = $stmt->fetch()) { ?>

                        <option value="<?= $row["category-id"] ?>"><?= $row["category"] ?></option><?php


                                                                                                } ?>


                </select>
            </fieldset>

            <input type="submit" value="Insert" />
</form>