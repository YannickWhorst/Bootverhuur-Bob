<title>Al uw orders</title>

<?php require("includes/header.php");
    
    $user = null;
    if (isset($_POST['userInlog']))
    {
        $vNaam = $_POST['UservNaam'];
        $aNaam = $_POST['UseraNaam'];
        $email = $_POST['UserEmail'];
        $user = getUser($vNaam, $aNaam, $email);

        // Als er een user is gevonden wordt de order info geselecteerd
        if($user !== 'No user found') {
            $userOrders = db_getData("SELECT DISTINCT orders.vNaam, orders.aNaam, orders.email, telnummer, typeBoot, dag, dagdeel
            FROM orders, users
            HAVING orders.email = \"$email\"");
        } else {
            ?>
                <h1 style="color: red">Geen user gevonden</h1>
            <?php
        }
    }
?>
<h1 class="titel">Uw orders</h1>
<table class="tabel">
    <tr>
        <td>Voornaam</td>
        <td>Achternaam</td>
        <td>Email</td>
        <td>Telefoonnummer</td>
        <td>Boot</td>
        <td>Dag en dagdeel</td>
    </tr>
    <?php 
    // Door de order informatie loopen
    while($orderData = $userOrders->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $orderData["vNaam"]?></td>
            <td><?php echo $orderData["aNaam"]?></td>
            <td><?php echo $orderData["email"]?></td>
            <td><?php echo $orderData["telnummer"]?></td>
            <td><?php echo $orderData["typeBoot"]?></td>
            <td><?php echo $orderData["dag"]?>, <?php echo $orderData["dagdeel"]?></td>
        </tr>
    <?php }?>
</table>
<?php require("includes/footer.php"); ?>

<!-- De oneven waardes in de tabel een andere achtergrondkleur geven met jquery -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>