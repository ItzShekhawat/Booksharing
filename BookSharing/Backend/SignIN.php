<?php

require "db.php";


function userCredentials(){
    // If the Session is active, just let the user in
    if (isset($_SESSION['user_email'])){
        echo("Session Active");
        header('Location: welcome.php');
    }

    // Getting the credentials form the SignIN form
    if (isset($_REQUEST['submit_SignIN'])){
        $email = strip_tags($_REQUEST['email']);
        $password = strip_tags($_REQUEST['password']);

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
            session_start();
            $_SESSION['user_email'] = $userEmail;
            $_SESSION['user_password'] = $row['password'];
            
            return TRUE;
        }
    }

    return FALSE;

}


if(login()){
    header('Location: welcome.php');
}else{
    header('Location: indexSignIN.php');
}

?>