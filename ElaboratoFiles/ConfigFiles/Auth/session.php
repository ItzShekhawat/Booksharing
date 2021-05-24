<?php

if (isset($_SESSION['user_email'])){
    echo("Session Active");
    header('Location: ../../Pages/welcome.php');
    
}elseif(isset($_POST['login'])){
    
    header('Location:../../html/login.html');

}elseif(isset($_POST['register'])){

    header('Location:../../html/login.html');

}


?>

