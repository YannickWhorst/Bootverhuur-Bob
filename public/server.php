<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'bootverhuur');

// initialize variables
$boot_naam = "";
$boot_prijs = "";
$boot_capaciteit = "";
$boot_id = 0;
$boot_image = "";
$update = false;

if (isset($_POST['save'])) {

    $boot_naam = $_POST['boot_naam'];
    $boot_prijs = $_POST['boot_prijs'];
    $boot_capaciteit = $_POST['boot_capaciteit'];
    $boot_image = $_POST['boot_image'];

    $db->query("INSERT INTO `boten`(`boot_naam`, `boot_prijs`, `boot_capaciteit`, `boot_image`) 
                VALUES ('$boot_naam','$boot_prijs','$boot_capaciteit','$boot_image')");
    $_SESSION['message'] = "Boot Opgeslagen";
    header('location: beheerder.php#bootBewerken');
}

if (isset($_POST['update'])) {
    $boot_id = $_POST['boot_id'];
    $boot_naam = $_POST['boot_naam'];
    $boot_prijs = $_POST['boot_prijs'];
    $boot_capaciteit = $_POST['boot_capaciteit'];
    $boot_image = $_POST['boot_image'];

    $db->query("UPDATE `boten`
    SET `boot_naam`='$boot_naam',`boot_prijs`='$boot_prijs',`boot_capaciteit`='$boot_capaciteit',`boot_image`='$boot_image'
    WHERE boot_id = $boot_id");

    $_SESSION['message'] = "Boot Geupdate!";
    header('location: beheerder.php#bootBewerken');
}

if (isset($_GET['del'])) {
    $boot_id = $_GET['del'];

    $db->query("DELETE FROM `boten` WHERE $boot_id = boot_id");

    $_SESSION['message'] = "Boot Verwijderd!";
    header('location: beheerder.php#bootBewerken');
}

if (isset($_GET['bootdel'])) {
    $orderID = $_GET['bootdel'];

    $db->query("DELETE FROM `orders` WHERE $orderID = orderID");

    $_SESSION['useerDelMSG'] = "Order verwijderd!";
    header('location: beheerder.php#alleOrders');
}