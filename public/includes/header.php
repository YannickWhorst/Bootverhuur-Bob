<?php
    require("../config/database.php");
    require("../config/config.php");
    require("../src/database_functions.php");
?>
<!-- Alles inlcuden -->
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>header.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>footer.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>boothuren.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>huurFormulier.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>inloggen.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>registreren.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>style.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>beheerder.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>contact.css">
<link rel="stylesheet" href="<?php echo CSS_FOLDER;?>orderConfirm.css">

<header class="navBackground">
    <nav class="container">
        <h1 class="navTitle">Bootverhuur Bob</h1>
        <ul class="navUl">
            <li class="navLi"><a class="navA" href="index.php">Home</a></li>
            <li class="navLi"><a class="navA" href="boothuren.php">Huren</a></li>
            <li class="navLi"><a class="navA" href="contact.php">Contact</a></li>
            <li class="navLi"><a class="navA" href="inloggen.php">Bestel Geschiedenis</a></li>
            <li class="navLi"><a class="navA" href="beheerderInlog.php">Beheerders</a></li>
        </ul>
    </nav> 
</header>
