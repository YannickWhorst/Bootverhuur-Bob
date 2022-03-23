<link rel="stylesheet" href="css/huurFormulier.css">

<div>
    <h1 class="huurTitel">Formulier invullen</h1>
    <div class="formulier">
        <form action="" method="post">
            <input type="text" name="vNaam" id="vNaam" placeholder="Voornaam*" required> <br>
            <input type="text" name="tussenNaam" id="tussenNaam" placeholder="Tussenvoegsel"> <br>
            <input type="text" name="aNaam" id="aNaam" placeholder="Achternaam*" required> <br>
            <input type="email" name="email" id="email" placeholder="Email*" required> <br>
            <input type="submit" name="submit" value="Huren"> <br>
            <small style="color: red;">Velden met * zijn verplicht</small>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $vNaam = $_POST['vNaam'];
        $tussenNaam = $_POST['tussenNaam'];
        $aNaam = $_POST['aNaam'];
        $email = $_POST['email'];

    } else {
        $vNaam = "";
        $tussenNaam = "";
        $aNaam = "";
        $email = "";
    }

?>