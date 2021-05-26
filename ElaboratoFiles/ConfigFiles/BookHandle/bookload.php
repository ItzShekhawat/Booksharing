<?php

    require '../Connection/db.php';
    require "../QR/QRcode_Setup.php";

    function bookloading (){
        
        if(isset($_POST['bookform'])){
            $bookTitle = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $bookWriterName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $bookWriterSurname = filter_var($_POST['surname'], FILTER_SANITIZE_STRING);
            $bookProductionHouse = filter_var($_POST['PH'], FILTER_SANITIZE_STRING);
            $bookPublicationDate = filter_var($_POST['pdate'], FILTER_SANITIZE_STRING);
            $bookGender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
            $bookDescription = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $StorageCentre = filter_var($_POST['centre'], FILTER_SANITIZE_STRING);
            $bookCover = filter_var_array($_FILES['bookimg']);
            echo $StorageCentre;

            // Getting the Storage Centre ID 
            $pdo = connect();
            try{
                $query = "SELECT `id_Centre` FROM `accreditationcentre` WHERE name LIKE '%$StorageCentre%';";
                $stmt = $pdo->prepare($query);
                $stmt->execute(); 
                $id_Centre = $stmt->fetch();
                $id_Centre = $id_Centre[0];
            }catch(Exception $e){
                echo "Error in Storage ID ". $e->getMessage();
            }
            

            // Filling up the DB 
            $bookCover = "/Images/BookImg/".$bookCover['name'];

            try{
                $query = "INSERT INTO `books`(`title`, `writer`, `publishing_house`, `publishing_date`, `gender`, `description`, `bookCover`, `id_Centre`) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$bookTitle, $bookWriterName.$bookWriterSurname, $bookProductionHouse, $bookPublicationDate, $bookGender, $bookDescription, $bookCover, $id_Centre]);
                header('Location: ../../Pages/admin.php');
            }catch(Exception $e){
                echo "Failed". $e->getMessage();
            }

        }
    }    

?>
