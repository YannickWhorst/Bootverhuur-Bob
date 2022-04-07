<?php 
// Header en database includen
require("includes/header.php"); 
require("../src/database_functions.php");

    // Data krijgen uit de database
    $orders = db_getData("SELECT * FROM orders");
?>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

<!-- Alle orders laten zien -->
<div>
    <h1 class="titel">Alle orders</h1>
    <table class="tabel">
        <tr>
            <td><h3>Order ID</h3></td>
            <td><h3>Voornaam</h3></td>
            <td><h3>Achternaam</h3></td>
            <td><h3>Email</h3></td>
            <td><h3>Telefoon nummer</h3></td>
            <td><h3>Type boot</h3></td>
            <td><h3>Dag</h3></td>
            <td><h3>Dagdeel</h3></td>
        </tr>
        <?php while($order = $orders->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $order["orderID"]?></td>
                <td><?php echo $order["vNaam"]?></td>
                <td><?php echo $order["aNaam"]?></td>
                <td><?php echo $order["email"]?></td>
                <td><?php echo $order["telnummer"]?></td>
                <td><?php echo $order["typeBoot"]?></td>
                <td><?php echo $order["dag"]?></td>
                <td><?php echo $order["dagdeel"]?></td>
            </tr>
        <?php }?>
    </table>
</div>

<!-- Boot toevoegen -->
<hr>

<div class="voegBootToe">
    <h2 class="titel">Voeg een boot toe</h2>

    
    <div class="voegBoot">
        <form action="" method="post">
            <input type="text" name="bootnaam" id="bootnaam" placeholder="Boot naam" required> <br>
            <input type="text" name="bootprijs" id="bootprijs" placeholder="Boot prijs" required> <br>
            <input type="text" name="bootcapaciteit" id="bootcapaciteit" placeholder="Boot capaciteit" required> <br>
            <input type="text" name="bootimage" id="bootimage" placeholder="Boot plaatje" required> <br>
            <input class="submitKnop" type="submit" name="toevoegen" value="Voeg toe">
        </form> 
    </div>

    
    <?php 
    // Boot toevogen in de database
    if(isset($_POST['toevoegen'])){
        $naam = $_POST['bootnaam'];
        $prijs = $_POST['bootprijs'];
        $capaciteit = $_POST['bootcapaciteit'];
        $plaatje = $_POST['bootimage'];

        // Data inserten in de database
        $boot = db_insertData("INSERT INTO `boten`(`boot_naam`, `boot_prijs`, `boot_capaciteit`, `boot_image`) 
                               VALUES ('$naam','$prijs','$capaciteit','$plaatje')");
    }

    ?>
</div>

<!-- Footer includen -->
<?php require("includes/footer.php"); ?>

<!-- De oneven waardes in de tabel een andere achtergrondkleur geven -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>