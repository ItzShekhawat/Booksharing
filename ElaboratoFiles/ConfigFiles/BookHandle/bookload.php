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
            $bookCategory_ID = filter_var($_POST['cat'], FILTER_SANITIZE_STRING);
            $bookDescription = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $StorageCentre = filter_var($_POST['centre'], FILTER_SANITIZE_STRING);
            $bookCover = filter_var_array($_FILES['bookimg']);
            echo $StorageCentre."</br>";
            echo "Test1 </br>";
            echo $bookCategory_ID;
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


            // Filling up the DB 
            $bookCover = "../Images/BookImg/".$bookCover['name'];
            $bookImgSave = "../../Images/BookImg/";
            move_uploaded_file( $_FILES['bookimg']['tmp_name'], $bookImgSave.$_FILES['bookimg']['name']);

            try{
                $query = "INSERT INTO `books`(`title`, `writer`, `publishing_house`, `publishing_date`, `category`, `description`, `bookCover`, `id_Centre`) VALUES (?,?,?,?,?,?,?,?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$bookTitle, $bookWriterName."".$bookWriterSurname, $bookProductionHouse, $bookPublicationDate, $bookCategory_ID, $bookDescription, $bookCover, $id_Centre]);
                header('Location: ../../Pages/admin.php');
            }catch(Exception $e){
                echo "Failed". $e->getMessage();
            }


            // Get the id of the book : 
            $id_book = $pdo->lastInsertId();

            $QR_Info = QRCode_Generator($id_book, $bookTitle);

            try{
                $query = "INSERT INTO `qrcodes`(`qrcode`, `book_page`, `id_Book`) VALUES (?,?,?)";
                $stmt = $pdo->prepare($query);
                if($stmt->execute([$QR_Info[0],$QR_Info[1],$QR_Info[2]])){
                    echo "QR Path is been saved";
                }
    
            }catch(Exception $e){
                echo "Error".$e->getMessage();
            }


        }
    }

    bookloading();

?>
