<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boot huren</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/boothuren.css">
</head>
<body>
<?php 
    require_once("header.php"); 
    require("src/database_functions.php");
?>

<div class="container">
    <header>
        <h1>Boten huren</h1>
        <p>Hier kunt u uw boot huren.</p>
    </header>

    <?php
        db_getData("SELECT * FROM boten");
    ?>

    <div class="boten">
        <div class="bootblok">
            <h1>Winner 8</h1>
            <img src="img/Winner-8.jpg" class="imgKleiner">
            <p>Prijs: €477 per week</p>
            <p>Capaciteit: 6 personen</p>
            <a class="bootLink" href="winner8.php">Deze boot huren?</a>
        </div>
        <div class="bootblok">
            <h1>Bavaria 33</h1>
            <img src="img/Bavaria-33.jpg" class="imgKleiner">
            <p>Prijs: €975 per week</p>
            <p>Capaciteit: 7 personen</p>
            <a class="bootLink" href="bavaria33.php">Deze boot huren?</a>
        </div>
        <div class="bootblok">
            <h1>Mediterranee 47</h1>
            <img src="img/mediterranee-47.jpg" class="imgKleiner">
            <p>Prijs: €2012 per week</p>
            <p>Capaciteit: 4 personen</p>
            <a class="bootLink" href="mediterranee47.php">Deze boot huren?</a>
        </div>
        <div class="bootblok">
            <h1>Fun 3</h1>
            <img src="img/Fun-3.jpg" class="imgKleiner">
            <p>Prijs: €150 per week</p>
            <p>Capaciteit: 2 personen</p>
            <a class="bootLink" href="fun3.php">Deze boot huren?</a>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>
</body>
</html>