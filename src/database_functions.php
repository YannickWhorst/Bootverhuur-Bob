<?php

function db_connect(){
    try {
        $db = new PDO("mysql:host=localhost;dbname=bootverhuur", "root", "");
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

}