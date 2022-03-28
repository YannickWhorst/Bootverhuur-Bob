<link rel="stylesheet" href="../css/huurFormulier.css">
<title>Huur formulier</title>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<?php 

require("../includes/header.php");
require("../src/database_functions.php");

$boten = db_getData("SELECT * FROM boten");

?>

<div>
    <h1 class="huurTitel">Formulier invullen</h1>
    <div class="formulier">
        <form method="post" class="form">
            <input class="inputs" type="text" name="vNaam" id="vNaam" placeholder="Voornaam*" required> <br>
            <input class="inputs" type="text" name="tussenNaam" id="tussenNaam" placeholder="Tussenvoegsel"> <br>
            <input class="inputs" type="text" name="aNaam" id="aNaam" placeholder="Achternaam*" required> <br>
            <input class="inputs" type="email" name="email" id="email" placeholder="Email*" required> <br>
            <input class="inputs" type="tel" name="telefoonNr" id="telefoonNr" placeholder="Telefoon Nummer*"> <br>
            <h3 class="koppen">Dag deel*</h3><select class="inputs" name="dagDeel" id="dagDeel">
                <option value="ochtend">Ochtend</option>
                <option value="middag">Middag</option>
                <option value="avond">Avond</option>
            </select>
            <h3 class="koppen">Type boot*</h3>
            <select class="inputs" name="boot" id="bootType">
            <?php
                while($typeBoot = $boten->fetch(PDO::FETCH_ASSOC)){
            ?>
                <option value="bootType" id="bootType"><?php echo $typeBoot["boot_naam"]?></option>
            <?php
                }
            ?>
            </select> <br>
            <input class="submit" type="submit" name="submit" value="Huren"> <br>
            <p class="verplicht">Velden met * zijn verplicht</p>
        </form>
    </div>
</div>

<?php

    if(isset($_POST['submit'])){
        $vNaam = $_POST['vNaam'];
        $tussenNaam = $_POST['tussenNaam'];
        $aNaam = $_POST['aNaam'];
        $email = $_POST['email'];
        $bootType = $_POST['bootType']; 

        echo $bootType;
    } else {
        $vNaam = "";
        $tussenNaam = "";
        $aNaam = "";
        $email = "";
        $bootType = "";
    }


    require("../includes/footer.php");
?>