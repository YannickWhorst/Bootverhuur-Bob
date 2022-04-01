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
    <?php 
        require("../includes/header.php"); 
        require("../src/database_functions.php");

        $user = null;
        if (isset($_POST['inloggen']))
        {
            $user = getUser($_POST['email'], $_POST['password']);

            if($user !== 'No user found') {
                header("Location: ./beheerder.php");
                exit;
            } else {
                ?>
                <h1 style="color: red">Geen user gevonden</h1>
                <?php
            }
        }
    ?>

    <h1 class="title">Inloggen voor beheerders</h1>
    <div class="heleForm">
            <form action="" method="post">
            <input class="loginInputs" type="email" name="email" id="email" placeholder="Email*" required> <br>
            <input class="loginInputs" type="password" name="password" id="password" placeholder="Wachtwoord*" required> <br>
            <input class="loginSubmit" type="submit" name="inloggen" value="Inloggen">
            <p class="velden">Velden met * zijn verplicht</p>
        </form>
    </div>
    

    <?php require_once("../includes/footer.php"); ?>
</body>
</html>