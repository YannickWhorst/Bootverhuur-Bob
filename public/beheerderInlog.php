<title>Inloggen</title>
<?php 
        require("includes/header.php"); 

        // Code voor beheerder inlog
        $beheerder = null;
        if (isset($_POST['beheerderInlog']))
        {
            $beheerder = getBeheerder($_POST['beheerderEmail'], $_POST['beheerderPassword']);

            if($beheerder !== 'No user found') {
                header("Location: ./beheerder.php");
                exit;
            } else {
                ?>
                <h1 style="color: red">Geen user gevonden</h1>
                <?php
            }
        }
    ?>

<div id="beheerderInlog">
        <h1 class="title">Beheerders</h1>
        <div class="beheerderForm">
            <form action="" method="post">
                <input class="loginInputs" type="email" name="beheerderEmail" id="beheerderEmail" placeholder="Email*" required> <br>
                <input class="loginInputs" type="password" name="beheerderPassword" id="beheerderPassword" placeholder="Wachtwoord*" required> <br>
                <input class="loginSubmit" type="submit" name="beheerderInlog" value="Inloggen">
                <p class="velden">Velden met * zijn verplicht</p>
            </form>
        </div>
    </div>

    <?php require("includes/footer.php"); ?>