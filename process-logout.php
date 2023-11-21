<?php session_start();
session_destroy();

$role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <p>You have logged out.</p>
        <a href="login.php">Login here </a>

        <p>Go to home.</p>
        <a href="index.php">Home</a>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>