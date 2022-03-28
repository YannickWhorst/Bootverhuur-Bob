<link rel="stylesheet" href="../css/huurFormulier.css">
<?php 

require("../includes/header.php");
require("../src/database_functions.php");

$boten = db_getData("SELECT * FROM boten");

?>

<div>
    <h1 class="huurTitel">Formulier invullen</h1>
    <div class="formulier">
        <form action="" method="post">
            <input type="text" name="vNaam" id="vNaam" placeholder="Voornaam*" required> <br>
            <input type="text" name="tussenNaam" id="tussenNaam" placeholder="Tussenvoegsel"> <br>
            <input type="text" name="aNaam" id="aNaam" placeholder="Achternaam*" required> <br>
            <input type="email" name="email" id="email" placeholder="Email*" required> <br>
            <p>Type boot</p><select name="boot" id="bootType">
            <?php
                while($typeBoot = $boten->fetch(PDO::FETCH_ASSOC)){
            ?>
                <option value="" id="typeBoot"><?php echo $typeBoot["boot_naam"]?></option>
            <?php
                }
            ?>
            </select> <br>
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