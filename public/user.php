<?php require("../includes/header.php"); 
      require("../src/database_functions.php");
      $userOrders = db_getData("SELECT users.vNaam, users.aNaam, users.email, telnummer, typeBoot, dag, dagdeel
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

<!-- De oneven waardes in de tabel een andere achtergrondkleur geven -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>