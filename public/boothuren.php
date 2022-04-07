<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boot huren</title>
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
<?php 
    // Header en database_functions includen
    require("includes/header.php"); 
    require("../src/database_functions.php");

    // Alle data van boten selecteren
    $boten = db_getData("SELECT * FROM boten");
?>

<!-- Huur pagina -->
<div class="container">
    <header>
        <h1>Boten huren</h1>
        <p>Hier kunt u uw boot huren.</p>
    </header>
    <div class="boten">
        <?php
            while($boot = $boten->fetch(PDO::FETCH_ASSOC)){
        ?>
            <div class="bootblok">
                <h1><?php echo $boot["boot_naam"]?></h1>
                <img src="../img/<?php echo $boot["boot_image"]?>" class="imgKleiner">
                <p><?php echo "&euro; " . number_format($boot["boot_prijs"],2,",",".")?> per uur</p>
                <p><?php echo $boot["boot_capaciteit"]?> personen</p>
                <a class="bootLink" href="huurFormulier.php">Boot huren</a>
            </div>
        <?php }?>
    </div>
</div>
</div>
<!-- Footer includen -->
<?php require_once("includes/footer.php"); ?>
</body>
</html>