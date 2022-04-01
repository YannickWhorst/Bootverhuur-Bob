<?php

define("dbHost", "mysql:host=localhost;dbname=bootverhuur");
define("username", "root");
define("password", "");

function db_connect(){
    try {
        $db = new PDO(dbHost, username, password);
        return $db;
    } catch (PDOException $e) {
        die("Error!:" . $e->getMessage());
    }
}

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

function getUser($email, $password) {
    $user = db_getData("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($user->rowCount() > 0){
        return $user;
    } else {
        return "No user found";
    }
}