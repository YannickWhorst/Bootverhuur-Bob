<?php require("../includes/header.php"); 
    require("../src/database_functions.php");

    $orders = db_getData("SELECT * FROM orders");
?>

<link rel="stylesheet" href="../css/beheerder.css">

<div>
    <h1>Alle orders</h1>
    <table>
        <tr>
            <td>Order id</td>
            <td>Order soort</td>
            <td>Dagdeel</td>
        </tr>
        <?php while($order = $orders->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $order["orders_id"]?></td>
                <td><?php echo $order["orders_soort"]?></td>
                <td><?php echo $order["orders_dagdeel"]?></td>
            </tr>
        <?php }?>
    </table>
    
</div>

<div class="voegBootToe">

</div>

<?php require("../includes/footer.php"); ?>