<?php include('server.php');
      include('includes/header.php');
?>
<?php
$firstName = '';
$lastName = '';
$email = '';
$password = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $boot = $db->query("SELECT * FROM boten WHERE boot_id = $id");

    if ($boot->num_rows > 0 ) {
        $record = $boot->fetch_array();
        // die(print_r($n));
        $boot_id = $record['boot_id'];
        $boot_naam = $record['boot_naam'];
        $boot_prijs = $record['boot_prijs'];
        $boot_capaciteit = $record['boot_capaciteit'];
    }
}
?>
<title>Beheren</title>
<!-- Orders bekijken -->

<?php
// Data krijgen uit de database
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
        <!-- Door alle orders loopen en in een tabel zetten -->
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

<!-- Boten Bewerken -->
<hr>
<h1 class="titel">Boten Bewerken</h1>
<link rel="stylesheet" type="text/css" href="css/server.css">
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<?php $boten = $db->query("SELECT * from boten"); ?>

<table>
    <thead>
    <tr>
        <th>Boot naam</th>
        <th>Boot prijs</th>
        <th>Boot capaciteit</th>
        <th colspan="2">Actie</th>
    </tr>
    </thead>

    <?php while ($boot = $boten->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $boot['boot_naam']; ?></td>
            <td>€<?php echo $boot['boot_prijs']; ?></td>
            <td><?php echo $boot['boot_capaciteit']; ?> personen</td>
            <td>
                <a href="beheerder.php?edit=<?php echo $boot['boot_id']; ?>" class="edit_btn">Bewerken</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $boot['boot_id']; ?>" class="del_btn">Verwijderen</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="server.php">
    <input type="hidden" name="boot_id" value="<?php echo $boot_id; ?>">
    <div class="input-group">
        <label>Boot naam</label>
        <input type="text" name="boot_naam" value="<?php echo $boot_naam; ?>">
    </div>
    <div class="input-group">
        <label>Boot prijs</label>
        <input type="text" name="boot_prijs" value="<?php echo $boot_prijs; ?>">
    </div>
    <div class="input-group">
        <label>Boot Capaciteit</label>
        <input type="text" name="boot_capaciteit" value="<?php echo $boot_capaciteit; ?>">
    </div>
    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #2E8B57;">Updaten</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Opslaan</button>
        <?php endif ?>
    </div>
</form>

<?php
include('includes/footer.php');
?>

<!-- De oneven waardes in de tabel een andere achtergrondkleur geven -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>