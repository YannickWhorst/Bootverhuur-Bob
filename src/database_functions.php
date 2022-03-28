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
        $result = $queryPDO->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $data){
            echo $data["boot_naam"] . " ";
            echo "€" . $data["boot_prijs"] . " ";
            echo $data["boot_capaciteit"] . " ";
            echo $data["boot_image"] . "<br> ";
        }
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    
}

function db_insertData($query) {

}