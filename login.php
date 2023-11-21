<?php
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <h1>Login Page</h1>
        <form action="process-login.php" method="POST">

            <label>Username: <input type="text" name="username" /></label>
            <label>Password: <input type="password" name="password" /></label>
            <input type="submit" value="login">
        </form>
        <a href="login.php">forgot password?</a>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>