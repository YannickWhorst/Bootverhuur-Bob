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

        // Code voor beheerder inlog
        $beheerder = null;
        if (isset($_POST['beheerderInlog']))
        {
            $beheerder = getBeheerder($_POST['email'], $_POST['password']);

            if($beheerder !== 'No user found') {
                header("Location: ./beheerder.php");
                exit;
            } else {
                ?>
                <h1 style="color: red">Geen user gevonden</h1>
                <?php
            }
        }

        // Code voor user inlog
        $user = null;
        if (isset($_POST['userInlog']))
        {
            $user = getUser($_POST['vNaam'], $_POST['aNaam'], $_POST['email']);

            if($user !== 'No user found') {
                header("Location: ./user.php");
                exit;
            } else {
                ?>
                <h1 style="color: red">Geen user gevonden</h1>
                <?php
            }
        }
    ?>

<div class="beideForms">
    <div id="beheerderInlog">
        <h1 class="title">Beheerders</h1>
        <div class="beheerderForm">
            <form action="" method="post">
                <input class="loginInputs" type="email" name="email" id="email" placeholder="Email*" required> <br>
                <input class="loginInputs" type="password" name="password" id="password" placeholder="Wachtwoord*" required> <br>
                <input class="loginSubmit" type="submit" name="beheerderInlog" value="Inloggen">
                <p class="velden">Velden met * zijn verplicht</p>
            </form>
        </div>
    </div>
        
    <div id="userInlog">
        <h1 class="title">Gebruikers</h1>
        <div class="userForm">
            <form action="" method="post">
                <input class="loginInputs" type="text" name="vNaam" id="vNaam" placeholder="Voornaam*"> <br>
                <input class="loginInputs" type="text" name="aNaam" id="aNaam" placeholder="Achternaam*"> <br>
                <input class="loginInputs" type="email" name="email" id="email" placeholder="Email*"> <br>
                <input class="loginSubmit" type="submit" name="userInlog" value="Inloggen">
                <p class="velden">Velden met * zijn verplicht</p>
            </form>
        </div>
    </div>
</div>
    <?php require_once("../includes/footer.php"); ?>
</body>
</html>