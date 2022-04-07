<title>Inloggen</title>
    <?php 
        require("includes/header.php"); 
        require("../src/database_functions.php");
?>
<!-- Inlog veld -->
    <div id="userInlog">
        <h1 class="title">Inloggen</h1>
        <div class="userForm">
            <form action="user.php" method="post">
                <input class="loginInputs" type="text" name="UservNaam" id="UservNaam" placeholder="Voornaam*" required> <br>
                <input class="loginInputs" type="text" name="UseraNaam" id="UseraNaam" placeholder="Achternaam*" required> <br>
                <input class="loginInputs" type="email" name="UserEmail" id="UserEmail" placeholder="Email*" required> <br>
                <input class="loginSubmit" type="submit" name="userInlog" value="Inloggen">
                <p class="velden">Velden met * zijn verplicht</p>
            </form>
        </div>
    </div>
    
<?php require_once("includes/footer.php"); ?>