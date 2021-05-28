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
            $bookCategory = filter_var($_POST['cat'], FILTER_SANITIZE_STRING);
            $bookDescription = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $StorageCentre = filter_var($_POST['centre'], FILTER_SANITIZE_STRING);
            $bookCover = filter_var_array($_FILES['bookimg']);
            echo $StorageCentre."</br>";
            echo "Test1 </br>";
            echo $bookCategory;
            echo "Test1 </br>";
            
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

            // Getting the Category ID
            try{
                $query = "SELECT `id_Category` FROM `category` WHERE type_category LIKE '%$bookCategory%';";
                $stmt = $pdo->prepare($query);
                $stmt->execute(); 
                $category_ID = $stmt->fetch();
                $category_ID = $category_ID[0];
            }catch(Exception $e){
                echo "Error in Storage ID ". $e->getMessage();
            }
            

            // Filling up the DB 
            $bookCover = "../Images/BookImg/".$bookCover['name'];

            try{
                $query = "INSERT INTO `books`(`title`, `writer`, `publishing_house`, `publishing_date`, `category`, `description`, `bookCover`, `id_Centre`) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$bookTitle, $bookWriterName.$bookWriterSurname, $bookProductionHouse, $bookPublicationDate, $category_ID, $bookDescription, $bookCover, $id_Centre]);
                header('Location: ../../Pages/admin.php');
            }catch(Exception $e){
                echo "Failed". $e->getMessage();
            }

        }
    }
    bookloading();    

?>
