<?php

?>
<h1>Sign-up Page</h1>

<form action="process-sign-up.php" method="POST">

    <label>First Name: <input required type="text" name="fName" /></label>
    <label>Last Name: <input required type="text" name="lName" /></label>
    <label>Email: <input required type="email" name="email" /></label>
    <label>Username: <input required type="text" name="username" /></label>
    <label>Password: <input required type="password" name="password" /></label>

    <input type="submit" value="Sign-up">
</form>
<a href="login.php">Login</a>