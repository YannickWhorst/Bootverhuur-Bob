<title>Inloggen</title>
    <?php 
        require("../includes/header.php"); 
        require("../src/database_functions.php");

        // Code voor user inlog
        $user = null;
        if (isset($_POST['inloggen']))
        {   
            $vNaam = $_POST['UservNaam'];
            $aNaam = $_POST['UseraNaam'];
            $user = getUser($_POST['UservNaam'], $_POST['UseraNaam'], $_POST['UserEmail']);
            $userOrders = db_getData("SELECT users.vnaam, users.aNaam, users.email, telnummer, typeboot, dag, dagdeel
            FROM orders, users WHERE orders.vNaam = ". $vNaam);

            if($user !== 'No user found') {
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
            <?php
            } else {
                ?>
                    <h1 style="color: red">Geen user gevonden</h1>
                    <div id="userInlog">
                    <h1 class="title">Inloggen</h1>
                    <div class="userForm">
                        <form action="" method="post">
                            <input class="loginInputs" type="text" name="UservNaam" id="UservNaam" placeholder="Voornaam*" required> <br>
                            <input class="loginInputs" type="text" name="UseraNaam" id="UseraNaam" placeholder="Achternaam*" required> <br>
                            <input class="loginInputs" type="email" name="UserEmail" id="UserEmail" placeholder="Email*" required> <br>
                            <input class="loginSubmit" type="submit" name="inloggen" value="Inloggen">
                            <p class="velden">Velden met * zijn verplicht</p>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
    ?>
<!-- Inlog veld -->
    <div id="userInlog">
        <h1 class="title">Inloggen</h1>
        <div class="userForm">
            <form action="" method="post">
                <input class="loginInputs" type="text" name="UservNaam" id="UservNaam" placeholder="Voornaam*" required> <br>
                <input class="loginInputs" type="text" name="UseraNaam" id="UseraNaam" placeholder="Achternaam*" required> <br>
                <input class="loginInputs" type="email" name="UserEmail" id="UserEmail" placeholder="Email*" required> <br>
                <input class="loginSubmit" type="submit" name="inloggen" value="Inloggen">
                <p class="velden">Velden met * zijn verplicht</p>
            </form>
        </div>
    </div>
    
<?php require_once("../includes/footer.php"); ?>

<!-- De oneven waardes in de tabel een andere achtergrondkleur geven met jquery -->
<script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://ajax.microsoft.com/ajax/jquery/jquery-3.4.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("table tr:odd").css({"background-color":"lightgray"});
    });
</script>