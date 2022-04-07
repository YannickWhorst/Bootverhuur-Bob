<?php require("includes/header.php"); 
    require("../src/database_functions.php");
    
    $user = null;
    if (isset($_POST['userInlog']))
    {
        $vNaam = $_POST['UservNaam'];
        $aNaam = $_POST['UseraNaam'];
        $email = $_POST['UserEmail'];
        $user = getUser($vNaam, $aNaam, $email);

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
<table>
    <tr>
        <td>Voornaam</td>
        <td>Achternaam</td>
        <td>Email</td>
        <td>Telefoonnummer</td>
        <td>Boot</td>
        <td>Dag en dagdeel</td>
    </tr>
    <?php while($orderData = $userOrders->fetch(PDO::FETCH_ASSOC)){ ?>
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