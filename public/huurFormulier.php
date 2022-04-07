<link rel="stylesheet" href="../css/huurFormulier.css">
<title>Huur formulier</title>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<?php 

require("includes/header.php");

$boten = db_getData("SELECT * FROM boten");
$dagdeel = db_getData("SELECT * FROM dagdeel");

?>

<div>
    <h1 class="huurTitel">Formulier invullen</h1>
    <div class="formulier">
        <form method="post" class="form">
            <input class="inputs" type="text" name="vNaam" id="vNaam" placeholder="Voornaam*" required> <br>
            <input class="inputs" type="text" name="aNaam" id="aNaam" placeholder="Achternaam*" required> <br>
            <input class="inputs" type="email" name="email" id="email" placeholder="Email*" required> <br>
            <input class="inputs" type="tel" name="telefoonNr" id="telefoonNr" placeholder="Telefoon Nummer*"> <br>
            <h3 class="koppen">Dag*</h3>
            <input class="dateTime" type="date" name="dateTime" id="dateTime" required> <br>
            <select class="inputs" name="dagdeel" id="dagdeel" required>
                <option value="boot">Kies een dagdeel</option>
                <?php
                while($deelDag = $dagdeel->fetch(PDO::FETCH_ASSOC)){
            ?>
                <option name="boot" value="<?php echo $deelDag["Dagdeel"]?>" id="boot"><?php echo $deelDag["Dagdeel"]?></option>
            <?php
                }
            ?>
            </select>
            <h3 class="koppen">Type boot*</h3>
            <select class="inputs" name="boot" id="boot" required>
                <option value="boot">Kies een boot</option>
                <?php
                while($typeBoot = $boten->fetch(PDO::FETCH_ASSOC)){
            ?>
                <option name="boot" value="<?php echo $typeBoot["boot_naam"]?>" id="boot"><?php echo $typeBoot["boot_naam"]?></option>
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
        $aNaam = $_POST['aNaam'];
        $email = $_POST['email'];
        $telefoonNummer = $_POST['telefoonNr'];
        $bootType = $_POST['boot'];
        $dag = $_POST['dateTime'];
        $dagDeel = $_POST['dagdeel'];

        db_insertData("INSERT INTO `orders`(`vNaam`, `aNaam`, `email`, `telnummer`, `typeBoot`, `dag`, `dagdeel`) VALUES ('$vNaam','$aNaam','$email','$telefoonNummer','$bootType','$dag','$dagDeel')");
        db_insertUser("INSERT INTO `users`(`vNaam`, `aNaam`, `email`) VALUES ('$vNaam','$aNaam','$email')");
        header("Location: ./orderConfirm.php");
    } else {
        $vNaam = "";
        $tussenNaam = "";
        $aNaam = "";
        $email = "";
        $telefoonNummer = "";
        $dateTime = "";
        $dagDeel = "";
    }


    require("includes/footer.php");
?>