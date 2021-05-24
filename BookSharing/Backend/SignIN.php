<?php

require "db.php";



function userCredentials(){
    // If the Session is active, just let the user in
    if (isset($_SESSION['user_email'])){
        echo("Session Active");
        header('Location: welcome.php');
    }

    // Getting the credentials form the SignIN form
    if (! empty($_POST["login"])){
        session_start();
        $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

        //echo "Email : ". $email . "<br> Password : ". $password; 
        
        $credentials = [$email, $password];
        return $credentials;
    }


}

function login(){
    $pdo = connect();
    $credentials = userCredentials();
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
            
            return TRUE;
        }
    }

    return FALSE;

}+

if(login()){
    header('Location: welcome.php');
}else{
    header('Location: indexSignIN.php');
}

?>