<?php

require "../Connection/db.php";

function userCredentialsRegister(){


    // Getting the credentials form the SignIN form
    if (!empty($_POST["Register"])){
        session_start();
        $CF = filter_var($_POST["CF"], FILTER_SANITIZE_STRING);
        $name = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $surname = filter_var($_POST["surname"], FILTER_SANITIZE_STRING);
        $telephone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        echo "Email : ". $email . "<br> Password : ". $password . "<br>" . $telephone . "<br>" . $surname; 

        $credentials = [$CF, $name, $surname, $telephone, $email, $password];
        return $credentials ;
        
    }


}

function register(){
    $pdo = connect();
    $credentials = userCredentialsRegister();
    $userCF = $credentials[0];
    $userName = $credentials[1];
    $userSurname = $credentials[2];
    $userphone = $credentials[3];
    $userEmail = $credentials[4];
    $userPassword = md5($credentials[5], FALSE);

    try {
        $query ="INSERT INTO `users`(`CF`, `name`, `surname`, `email`, `phone`, `password`) VALUES (?,?,?,?,?,?) ";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userCF, $userName, $userSurname, $userEmail, $userphone, $userPassword]);
        $_SESSION['user_email'] = $userEmail;
        header('Location: ../../Pages/welcome.php');
    }catch(Exception $e){
        echo "Error" . $e->getMessage();
        //header('Location: ../../html/register.html');
    }

    return null;

}


register();



?>