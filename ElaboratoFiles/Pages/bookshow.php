<?php
    require "../ConfigFiles/Connection/db.php";
    

    
    function showBook(){
        $pdo = connect();

        try{
            // Getting the Book Data
            $query = "SELECT * FROM `books` WHERE 1";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }catch(Exception $e){
            
            echo "Failed" . $e->getMessage();
        }
    
    }
    showBook();
    
?>


