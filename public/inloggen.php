<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php require_once("../includes/header.php"); ?>

    <h1>Inloggen voor beheerders</h1>
    <form action="beheerder.php" method="post">
        <input type="text" name="username" id="username" placeholder="Username*" required> <br>
        <input type="email" name="email" id="email" placeholder="Email*" required> <br>
        <input type="password" name="password" id="password" placeholder="Wachtwoord*" required> <br>
        <input type="submit" value="Inloggen">
    </form>

    <?php require_once("../includes/footer.php"); ?>
</body>
</html>