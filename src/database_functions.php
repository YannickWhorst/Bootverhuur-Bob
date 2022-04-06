<?php
// Database gegevens vaststellen

define("dbHost", "mysql:host=localhost;dbname=bootverhuur");
define("username", "root");
define("password", "");

// Database connect functie
function db_connect(){
    try {
        $db = new PDO(dbHost, username, password);
        return $db;
    } catch (PDOException $e) {
        die("Error!:" . $e->getMessage());
    }
}

// Database Informatie verkrijgen functie
function db_getData($query) {
    try{
        $db = db_connect();
        $queryPDO = $db->prepare($query);
        $queryPDO->execute();
        $db = null;
        return $queryPDO;
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    
}

// Database informatie in de database stoppen functie
function db_insertData($query) {
    try{
        $db = db_connect();
        $queryPDO = $db->prepare($query);
        $queryPDO->execute();
        $db = null;
        return $queryPDO;
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Database user inserten
function db_insertUser($query){
    try{
        $db = db_connect();
        $queryPDO = $db->prepare($query);
        $queryPDO->execute();
        $db = null;
        return $queryPDO;
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

function getBeheerder($email, $password) {
    $user = db_getData("SELECT * FROM beheerder WHERE email='$email' AND password='$password'");
    if ($user->rowCount() > 0){
        return $user;
    } else {
        return "No user found";
    }
}

function getUser($vNaam, $aNaam, $email) {
    $user = db_getData("SELECT * FROM users WHERE vNaam='$vNaam' AND aNaam='$aNaam' AND email='$email'");
    if ($user->rowCount() > 0){
        return $user;
    } else {
        return "No user found";
    }
}