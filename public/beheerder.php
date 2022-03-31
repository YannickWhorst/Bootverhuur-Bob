<?php require("../includes/header.php"); 
      require("../src/database_functions.php");

    $orders = db_getData("SELECT * FROM orders");
?>


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

<div class="voegBootToe">
            
</div>

<?php require("../includes/footer.php"); ?>


<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>