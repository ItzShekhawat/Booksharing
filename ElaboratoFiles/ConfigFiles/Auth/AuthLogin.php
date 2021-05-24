<?php

require "../Connection/db.php";

if (isset($_SESSION['user_email'])){
    echo("Session Active");
    header('Location: ../../Pages/welcome.php');
}


function userCredentialsLogin(){


    // Getting the credentials form the SignIN form
    if (!empty($_POST["login"])){
        session_start();
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        echo "Email : ". $email . "<br> Password : ". $password; 

        $credential = [$email, $password];
        return $credential;
        
    }


}

function login(){
    $pdo = connect();
    $credentials = userCredentialsLogin();
    echo $credentials;
    
    $userEmail = $credentials[0];
    $userPassword = $credentials[1];
    $userPassword = md5($userPassword, FALSE);

    try{
        // Setting up the query request 
        $query = "SELECT password FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userEmail]);
    }catch(Exception $e){
        echo "Error". $e->getMessage();
    }
    while ($row = $stmt->fetch()) {
        if($userPassword == $row['password']){
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_password'] = $row['password'];
            
            header('Location: ../../Pages/welcome.php');
        }else{
            header('Location: ../../html/login.html');
        }

    }
    return null;
}

login();


?>