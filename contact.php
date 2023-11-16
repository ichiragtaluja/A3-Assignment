<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="A contact us page where you can enter you details" />
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

                    <label for="technical">Technical</label><input name="interests[]" value="technical"
                        type="checkbox" />

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
    </main>
    <footer id="cookies"><a href="#">Accept cookies</a></footer>
</body>

</html>