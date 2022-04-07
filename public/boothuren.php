<title>Boot huren</title>
<?php 
    // Header en database_functions includen
    require("includes/header.php"); 

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
        // Door de boten loopen en aparte velden voor maken
            while($boot = $boten->fetch(PDO::FETCH_ASSOC)){
        ?>
            <div class="bootblok">
                <h1><?php echo $boot["boot_naam"]?></h1>
                <img src="<?php echo IMG_FOLDER?><?php echo $boot["boot_image"]?>" class="imgKleiner">
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