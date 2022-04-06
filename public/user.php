<?php require("../includes/header.php"); 
      require("../src/database_functions.php");

      $userOrders = db_getData("SELECT vNaam, aNaam, email, telnummer, typeBoot, dag, dagDeel
      FROM orders, users
      WHERE orders.vNaam = users.vNaam AND orders.aNaam = users.aNaam AND orders.email = users.email");
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
    <?php while($user = $userOrders->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
            <td><?php echo $user["vNaam"]?></td>
            <td><?php echo $user["aNaam"]?></td>
            <td><?php echo $user["email"]?></td>
            <td><?php echo $user["telnummer"]?></td>
            <td><?php echo $user["typeBoot"]?></td>
            <td><?php echo $user["dag"]?>, <?php echo $user["dagdeel"]?></td>
        </tr>
    <?php }?>
    
</table>

<?php require("../includes/footer.php"); ?>