<?php session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php include("head.php") ?>

<body>
    <?php include("header.php"); ?>
    <main>
        <section>
            <form action="process-contact-us.php" method="POST">
                <fieldset>
                    <legend>Personal details</legend>
                    <label for="name">Name</label>
                    <input name="name" type="text" required placeholder="Enter name" />
                    <label for="email">Email</label>
                    <input name="email" type="email" required placeholder="Enter email" />
                </fieldset>
                <fieldset>
                    <legend>Category interests</legend>
                    <label for="industry">Industry</label><input name="interests[]" value="industry" type="checkbox" />

                    <label for="technical">Technical</label><input name="interests[]" value="technical" type="checkbox" />

                    <label for="career">Career</label><input name="interests[]" value="career" type="checkbox" />
                </fieldset>
                <fieldset>
                    <legend>Your role</legend>
                    <select name="role">
                        <option value="writer">Writer</option>
                        <option value="contributor">Contributor</option>
                        <option value="administration">Administration</option>
                    </select>
                </fieldset>
                <input type="submit" />
            </form>
        </section>
        <?php if ($_SESSION["loggedIn"] && $_SESSION["role"]  == "administrator") { ?>

            <a href="contact-form-list.php">View all contact form submissions</a>
        <?php } ?>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>