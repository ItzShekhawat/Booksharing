<?php

function connect(){ // Database Connection With PDO
    try{
        $hostname = "localhost";
        $dbname = "booksharing";
        $user = "root";
        $pass = "";
        $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Error" . $e->getMessage();
        die();
    }

    return $conn;

}


?>