<?php session_start();
?>

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